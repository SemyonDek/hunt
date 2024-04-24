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
                            <!-- <div class="item-compare">
                                <div class="header-compare">
                                    <a href="product-card.php">
                                        <div class="img-compare">
                                            <img src="img/products/10765.750@2x.webp" alt="">
                                        </div>
                                    </a>
                                    <div class="block-name-compare">
                                        <a class="name-prod-compare" href="product-card.php">
                                            Коллиматорный прицел Tokyo Scope TS-XT6 mini
                                        </a>
                                    </div>
                                    <div class="del-item-compare">
                                        <button>
                                            <i class="del-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="line-item price">
                                    <span class="price">46 000 <span class="ruble">₽</span></span>
                                </div>
                                <div class="line-item">
                                    Bespoke Gun
                                </div>
                                <div class="line-item">
                                    Россия
                                </div>
                                <div class="line-item">
                                    алюминиевый сплав, сталь нержавеющая
                                </div>
                                <div class="line-item">
                                    1195 мм
                                </div>
                                <div class="line-item">
                                    7165 г
                                </div>
                                <div class="line-item">
                                    черный
                                </div>
                            </div> -->
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

<script>
    // function clearCompare() {
    //     var url = 'functions/compare/clear.php';
    //     let xhr = new XMLHttpRequest();
    //     xhr.responseType = 'document';
    //     xhr.open('POST', url);
    //     xhr.send();
    //     xhr.onload = () => {
    //         document.getElementById('block-comprasion-list').innerHTML = '';
    //         document.getElementById('compare-leash').innerHTML = xhr.response.getElementById('compare-leash').innerHTML;
    //         document.getElementById('compare-leash').style.bottom = '-40px';
    //     }
    // }

    // function delCompare(idcompare) {
    //     let formData = new FormData();
    //     formData.append("idcompare", idcompare);

    //     var url = 'functions/compare/del.php';
    //     let xhr = new XMLHttpRequest();
    //     xhr.responseType = 'document';
    //     xhr.open('POST', url);
    //     xhr.send(formData);
    //     xhr.onload = () => {
    //         console.log(xhr.response);
    //         document.getElementById('block-comprasion-list').innerHTML = xhr.response.getElementById('block-comprasion-list').innerHTML;
    //         if (document.getElementById('block-comprasion-list').innerHTML == '') {
    //             document.getElementById('compare-leash').style.bottom = '-40px';
    //         }
    //         document.getElementById('compare-leash').innerHTML = xhr.response.getElementById('compare-leash').innerHTML;
    //     }
    // }
</script>

</html>