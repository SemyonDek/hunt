<?php
require_once('../config/category.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aдминская панель</title>
    <link rel="stylesheet" href="../css/category-adm.css">
</head>

<body>
    <?php
    require_once('header.php')
    ?>
    <main>
        <div class="container">
            <div class="content">
                <h1>Список категорий</h1>
                <div class="block-add">
                    <a href="add-category.php">Добавить</a>
                </div>
                <div class="category-block">
                    <?php
                    addList($category, $parrent = 0)
                    ?>
                </div>
            </div>
        </div>
    </main>

</body>

</html>