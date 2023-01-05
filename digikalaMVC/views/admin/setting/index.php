<script src="public/ckeditor/ckeditor.js"></script>
<script src="public/jscolor/jscolor.js"></script>

<?php
$active='setting';
require('views/admin/layout.php');
/*$productinfo=$data['productinfo'];
$edit=0;
if (isset($productinfo['title'])){
    $edit=1;
}*/

?>

<div class="left">
    <p class="title">

        تنظیمات سایت

        <style>
            .row{width: 100%;float: right;margin-top: 5px;}
            .span-title {display: inline-block;width: 150px;font-size: 10pt;}
            input {width: 200px;height: 24px;border: 1px solid #eee;}
            select {padding: 2px;height: 32px;font-family: byekan;}
            option {font-size: 10pt;font-family: byekan;padding: 2px;}
            textarea {width: 450px;border: 1px solid #eeeeee;height: 250px;vertical-align: top;}
        </style>

    <form action="adminsetting/index" enctype="multipart/form-data" method="post">

        <?php
        $option=Model::get_option();

        ?>


        <div class="row">
            <span class="span-title">تعداد محصولات در اسلایدرها</span>
            <input type="text" name="limit_for_slider" value="<?= @$option['limit_for_slider']; ?>">
        </div>
        <div class="row">
            <span class="span-title">شماره های تماس</span>
            <input type="text" name="tell" value="<?= @$option['tell']; ?>">
        </div>
        <div class="row">
            <span class="span-title">ایمیل ارتباط با ما</span>
            <input type="text" name="email" value="<?= @$option['email']; ?>">
        </div>
        <div class="row">
            <span class="span-title">مهلت پرداخت (ساعت) </span>
            <input type="text" name="mohllatpay" value="<?= @$option['mohllatpay']; ?>">
        </div>
        <div class="row">
            <span class="span-title">روت سایت</span>
            <input type="text" name="root" value="<?= @$option['root']; ?>">
        </div>
        <div class="row">
            <span class="span-title">کد درگاه زرین پال</span>
            <input type="text" name="zarinpalmid" value="<?= @$option['zarinpalmid']; ?>">
        </div>
        <div class="row">
            <span class="span-title">رنگ بدنه</span>
            <input id="color1" class="jscolor" type="text" name="bodycolor" value="<?= @$option['bodycolor']; ?>">
            <span class="btn-green" onclick="document.getElementById('color1').jscolor.show();" style="display: inline-block !important;float: none !important;">
                انتخاب
            </span>
        </div>
        <div class="row">
            <span class="span-title">رنگ منو</span>
            <input id="color2" class="jscolor" type="text" name="menucolor" value="<?= @$option['menucolor']; ?>">
            <span class="btn-green" onclick="document.getElementById('color2').jscolor.show();" style="display: inline-block !important;float: none !important;">
                انتخاب
            </span>
        </div>


            <a style="cursor: pointer;" class="btn-green" onclick="submintForm()">اجرای عملیات</a>

    </form>

</div>



</div>
