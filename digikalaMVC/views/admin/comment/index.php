
<?php
$active='comment';

require('views/admin/layout.php');
?>

<style>
    .selecttag{float: left;margin-left: 10px;font-family: byekan;font-size: 10.5pt;padding: 2px;}
</style>
<div class="left">
    <p class="title"><a>مدیریت نظرات</a>
        <?php
        if (isset($data['comment'])){
            $comment=$data['comment'];
        }

        ?>

    </p>

    <a onclick="submitformmulti()" class="btn-red">اجرای عملیات</a>

    <select class="selecttag" name="action">
        <option value="1">انتشار</option>
        <option value="2">عدم انتشار</option>
        <option value="3">حذف</option>
    </select>

    <form action="adminOrder/delete" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>تاریخ</td>
                <td>عنوان</td>
                <td>نقاط قوت</td>
                <td>نقاط ضعف</td>
                <td>متن نظر</td>
                <td>وضعیت</td>
                <td>انتخاب</td>
            </tr>

            <?php
            $i=1;
            foreach ($comment as $row) {
                ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['date'] ?></td>
                    <td ><input name="title<?=$row['id']?>" value="<?= $row['title'] ?>"></td>
                    <td><input name="positive<?=$row['id']?>" value="<?= $row['positive'] ?>"></td>
                    <td ><input name="negative<?=$row['id']?>" value="<?= $row['negative'] ?>"></td>
                    <td ><textarea name="matn<?=$row['id']?>"><?= $row['matn'] ?></textarea></td>
                    <td ><?php if ($row['confirm']==1){echo 'تایید شده';}else{echo 'تایید نشده';} ?></td>

                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
                    </td>

                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </form>

</div>

</div>

<script>
    function submitformmulti() {
        var actionselected=$('.selecttag option:selected').val();
        var action='';
        if (actionselected==1) {
            action='adminComment/confirm';
        }
        else if (actionselected==2) {
            action='adminComment/unconfirm';
        }
        else if (actionselected==3) {
            action='adminComment/delete';
        }

        $('form').attr('action',action);
        $('form').submit();
    }
</script>