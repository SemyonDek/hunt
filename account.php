<?php
require_once('config/order.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="css/basket.css">
    <link rel="stylesheet" href="css/orders-adm.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <?php
    $account = 1;
    require_once('header.php');
    $accountid = $_SESSION["accountId"];
    $usersData = mysqli_query($ConnectDatabase, "SELECT * FROM `users` WHERE ID = '$accountid'");
    $usersData = mysqli_fetch_assoc($usersData);
    $ordersUser = mysqli_query($ConnectDatabase, "SELECT * FROM `orders` WHERE USERID = '$accountid'");
    $ordersUser = mysqli_fetch_all($ordersUser, MYSQLI_ASSOC);
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Мои информация</h1>

                <form action="" id="user-form">
                    <div class="item-order-block">
                        <span>Имя</span>
                        <input type="text" name="nameUser" id="nameUser" value="<?php if (isset($usersData)) echo $usersData['NAME'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Фамилия</span>
                        <input type="text" name="surnameUser" id="surnameUser" value="<?php if (isset($usersData)) echo $usersData['SURNAME'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Отчество</span>
                        <input type="text" name="patronymicUser" id="patronymicUser" value="<?php if (isset($usersData)) echo $usersData['PATRON'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Телефона</span>
                        <input type="text" name="numberUser" id="numberUser" value="<?php if (isset($usersData)) echo $usersData['NUMBER'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Email</span>
                        <input type="text" name="mailUser" id="mailUser" value="<?php if (isset($usersData)) echo $usersData['MAIL'] ?>">
                    </div>
                    <h3 class="wa-header">Покупатель</h3>
                    <div class="item-order-block">
                        <span>Страна</span>
                        <input type="text" name="countryUser" id="countryUser" value="<?php if (isset($usersData)) echo $usersData['COUNTRY'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Регион</span>
                        <input type="text" name="regionUser" id="regionUser" value="<?php if (isset($usersData)) echo $usersData['REGION'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Город</span>
                        <input type="text" name="cityUser" id="cityUser" value="<?php if (isset($usersData)) echo $usersData['CITY'] ?>">
                    </div>
                    <div class="item-order-block">
                        <span>Улица, дом, квартира</span>
                        <input type="text" name="addressUser" id="addressUser" value="<?php if (isset($usersData)) echo $usersData['ADDRESS'] ?>">
                    </div>
                    <input type="button" value="Изменить" onclick="updInfo()">
                </form>
                <h1>Мои заказы</h1>
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
                        addOrderListAdm($ordersUser);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

<script>
    function updInfo() {
        let form = document.getElementById("user-form");
        const {
            elements
        } = form;

        const data = Array.from(elements)
            .filter((item) => !!item.name)
            .map((element) => {
                const {
                    name,
                    value
                } = element;

                return {
                    name,
                    value,
                };
            });

        style_input_red = "border-color: red;";
        style_input_gray = "border-color: #cfcfcf;";

        prov = true;

        data.forEach((element) => {
            if (element["value"] == "") {
                prov = false;
                document.getElementById(element["name"]).style = style_input_red;
            } else {
                document.getElementById(element["name"]).style = style_input_gray;
            }
        });

        if (!prov) return;

        let formData = new FormData(form);

        var url = "functions/account/upd.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Данные изменены");
        };
    }
</script>

</html>