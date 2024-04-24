<?php
require_once('../config/category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/add-prod-adm.css" />
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Добавление товара</h1>
                <div class="add-conteiner">
                    <form id="add-prod-form" action="">
                        <div class="line-add-prod">
                            <div class="name-add-prod">Категория:</div>
                            <select class="input-add-prod" name="catidprod" id="catidprod">
                                <option value=""></option>
                                <?php
                                addSelect($category, 0, 1);
                                ?>
                            </select>
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Название:</div>
                            <input class="input-add-prod" id="nameprod" name="nameprod" type="text">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Артикул:</div>
                            <input class="input-add-prod" id="codeprod" name="codeprod" type="text">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Цена:</div>
                            <input class="input-add-prod" id="priceprod" name="priceprod" type="number">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Скидка:</div>
                            <input class="input-add-prod" id="saleprod" name="saleprod" type="number">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Бренд:</div>
                            <input class="input-add-prod" id="brandprod" name="brandprod" type="text">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Страна:</div>
                            <input class="input-add-prod" id="countryprod" name="countryprod" type="text">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Материал:</div>
                            <input class="input-add-prod" id="materialprod" name="materialprod" type="text">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Длина:</div>
                            <input class="input-add-prod" id="lengthprod" name="lengthprod" type="number" placeholder="мм">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Вес:</div>
                            <input class="input-add-prod" id="weightprod" name="weightprod" type="number" placeholder="г">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Цвет:</div>
                            <input class="input-add-prod" id="colorprod" name="colorprod" type="text">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Описание:</div>
                            <textarea class="textarea-add-prod" name="descprod" id="descprod"></textarea>
                        </div>
                        <div class="line-add-prod">
                            <input class="button-add-prod" id="addProdButton" type="button" value="Добавить" style="margin-right: 20px;">
                            <a class="button-add-prod" href="catalog.php">Назад</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

<script src="../script/product-add.js"></script>

</html>