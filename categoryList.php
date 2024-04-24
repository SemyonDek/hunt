<?php
require_once('config/category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<style>
    .category-list {
        margin-top: 0;
    }
</style>

<body>
    <?php
    require_once('header.php')
    ?>

    <main>
        <div class="container">
            <div class="content">
                <div class="breadcrumb">
                    <a href="index.php">Главная</a>
                    <p>></p>
                    <a href="category.php">Каталог</a>
                </div>
                <h1>Каталог</h1>
                <div class="category-list">
                    <?php
                    addCatListUser($category);
                    ?>
                    <div class="category-item">
                        <div class="catimg">
                            <a href="new.php">
                                <img src="img/category/image_3553.png">
                            </a>
                        </div>
                        <a href="">Новинки</a>
                    </div>

                    <div class="category-item">
                        <div class="catimg">
                            <a href="sale.php">
                                <img src="img/category/image_81.png">
                            </a>
                        </div>
                        <a href="">Распродажа</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/sliderProd.js"></script>

</html>