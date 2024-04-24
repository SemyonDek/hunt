<?php

require_once('connect.php');
require_once('category.php');
require_once('product-photo.php');
require_once('brand.php');
require_once('country.php');
require_once('filters.php');

if (isset($sale)) {
    $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
    PRICE BETWEEN $min_prod_mass AND $max_prod_mass
    $searchStr $idChildProd $str_brand $str_country $str_sale $sort");
    $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
} else {
    if (isset($new)) {
        $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
        PRICE BETWEEN $min_prod_mass AND $max_prod_mass
        $searchStr $idChildProd $str_brand $str_country $str_new $sort");
        $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
    } else {
        $products = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE 
        PRICE BETWEEN $min_prod_mass AND $max_prod_mass
        $searchStr $idChildProd $str_brand $str_country $sort");
        $products = mysqli_fetch_all($products, MYSQLI_ASSOC);
    }
}


function addProdListAdmin($products, $photos)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['IDPROD'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
?>
        <div class="product-item">
            <div class="product-inner">
                <div class="image-prod">
                    <img itemprop="image" src="../<?= $src ?>">
                </div>
                <h5>
                    <a href="upd-prod.php?prodid=<?= $item["ID"] ?>">
                        <span itemprop="name"><?= $item['NAME'] ?></span>
                    </a>
                </h5>
                <div class="stock-art"><span>Арт. <?= $item['CODE'] ?></span></div>
                <div class="price-block">
                    <?php
                    if ($item['SALE'] !== '0') {
                    ?>
                        <span class="compare-at-price nowrap"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    } else {
                    ?>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    }
                    ?>
                    <form class="prod-form" action="">
                        <input type="button" value="Удалить" onclick='delProd(<?= $item["ID"] ?>)'>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
}
function addProdListUser($products, $photos)
{
    foreach ($products as $item) {
        $src = '';
        foreach ($photos as $itemPhoto) {
            if ($itemPhoto['IDPROD'] == $item['ID']) {
                $src = $itemPhoto['SRC'];
                break;
            }
        }
        if ($src == '') {
            $src = 'img/main/logo.png';
        }
    ?>
        <div class="product-item">
            <div class="product-inner">
                <div class="image-prod">
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                        <img itemprop="image" src="<?= $src ?>">
                    </a>
                </div>
                <h5>
                    <a href="product-card.php?prodid=<?= $item['ID'] ?>">
                        <span itemprop="name"><?= $item['NAME'] ?></span>
                    </a>
                </h5>
                <div class="stock-art"><span>Арт. <?= $item['CODE'] ?></span></div>
                <div class="price-block">
                    <?php
                    if ($item['SALE'] !== '0') {
                    ?>
                        <span class="compare-at-price nowrap"><?= number_format($item['PRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    } else {
                    ?>
                        <span class="price nowrap"><?= number_format($item['FINALPRICE'], 0, '.', ' ') . ' ' ?><span class="ruble">₽</span></span>
                    <?php
                    }
                    ?>
                    <form class="prod-form" action="">
                        <input type="button" value="Купить" onclick='buyProd(<?= $item["ID"] ?>)'>
                        <i class="compare-from-list" onclick='compareProd(<?= $item["ID"] ?>)'></i>
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
