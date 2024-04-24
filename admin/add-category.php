<?php
require_once('../config/category.php');
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
                <h1>Добавление категории</h1>
                <form id="addCategoryForm" action="">
                    <div class="upd-block">
                        <h2>Родитель</h2>
                        <select name="catid" id="catid">
                            <?php
                            addSelect($category);
                            ?>
                        </select>
                        <h2>Изображение</h2>
                        <div class="btn-img-block">
                            <input type="file" name="file_photo" id="file_photo">
                        </div>
                        <h2>Информация</h2>
                        <p class="name-info">
                            Название:
                        </p>
                        <input class="name-input" type="text" name="namecat" id="namecat">
                        <p class="name-info">
                            Описание:
                        </p>
                        <textarea class="desc-textarea" name="textcat" id="textcat"></textarea>
                        <div class="button-upd-block">
                            <input id="add-category-button" class="upd-button" type="button" value="Добавить">
                            <a class="upd-button" href="categoryList.php">Назад</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

<script src="../script/category-add.js"></script>

</html>