<?php
session_start();
$idcompare = $_POST['idcompare'];
unset($_SESSION['comprasion'][$idcompare]);
if ($_SESSION['comprasion'] == []) {
    unset($_SESSION['comprasion']);
}
require_once('../../config/compare.php');
?>
<div class="scrol-block" id="block-comprasion-list"><?php
                                                    if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                                                        compareAdd($_SESSION['comprasion'], $products, $photos);
                                                    }
                                                    ?></div>
<aside id="compare-leash" style="height: 39px; <?php
                                                if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                                                    echo 'bottom: 0;';
                                                }
                                                ?>">
    <a href="compare.php" class="">
        Сравнить выбранные товары (<strong>
            <?php
            if (isset($_SESSION['comprasion']) && $_SESSION['comprasion'] !== '') {
                echo ' ' . count($_SESSION['comprasion']) . ' ';
            } else echo 0;
            ?></strong>)
    </a>
</aside>