<?php
require_once('connect.php');

$products = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$products = mysqli_fetch_all($products, MYSQLI_ASSOC);

$photos = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img`");
$photos = mysqli_fetch_all($photos, MYSQLI_ASSOC);

function compareAdd($compare, $products, $photos)
{
    foreach ($compare as $key => $item) {
        foreach ($products as $itemProd) {
            if ($item['ID'] == $itemProd['ID']) {
                $src = '';
                foreach ($photos as $itemPhoto) {
                    if ($itemPhoto['IDPROD'] == $itemProd['ID']) {
                        $src = $itemPhoto['SRC'];
                        break;
                    }
                }
?>
                <div class="item-compare">
                    <div class="header-compare">
                        <a href="product-card.php">
                            <div class="img-compare">
                                <img src="<?= $src ?>" alt="">
                            </div>
                        </a>
                        <div class="block-name-compare">
                            <a class="name-prod-compare" href="product-card.php?prodid=<?= $itemProd['ID'] ?>"><?= $itemProd['NAME'] ?></a>
                        </div>
                        <div class="del-item-compare">
                            <button onclick="delCompare(<?= $key ?>)">
                                <i class="del-icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="line-item price">
                        <span class="price"><?= number_format($itemProd['FINALPRICE'], 0, '.', ' ') . ' ' ?> <span class="ruble">₽</span></span>
                    </div>
                    <div class="line-item"><?= $itemProd['BRAND'] ?></div>
                    <div class="line-item"><?= $itemProd['COUNTRY'] ?></div>
                    <div class="line-item"><?= $itemProd['MATERIAL'] ?></div>
                    <div class="line-item"><?= $itemProd['LENGTH'] ?> мм</div>
                    <div class="line-item"><?= $itemProd['WEIGHT'] ?> г</div>
                    <div class="line-item"><?= $itemProd['COLOR'] ?></div>
                </div>
<?php
                break;
            }
        }
    }
}

?>
<!-- 
<div class="item-compare">
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