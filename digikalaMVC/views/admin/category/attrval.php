
<?php
$active='category';
require('views/admin/layout.php');
$attrval=$data['attrval'];
$attrinfo=$data['attrinfo'];

?>

<div class="left">
    <p class="title">
        مقادیر پیش فرض ویژگی
        <span style="color: red">(<?= $attrinfo['title'] ?>)</span>

        <style>
            .row{width: 100%;float: right;margin-top: 5px;}
            .span-title {display: inline-block;width: 150px;font-size: 10pt;}
            input {width: 400px;height: 24px;border: 1px solid #eee;}
            .span-item{padding: 2px 15px;display: inline-block;height: 27px;background:#8aea8c;color: #fff;text-align: center;font-size: 10pt;position: relative;margin-right: 5px;}
        </style>

    <form action="adminCategory/attrval/<?= $attrinfo['id'] ?>" method="post">
        <input type="hidden" name="submited">

        <?php
        foreach ($attrval as $val) {
            ?>

            <div class="row">
                <span class="span-title">مقدار ویژگی: </span>
                <input type="text" name="attrval-<?= $val['id'] ?>" value="<?= $val['val'] ?>">
            </div>

            <?php
        }
        ?>

        <?php
        $size=sizeof($attrval);
        for ($i=1;$i<=10-$size;$i++) {
            ?>

            <div class="row">
                <span class="span-title">مقدار ویژگی: </span>
                <input type="text" name="attrvalnew[]" value="">
            </div>

            <?php
        }
        ?>

        <a style="cursor: pointer;" class="btn-green" onclick="submintForm()">اجرای عملیات</a>

    </form>

</div>



</div>

