<?php

require_once('connect.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);

$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);

function addBasket($basket, $products, $photos)
{
    foreach ($basket as $key => $item) {
        foreach ($products as $itemProd) {
            if ($itemProd['ID'] == $item['ID']) {
                $src = '';
                foreach ($photos as $itemPhoto) {
                    if ($itemProd['ID'] == $itemPhoto['IDPROD']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
?>
                <tr>
                    <td class="img-prod-basket">
                        <div class="img-prod-block">
                            <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>">
                                <img src="<?= $src ?>" alt="">
                            </a>
                        </div>
                    </td>
                    <td class="name-prod-basket">
                        <div class="name-prod-text">
                            <a href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                        </div>
                        <div class="del-item-basket" onclick="delBasket(<?= $key ?>)">
                            <i class="del-item-icon">
                                <svg>
                                    <use xlink:href="svg/sprite.svg#trash"></use>
                                </svg>
                            </i>
                            <span>
                                Удалить
                            </span>
                        </div>
                    </td>
                    <td class="value-prod-basket">
                        <span>шт.</span>
                        <input type="number" id="value-prod-<?= $key ?>" value="<?= $item['VALUE'] ?>" min="1" onkeypress="return false" onchange="updValue(<?= $key ?>, <?= $itemProd['ID'] ?>)">
                        <span><?= number_format($itemProd['FINALPRICE'], 0, '.', ' ') . ' ' ?> ₽/шт.</span>
                    </td>
                    <td class="price-prod-basket" id="amount-prod-<?= $key ?>"><?= number_format($item['AMOUNT'], 0, '.', ' ') . ' ' ?> ₽</td>
                </tr>
<?php
            }
        }
    }
}
