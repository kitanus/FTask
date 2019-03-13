<table>
    <tr>
        <td>№</td>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>Отчетсво</td>
        <td>Должность</td>
        <td>Статус</td>
        <td>Логин</td>
        <td>Изменить статус</td>
        <td>Удалить</td>
    </tr>
    <?php foreach ($data["user"] as $key => $value): ?>
        <tr>
            <td><?= $value["userId"] ?></td>
            <td><?= $value["userName"] ?></td>
            <td><?= $value["surname"] ?></td>
            <td><?= $value["patronymic"] ?></td>
            <td><?= $value["posName"] ?></td>
            <td><?= $value["statusName"] ?></td>
            <td><?= $value["login"] ?></td>
            <td>
                <form action="/admin" method="post">
                    <input type="hidden" name="id" value="<?= $value["userId"] ?>">
                    <select name="status">
                            <option value="<?= $value["statusId"]?>"><?= $value["statusName"] ?></option>
                        <?php foreach ($data["status"] as $keyStatus => $valueStatus): ?>
                            <option value="<?= $valueStatus["id"] ?>"><?= $valueStatus["name"] ?></option>
                        <? endforeach; ?>
                    </select>
                    <button name="action" value="changeStatus">Изменить статус</button>
                </form>
            </td>
            <td>Удалить</td>
        </tr>
    <? endforeach; ?>
</table>
<hr>
<h3>Создание нового пользователя</h3>
<form id="createUser" action="/admin" method="post">
    <label for="nameUser">Имя пользователя:
        <input id="nameUser" name="nameUser"  type="text" required>
    </label>
    <label for="surnameUser">Фамилия пользователя:
        <input id="surnameUser" name="surnameUser" type="text" required>
    </label>
    <label for="patronymic">Отчетсво пользователя:
        <input id="patronymic" name="patronymic" type="text" required>
    </label>
    <label for="passSeries">Серия паспорта пользователя:
        <input id="passSeries" name="passSeries"  type="text" required>
    </label>
    <label for="passNumber">Номер паспорта пользователя:
        <input id="passNumber" name="passNumber" type="text" required>
    </label>
    <label for="issued_by">Кем выдан паспорт:
        <input id="issued_by" name="issued_by" type="text" required>
    </label>
    <label for="date_of_issue">Дата получения паспорта:
        <input id="date_of_issue" name="date_of_issue" type="date" required>
    </label>
    <label for="position">Должность пользователя:
        <select id="position" name="position">
            <option value="0">Выберите статус</option>
            <?php foreach ($data["position"] as $keyStatus => $valueStatus): ?>
                <option value="<?= $valueStatus["id"] ?>"><?= $valueStatus["name"] ?></option>
            <? endforeach; ?>
        </select>
    </label>
    <label for="login">Логин:
        <input id="login" name="login" type="text" required>
    </label>
    <label for="password">Пароль:
        <input id="password" name="password" type="text" required>
    </label>
    <label for="status">Статус пользователя:
        <select id="status" name="status">
            <option value="0">Выберите статус</option>
            <?php foreach ($data["status"] as $keyStatus => $valueStatus): ?>
                <option value="<?= $valueStatus["id"] ?>"><?= $valueStatus["name"] ?></option>
            <? endforeach; ?>
        </select>
    </label>

    <button class="butts" name="action" value="createUser">Создать пользователя</button>
</form>