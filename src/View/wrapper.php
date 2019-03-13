<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FTask</title>
    <link href="src/View/css/header.css?<?= round(time()/20) ?>" rel="stylesheet">
    <link href="src/View/css/<?= $content_css?>?<?= round(time()/20) ?>" rel="stylesheet">
</head>

<body>
    <header>
        <a id="backMain" href="/">Главная</a>
        <?php if(!empty($_SESSION["idUser"]) && !empty($_SESSION["statusUser"])): ?>
            <div id="enter">
                <span><?= $data["fullUser"] ?></span>
                <a id="exit" href="/close">Выход</a>
            </div>
        <?php endif; ?>
    </header>
    <main>
        <?php include __DIR__.'/'.$content_view; ?>
    </main>
    <footer>

    </footer>
</body>
</html>