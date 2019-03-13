<div id="chooseShow">
    <form action="/show" method="post">
        <label for="idShow">Выберите номер доверенности
            <select id="idShow" name="id">
                <?php foreach ($data["allPowerOfAttorney"] as $key => $allPowerOfAttorney): ?>
                    <option value="<?= $allPowerOfAttorney["id"] ?>"><?= $allPowerOfAttorney["id"] ?></option>
                <?php endforeach; ?>
            </select>
        </label>
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
        <button class="butts" name="action" value="showPdf">Показать</button>
    </form>
</div>