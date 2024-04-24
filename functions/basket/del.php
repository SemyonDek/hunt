<?php
session_start();

$idbasket = $_POST['idbasket'];

unset($_SESSION['basket'][$idbasket]);

$sum = 0;
$_SESSION['basketSum'] = 0;
foreach ($_SESSION['basket'] as $value) {
    $sum += $value['AMOUNT'];
}
$_SESSION['basketSum'] = $sum;

if ($_SESSION['basket'] == []) {
    unset($_SESSION['basket']);
    unset($_SESSION['basketSum']);
    unset($_SESSION['SALE']);
}

require_once('../../config/basket.php');
?>

<div id='basket-count-block' class="basket empty">
    <span class="cart-count"><?php
                                if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                    echo ' ' . count($_SESSION['basket']) . ' ';
                                } else echo 0;
                                ?></span>
    <a href="basket.php" class="cart-summary">Корзина</a>
</div>

<table id="basket-table">
    <tbody id="basket-table-tbody"><?php
                                    if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                        addBasket($_SESSION['basket'], $products, $photos);
                                    }
                                    ?></tbody>
</table>

<div class="amount-price" id="basket-amount-price">Итого <?php if (isset($_SESSION['basketSum'])) echo number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ';
                                                            else echo '0' ?> ₽</div>