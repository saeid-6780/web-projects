
<?php
$active='order';

require('views/admin/layout.php');
?>

<div class="left">
    <p class="title"><a>مدیریت سفارشات</a>
        <?php
        if (isset($data['orders'])){
            $orders=$data['orders'];
        }

        ?>

    </p>

    <a onclick="submintForm()" class="btn-red">حذف</a>

    <form action="adminOrder/delete" method="post">
        <table class="list" cellspacing="0">
            <tr>
                <td>کد</td>
                <td>تاریخ</td>
                <td>تحویل گیرنده</td>
                <td>مبلغ کل</td>
                <td>استان</td>
                <td>شهر</td>
                <td>جزئیات</td>
                <td>انتخاب</td>
            </tr>

            <?php
            foreach ($orders as $row) {
                ?>

                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td ><?= $row['family'] ?></td>
                    <td ><?= $row['amount'] ?></td>
                    <td ><?= $row['ostan'] ?></td>
                    <td ><?= $row['city'] ?></td>

                    <td><a href="adminorder/details/<?= $row['id'] ?>">
                            <img src="public/images/Edit.gif">
                        </a></td>

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