

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
    }

    .head .btn_green {
        float: left;
        margin-left: 5px;
        margin-top: 8px;
    }

</style>

<div id="main" style="width: 1200px;margin:10px auto;padding: 5px;background: #fff;">


    <style>

        .order-steps {

            padding-left: 10px;
            padding-right: 200px;
            padding-top: 53px;
            height: 100px;
            font-family: yekan;
        }

        .order-steps .dashed {

            float: right;
            margin-top: 12px;
            margin-left: 4px;
        }

        .order-steps .dashed span {
            width: 11px;
            height: 3px;
            background: blue;
            display: block;
            float: right;
            margin-left: 3px;
        }

        .order-steps ul {

        }

        .order-steps ul li {

            display: block;
            float: right;
            height: 1px;
            position: relative;
            width: 180px;

        }

        .order-steps ul li .circle {

            width: 19px;
            height: 19px;
            display: block;
            border: 3px solid #ccc;
            border-radius: 100%;
            position: absolute;
        }

        .order-steps ul li.active .circle {

            border: 3px solid #2396f3;
            background: #2396f3 url(public/images/slices.png) no-repeat -810px -476px;
            border-radius: 100%;
            position: absolute;
        }

        .order-steps ul li .line {

            width: 128px;
            height: 2px;
            display: block;
            background: #ccc;
            position: absolute;
            right: 36px;
            top: 15px;

        }

        .order-steps ul li.active .line {

            background: #2396f3;

        }

        .order-steps ul li .title {

            font-size: 11.7pt;
            position: absolute;
            right: -41px;
            top: 27px;
            width: 146px;
        }

        .order-steps ul li.active .title {

            color: #2396f3;
        }

    </style>

    <div class="order-steps">
        <div class="dashed">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <li class="active"><span class="circle"></span><span class="line"></span><span
                    class="title">
ورود به کلیک سایت
                                    </span></li>
            <li class="active"><span class="circle"></span><span class="line"></span><span class="title">
اطلاعات ارسال سفارش
            </span></li>
            <li class="active"><span class="circle"></span><span class="line"></span><span class="title">
بازبینی سفارش
            </span></li>
            <li class="active"><span class="circle"></span><span class="line"></span><span class="title">
اطلاعات پرداخت
            </span></li>


        </ul>
        <div class="dashed">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <?php
    $orderinfo=$data['orderinfo'];

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
        .error {border: 1px solid red; font-size: 12pt; color: red; font-family: yekan;padding: 8px;text-align: center}

    </style>

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
            <?php
            if ($orderinfo['paymentstatus']==1){
                echo 'پرداخت شده';
            }else{
                echo 'در انتظار پرداخت';
            }
            ?>
        </p>
        <p>
            نوع ارسال:
            <?php
            if ($orderinfo['posttype']==1){
                echo 'پیشتاز';
            }else if ($orderinfo['posttype']==2){
                echo 'سفارشی';
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
            <td><?= $orderinfo['address'] ?></td>
            <td><?= $orderinfo['city'] ?></td>
            <td><?= $orderinfo['codeposti'] ?></td>
            <td><?= $orderinfo['mobile'] ?></td>
            <td><?= $orderinfo['tel'] ?></td>
        </tr>
    </table>

</div>

