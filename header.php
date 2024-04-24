<?php
session_start();
if (isset($account) && (!isset($_SESSION['accountName']) || $_SESSION['accountName'] !== 'user')) {
    header('Location: index.php');
}
if (isset($order) && (!isset($_SESSION['basket']) || $_SESSION['basket'] == [])) {
    header('Location: index.php');
}
if (isset($compare) && (!isset($_SESSION['comprasion']))) {
    header('Location: index.php');
}
if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'admin') {
    header('Location: admin');
}
require_once('config/category.php');
?>

<link rel="stylesheet" href="css/header.css" />

<div id="menu-block">
    <div id="content-menu" class="content-menu-block close">

        <div class="item-menu-block button-menu-block">
            <span id="button-block-menu" class="img-button-menu"></span>
            <a href="categoryList.php">Показать все разделы</a>
            <span id="close-block-menu" class="close-menu-block"></span>
        </div>

        <?php
        if (isset($_GET['catid'])) {
            addLeftMenuUser($category, $_GET['catid']);
        } else {
            addLeftMenuUser($category);
        }
        ?>

        <div class="item-menu-block <?php if (isset($new)) echo 'selected' ?>">
            <div class="img-category">
                <img src="img/category/image_3553.png" alt="" />
            </div>
            <a href="new.php">Новинки</a>
        </div>

        <div class="item-menu-block <?php if (isset($sale)) echo 'selected' ?>">
            <div class="img-category">
                <img src="img/category/image_81.png" alt="" />
            </div>
            <a href="sale.php">Распродажа</a>
        </div>

    </div>
</div>

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

            <div class="authorization">
                <a href="<?php
                            if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') echo 'account.php';
                            else echo 'login.php'
                            ?>" class="not-visited">Вход</a>
            </div>

            <div id='basket-count-block' class="basket <?php
                                                        if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                                        } else echo 'empty';
                                                        ?>">
                <span class="cart-count"><?php
                                            if (isset($_SESSION['basket']) && $_SESSION['basket'] !== '') {
                                                echo ' ' . count($_SESSION['basket']) . ' ';
                                            } else echo 0;
                                            ?></span>
                <a href="basket.php" class="cart-summary">Корзина</a>
            </div>
        </div>

        <div class="clear-both"></div>
    </div>
</header>

<nav>
    <div class="container">
        <ul>
            <li><a href="sale.php">Распродажа</a></li>
            <li><a href="new.php">Новинки</a></li>
            <?php
            if (isset($_SESSION['accountName']) && $_SESSION['accountName'] == 'user') echo '<li><a href="functions/account/logout.php">Выход</a></li>';
            ?>
        </ul>
    </div>
</nav>

<script src="script/menuBlock.js"></script>