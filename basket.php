<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="css/basket.css">
</head>

<body>
    <?php
    $order = 1;
    require_once('header.php');
    require_once('config/basket.php');
    if (isset($_SESSION['accountName']) || $_SESSION['accountName'] == 'user') {
        $accountid = $_SESSION["accountId"];
        $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
        $usersData = mysqli_fetch_assoc($usersData);
    }
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
                <div class="basket-block">
                    <div class="head-basket-block">
                        <h2 class="s-header">Корзина</h2>
                        <div class="del-all-basket" onclick="clearBasket()">
                            <span class="del-icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.9 9.9">
                                    <path d="M0,8.5l3.5-3.5L0,1.4L1.4,0l3.5,3.5L8.5,0l1.4,1.4L6.4,4.9l3.5,3.5L8.5,9.9L4.9,6.4L1.4,9.9L0,8.5z"></path>
                                </svg>
                            </span><!--  
                            -->Удалить все товары
                        </div>
                    </div>
                    <table id="basket-table">
                        <tbody id="basket-table-tbody">
                            <?php
                            addBasket($_SESSION['basket'], $products, $photos);
                            ?>
                        </tbody>
                    </table>
                    <div class="coupon-line">
                        <div class="coupon-block">
                            <input type="text" placeholder="Код купона" name="coupon" id="coupon">
                            <input type="button" value="Активировать" onclick="addCoupon()">
                        </div>
                        <div class="sale-block" id="sale-value">Скидка: <?php
                                                                        if (isset($_SESSION['SALE']) && $_SESSION['SALE'] !== '') {
                                                                            echo $_SESSION['SALE'];
                                                                        } else echo 0;
                                                                        ?>%</div>
                        <div class="amount-price" id="basket-amount-price">Итого <?= number_format($_SESSION['basketSum'], 0, '.', ' ') . ' ' ?> ₽</div>
                    </div>
                    <div class="bottom-basket">
                        <a href="#modal-one-click" class="one-click">Купить в 1 клик</a>
                    </div>
                </div>
                <div class="order-block">
                    <div class="head-basket-block">
                        <h2 class="s-header">Оформление</h2>
                    </div>
                    <form action="" id="order-form">
                        <h3 class="wa-header">Покупатель</h3>
                        <div class="item-order-block">
                            <span>Имя</span>
                            <input type="text" name="nameUser" id="nameUser" value="<?php if (isset($usersData)) echo $usersData['NAME'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Фамилия</span>
                            <input type="text" name="surnameUser" id="surnameUser" value="<?php if (isset($usersData)) echo $usersData['SURNAME'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Отчество</span>
                            <input type="text" name="patronymicUser" id="patronymicUser" value="<?php if (isset($usersData)) echo $usersData['PATRON'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Телефона</span>
                            <input type="text" name="numberUser" id="numberUser" value="<?php if (isset($usersData)) echo $usersData['NUMBER'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Email</span>
                            <input type="text" name="mailUser" id="mailUser" value="<?php if (isset($usersData)) echo $usersData['MAIL'] ?>">
                        </div>
                        <h3 class="wa-header">Покупатель</h3>
                        <div class="item-order-block">
                            <span>Страна</span>
                            <input type="text" name="countryUser" id="countryUser" value="<?php if (isset($usersData)) echo $usersData['COUNTRY'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Регион</span>
                            <input type="text" name="regionUser" id="regionUser" value="<?php if (isset($usersData)) echo $usersData['REGION'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Город</span>
                            <input type="text" name="cityUser" id="cityUser" value="<?php if (isset($usersData)) echo $usersData['CITY'] ?>">
                        </div>
                        <div class="item-order-block">
                            <span>Улица, дом, квартира</span>
                            <input type="text" name="addressUser" id="addressUser" value="<?php if (isset($usersData)) echo $usersData['ADDRESS'] ?>">
                        </div>
                        <input type="button" value="Оформить" onclick="addOrder()">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/order.js"></script>

</html>