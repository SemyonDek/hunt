<?php
require_once('config/category.php');
$catid = $_GET['catid'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
require_once('config/product.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/catalog.css" />
</head>

<style>
    .category-list {
        margin: 0;
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
                    <a href="category.php?catid=<?= $catid ?>"><?= $categoryitem['NAME'] ?></a>
                </div>
                <h1><?= $categoryitem['NAME'] ?></h1>
                <div class="category-list">
                    <?php
                    addCatListUser($category, $_GET['catid']);
                    ?>
                </div>
            </div>
            <div class="filters">
                <h2>Фильтры</h2>
                <div class="filters-line">
                    <form action="" id="filters-form">
                        <input type="hidden" name="catid" value="<?= $catid ?>">
                        <div class="filters-item">
                            <h5>Цена</h5>
                            <div class="filters-item-block">
                                <p class="filters-text">от</p>
                                <input name="min_price" type="number" placeholder="" value="<?php if (isset($_GET['min_price'])) echo $_GET['min_price'] ?>">
                                <p class="filters-text">до</p>
                                <input name="max_price" type="number" placeholder="" value="<?php if (isset($_GET['max_price'])) echo $_GET['max_price'] ?>">
                                <p class="filters-text">руб.</p>
                            </div>
                        </div>
                        <div class="filters-item">
                            <h5>Бренд</h5>
                            <div class="filters-item-block">
                                <select name="brand" id="">
                                    <?php
                                    if (isset($_GET['brand'])) {
                                        addSelectBrand($brand, $_GET['brand']);
                                    } else {
                                        addSelectBrand($brand);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="filters-item">
                            <h5>Страна</h5>
                            <div class="filters-item-block">
                                <select name="country" id="">
                                    <?php
                                    if (isset($_GET['country'])) {
                                        addSelectCountry($country, $_GET['country']);
                                    } else {
                                        addSelectCountry($country);
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="filters-item">
                            <h5>Фильтр</h5>
                            <div class="filters-item-block">
                                <select name="sort" id="">
                                    <option value=""></option>
                                    <?php
                                    if (isset($_GET['sort'])) {
                                    ?>
                                        <option value="ASC" <?php if ($_GET['sort'] == 'ASC') echo 'selected="selected"' ?>>сначала дешевые</option>
                                        <option value="DESC" <?php if ($_GET['sort'] == 'DESC') echo 'selected="selected"' ?>>сначала дорогие</option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="ASC">сначала дешевые</option>
                                        <option value="DESC">сначала дорогие</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="filters-item filters-item-btn">
                            <input class="btn-filter" type="submit" value="Применить">
                        </div>
                    </form>
                    <form action="" id="reset-form">
                        <input type="hidden" name="catid" value="<?= $catid ?>">
                        <div class="filters-item filters-item-btn">
                            <input class="btn-filter" type="submit" value="Сбросить">
                        </div>
                    </form>
                </div>
            </div>

            <div class="products-block">
                <?php
                addProdListUser($products, $photos);
                ?>

            </div>

            <div class="text-cat-block">
                <h2><?= $categoryitem['NAME'] ?></h2>
                <br>
                <p>
                    <?= nl2br($categoryitem['TEXT']) ?>
                </p>
            </div>

        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/compare-add.js"></script>
<script src="script/basket-add.js"></script>

</html>