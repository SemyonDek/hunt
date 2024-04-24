<?php
require_once('../config/review.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="../css/reviews-adm.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Отзывы</h1>
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
            </div>
        </div>
    </main>

</body>

<script>
    function delComm(idComm) {
        let formData = new FormData();
        formData.append("idComm", idComm);

        var url = "../functions/reviews/del.php";

        let xhr = new XMLHttpRequest();

        xhr.responseType = "document";

        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = () => {
            alert("Отзыв удален");
            document.getElementById("table-reviews").innerHTML =
                xhr.response.getElementById("table-reviews").innerHTML;
        };
    }
</script>

</html>