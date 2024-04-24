<?php
require_once('config/connect.php');
require_once('config/order-item.php');
$orderid = $_GET['orderid'];
$orderUser = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE ID = '$orderid'");
$orderUser = mysqli_fetch_assoc($orderUser);

$orderItems = mysqli_query($ConnectDatabase, "SELECT * FROM `order_item` WHERE IDORDER = '$orderid'");
$orderItems = mysqli_fetch_all($orderItems, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="css/order-item-adm.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Заказ №<?= $orderid ?></h1>
                <div class="block-order">
                    <div class="product-block">
                        <h2>Товары</h2>
                        <table class="table-prod">
                            <thead>
                                <tr>
                                    <td class="name-prod">Название</td>
                                    <td class="price-prod">Цена</td>
                                    <td class="value-prod">Кол-во</td>
                                    <td class="amount-prod">Сумма</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                addOrderItemList($orderItems);
                                ?>
                            </tbody>
                        </table>
                        <div class="bottom-order">
                            <div class="sale-block">Скидка: <?= $orderUser['SALE'] ?>%</div>
                            <div class="amount-price">Итого <?= number_format($orderUser['FINALAMOUNT'], 0, '.', ' ') . ' ' ?> ₽</div>
                        </div>
                    </div>
                    <div class="info-block">
                        <h2>Информация</h2>
                        <div class="info-line">
                            <div class="name-info">ФИО:</div>
                            <div class="value-info"><?= $orderUser['FIO'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Телефон:</div>
                            <div class="value-info"><?= $orderUser['NUMBER'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Email:</div>
                            <div class="value-info"><?= $orderUser['EMAIL'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Адресс:</div>
                            <div class="value-info"><?= $orderUser['ADDRESS'] ?></div>
                        </div>
                        <div class="info-line">
                            <div class="name-info">Состояние:</div>
                            <div class="value-info">
                                <?php
                                if ($orderUser['STATUS'] == 1) echo 'В обработке';
                                elseif ($orderUser['STATUS'] == 2) echo 'В доставке';
                                elseif ($orderUser['STATUS'] == 3) echo 'Доставлен';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="button-upd-block">
                    <a class="upd-button" href="account.php">Назад</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>