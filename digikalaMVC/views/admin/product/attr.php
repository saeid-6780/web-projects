
<?php
$active='product';
require('views/admin/layout.php');
$attr=$data['attr'];
$productinfo=$data['productinfo'];

?>

<div class="left">
    <p class="title">
ویژگی های محصول
        <span style="color: red">(<?= $productinfo['title'] ?>)</span>

        <style>
            .row{width: 100%;float: right;margin-top: 5px;}
            .span-title {display: inline-block;width: 150px;font-size: 10pt;}
            input {width: 400px;height: 24px;border: 1px solid #eee;}
            select {padding: 2px;height: 32px;font-family: byekan;width: 200px;}
            option {font-size: 10pt;font-family: byekan;padding: 2px;}
            textarea {width: 450px;border: 1px solid #eeeeee;height: 250px;vertical-align: top;}
            .span-item{padding: 2px 15px;display: inline-block;height: 27px;background:#8aea8c;color: #fff;text-align: center;font-size: 10pt;position: relative;margin-right: 5px;}
            .span-item img {width: 14px;height: 14px;position: absolute;top: 1px;left: 1px;cursor: pointer;}

        </style>

    <form action="adminProduct/attr/<?= $productinfo['id'] ?>" method="post">
        <input type="hidden" name="submited">

        <?php
        foreach ($attr as $row) {
            ?>

            <div class="row">
                <span class="span-title"><?= $row['title'] ?></span>
                <!--<input type="text" name="value<?/*= $row['id'] */?>" value="<?/*= $row['value'] */?>">-->
                <select name="value<?= $row['id'] ?>" autocomplete="off">
                    <?php
                    $values=$row['values'];
                    foreach ($values as $value) {
                        if ($row['valueid']==$value['id']){
                            $selected='selected';
                        }else{
                            $selected='';
                        }
                        ?>
                        <option value="<?= $value['id'] ?>" <?php if ($selected=='selected'){echo 'selected=selected';} ?>><?= $value['val'] ?></option>
                        <?php
                    }
                    ?>
                </select>

                <a style="font-size: 10pt;color: blue;" class="span-title" href="adminCategory/attrval/<?= $row['id'] ?>">
ویرایش مقادیر پیش فرض
                </a>

                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            </div>

            <?php
        }
        ?>

        <a style="cursor: pointer;" class="btn-green" onclick="submintForm()">اجرای عملیات</a>

    </form>

</div>



</div>

