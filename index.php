<?php
require_once('config/info-site.php');
require_once('config/product-sale.php');
require_once('config/product-new.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hunt.ru</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <?php
    require_once('header.php')
    ?>

    <div class="banner">
        <a href="category.php">
            <h1>
                <span><strong>ТОВАРЫ</strong>ДЛЯ ОХОТЫ</span>
            </h1>
        </a>
    </div>

    <main>
        <div class="container">
            <div class="content">
                <div class="hdr">
                    <a href="categoryList.php">Каталог товаров</a>
                </div>

                <div class="category-list">
                    <?php
                    addCatListUser($category);
                    ?>

                    <div class="category-item">
                        <div class="catimg">
                            <a href="new.php">
                                <img src="img/category/image_3553.png" width="40px" height="40px">
                            </a>
                        </div>
                        <a href="">Новинки</a>
                    </div>
                    <div class="category-item">
                        <div class="catimg">
                            <a href="sale.php">
                                <img src="img/category/image_81.png" width="40px" height="40px">
                            </a>
                        </div>
                        <a href="">Распродажа</a>
                    </div>

                </div>

            </div>

            <div class="hdr">
                <a href="">Распродажа</a>
            </div>

            <input id="sale-page-number" type="hidden" value="<?= $salePage ?>">

            <div class="slider-list">
                <div class="hidden-block">
                    <div id="sale-slider" class="slider-block">
                        <?php
                        addProdSaleListUser($productsSaleList, $productsSale, $photosSale);
                        ?>
                    </div>

                </div>

                <div class="button-slider-block">
                    <div id="left-sale" class="left-button-slider"></div>
                    <div id="right-sale" class="right-button-slider"></div>
                </div>

            </div>

            <div class="hdr">
                <a href="">Новинки</a>
            </div>

            <input id="new-page-number" type="hidden" value="<?= $newPage ?>">

            <div class="slider-list">
                <div class="hidden-block">
                    <div id="new-slider" class="slider-block">
                        <?php
                        addProdNewListUser($productsNewList, $productsNew, $photosNew);
                        ?>
                    </div>

                </div>

                <div class="button-slider-block">
                    <div id="left-new" class="left-button-slider"></div>
                    <div id="right-new" class="right-button-slider"></div>
                </div>

            </div>

        </div>
    </main>

    <div class="hometext">
        <div class="container-max">
            <div class="hdr">О нас</div>
            <p>
                <?= nl2br($infosite['INFOSITE']) ?>
            </p>
        </div>
    </div>

    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/sliderProd.js"></script>

</html>