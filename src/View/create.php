<h1>Заполнение доверенности</h1>
<form action="/" method="post">
    <p>
        <label for="org">Организация:</label>
        <select name="organization" id="org">
            <option value="1">ООО "ИТ-ПСГ"</option>
            <option value="2">ООО "Лиана"</option>
        </select>
    </p>
    <p>
        <label for="consumer">Потребитель:</label>
        <select name="consumer" id="consumer">
            <option value="1">ООО "ИТ-ПСГ"</option>
            <option value="2">ООО "Лиана"</option>
        </select>
    </p>
    <p>
        <label for="payer">Плательщик:</label>
        <select name="payer" id="payer">
            <option value="1">ООО "ИТ-ПСГ"</option>
            <option value="2">ООО "Лиана"</option>
        </select>
    </p>
    <p>
        <label for="bankAccount">Плательщик:</label>
        <select name="bankAccount" id="bankAccount">
            <option value="1">ФИЛИАЛ ПРИВОЛЖСКИЙ ПАО БАНК "ФК ОТКРЫТИЕ"</option>
            <option value="2">ОАО "Сбербанк России"</option>
        </select>
    </p>
    <p>
        <label for="issuedToUser">Доверенность выдана:</label>
        <select name="issuedToUser" id="issuedToUser">
            <option value="1">Иванов Иван Иванович</option>
            <option value="2">Антонов Алексей Александрович</option>
        </select>
    </p>
    <p>
        <label for="receiveFromTheOrganization">Доверенность выдана:</label>
        <select name="receiveFromTheOrganization" id="receiveFromTheOrganization">
            <option value="1">ООО "ТАТИНКОМ-КОМПЬЮТЕРС"</option>
            <option value="2">OOO "Валенсия"</option>
        </select>
    </p>
    <table>
        <tr>
            <td>Материальные ценности</td>
            <td>Единица измерений</td>
            <td>Колличество (прописью)</td>
        </tr>
        <tr>
            <td><input type="text" name="material_values"></td>
            <td>
                <select>
                    <option>усл</option>
                    <option>шт</option>
                    <option>уп</option>
                </select>
            </td>
            <td><input type="text" name="material_values"></td>
        </tr>
    </table>

    <input type="button" id="save" value="Сохранить">
</form>

