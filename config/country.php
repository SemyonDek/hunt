<?php
$TableProdAll = mysqli_query($ConnectDatabase, "SELECT * FROM `products`");
$TableProdAll = mysqli_fetch_all($TableProdAll, MYSQLI_ASSOC);

$country = [];
$prov = true;

foreach ($TableProdAll as $item) {
    foreach ($country as $item_country) {
        if ($item['COUNTRY'] == $item_country) {
            $prov = false;
            break;
        }
    }
    if ($prov) {
        $country[] = $item['COUNTRY'];
    }
    $prov = true;
}

function addSelectCountry($country, $nameCountry = '')
{
?>
    <option value="" <?php if ($nameCountry == '') echo 'selected="selected"' ?>>Все</option>
    <?php
    foreach ($country as $item) {
    ?>
        <option value="<?= $item ?>" <?php if ($nameCountry == $item) echo 'selected="selected"' ?>><?= $item ?></option>
<?php
    }
}
