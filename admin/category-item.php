<?php
require_once('../config/category.php');

$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="../css/category-item-adm.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Изменение категории</h1>
                <div class="upd-block">
                    <h2>Изображение</h2>
                    <div id="mainPhotoCat" class="block-img">
                        <img src="../<?= $categoryitem['SRC'] ?>" alt="">
                    </div>
                    <div class="btn-img-block">
                        <form id="PhotoCatForm" action="">
                            <input type="file" name="file_photo" id="file_photo">
                            <input id="upd-photo-button" type="button" value="Изменить">
                        </form>
                    </div>
                    <form id="addCategoryForm" action="">
                        <h2>Родитель</h2>
                        <input type="hidden" name="catid" id="catid" value="<?= $catid ?>">
                        <select name="parentid" id="parentid">
                            <?php
                            addSelect($category, 0, 0, $categoryitem['PARENT']);
                            ?>
                        </select>
                        <h2>Информация</h2>
                        <p class="name-info">
                            Название:
                        </p>
                        <input class="name-input" name="namecat" id="namecat" type="text" value="<?= $categoryitem['NAME'] ?>">
                        <p class="name-info">
                            Описание:
                        </p>
                        <textarea class="desc-textarea" name="textcat" id="textcat"><?= $categoryitem['TEXT'] ?></textarea>
                        <div class="button-upd-block">
                            <input id="upd-category-button" class="upd-button" type="button" value="Изменить">
                            <input id="del-category-button" class="upd-button" type="button" value="Удалить">
                            <a class="upd-button" href="categoryList.php">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

<script src="../script/category-upd.js"></script>

</html>