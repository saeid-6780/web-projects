
<?php
$active='report';
require('views/admin/layout.php')
?>

<style>
    .h4{font-size: 12.5pt; font-family: byekan;}
    .row2 .title {display: block;float: right;margin-left: 10px;margin-right: 10px;}
    .row2 select {float: right;margin-right: 6px;font-size: 10pt;width: 100px;}
    .row2 h3{font-size: 13pt;border-bottom: 1px solid #eee;}
    .row2 input[type=text]{width: 200px;border: 1px solid #ccc;float: right;height: 20px;padding: 4px;margin-right: 10px;}
    .w120{width: 120px;}
</style>

<div class="left">

    <?php
    $stat=$data['stats'];
    $result=$stat['result'];


    ?>


        <p class="title"><a>آمار سفارشات در بازه زمانی:
            <?= $stat['startdate'] ?>
                تا
            <?= $stat['enddate'] ?>
            </a>

        </p>

    <style>
        .spantag {float: right;margin-left: 30px;font-size: 10.5pt;}
    </style>
    <div class="row2">
        <span class="spantag">
            تعداد کل سفارشات:
            <?= sizeof($result); ?>
        </span>

        <span class="spantag">
            تعداد سفارشات پرداخت شده:
            <?= $stat['order_paid']; ?>
        </span>

        <span class="spantag">
           درصد سفارشات پرداخت شده:
            <?= ($stat['order_paid']/sizeof($result))*100; ?>
            %
        </span>

        <span class="spantag">
            مبلغ کل فروش:
            <?= number_format($stat['amount']); ?>
        </span>
    </div>

    <table class="list" cellspacing="0">
        <tr>
            <td>کد</td>
            <td>تاریخ</td>
            <td>تحویل گیرنده</td>
            <td>مبلغ کل</td>
            <td>استان</td>
            <td>شهر</td>
            <td>جزئیات</td>
        </tr>

        <?php
        foreach ($result as $row) {
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

            </tr>
            <?php
        }
        ?>
    </table>

</div>

</div>

<script>
    function submitform(formid) {
        $('#'+formid).submit()
    }
</script>