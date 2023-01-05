<section class="myOrders" >
    سفارشات من

    <table cellspacing="0">
        <tr>
            <td>ردیف</td>
            <td>کد</td>
            <td>تاریخ</td>
            <td>مبلغ کد</td>
            <td>وضعیت</td>
            <td>عملیات پرداخت</td>
            <td>نوع</td>
            <td>جزئیات</td>
        </tr>

        <?php
        $order=$data['order'];
        $i=1;
        foreach ($order as $row){
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['id']; ?></td>
            <td><?= $row['date']; ?></td>
            <td><?= number_format($row['amount']); ?></td>
            <td><?= $row['statustitle']; ?></td>
            <td>
                <?php
                if ($row['paymentstatus']==0) {
                    ?>
                    <a href="checkout/index/<?= $row['id']; ?>">پرداخت</a>
                    <?php
                } else{
                    echo 'پرداخت شده';
                }
                ?>
            </td>
            <td>سفارش</td>
            <td><img onclick="showDetailsTr(this)" style="margin-top: 5px;cursor: pointer;" src="public/images/orderdetailsopen.png"></td>
        </tr>
        <tr class="details">
            <td colspan="8">
                <div class="subtable">
                    <table cellspacing="0">
                        <tr>
                            <td>کالا</td>
                            <td>تعداد</td>
                            <td>قیمت واحد</td>
                            <td>قیمت کل</td>
                            <td>تخفیف کل</td>
                            <td>مبلغ کل</td>
                        </tr>

                        <?php
                        $basket=$row['basket'];
                        $basket=unserialize($basket);
                        $status=$row['status'];
                        foreach ($basket as $b) {
                            $priceall=$b['tedad']*$b['price'];
                            $discountall=($priceall*$b['discount'])/100;
                            ?>

                            <tr>
                                <td><?= $b['title']; ?></td>
                                <td><?= $b['tedad']; ?></td>
                                <td><?= $b['price']; ?></td>
                                <td><?= $priceall; ?></td>
                                <td><?= $discountall ?></td>
                                <td><?= $priceall-$discountall; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <h4 class="title" >
                        رهگیری سفارش
                    </h4>

                    <style>
                        .orderSteps {padding-right: 105px;padding-top: 50px;height: 100px;}
                        .orderSteps .dashed{float: right;}
                        .orderSteps .dashed span{width: 11px;height: 3px;background: blue;display: block;float: right;margin-left: 3px;}
                        .orderSteps ul{padding: 0;}
                        .orderSteps ul li{position: relative;width: 180px;float: right;height: 2px;right: -20px;}
                        .orderSteps ul li .circle{width: 19px;height: 19px;display: block;border: 3px solid #ccc;border-radius: 50%;position: absolute;top: -12px;right: 25px;}
                        .orderSteps ul li.active .circle{border: 3px solid #2396f3;background:#2396f3 url(public/images/slices.png)no-repeat -810px -476px ; }
                        .orderSteps ul li .title{color: #534f51;font-size: 11.6px;position: absolute;top: 27px;right: 3px;}
                        .orderSteps ul li.active .title{color: #2396f3;}
                        .orderSteps ul li .line{width: 138px;height: 2px;display: block;background: #ccc;position: absolute;top: 1px;right: 55px;}
                        .orderSteps ul li.active .line{background:#2396f3;}
                    </style>

                    <div class="orderSteps">
                        <div class="dashed">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <ul>
                            <li class="<?php if ($status>=2){echo 'active';} ?>"  >
                                <span class="circle "></span>
                                <span class="title">تایید سفارش</span>
                                <span class="line"></span>
                            </li >
                            <li class="<?php if ($status>=4){echo 'active';} ?>">
                                <span class="circle"></span>
                                <span class="title">پرداخت</span>
                                <span class="line"></span>
                            </li>
                            <li class="<?php if ($status>=5){echo 'active';} ?>">
                                <span class="circle"></span>
                                <span class="title">پردازش انبار</span>
                                <span class="line"></span>
                            </li >
                            <li class="<?php if ($status>=6){echo 'active';} ?>">
                                <span class="circle"></span>
                                <span class="title">آماده ارسال</span>
                                <span class="line"></span>
                            </li>
                            <li class="<?php if ($status>=7){echo 'active';} ?>" style="width: 36px;">
                                <span class="circle"></span>
                                <span style="width: 80px;" class="title">تحویل شده</span>

                            </li>
                        </ul>
                        <div class="dashed">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <style>
                        .myOrders .subtable .more{}
                        .myOrders .subtable .more table{width: 100%;}
                        .myOrders .subtable .more table tr{background: #fff !important;color: #000 !important;font-size: 10pt !important;}
                        .myOrders .subtable .more table tr td{width: 33.33%;}
                    </style>
                    <div class="more">
                        <table cellpadding="0" class="more">
                            <tr>
                                <td>روش ارسال:
                                    <?php
                                    if ($row['posttype']==1){echo 'پیشتاز';}
                                    else if($row['posttype']==2){echo 'سفارش';}
                                    ?>
                                </td>
                                <td>زمان ارسال: _</td>
                                <td>کد مرسوله: <?= $row['barcode']; ?></td>
                            </tr>
                            <tr>
                                <td>آدرس: <?= $row['address']; ?></td>
                                <td> تحویل گیرنده: <?= $row['family']; ?></td>
                                <td>شماره تماس: <?= $row['tel']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
        <?php
            $i++;
        }
        ?>
    </table>
</section>