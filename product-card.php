<?php
require_once('config/category.php');
require_once('config/product-photo.php');
$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$catid = $productitem['CATID'];
$categoryitem = mysqli_query($ConnectDatabase, "SELECT * FROM `category` WHERE ID = '$catid'");
$categoryitem = mysqli_fetch_assoc($categoryitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE IDPROD = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);

$photoPage = count($productPhoto);
if ($photoPage < 7) {
    $photoPage = 1;
} else {
    $photoPage = 1 + ($photoPage - ($photoPage % 6)) / 6;
}

require_once('config/review.php');

$countReviews = mysqli_query($ConnectDatabase, "SELECT * FROM `review` WHERE IDPROD = '$prodid'");
$countReviews = mysqli_fetch_all($countReviews, MYSQLI_ASSOC);
$countReviews = count($countReviews);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Карточка товара</title>
    <link rel="stylesheet" href="css/product-card.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <div id="modal-one-click">
        <a href="#close">
        </a>
        <div class="one-click-block">
            <div class="info-one-click-block">
                <div class="title-one-click">
                    Быстрый заказ
                </div>
                <form action="" id="one-click-form">
                    <input type="hidden" value="<?= $prodid ?>" name="prodid" id="prodid">
                    <div class="line-one-click-form">
                        <div class="name-input">ФИО</div>
                        <input class="input-one-click" type="text" id="username" name="username">
                    </div>
                    <div class="line-one-click-form">
                        <div class="name-input">Телефон</div>
                        <input class="input-one-click" type="text" id="usernumber" name="usernumber">
                    </div>
                    <div class="line-one-click-form">
                        <div class="name-input">Email</div>
                        <input class="input-one-click" type="text" id="usermail" name="usermail">
                    </div>
                    <input class="one-click-form-button" type="button" value="Заказать" onclick="oneclick()">
                </form>
                <a href="#close" class="close-modal"></a>
            </div>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="content">
                <div class="breadcrumb">
                    <a href="index.php">Главная</a>
                    <p>></p>
                    <a href="catalog.php?catid=<?= $catid ?>"><?= $categoryitem['NAME'] ?></a>
                    <p>></p>
                    <a href="product-card.php?prodid=<?= $prodid ?>"><?= $productitem['NAME'] ?></a>
                </div>
                <h1><?= $productitem['NAME'] ?></h1>
            </div>
            <div class="prod-info-block">
                <div class="buy-block">
                    <div>
                        <span class="hint">Артикул: <?= $productitem['CODE'] ?></span>
                    </div>
                    <div class="purchase">
                        <div class="add2cart">
                            <?php
                            if ($productitem['SALE'] !== '0') {
                            ?>
                                <span class="price nowrap"><?= number_format($productitem['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                                <sup class="compare-at-price nowrap"><?= number_format($productitem['PRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span> </sup>
                            <?php
                            } else {
                            ?>
                                <span class="price nowrap"><?= number_format($productitem['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                                <?php
                                ?>
                            <?php
                            }
                            ?>
                            <input type="button" value="добавить В корзину" onclick='buyProd(<?= $productitem["ID"] ?>)'>
                            <a href="#modal-one-click" class="one-click">Купить в 1 клик</a>
                        </div>
                    </div>
                    <div>
                        <button class="compare-add inline-link" onclick='compareProd(<?= $productitem["ID"] ?>)'>
                            <b><i>Добавить к сравнению</i></b>
                        </button>
                    </div>
                </div>
                <div class="photo-block">
                    <div class="photo-padding">
                        <div class="main-photo-block">
                            <?php
                            if (isset($productPhoto)) {
                                foreach ($productPhoto as $item) {
                            ?>
                                    <img id="main-photo" src="<?= $item['SRC'] ?>" alt="">
                                <?php
                                    break;
                                }
                            } else {
                                ?>
                                <img id="main-photo" src="img/main/logo.png" alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="list-photo-block">
                            <input id="page-number" type="hidden" value='<?= $photoPage ?>'>
                            <div class="hidden-block">
                                <div class="swipe-block">
                                    <?php
                                    if (isset($productPhoto)) {
                                        foreach ($productPhoto as $item) {
                                    ?>
                                            <div class="item-img-block">
                                                <img class="item-img" src="<?= $item['SRC'] ?>" alt="">
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="item-img-block">
                                            <img class="item-img" src="img/main/logo.png" alt="">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="button-swipe-block">
                                <div id="left-slide" class="left-button-slider"></div>
                                <div id="right-slide" class="right-button-slider"></div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="bottom-block">
                    <div class="desk-block">
                        <div class="hdr2">Описание</div>
                        <p>
                            <?= nl2br($productitem['TEXT']) ?>
                        </p>
                    </div>
                    <div class="char-block">
                        <div class="hdr2">Характеристики</div>
                        <table id="product-features">
                            <tbody>
                                <tr>
                                    <td class="fname">
                                        <span>Бренд</span>
                                    </td>
                                    <td class="fvalue" itemprop="">
                                        <span><?= $productitem['BRAND'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fname">
                                        <span>Страна</span>
                                    </td>
                                    <td class="fvalue" itemprop="">
                                        <span><?= $productitem['COUNTRY'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fname">
                                        <span>Материал</span>
                                    </td>
                                    <td class="fvalue" itemprop="">
                                        <span><?= $productitem['MATERIAL'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fname">
                                        <span>Длина</span>
                                    </td>
                                    <td class="fvalue" itemprop="">
                                        <span><?= $productitem['LENGTH'] ?> мм</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fname">
                                        <span>Вес</span>
                                    </td>
                                    <td class="fvalue" itemprop="">
                                        <span><?= $productitem['WEIGHT'] ?> г</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fname">
                                        <span>Цвет</span>
                                    </td>
                                    <td class="fvalue" itemprop="">
                                        <span><?= $productitem['COLOR'] ?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="review-block">
                        <div class="hdr2">Отзывы о продукте</div>
                        <p>Оставьте <a href="reviews.php?prodid=<?= $prodid ?>">отзыв об этом товаре</a> <?php if ($countReviews == 0) echo 'первым!' ?></p>
                        <?php
                        addReviewsUser($reviews, $prodid);
                        ?>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <?php
    require_once('footer.php')
    ?>


</body>

<script src="script/sliderProdPhoto.js"></script>
<script src="script/compare-add.js"></script>
<script src="script/oneclick-prod.js"></script>
<script src="script/basket-add.js"></script>

</html>