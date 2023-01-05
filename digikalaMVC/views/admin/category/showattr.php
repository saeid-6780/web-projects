
<?php
$active='category';
require('views/admin/layout.php');
$attr=$data['attr'];
$categoryinfo=$data['categoryinfo'];
$attrinfo=$data['attrinfo'];
?>

<div class="left">
    <p class="title">مدیریت ویژگی ها

            <a style="color: red;" href="admincategory/showattr/<?= $categoryinfo['id']; ?>">(دسته
                <?= $categoryinfo['title']; ?>
            </a>

        <span style="color: red;font-size: 9.6pt;">
<?php
if (isset($attrinfo['id'])){
?>
            -ویژگی


            <?= $attrinfo['title']; ?>
            <?php } ?>
            )
        </span>


    </p>


    <a href="admincategory/addattr/<?= $categoryinfo['id']; ?>/<?= $attrinfo['id']; ?>" class="btn-green">افزودن</a>
    <a onclick="submintForm()" class="btn-red">حذف</a>

    <form action="admincategory/deleteattr/<?= $categoryinfo['id']; ?>/<?= $attrinfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>عنوان ویژگی</td>
                <?php
                if (!isset($attrinfo['id'])){
                ?>
                <td>مشاهده زیرویژگی ها</td>
                <?php } ?>
                <td>مقادیر پیش فرض</td>
                <td>ویرایش</td>
                <td>انتخاب</td>
            </tr>

            <?php
            foreach ($attr as $row) {
                ?>

                <tr>
                    <td><?= $row['id'] ?></td>
                    <td class="w400"><?= $row['title'] ?></td>
                    <?php
                    if (!isset($attrinfo['id'])){
                    ?>
                    <td><a href="admincategory/showattr/<?= $categoryinfo['id']; ?>/<?= $row['id'] ?>">
                            <i class="showchildcat"></i>
                        </a></td>
                    <?php } ?>
                    <td>
                        <a href="admincategory/attrval/<?= $row['id'] ?>">
                            مقادیر پیش فرض
                        </a>
                    </td>
                    <td><a href="admincategory/addattr/<?= $categoryinfo['id']; ?>/<?= $row['parent']; ?>/<?= $row['id']; ?>">
                            <img src="public/images/Edit.gif">
                        </a></td>

                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
                    </td>

                </tr>
                <?php
            }
            ?>
        </table>
    </form>

</div>

</div>