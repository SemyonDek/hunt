<?php
session_start();

require_once('../../config/coupon.php');

$couponCode = $_POST['coupon'];

$prov = true;

if (isset($_SESSION['basketSum'])) {
    foreach ($coupon as $item) {
        if ($couponCode == $item['CODE']) {
            $_SESSION['SALE'] = $item['SALE'];
            $prov = false;
            break;
        }
    }
}

if ($prov) {
    $_SESSION['SALE'] = 0;
}

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$_SESSION['basketSum'] = $sum;

$_SESSION['basketSum'] = $_SESSION['basketSum'] - ($_SESSION['basketSum'] * ($_SESSION['SALE'] / 100));

?>

<div class="sale-block" id="sale-value">Скидка: <?php
                                                if (isset($_SESSION['SALE']) && $_SESSION['SALE'] !== '') {
                                                    echo $_SESSION['SALE'];
                                                } else echo 0;
                                                ?>%</div>

<div class="amount-price" id="basket-amount-price">Итого <?php if (isset($_SESSION['basketSum'])) echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ';
                                                            else echo '0' ?> ₽</div>