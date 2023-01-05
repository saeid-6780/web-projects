<?php
$active='category';
require('views/admin/layout.php');
/*$attrinfo=$data['attrinfo'];*/
$categoryinfo=$data['categoryinfo'];
$editinfo=$data['editinfo'];
$edit='';
if (isset($editinfo['title'])){
    $edit=1;
}

?>

<div class="left">
    <p class="title"><?php if ($edit=='') { ?>
            ایجاد ویژگی جدید
            <?php
        }else{
        ?>
ویرایش ویژگی
            <?php
        }
        ?>

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

<style>
    .row{width: 100%;float: right;margin-top: 5px;}
    .span-title {display: inline-block;width: 150px;font-size: 10pt;}
    input {width: 200px;height: 24px;border: 1px solid #eee;}
    select {padding: 2px;height: 32px;font-family: byekan;}
    option {font-size: 10pt;font-family: byekan;padding: 2px;}
</style>

<form action="admincategory/addattr/<?= $categoryinfo['id']; ?>/<?= $data['parentid']; ?>/<?= $editinfo['id']; ?>" method="post">

    <div class="row">
        <span class="span-title">عنوان ویژگی</span>
        <input type="text" name="title" value="<?php if ($edit==''){}else{  echo $editinfo['title']; } ?>">
    </div>
        <div class="row">
            <span class="span-title">ویژگی والد</span>
            <select name="parents" autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                $attr=$data['attr'];
                $parentid=$data['parentid'];
                $selectedid =$parentid;

                foreach ($attr as $row){
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
