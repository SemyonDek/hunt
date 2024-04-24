<?php
require_once('../config/category.php');
require_once('../config/product-photo.php');
$prodid = $_GET['prodid'];
$productitem = mysqli_query($ConnectDatabase, "SELECT * FROM `products` WHERE ID = '$prodid'");
$productitem = mysqli_fetch_assoc($productitem);
$productPhoto = mysqli_query($ConnectDatabase, "SELECT * FROM `products_img` WHERE IDPROD = '$prodid'");
$productPhoto = mysqli_fetch_all($productPhoto, MYSQLI_ASSOC);
$newList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_new` WHERE IDPROD = '$prodid'");
$newList = mysqli_fetch_assoc($newList);
$saleList = mysqli_query($ConnectDatabase, "SELECT * FROM `products_sale` WHERE IDPROD = '$prodid'");
$saleList = mysqli_fetch_assoc($saleList);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админская панель</title>
    <link rel="stylesheet" href="../css/add-prod-adm.css" />
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Изменение товара</h1>
                <div class="add-conteiner">
                    <form id="add-prod-form" action="">
                        <input type="hidden" name="prodid" id="prodid" value="<?= $prodid ?>">
                        <div class="line-add-prod">
                            <div class="name-add-prod">Категория:</div>
                            <select class="input-add-prod" name="catidprod" id="catidprod">
                                <?php
                                addSelect($category, 0, 1, $productitem['CATID']);
                                ?>
                            </select>
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Название:</div>
                            <input class="input-add-prod" id="nameprod" name="nameprod" type="text" value="<?= $productitem['NAME'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Артикул:</div>
                            <input class="input-add-prod" id="codeprod" name="codeprod" type="text" value="<?= $productitem['CODE'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Цена:</div>
                            <input class="input-add-prod" id="priceprod" name="priceprod" type="number" value="<?= $productitem['PRICE'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Скидка:</div>
                            <input class="input-add-prod" id="saleprod" name="saleprod" type="number" value="<?= $productitem['SALE'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Бренд:</div>
                            <input class="input-add-prod" id="brandprod" name="brandprod" type="text" value="<?= $productitem['BRAND'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Страна:</div>
                            <input class="input-add-prod" id="countryprod" name="countryprod" type="text" value="<?= $productitem['COUNTRY'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Материал:</div>
                            <input class="input-add-prod" id="materialprod" name="materialprod" type="text" value="<?= $productitem['MATERIAL'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Длина:</div>
                            <input class="input-add-prod" id="lengthprod" name="lengthprod" type="number" placeholder="мм" value="<?= $productitem['LENGTH'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Вес:</div>
                            <input class="input-add-prod" id="weightprod" name="weightprod" type="number" placeholder="г" value="<?= $productitem['WEIGHT'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Цвет:</div>
                            <input class="input-add-prod" id="colorprod" name="colorprod" type="text" value="<?= $productitem['COLOR'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Новинки:</div>
                            <select class="input-add-prod" name="newlistprod" id="newlistprod">
                                <option value="0">Нет</option>
                                <option value="1" <?php
                                                    if (isset($newList)) echo 'selected="selected"'
                                                    ?>>Да</option>
                            </select>
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Распродажа:</div>
                            <select class="input-add-prod" name="salelistprod" id="salelistprod">
                                <option value="0">Нет</option>
                                <option value="1" <?php
                                                    if (isset($saleList)) echo 'selected="selected"'
                                                    ?>>Да</option>
                            </select>
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Цвет:</div>
                            <input class="input-add-prod" id="colorprod" name="colorprod" type="text" value="<?= $productitem['COLOR'] ?>">
                        </div>
                        <div class="line-add-prod">
                            <div class="name-add-prod">Описание:</div>
                            <textarea class="textarea-add-prod" name="descprod" id="descprod"><?= $productitem['TEXT'] ?></textarea>
                        </div>
                        <div class="line-add-prod">
                            <input id="button-product-upd" class="button-add-prod" type="button" value="Изменить" style="margin-right: 20px;">
                            <a class="button-add-prod" href="catalog.php">Назад</a>
                        </div>
                    </form>

                    <form id="add-photo-form" action="">
                        <h2>Добавить изображения</h2>
                        <div class="line-add-prod">
                            <input class="file-add-photo" type="file" name="file_photo" id="file_photo">
                            <input id="button-photo-add" class="button-add-photo" type="button" value="Добавить">
                        </div>
                        <div id="PhotoBlock" class="photo-prod-block">
                            <?php
                            addProdPhotoAdmin($productPhoto);
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


</body>

<script src="../script/product-upd.js"></script>

<script>
    // let buttonprod = document.getElementById('button-product-upd');
    // let buttonphoto = document.getElementById('button-photo-add');

    // function addPhoto() {
    //     let form = document.getElementById('add-photo-form');
    //     let file = document.getElementById('file_photo');
    //     let prodid = document.getElementById('prodid').value;
    //     if (file.value == '') {
    //         alert('Выберите файл');
    //     } else {
    //         let formData = new FormData(form);
    //         formData.append("prodid", prodid);

    //         var url = "../functions/products/addPhoto.php";

    //         let xhr = new XMLHttpRequest();

    //         xhr.responseType = "document";

    //         xhr.open("POST", url);
    //         xhr.send(formData);
    //         xhr.onload = () => {
    //             document.getElementById("file_photo").value = null;
    //             document.getElementById('PhotoBlock').innerHTML = xhr.response.getElementById('PhotoBlock').innerHTML;
    //         };
    //     }
    // }

    // function delPhoto(idPhoto) {
    //     let formData = new FormData();
    //     formData.append("idPhoto", idPhoto);

    //     var url = "../functions/products/delPhoto.php";

    //     let xhr = new XMLHttpRequest();

    //     xhr.responseType = "document";

    //     xhr.open("POST", url);
    //     xhr.send(formData);
    //     xhr.onload = () => {
    //         // alert('Фотография удалена');
    //         document.getElementById('PhotoBlock').innerHTML = xhr.response.getElementById('PhotoBlock').innerHTML;
    //     };
    // }

    // function updProd() {
    //     let form = document.getElementById('add-prod-form');

    //     const {
    //         elements
    //     } = form;

    //     const data = Array.from(elements)
    //         .filter((item) => !!item.name)
    //         .map((element) => {
    //             const {
    //                 name,
    //                 value
    //             } = element;

    //             return {
    //                 name,
    //                 value,
    //             };
    //         });

    //     style_input_red = "border-color: red;";
    //     style_input_gray = "border-color: #cfcfcf;";

    //     prov = true;

    //     data.forEach((element) => {
    //         if (element["value"] == "") {
    //             prov = false;
    //             document.getElementById(element["name"]).style = style_input_red;
    //         } else {
    //             document.getElementById(element["name"]).style = style_input_gray;
    //         }
    //     });

    //     let sale = document.getElementById("saleprod");

    //     if (sale.value !== "" && (sale.value < 0 || sale.value > 99)) {
    //         prov = false;
    //         alert("Введите корректную скидку");
    //         sale.style = style_input_red;
    //     }

    //     if (!prov) return;

    //     let formData = new FormData(form);

    //     var url = "../functions/products/upd.php";

    //     let xhr = new XMLHttpRequest();

    //     xhr.open("POST", url);
    //     xhr.send(formData);
    //     xhr.onload = () => {
    //         alert("Товар изменен");
    //     };
    // }

    // buttonphoto.onclick = function() {
    //     addPhoto();
    // };

    // buttonprod.onclick = function() {
    //     updProd();
    // };
</script>

</html>