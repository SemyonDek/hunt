<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
    require_once('header.php');
    ?>

    <main>
        <div class="container">
            <div class="content">
                <h1>Вход</h1>
                <form action="" id="login-form">
                    <div class="wa-name">
                        Введите логин
                    </div>
                    <input class="input-login" id="login" name="login" type="text" placeholder="Логин">
                    <br>
                    <div class="wa-name">
                        Введите пароль
                    </div>
                    <input class="input-login" id="password" name="password" type="password" placeholder="Пароль">
                    <br>
                    <input id="logButton" type="button" value="Войти">
                </form>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php');
    ?>
</body>

<script src="script/login.js"></script>

</html>