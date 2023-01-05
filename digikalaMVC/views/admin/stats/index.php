
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

    <form id="order" action="adminStats/order" method="post">

    <p class="title"><a>آمار و گزارشات</a>
        <?php


        ?>

    </p>

    <div class="row2">
        <h4>
            گزارش سفاشات فروشگاه
        </h4>
    </div>

    <div class="row2">
        <span class="title w120">تاریخ شروع</span>
        <span class="title">روز</span>
        <select name="day1">
            <?php
            for ($i=1;$i<32;$i++) {
                ?>
                <option><?= $i ?></option>
                <?php
            }
            ?>
        </select>
        <span class="title">ماه</span>
        <select name="month1">
            <?php
            for ($i=1;$i<13;$i++) {
                ?>
                <option><?= $i ?></option>
                <?php
            }
            ?>
        </select>
        <span class="title">سال</span>
        <select name="year1">
            <?php
            $emsal=Model::jalalidate('Y');
            for ($i=1390;$i<=$emsal;$i++) {
                ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php
            }
            ?>

        </select>
    </div>

    <div class="row2">
        <span class="title w120">تاریخ پایان</span>
        <span class="title">روز</span>
        <select name="day2">
            <?php
            for ($i=1;$i<32;$i++) {
                ?>
                <option><?= $i ?></option>
                <?php
            }
            ?>
        </select>
        <span class="title">ماه</span>
        <select name="month2">
            <?php
            for ($i=1;$i<13;$i++) {
                ?>
                <option><?= $i ?></option>
                <?php
            }
            ?>
        </select>
        <span class="title">سال</span>
        <select name="year2">
            <?php
            $emsal=Model::jalalidate('Y');
            for ($i=1390;$i<=$emsal;$i++) {
                ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php
            }
            ?>

        </select>
    </div>

        <div class="row2">
        <span onclick="submitform('order')" class="btn_green" style="float: left;">گزارش گیری</span>
        </div>

    </form>

</div>

</div>

<script>
    function submitform(formid) {
        $('#'+formid).submit()
    }
</script>