<?php
session_start();

$prod = [];
$prod['ID'] = $_POST['prodid'];

if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
    $comprasion = $_SESSION['comprasion'];
} else $comprasion = [];


array_push($comprasion, $prod);
$_SESSION['comprasion'] = $comprasion;
?>
<aside id="compare-leash" style="height: 39px;">
    <a href="compare.php" class="">
        Сравнить выбранные товары (<strong>
            <?php
            if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                echo ' ' . count($_SESSION['comprasion']) . ' ';
            } else echo 0;
            ?></strong>)
    </a>
</aside>
<?php
