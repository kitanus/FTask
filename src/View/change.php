<h1>Изменение доверенности</h1>
<form action="/change" method="post">
    <label for="idShow">Выберите номер доверенности
        <select id="idShow" name="id">
            <?php foreach ($data["powerAttorney"] as $key => $allPowerOfAttorney): ?>
                <option value="<?= $allPowerOfAttorney["id"] ?>"><?= $allPowerOfAttorney["id"] ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <button class="butts" name="action" value="showPdf">Показать пдф</button>
</form>
<hr>

<?php if(!empty($_POST["action"]) && $_POST["action"] == "showPdf"): ?>
    <form action="/change" method="post">
        <p>
            <label for="org">Организация:</label>
            <select name="organization" id="org">
                <option value="<?= $data["mainOrg"][0]["id"] ?>"><?= $data["mainOrg"][0]["name"] ?></option>
                <?php foreach ($data["orgName"] as $key => $org): ?>
                    <option value="<?= $org["id"] ?>"><?= $org["orgName"] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="consumer">Потребитель:</label>
            <select name="consumer" id="consumer">
                <option value="<?= $data["consumer"][0]["id"] ?>"><?= $data["consumer"][0]["name"] ?></option>
                <?php foreach ($data["orgName"] as $key => $org): ?>
                    <option value="<?= $org["id"] ?>"><?= $org["orgName"] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="bankAccount">Счет:</label>
            <select name="bankAccount" id="bankAccount">
                <option value="<?= $data["bank"][0]["id"] ?>"><?= $data["bank"][0]["name"] ?></option>
                <?php foreach ($data["bankName"] as $key => $bank): ?>
                    <option value="<?= $bank["id"] ?>"><?= $bank["name"] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="issuedToUser">Доверенность выдана:</label>
            <select name="issuedToUser" id="issuedToUser">
                <option value="<?= $data["user"][0]["id"] ?>"><?= $data["user"][0]["name"] ?></option>
                <?php foreach ($data["individualFullName"] as $key => $individual): ?>
                    <option value="<?= $individual["id"] ?>"><?= $individual["surname"]." ".$individual["name"]." ".$individual["patronymic"] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="receiveFromTheOrganization">Поставщик:</label>
            <select name="receiveFromTheOrganization" id="receiveFromTheOrganization">
                <option value="<?= $data["provider"][0]["id"] ?>"><?= $data["provider"][0]["name"] ?></option>
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
            <? foreach ($data["inventoryItems"] as $key => $invItems): ?>
                <tr>
                    <td><input type="text" name="numberInventoryItems" value="<?= $invItems["inventory_items_number"] ?>"  required></td>
                    <td><input type="text" name="materialValues" value="<?= $invItems["material_values"] ?>" required></td>
                    <td>
                        <select name="unitOfMeasurement">
                            <option value="<?= $invItems["uOMeasureId"] ?>"><?= $invItems["uOMeasureName"] ?></option>
                            <?php foreach ($data["unitOfMeasurementName"] as $key => $unitOfMeasure): ?>
                                <option value="<?= $unitOfMeasure["id"] ?>"><?= $unitOfMeasure["name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" name="countMaterials" value="<?= $invItems["quantity"]?>" required></td>
                </tr>
            <? endforeach;?>
        </table>
        <input type="hidden" name="id" value="<?= $_POST["id"]?>">

        <button class="butts" name="action" value="changePdf">Изменить пдф</button>
    </form>
<?php endif; ?>