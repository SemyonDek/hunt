<?php
require_once('connect.php');
$category = mysqli_query($ConnectDatabase, "SELECT * FROM `category`");
$category = mysqli_fetch_all($category, MYSQLI_ASSOC);

$categoryList = [];
foreach ($category as $item) {
    $categoryList[$item['ID']] = $item['NAME'];
}

function addLeftMenuUser($category, $catid = 0)
{
    foreach ($category as $item) {
        if ($item['PARENT'] == 0) {
?>
            <div class="item-menu-block <?php if ($catid == $item['ID']) echo 'selected' ?>">
                <div class="img-category">
                    <img src="<?= $item['SRC'] ?>" alt="" />
                </div>
                <a href="catalog.php?catid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
            </div>
        <?php
        }
    }
}

function addCatListUser($category, $catid = 0)
{
    foreach ($category as $item) {
        if ($item['PARENT'] == $catid) {
        ?>
            <div class="category-item">
                <div class="catimg">
                    <a href="catalog.php?catid=<?= $item['ID'] ?>">
                        <img src="<?= $item['SRC'] ?>">
                    </a>
                </div>
                <a href="catalog.php?catid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
            </div>
        <?php
        }
    }
}

function addSelect($category, $parrent = 0, $level = 0, $selected = 0)
{
    if ($level == 0) {
        ?>
        <option value="0" <?php if ($selected == 0) echo 'selected="selected"'; ?>>Нет родителя</option>
        <?php
    }
    $level++;


    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
        ?>
            <option value="<?= $item['ID'] ?>" <?php if ($selected == $item['ID']) echo 'selected="selected"'; ?>><?= str_repeat(' ', ($level - 1)) . $item['NAME'] ?></option>
            <?php
            addSelect($category, $item['ID'], $level, $selected);
        }
    }
}

function searchChild($TableCat, $id)
{
    $child = [];
    array_push($child, $id);
    foreach ($TableCat as $item) {
        if ($item['PARENT'] == $id) {
            $childRed = searchChild($TableCat, $item['ID']);
            foreach ($childRed as $itemRed) {
                array_push($child, $itemRed);
            }
        }
    }
    return $child;
}

function addList($category, $parrent = 0)
{
    $pr = false;

    foreach ($category as $item) {
        if ($item['PARENT'] == $parrent) {
            if (!$pr) { ?>
                <ul>
                <?php
                $pr = true;
            } ?>
                <li><a href="category-item.php?catid=<?= $item['ID'] ?>"><?= $item['NAME'] ?></a>
                    <?php
                    addList($category, $item['ID']);
                    ?> </li><?php
                        }
                    }

                    if ($pr) {
                            ?>
                </ul>
        <?php
                    }
                }
