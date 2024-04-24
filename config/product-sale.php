<?php

require_once('connect.php');
require_once('product-photo.php');

$productsSaleList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale`");
$productsSaleList = mysqli_fetch_all($productsSaleList, MYSQLI_ASSOC);

$productsSale = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$productsSale = mysqli_fetch_all($productsSale, MYSQLI_ASSOC);

$photosSale = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photosSale = mysqli_fetch_all($photosSale, MYSQLI_ASSOC);

$salePage = count($productsSaleList);
if ($salePage < 6) {
    $salePage = 1;
} else {
    $salePage = 1 + ($salePage - ($salePage % 5)) / 5;
}
function addProdSaleListAdmin($productsSaleList, $productsSale, $photosSale)
{
    foreach ($productsSaleList as $itemSale) {
        foreach ($productsSale as $item) {
            if ($itemSale['IDPROD'] == $item['ID']) {
                $src = '';
                foreach ($photosSale as $itemPhoto) {
                    if ($itemPhoto['IDPROD'] == $item['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
                if ($src == '') {
                    $src = 'img/main/logo.png';
                }
?>
                <div class="prod-slider-item">
                    <div class="product-inner">
                        <div class="image-prod">
                            <a href="">
                                <img itemprop="image" src="../<?= $src ?>">
                            </a>
                        </div>
                        <h5>
                            <a href="">
                                <span itemprop="name"><?= $item['NAME'] ?></span>
                            </a>
                        </h5>
                        <div>
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
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
}
function addProdSaleListUser($productsSaleList, $productsSale, $photosSale)
{
    foreach ($productsSaleList as $itemSale) {
        foreach ($productsSale as $item) {
            if ($itemSale['IDPROD'] == $item['ID']) {
                $src = '';
                foreach ($photosSale as $itemPhoto) {
                    if ($itemPhoto['IDPROD'] == $item['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
                if ($src == '') {
                    $src = 'img/main/logo.png';
                }
            ?>
                <div class="prod-slider-item">
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
                        <div>
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
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }
}
