<?php
/**
 * Created by PhpStorm.
 * User: владислав
 * Date: 03.03.2019
 * Time: 17:27
 */

namespace Src\Controllers;

use Src\Core\AbstractController;
use Src\Model\ModelShow;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Swift_Attachment;

class ControllerShow extends AbstractController
{
    private $data;

    /**
     * Сохранение в data массива, созданного в заданной модели
     * Сгенерировать View-шку
     */
    function actionIndex()
    {
        $this->data = $this->getModel(new ModelShow());

        if(!empty($_POST["action"]) && ($_POST["action"] == "createPdf" || $_POST["action"] == "showPdf"))
        {
            $this->mpdf->SetTitle('Power of attorney');

            $html = $this->getPatternProcessing(file_get_contents(__DIR__."/../View/pdf.html"), $this->getArrayChangeText());
            $css = file_get_contents(__DIR__."/../View/css/pdf.css" );

            $this->mpdf->WriteHTML($css,1);
            $this->mpdf->WriteHTML($html, 2);

            if(!empty($_POST["isEmail"]) && $_POST["isEmail"] == "on")
            {
                $content = $this->mpdf->Output('', 'S');
                $result = $this->getSwiftMailer($this->getEmailData(), $content);
            }

            $this->mpdf->Output();
        }
        else
        {
            $this->view->generate('show.php', 'wrapper.php', "main.css", $this->data);
        }
    }

    /**
     * Формирует и возвращает письмо с приклепленным pdf файлом
     *
     * @param $content
     * @param $data
     * @return int
     */
    public function getSwiftMailer($data, $content)
    {
        $attachment = new Swift_Attachment($content, 'power_of_attorney_'.$data["id"].'_'.$data["datePowerOfAttorney"].'.pdf', 'application/pdf');

        $sender = (!empty($data["sender"]) ? $data["sender"] : "");
        $emailText = (!empty($data["emailText"]) ? $data["emailText"] : "");

        $message = (new Swift_Message($data["messageSubject"]))
            ->setFrom(array('secrets.vk08@mail.ru' => $sender))
            ->setTo(array($data["emailName"] => "A name"))
            ->setBody($emailText)
            ->attach($attachment);

        $transport = (new Swift_SmtpTransport('smtp.mail.ru', 25))
            ->setUsername('secrets.vk08@mail.ru')
            ->setPassword('v5231491k')
            ->setEncryption("tls");

        $mailer = new Swift_Mailer($transport);

        return $mailer->send($message);
    }

    /**
     * В текстовом файле меняет ключи ассоциативного массива на значения этих ключей
     *
     * @param $html
     * @param $changeArr
     * @return mixed
     */
    public function getPatternProcessing($html, $changeArr)
    {
        $beforeArr = [];  $afterArr = [];

        foreach($changeArr as $before => $after)
        {
            $beforeArr[] = $before;
            $afterArr[] = $after;
        }

        return str_replace($beforeArr, $afterArr, $html);
    }

    /**
     * Формирование ассоциативного массива для вставки в шаблон текст
     *
     * @param $data
     * @return array
     */
    private function getArrayChangeText()
    {
         $changeArr =  [
            "{numberDoc}" => $this->data["id"],
            "{dateDoc}" => $this->data["powerOfAttorney"][0]["date"],
            "{dateEndDoc}" => $this->data["powerOfAttorney"][0]["date_end"],
            "{position}" => $this->data["user"][0]["positionName"],
            "{FIO}" => $this->data["user"][0]["surname"]." ".$this->data["user"][0]["userName"]." ".$this->data["user"][0]["patronymic"],
            "{provider}" => $this->data["provider"][0]["name"],
            "{OKUD}" => $this->data["powerOfAttorney"][0]["code"],
            "{OKPO}" => $this->data["orgMain"][0]["OKPO"],
            "{mainOrganization}" => $this->data["orgMain"][0]["fullName"],
            "{Consumer}" => $this->data["consumer"][0]["fullName"],
            "{rs}" => $this->data["bank"][0]["сhecking_account"],
            "{bank}" => ", "
                ."в банке ".$this->data["bank"][0]["name"].", "
                ."БИК ".$this->data["bank"][0]["BIK"].", "
                ."к/с ".$this->data["bank"][0]["сorresponding_account"],
            "{series}" => $this->data["user"][0]["series"],
            "{numberPassport}" => $this->data["user"][0]["number"],
            "{byIssued}" => $this->data["user"][0]["issued_by"],
            "{datePassport}" => $this->data["user"][0]["date_of_issue"],
            "{materialItems}" => "",
            "{directorFIO}" => $this->data["orgMain"][0]["surname"]." "
                .$this->data["orgMain"][0]["directorName"][0].$this->data["orgMain"][0]["directorName"][1].". "
                .$this->data["orgMain"][0]["patronymic"][0].$this->data["orgMain"][0]["patronymic"][1].".",
            "{mainAccountant}" => ""
        ];

        $i = 1;

        foreach ($this->data["inventoryItems"] as $key => $inventoryItem)
        {
            $changeArr["{numberMaterial".$i."}"] = $inventoryItem["inventory_items_number"];
            $changeArr["{nameMaterial".$i."}"] = $inventoryItem["material_values"];
            $changeArr["{kindMaterial".$i."}"] = $inventoryItem["name"];
            $changeArr["{countMaterial".$i."}"] = $inventoryItem["quantity"];
            $i++;
        }

        return $changeArr;
    }

    private function getEmailData()
    {
        return [
            "id" => $this->data["id"],
            "datePowerOfAttorney" => $this->data["datePowerOfAttorney"],
            "sender" => $_POST["senderName"],
            "emailText" => $_POST["emailText"],
            "messageSubject" => $_POST["messageSubject"],
            "emailName" => $_POST["emailName"],
        ];
    }
}