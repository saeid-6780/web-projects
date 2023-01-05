<?php
$active='category';
require('views/admin/layout.php');
$edit=$data['edit'];
$categoryinfo=$data['categoryinfo'];

?>

<div class="left">
    <p class="title"><?php if ($edit=='') { ?>
            ایجاد دسته جدید
            <?php
        }else{
        ?>
ویرایش دسته
            <?php
        }
        ?>

<style>
    .row{width: 100%;float: right;margin-top: 5px;}
    .span-title {display: inline-block;width: 150px;font-size: 10pt;}
    input {width: 200px;height: 24px;border: 1px solid #eee;}
    select {padding: 2px;height: 32px;font-family: byekan;}
    option {font-size: 10pt;font-family: byekan;padding: 2px;}
</style>

<form action="admincategory/addcategory/<?= $categoryinfo['id']; ?>/<?= $edit; ?>" method="post">

    <div class="row">
        <span class="span-title">عنوان دسته</span>
        <input type="text" name="title" value="<?php if ($edit==''){}else{  echo $categoryinfo['title']; } ?>">
    </div>
        <div class="row">
            <span class="span-title">دسته والد</span>
            <select name="parents" autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                $category=$data['category'];
                $parentid=$data['parentid'];
                if ($edit=='') {
                    $selectedid =$parentid;
                }else{
                    $selectedid=$categoryinfo['parent'];}

                foreach ($category as $row){
                    if ($row['id']==$selectedid){
                        $kk='selected';
                    }
                    else {$kk='';}
                ?>
                <option value="<?= $row['id'] ?>" <?= $kk; ?>><?= $row['title'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <a style="cursor: pointer;" class="btn-green" onclick="submintForm()">اجرای عملیات</a>

</form>

</div>



</div>
