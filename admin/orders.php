<?php
require_once('../config/order.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="../css/orders-adm.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Заказы</h1>
                <table class="table-coupon">
                    <thead>
                        <tr>
                            <td class="number">№</td>
                            <td class="format">Один клик</td>
                            <td class="amount">Сумма</td>
                            <td class="phone">Телефон</td>
                            <td class="mail">Email</td>
                            <td class="status">Статус</td>
                            <td class="info">Информация</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        addOrderListAdm($orders);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>