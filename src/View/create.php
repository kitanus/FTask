<h1>Заполнение доверенности</h1>
<form action="/show" method="post">
    <p>
        <label for="org">Организация:</label>
        <select name="organization" id="org">
            <option value="false">Выберите организацию</option>
            <?php foreach ($data["orgName"] as $key => $org): ?>
            <option value="<?= $org["id"] ?>"><?= $org["orgName"] ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="consumer">Потребитель:</label>
        <select name="consumer" id="consumer">
            <option value="false">Выберите потребителя</option>
            <?php foreach ($data["orgName"] as $key => $org): ?>
                <option value="<?= $org["id"] ?>"><?= $org["orgName"] ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="bankAccount">Счет:</label>
        <select name="bankAccount" id="bankAccount">
            <option value="false">Выберите банк</option>
            <?php foreach ($data["bankName"] as $key => $bank): ?>
                <option value="<?= $bank["id"] ?>"><?= $bank["name"] ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="issuedToUser">Доверенность выдана:</label>
        <select name="issuedToUser" id="issuedToUser">
            <option value="false">Выберите физ. лицо</option>
            <?php foreach ($data["individualFullName"] as $key => $individual): ?>
                <option value="<?= $individual["id"] ?>"><?= $individual["surname"]." ".$individual["name"]." ".$individual["patronymic"] ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="receiveFromTheOrganization">Поставщик:</label>
        <select name="receiveFromTheOrganization" id="receiveFromTheOrganization">
            <option value="false">Выберите организацию</option>
            <?php foreach ($data["providerName"] as $key => $provider): ?>
                <option value="<?= $provider["id"] ?>"><?= $provider["orgName"] ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <table>
        <tr>
            <td>Номер по порядку</td>
            <td>Материальные ценности</td>
            <td>Единица измерений</td>
            <td>Колличество (прописью)</td>
        </tr>
        <tr>
            <td><input type="text" name="numberInventoryItems" value="1" required></td>
            <td><input type="text" name="materialValues" required></td>
            <td>
                <select name="unitOfMeasurement">
                    <option value="false">Выберите единицу измерений</option>
                    <?php foreach ($data["unitOfMeasurementName"] as $key => $unitOfMeasure): ?>
                        <option value="<?= $unitOfMeasure["id"] ?>"><?= $unitOfMeasure["name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input type="text" name="countMaterials" required></td>
        </tr>
    </table>

    <h3>Email</h3>
    <div id="emailBox">
        <label for="isEmail">Послать Email?<input style="margin-left: 20px" id="isEmail" type="checkbox" name="isEmail"></label>
        <label for="emailName">Напишите емайл принимающего
            <input id="emailName" type="email" name="emailName"></label>
        <label for="messageSubject">Напишите тему сообщения
            <input id="messageSubject" type="text" name="messageSubject"></label>
        <label for="senderName">Напишите имя отправляющего
            <input id="senderName" type="text" name="senderName"></label>
        <label for="emailText">Напишите текст сообщения
            <input id="emailText" type="text" name="emailText" placeholder="Необязательное поле"></label>
    </div>

    <input type="hidden" name="id" value="<?= $data["powerAttorneyId"] ?>">

    <button class="butts" name="action" value="createPdf">Создать пдф</button>
</form>

