
<?php
$active='product';
require('views/admin/layout.php');
$gallery=$data['gallery'];
$productinfo=$data['productinfo'];
?>

<div class="left">
    <p class="title"><a>مدیریت گالری تصاویر</a>

    </p>

    <form id="addgallery" action="adminproduct/gallery/<?= $productinfo['id']; ?>" enctype="multipart/form-data" method="post" style="margin-bottom: 20px; font-size: 10pt;float: right;width: 100%;">
        <div class="row">
            <span style="float: right" class="span-title">انتخاب تصویر</span>
            <input style="float: right" type="file" name="image">
            <a onclick="submitform2()" class="btn-green" style="float: right">افزودن</a>
        </div>
    </form>
    
    <script>
        function submitform2() {
            $('#addgallery').submit();
        }
        function submitform3() {
            $('#gallerylist').submit();
        }
    </script>

    <a onclick="submitform3()" class="btn-red">حذف</a>

    <form id="gallerylist" action="adminproduct/deletegallery/<?= $productinfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>تصویر</td>
                <td>انتخاب</td>
            </tr>

            <?php
            $i=1;
            foreach ($gallery as $row) {
                ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><img src="public/images/products/<?= $row['productid'] ?>/gallery/small/<?= $row['img'] ?>"></td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
                    </td>
                </tr>
                <?php
            $i++;}
            ?>
        </table>
    </form>

</div>

</div>