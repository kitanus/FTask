<?php if(!empty($_SESSION["statusUser"]) && $_SESSION["statusUser"] != "guest"): ?>
    <a class="aMain" href="/create">Создать доверенность</a>
    <?php if(!empty($_SESSION["statusUser"]) && $_SESSION["statusUser"] == "administrator"): ?>
        <a class="aMain" href="/change">Изменить доверенность</a>
        <a class="aMain" href="/history">Журнал</a>
    <? endif; ?>
<? endif; ?>
<a class="aMain" href="/show">Показать доверенность</a>