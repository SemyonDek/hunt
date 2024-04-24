<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сравнение</title>
    <link rel="stylesheet" href="css/compare.css">
</head>

<body>
    <?php
    $compare = 1;
    require_once('header.php');
    require_once('config/compare.php');
    ?>

    <main>
        <div class="container">
            <div class="content">
                <h1>Сравнить товары</h1>
                <div class="compare-block">
                    <div class="left-block">
                        <div class="header-compare"></div>
                        <div class="line-item price">
                            Цена
                        </div>
                        <div class="line-item">
                            Бренд
                        </div>
                        <div class="line-item">
                            Страна
                        </div>
                        <div class="line-item">
                            Материал
                        </div>
                        <div class="line-item">
                            Длинна
                        </div>
                        <div class="line-item">
                            Вес
                        </div>
                        <div class="line-item">
                            Цвет
                        </div>
                    </div>
                    <div class="right-block">
                        <div class="scrol-block" id="block-comprasion-list">
                            <?php
                            if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                                compareAdd($_SESSION['comprasion'], $products, $photos);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="clear-compare">
                        <input type="button" value="Очистить список сравнения" onclick="clearCompare()">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once('footer.php')
    ?>
</body>

<script src="script/compare-del.js"></script>

</html>