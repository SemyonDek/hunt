<?php
session_start();
if (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'admin') {
    header('Location: ../');
}
?>

<link rel="stylesheet" href="../css/header.css" />

<style>
    body {
        padding-left: 0;
    }
</style>

<header>
    <div class="header-block">

        <div class="logo-block">
            <a href="index.php"></a>
        </div>

        <div class="header-right-block">
            <div class="search">
                <form method="get" action="search.php">
                    <input type="text" id="search" name="search" placeholder="ПОИСК" data-carts-checked="true" autocomplete="off">
                    <input type="submit" data-carts-checked="true">
                </form>
            </div>
        </div>

        <div class="clear-both"></div>
    </div>
</header>

<nav>
    <div class="container">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="categoryList.php">Категории</a></li>
            <li><a href="catalog.php">Товары</a></li>
            <li><a href="orders.php">Заказы</a></li>
            <li><a href="reviews.php">Отзывы</a></li>
            <li><a href="coupon.php">Купоны</a></li>
            <li><a href="info-site.php">Описание сайта</a></li>
            <li><a href="../functions/account/logout.php">Выход</a></li>
        </ul>
    </div>
</nav>