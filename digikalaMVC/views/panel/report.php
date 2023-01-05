<?php
$stat=$data['stat'];
?>


<div class="box">
    <div class="header">
        گزارش عملکرد
    </div>
    <div class="content">
        <table>
            <tr>
                <td>
                    <span class="title">تعداد کل سفارشات: </span>
                    <span class="value"><?= $stat['ordernumber'] ?></span>
                </td>
                <td>
                    <span class="title">تعداد کل دیجی بن دریافتی: </span>
                    <span class="value">ssadighzade@yahoo.com</span>
                </td>
                <td>
                    <span class="title">تعداد نظرات ارسال شده: </span>
                    <span class="value"><?= $stat['commentnumber'] ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">تعداد سفارشات در انتظار تایید: </span>
                    <span class="value"><?= $stat['ordertaeidnumber'] ?></span>
                </td>
                <td>
                    <span class="title">دیجی بن مصرفی: </span>
                    <span class="value">0910***8550</span>
                </td>
                <td>
                    <span class="title">تعداد نقدهای ارسال شده: </span>
                    <span class="value">1372/6/31</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">سفارشات در حال پردازش: </span>
                    <span class="value"><?= $stat['orderpardazeshnumber'] ?></span>
                </td>
                <td>
                    <span class="title">دیجی بن های باطل شده: </span>
                    <span class="value">مرررد</span>
                </td>
                <td>
                    <span class="title">پیغام های خوانده نشده: </span>
                    <span class="value"><?= $stat['messagenumber'] ?></span>
                </td>
            </tr>

        </table>
    </div>
</div>