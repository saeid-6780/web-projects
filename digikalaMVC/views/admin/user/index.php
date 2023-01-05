
<?php
$active='user';

require('views/admin/layout.php');
?>

<style>
    .selecttag{float: left;margin-left: 10px;font-family: byekan;font-size: 10.5pt;padding: 2px;}
</style>
<div class="left">
    <p class="title"><a>مدیریت اعضاء</a>
        <?php
        if (isset($data['user'])){
            $user=$data['user'];
        }

        ?>

    </p>

    <a onclick="submitformmulti()" class="btn-red">اجرای عملیات</a>

    <select class="selecttag" name="action">
        <option value="1">تغییر به مدیر</option>
        <option value="2">تغییر به کارمند</option>
        <option value="3">تغییر به کاربر عادی</option>
        <option value="4">حذف</option>
    </select>

    <form action="adminOrder/delete" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>نام و نام خانوادگی</td>
                <td>تاریخ عضویت</td>
                <td>سطح دسترسی</td>
                <td>موبایل</td>
                <td>انتخاب</td>
            </tr>

            <?php
            $i=1;
            foreach ($user as $row) {
                ?>

                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row['family'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td ><?= $row['leveltitle'] ?></td>
                    <td><?= $row['mobile'] ?></td>

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
            action='adminUser/chengelevel1';
        }
        else if (actionselected==2) {
            action='adminUser/chengelevel2';
        }
        else if (actionselected==3) {
            action='adminUser/chengelevel3';
        }
        else if (actionselected==3) {
            action='adminUser/delete';
        }

        $('form').attr('action',action);
        $('form').submit();
    }
</script>