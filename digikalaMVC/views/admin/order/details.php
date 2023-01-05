

<style>

    #main::after {
        content: " ";
        clear: both;
        display: block;
    }

    #main {
        font-family: yekan;
    }

    .head {
        float: right;
        margin-top: 36px;
        width: 100%;
    }

    .head h4 {
        font-size: 12.5pt;
        font-family: yekan;
        margin-top: 5px;
        padding-right: 10px;
        float: right;
    }

    .btn_green {
        background: #36be2b none repeat scroll 0 0;
        box-shadow: 1px 1px 3px #ccc;
        color: #fff;
        display: inline-block;
        font-family: yekan;
        font-size: 11pt;
        height: 37px;
        line-height: 34px;
        text-align: center;
        width: 170px;
        border-radius: 4px;
        cursor: pointer;
    }

    .head .btn_green {
        float: left;
        margin-left: 5px;
        margin-top: 8px;
    }

</style>

<div id="main" style="width: 1200px;margin:10px auto;padding: 5px;background: #fff;">

    <?php
    $orderinfo=$data['orderinfo'];
    ?>

    <form method="post" action="adminorder/editorder/<?= $orderinfo['id'] ?>">

        <?php

    $basket=unserialize($orderinfo['basket']);
    $time_sabt=$orderinfo['time_sabt'];

    $gozashteh=time()-$time_sabt;
    $mohlat=mohlatPay*3600;
    //print_r($basket);
    ?>

    <style>
        #product,#addressinfo{width: 100%;font-family: byekan;text-align: center;font-size: 10pt;}
        #product tr,#addressinfotr tr{padding: 15px;}
        #product tr:first-child,#addressinfo tr:first-child{background: #87cd6f;font-size: 12pt;}
        .error {border: 1px solid red; font-size: 12pt; color: red; font-family: yekan;padding: 8px;text-align: center;}
        h4{font-size: 12pt;font-family: byekan;}
    </style>

    <h4>
        جزئیات سفارش کد <?= $orderinfo['id']; ?>
    </h4>

    <a href="adminorder/showfactor/<?= $orderinfo['id']; ?>" class="btn_green" style="position: relative;left: 8px;top: -60px;float: left;">مشاهده فاکتور</a>

    <?php
    if ($gozashteh>$mohlat){
        ?>
        <p class="error">
            این سفارش منقضی شده است. حداکثر مهلت پرداخت برابر <?= mohlatPay ?> ساعت می باشد
        </p>
        <?php
    }
    ?>

    <table id="product" cellpadding="3">
        <tr>
            <td>نام محصول</td>
            <td>رنگ</td>
            <td>گارانتی</td>
            <td>تعداد</td>
            <td>قیمت</td>
            <td>تخفیف</td>
        </tr>

        <?php
        foreach ($basket as $row) {
            ?>

            <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['colortitle'] ?></td>
                <td><?= $row['gaurantytitle'] ?></td>
                <td><?= $row['tedad'] ?></td>
                <td><?= $row['price']*$row['tedad'] ?>
                    تومان</td>
                <td><?= (($row['discount']*$row['price'])/100)*$row['tedad'] ?>
                    تومان</td>

            </tr>
            <?php
        }
        ?>
    </table>

    <style>
        .row2 {background: #bad5e3;padding: 15px;font-size: 11pt;font-family: byekan;margin-top: 15px;margin-bottom: 15px}
    </style>
    <div class="row2">
        <p>
            وضعیت پرداخت:
            <select name="paymentstatus">
                <option value="0" <?php if ($orderinfo['paymentstatus']==0){echo 'selected="selected"';} ?>>در انتظار پرداخت</option>
                <option value="1" <?php if ($orderinfo['paymentstatus']==1){echo 'selected="selected"';}?>>پرداخت شده</option>
            </select>

        </p>

        <p>
            وضعیت سفارش:
            <select name="orderstatus">
                <?php
                $orderstatus=$data['orderstatus'];
                foreach ($orderstatus as $status){
                ?>
                <option value="<?=$status['id']?>" <?php if($orderinfo['status']==$status['id']){echo 'selected="selected"';}?>><?= $status['title'] ?></option>
                    <?php
                }
                ?>
            </select>


        </p>

        <p>
            نوع ارسال:
            <?php
                echo $orderinfo['posttypetitle'];
            ?>
        </p>
        <p>
            شیوه پرداخت:
            <?php
            echo $orderinfo['paytypetitle'];
            if ($orderinfo['paytype']==4) {
                ?>
                (
                <?php
                $date = $orderinfo['pay_year'] . '/' . $orderinfo['pay_month'] . '/' . $orderinfo['pay_day'];
                $time = $orderinfo['pay_hour'] . ':' . $orderinfo['pay_minute'];
                echo 'تاریخ: '.$date . ' -زمان: ' . $time.' - شماره کارت: '.$orderinfo['pay_card'].' - نام بانک: '.$orderinfo['pay_bankname'];
                ?>
                )
                <?php
            }
            ?>
        </p>
        <p>
            کد پیگیری:
            <?php
            echo $orderinfo['beforepay'];
            ?>
        </p>
        <?php

        if ($orderinfo['paymentstatus']==0 and ($gozashteh<=$mohlat) ) {
            ?>
            <p>
                <a class="btn_green" href="checkout/payonline/<?= $orderinfo['id'] ?>">
                    پرداخت آنلاین
                </a>
                <a class="btn_green" href="checkout/creditcard/<?= $orderinfo['id'] ?>">
                    پرداخت با کارت
                </a>
            </p>
            <?php
        }        ?>
        <p>
    </div>

    <table id="addressinfo" cellpadding="3">
        <tr>
            <td>گیرنده</td>
            <td>آدرس</td>
            <td>شهر</td>
            <td>کد پستی</td>
            <td>موبایل</td>
            <td>تلفن ثابت</td>
        </tr>
        <tr>
            <td><?= $orderinfo['family'] ?></td>
            <td><input name="address" type="text" value="<?= $orderinfo['address'] ?>"></td>
            <td><?= $orderinfo['city'] ?></td>
            <td><input name="codeposti" type="text" value="<?= $orderinfo['codeposti'] ?>"></td>
            <td><input name="mobile" type="text" value="<?= $orderinfo['mobile'] ?>"></td>
            <td><input name="tel" type="text" value="<?= $orderinfo['tel'] ?>"></td>
        </tr>
    </table>

    <div class="row2">
        <span onclick="submitform()" class="btn_green">ذخیره اطلاعات</span>
    </div>

    </form>

</div>

<script>
    function submitform() {
        $('form').submit();
    }
</script>

