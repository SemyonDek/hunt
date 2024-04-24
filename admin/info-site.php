<?php
require_once('../config/info-site.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="../css/info-site-adm.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Описание сайта</h1>
                <div class="info-site-block">
                    <textarea id="info-site-text" name="info-site-text" id=""><?= $infosite['INFOSITE'] ?></textarea>
                    <input id="button-upd" type="button" value="Изменить">
                </div>
            </div>
        </div>
    </main>

</body>

<script src="../script/info-site.js"></script>

</html>