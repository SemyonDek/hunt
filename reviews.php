<?php
require_once('config/category.php');
require_once('config/review.php');
$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$countReviews = mysqli_query($ConnectDatabase, "SELECT * FROM `review` WHERE IDPROD = '$prodid'");
$countReviews = mysqli_fetch_all($countReviews, MYSQLI_ASSOC);
$countReviews = count($countReviews);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
    <link rel="stylesheet" href="css/product-card.css">
    <link rel="stylesheet" href="css/reviews.css">
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
                <h1>Коллиматорный прицел Tokyo Scope TS-XT6 mini отзывы</h1>
                <ul class="product-nav">
                    <li><a href="product-card.php?prodid=<?= $prodid ?>">Обзор</a></li>
                    <li class="selected"> <a href="reviews.php?prodid=<?= $prodid ?>">Отзывы</a> <span id="countReviews" class="hint reviews-count" itemprop="reviewCount"><?= $countReviews ?></span> </li>
                </ul>
            </div>
            <div class="prod-info-block">
                <div class="buy-block" style="margin-bottom: 20px;">
                    <div>
                        <span class="hint">Артикул: TSQXT6</span>
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
                    <?php
                    if (isset($_SESSION['accountName'])) {
                    ?>
                        <form action="" id="add_reviews">
                            <textarea name="comm-text" id="comm-text"></textarea>
                            <br>
                            <input id="add-button-review" type="button" value="Добавить отзыв" onclick="addComm(<?= $productitem['ID'] ?>)">
                        </form>
                    <?php
                    } else {
                    ?>
                        <p class="review-field">Чтобы добавить отзыв, пожалуйста, <a href="login.php">войдите</a></p>
                    <?php
                    }
                    ?>

                    <div id="rewiews-list-block" class="review-block">
                        <?php
                        addReviewsUser($reviews, $prodid);
                        ?>
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
        </div>
        </div>
    </main>

    <?php
    require_once('footer.php')
    ?>

</body>

<script src="script/review-add.js"></script>
<script src="script/compare-add.js"></script>
<script src="script/oneclick-prod.js"></script>
<script src="script/basket-add.js"></script>

</html>