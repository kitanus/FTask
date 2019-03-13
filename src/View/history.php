<table>
    <tr>
        <td>№</td>
        <td>Организация</td>
        <td>Поставщик</td>
        <td>Дата выдачи</td>
        <td>Выдана</td>
        <td>Дата изменения</td>
        <td>Изменить</td>
        <td>Удалить</td>
    </tr>
    <?php foreach ($data["powerOfAttorney"] as $key => $value): ?>
        <tr>
            <td><?= $value["PoAId"] ?></td>
            <td><?= $value["orgName"] ?></td>
            <td><?= $value["providerName"] ?></td>
            <td><?= $value["date"] ?></td>
            <td><?=
                $value["positionName"]." ".
                $value["surname"]." ".
                $value["userName"]
                ?></td>
            <td><?= $value["date_change"] ?></td>
            <td>
                <form action="/change" method="post">
                    <input type="hidden" name="id" value="<?= $value["PoAId"] ?>">
                    <button name="action" value="showPdf">Изменить</button>
                </form>
            </td>
            <td><form action="/history" method="post">
                    <input type="hidden" name="id" value="<?= $value["PoAId"] ?>">
                    <button name="action" value="delete">Удалить</button>
                </form></td>
        </tr>
    <? endforeach; ?>
</table>