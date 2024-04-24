<?php

require_once('connect.php');
require_once('product-photo.php');

$productsNewList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new`");
$productsNewList = mysqli_fetch_all($productsNewList, MYSQLI_ASSOC);

$productsNew = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$productsNew = mysqli_fetch_all($productsNew, MYSQLI_ASSOC);

$photosNew = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photosNew = mysqli_fetch_all($photosNew, MYSQLI_ASSOC);

$newPage = count($productsNewList);
if ($newPage < 6) {
    $newPage = 1;
} else {
    $newPage = 1 + ($newPage - ($newPage % 5)) / 5;
}

function addProdNewListAdmin($productsNewList, $productsNew, $photosNew)
{
    foreach ($productsNewList as $itemSale) {
        foreach ($productsNew as $item) {
            if ($itemSale['IDPROD'] == $item['ID']) {
                $src = '';
                foreach ($photosNew as $itemPhoto) {
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
function addProdNewListUser($productsNewList, $productsNew, $photosNew)
{
    foreach ($productsNewList as $itemSale) {
        foreach ($productsNew as $item) {
            if ($itemSale['IDPROD'] == $item['ID']) {
                $src = '';
                foreach ($photosNew as $itemPhoto) {
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
