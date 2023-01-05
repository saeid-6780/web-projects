
<?php
$active='category';
require('views/admin/layout.php')
?>

<div class="left">
    <p class="title">مدیریت دسته ها
    (
        <?php
        $categoryinfo=[];
        if (isset($data['categoryinfo'])){
            $categoryinfo=$data['categoryinfo'];
            $parents=$data['parents'];
        }
        $parents=[];
        if (isset($data['parents'])){
            $parents=$data['parents'];
            $parents=array_reverse($parents);}
        foreach ($parents as $row) {
            ?>
            <a href="adminCategory/showchildren/<?= $row['id'] ?>">-
                <?= $row['title'] ?>
            </a>
            <?php
        }
        ?>
        <a href="adminCategory/showchildren/<?php
        if (isset($categoryinfo['title'])){ echo 'showchildren/'.$categoryinfo['id'];}else echo 'index/'?>">-
            <?php
            if (isset($categoryinfo['title'])){
            echo $categoryinfo['title']; }else echo 'دسته های اصلی'; ?>
        </a>
        )
    </p>


    <a href="admincategory/addcategory/<?php if (isset($categoryinfo['id'])){echo $categoryinfo['id'];}  ?>" class="btn-green">افزودن</a>
    <a onclick="submintForm()" class="btn-red">حذف</a>

    <form action="admincategory/deletecategory/<?= @$categoryinfo['id']; ?>" method="post">
    <table class="list" cellspacing="0">
        <tr>
            <td>ردیف</td>
            <td>عنوان دسته</td>
            <td>مشاهده زیردسته ها</td>
            <td>ویرایش</td>
            <td>ویژگی ها</td>
            <td>انتخاب</td>
        </tr>

        <?php
        foreach ($data['category'] as $row) {
            ?>

            <tr>
                <td><?= $row['id'] ?></td>
                <td class="w400"><?= $row['title'] ?></td>
                <td><a href="admincategory/showchildren/<?= $row['id'] ?>">
                        <i class="showchildcat"></i>
                    </a></td>
                <td><a href="admincategory/addcategory/<?= $row['id'] ?>/edit">
                        <img src="public/images/Edit.gif">
                    </a></td>
                <td>
                    <a href="admincategory/showattr/<?= $row['id'] ?>">مشاهده</a>
                </td>
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