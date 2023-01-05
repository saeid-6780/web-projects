


<?php
$active='product';
require('views/admin/layout.php');
$naghd=$data['naghd'];
$productinfo=$data['productinfo'];

?>

<div class="left">
    <p class="title"><a>مدیریت نقد و بررسی</a>
        <span style="color: red">(<?= $productinfo['title'] ?>)</span>


    </p>


    <a href="adminproduct/addnaghd/<?=  ($productinfo['id']); ?>" class="btn-green">افزودن</a>
    <a onclick="submintForm()" class="btn-red">حذف</a>

    <form action="adminproduct/deletenaghd/<?= $productinfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>عنوان</td>
                <td>ویرایش</td>
                <td>انتخاب</td>
            </tr>

            <?php
            foreach ($naghd as $row) {
                ?>

                <tr>
                    <td class="w400"><?= $row['title'] ?></td>

                    <td><a href="adminproduct/addnaghd/<?= $row['productid'] ?>/<?= $row['id'] ?>">
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