<?php
require_once('connect.php');

$reviews = mysqli_query($ConnectDatabase, "SELECT * FROM `review`");
$reviews = mysqli_fetch_all($reviews, MYSQLI_ASSOC);

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);

function addReviewsUser($reviews, $prodid = 0)
{
    foreach ($reviews as $item) {
        if ($item['IDPROD'] == $prodid) {
?>
            <div class="item-review">
                <div class="name-user"><?= $item['USER'] ?></div>
                <div class="date-rewiew"><?= $item['DATE'] ?></div>
                <div class="rewiew-text"><?= nl2br($item['COMM']) ?></div>
            </div>
        <?php
        }
    }
}

function addReviewsAdmin($reviews, $products)
{
    foreach ($reviews as $item) {
        $name = '';
        foreach ($products as $itemProd) {
            if ($item['IDPROD'] == $itemProd['ID']) {
                $name = $itemProd['NAME'];
                break;
            }
        }
        ?>
        <tr>
            <td class="name"><?= $item['USER'] ?></td>
            <td class="date"><?= $item['DATE'] ?></td>
            <td class="comm"><?= nl2br($item['COMM']) ?></td>
            <td class="prod"><?= $name ?></td>
            <td class="del"><input class="coupon-del" type="button" value="Удалить" onclick="delComm(<?= $item['ID'] ?>)"></td>
        </tr>
<?php

    }
}
