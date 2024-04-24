<?php
session_start();

require_once('../../config/connect.php');

$prod = [];
$prodid = $_POST['prodid'];
$prod['ID'] = $prodid;

$value = 1;
if (isset($_POST['valuebasket'])) {
    $value = $_POST['valuebasket'];
}
$prod['VALUE'] = $value;

$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);

$prod['AMOUNT'] = $productitem['FINALPRICE'];
if (!isset($_SESSION['SALE'])) {
    $_SESSION['SALE'] = 0;
}

if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
    $basket = $_SESSION['basket'];
} else $basket = [];

$prov = true;
$idbasket = 0;

foreach ($basket as $key => $value) {
    if ($value['ID'] == $prod['ID']) {

        if (isset($_POST['valuebasket'])) {
            $basket[$key]['VALUE'] = $prod['VALUE'];
        } else $basket[$key]['VALUE']++;

        $prov = false;
        $basket[$key]['AMOUNT'] = $prod['AMOUNT'] * $basket[$key]['VALUE'];
        $idbasket = $key;
        break;
    }
}

if ($prov) {
    array_push($basket, $prod);
}


$_SESSION['basket'] = $basket;

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$_SESSION['basketSum'] = $sum;

$_SESSION['basketSum'] = $_SESSION['basketSum'] - ($_SESSION['basketSum'] * ($_SESSION['SALE'] / 100));

?>
<div id='basket-count-block' class="basket empty">
    <span class="cart-count"><?php
                                if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                    echo ' ' . count($_SESSION['basket']) . ' ';
                                } else echo 0;
                                ?></span>
    <a href="basket.php" class="cart-summary">Корзина</a>
</div>

<div class="amount-price" id="basket-amount-price">Итого <?php if (isset($_SESSION['basketSum'])) echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ';
                                                            else echo '0' ?> ₽</div>

<div class="price-prod-basket" id="amount-prod"><?= number_format($basket[$idbasket]['AMOUNT'], 0, '.', ' ') . ' ' ?> ₽</div>