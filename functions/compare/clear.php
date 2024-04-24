<?php
session_start();
unset($_SESSION['comprasion']);
?>
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