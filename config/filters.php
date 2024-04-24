<?php
if (isset($_GET['sort']) && $_GET['sort'] !== '') {
    $sort = 'ORDER BY `FINALPRICE` ' . $_GET['sort'];
} else $sort = '';


if (isset($_GET['search']) && $_GET['search'] !== '') {
    $search = '%' . $_GET['search'] . '%';
    $searchStr = "AND (
        `NAME` LIKE '$search')";
} else $searchStr = '';


if (isset($_GET['catid']) && $_GET['catid'] !== '' && !preg_match('/\s/', $_GET['catid'])) {
    $prodChild = searchChild($category, $_GET['catid']);
    $idChildProd = 'AND `CATID` in (';
    foreach ($prodChild as $item) {
        $idChildProd .= $item . ', ';
    }
    $idChildProd = substr($idChildProd, 0, -2) . ')';
} else $idChildProd = '';


if (isset($_GET['min_price']) && ($_GET['min_price'] !== '')) {
    $min_prod_mass = $_GET['min_price'];;
} else {
    $min_prod_mass = 0;
}

if (isset($_GET['max_price']) && ($_GET['max_price'] !== '')) {
    $max_prod_mass = $_GET['max_price'];
} else {
    $max_prod_mass = 3000000000;
}


if (isset($_GET['brand']) && $_GET['brand'] !== '' && !preg_match('/\s/', $_GET['brand'])) {
    $str_brand = "AND `BRAND` = '" . $_GET['brand'] . "'";
} else $str_brand = '';

if (isset($_GET['country']) && $_GET['country'] !== '' && !preg_match('/\s/', $_GET['country'])) {
    $str_country = "AND `COUNTRY` = '" . $_GET['country'] . "'";
} else $str_country = '';

if (isset($sale) && $sale !== '') {
    $str_sale = 'AND `ID` in (';
    foreach ($sale as $item) {
        $str_sale .= $item . ', ';
    }
    $str_sale = substr($str_sale, 0, -2) . ')';
} else $str_sale = '';

if (isset($new) && $new !== '') {
    $str_new = 'AND `ID` in (';
    foreach ($new as $item) {
        $str_new .= $item . ', ';
    }
    $str_new = substr($str_new, 0, -2) . ')';
} else $str_new = '';
