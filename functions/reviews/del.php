<?php
require_once('../../config/connect.php');

$idComm = $_POST['idComm'];

mysqli_query($ConnectDatabase, "DELETE FROM review WHERE `review`.`ID` = $idComm");

require_once('../../config/review.php');
?>

<table class="table-coupon">
    <thead>
        <tr>
            <td class="name">Пользователь</td>
            <td class="date">Дата</td>
            <td class="comm">Отзыв</td>
            <td class="prod">Товар</td>
            <td class="del"></td>
        </tr>
    </thead>
    <tbody id="table-reviews">
        <?php
        addReviewsAdmin($reviews, $products);
        ?>
    </tbody>
</table>