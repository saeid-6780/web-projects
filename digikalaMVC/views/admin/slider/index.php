
<?php
$active='slider';
require('views/admin/layout.php');
?>

<div class="left">
    <p class="title"><a>مدیریت اسلایدشو</a>

    </p>

<style>
    .span-title{width: 200px;}
    input[type=text]{width: 200px;height: 23px;}
    .row{margin-bottom: 7px;}
</style>

    <form id="addslider" action="adminSlider/index/" enctype="multipart/form-data" method="post" style="margin-bottom: 20px; font-size: 10pt;float: right;width: 100%;">
        <div class="row">
            <span style="float: right" class="span-title">عنوان اسلاید</span>
            <input type="text" name="title">
        </div>
        <div class="row">
            <span style="float: right" class="span-title">آدرس لینک</span>
            <input type="text" name="link">
        </div>
        <div class="row">
            <span style="float: right" class="span-title">انتخاب تصویر</span>
            <input style="float: right" type="file" name="image">
            <a onclick="submitform2()" class="btn-green" style="float: right">افزودن</a>
        </div>
    </form>

    <script>
        function submitform2() {
            $('#addslider').submit();
        }
        function submitform3() {
            $('#gallerylist').submit();
        }
    </script>

    <a onclick="submitform3()" class="btn-red">حذف</a>

    <form id="gallerylist" action="adminslider/delete/" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>عنوان</td>
                <td>تصویر</td>
                <td>انتخاب</td>
            </tr>

            <?php
            $i=1;
            $slider=$data['slider'];
            foreach ($slider as $row) {
                ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><img style="width: 300px;" src="<?= $row['img'] ?>"></td>
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