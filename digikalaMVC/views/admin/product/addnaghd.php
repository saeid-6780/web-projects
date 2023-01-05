<script src="public/ckeditor/ckeditor.js"></script>

<?php
$active='product';
require('views/admin/layout.php');
$productinfo=$data['productinfo'];
$naghdinfo=$data['naghdinfo'];
$edit=0;
if (isset($naghdinfo['title'])){
    $edit=1;
}

?>

<div class="left">
    <p class="title">
        <?php
        if ($edit==0){
            ?>
            افزودن نقد و بررسی
        <?php } else { ?>
            ویرایش نقد و بررسی
        <?php }  ?>

        <span style="color: red">(<?= $productinfo['title'] ?>)</span>

        <style>
            .row{width: 100%;float: right;margin-top: 5px;}
            .span-title {display: inline-block;width: 150px;font-size: 10pt;}
            input {width: 400px;height: 24px;border: 1px solid #eee;}
            select {padding: 2px;height: 32px;font-family: byekan;}
            option {font-size: 10pt;font-family: byekan;padding: 2px;}
            textarea {width: 450px;border: 1px solid #eeeeee;height: 250px;vertical-align: top;}
            .span-item{padding: 2px 15px;display: inline-block;height: 27px;background:#8aea8c;color: #fff;text-align: center;font-size: 10pt;position: relative;margin-right: 5px;}
            .span-item img {width: 14px;height: 14px;position: absolute;top: 1px;left: 1px;cursor: pointer;}
        </style>

    <form action="adminproduct/addnaghd/<?=  @$productinfo['id'] ?>/<?=  @$naghdinfo['id'] ?>" method="post">

        <div class="row">
            <span class="span-title">عنوان نقد و بررسی</span>
            <input type="text" name="title" value="<?= $naghdinfo['title'] ?>">
        </div>


        <div class="row">
            <span class="span-title">توضیحات</span>
            <textarea class="editor1" id="editor1" name="description" ><?= $naghdinfo['description'] ?></textarea>
        </div>

        <script>
            CKEDITOR.replace('editor1',{

            })
        </script>




        <a style="cursor: pointer;" class="btn-green" onclick="submintForm()">اجرای عملیات</a>

    </form>

</div>



</div>

