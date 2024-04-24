<?php
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$brand = [];
$prov = true;

foreach ($TableProdAll as $item) {
    foreach ($brand as $item_brand) {
        if ($item['BRAND'] == $item_brand) {
            $prov = false;
            break;
        }
    }
    if ($prov) {
        $brand[] = $item['BRAND'];
    }
    $prov = true;
}

function addSelectBrand($brand, $nameBrand = '')
{
?>
    <option value="" <?php if ($nameBrand == '') echo 'selected="selected"' ?>>Все</option>
    <?php
    foreach ($brand as $item) {
    ?>
        <option value="<?= $item ?>" <?php if ($nameBrand == $item) echo 'selected="selected"' ?>><?= $item ?></option>
<?php
    }
}
