<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Тест</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="src/View/bootstrap/css/bootstrap.min.css?<?= round(time()/20) ?>" rel="stylesheet">
    <link href="src/View/css/main.css?<?= round(time()/20) ?>" rel="stylesheet">
</head>

<body>
    <div class="main">
        <?php include __DIR__.'/'.$content_view; ?>
    </div>
</body>
</html>