<?php
require_once('connect.php');

$orders = mysqli_query($ConnectDatabase, "SELECT * FROM `orders`");
$orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);

function addOrderListAdm($orders)
{
    foreach ($orders as $item) {
?>
        <tr>
            <td class="number"><?= $item['ID'] ?></td>
            <td class="format"><?php
                                if ($item['ONECLICK'] == 0) echo 'Нет';
                                else echo 'Да';
                                ?></td>
            <td class="amount"><?= number_format($item['FINALAMOUNT'], 0, '.', ' ') . ' ' ?> ₽</td>
            <td class="phone"><?= $item['NUMBER'] ?></td>
            <td class="mail"><?= $item['EMAIL'] ?></td>
            <td class="status"><?php
                                if ($item['STATUS'] == 1) echo 'В обработке';
                                elseif ($item['STATUS'] == 2) echo 'В доставке';
                                elseif ($item['STATUS'] == 3) echo 'Доставлен';
                                ?></td>
            <td class="info"><a href="order-item.php?orderid=<?= $item['ID'] ?>">Подробнее</a></td>
        </tr>
<?php
    }
}
