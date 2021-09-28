<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa fa-gamepad" aria-hidden="true"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="shooter">Шутеры</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="rgp">РПГ</a>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- <div class="container">
        <?php if ($_SERVER["REQUEST_URI"] == "/") { ?>
            Вы на главной странице! =)
        <?php } elseif ($_SERVER["REQUEST_URI"] == "/shooter") { ?>
            Тут мы вам расскажем о Шутерах
        <?php } elseif ($_SERVER["REQUEST_URI"] == "/rgp") { ?>
            Будешь отыгрывать роли? Тогда тебе сюда!
        <?php } ?>
    </div> -->

    <div class="container">
    <?php 
    $url = $_SERVER["REQUEST_URI"];

    if ($url == "/") {
        echo "Вы на главной странице! =)<br>";
        echo "<b>И разметку могу принтовать</b>";
    } elseif ($url == == "/shooter") {
        echo "Тут мы вам расскажем о Шутерах";
    } elseif ($url == == "/rgp") {
        echo " Будешь отыгрывать роли? Тогда тебе сюда!";
    } 
    ?>
</div>
</body>
</html>