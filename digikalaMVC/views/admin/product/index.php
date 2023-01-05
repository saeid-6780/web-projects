
<?php
$active='product';
require('views/admin/layout.php')
?>

<div class="left">
    <p class="title"><a>مدیریت محصولات</a>
        <?php
        $productinfo=[];
        if (isset($data['product'])){
            $productinfo=$data['product'];
        }

        ?>

    </p>


    <a href="adminproduct/addproduct" class="btn-green">افزودن</a>
    <a onclick="submintForm()" class="btn-red">حذف</a>

    <form action="adminproduct/deleteproduct" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>کد</td>
                <td>عنوان محصول</td>
                <td>قیمت</td>
                <td>تخفیف</td>
                <td>ویرایش</td>
                <td>گالری</td>
                <td>نقد</td>
                <td>ویژگی ها</td>
                <td>انتخاب</td>
            </tr>

            <?php
            foreach ($productinfo as $row) {
                ?>

                <tr>
                    <td><?= $row['id'] ?></td>
                    <td class="w400"><?= $row['title'] ?></td>
                    <td ><?= $row['price'] ?></td>
                    <td ><?= $row['discount'] ?></td>

                    <td><a href="adminproduct/addproduct/<?= $row['id'] ?>">
                            <img src="public/images/Edit.gif">
                        </a></td>
                    <td><a href="adminproduct/gallery/<?= $row['id']?>">
                            گالری                        </a></td>
                    <td><a href="adminproduct/naghd/<?= $row['id']?>">
نقد و بررسی                        </a></td>
                    <td><a href="adminproduct/attr/<?= $row['id']?>">
                            ویژگی ها                        </a></td>
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