<style>
    #addDigiBon{padding: 10px;background: #eee;border: 1px dotted #ccc;width: 96%;padding-bottom: 30px;margin-bottom: 25px;}
    #addDigiBon input{width: 300px;height: 24px;border: 1px solid #ccc;margin-right: 10px;}
    #addDigiBon img {position: relative;top: 10px;right: 8px}
    .digiBon .sub {box-shadow: 0 0 5px #ccc;padding: 10px;}
    .digiBon .sub table {width: 100%;}
    .digiBon .sub table tr {background: #fff !important;}
    .digiBon .sub table tr:first-child {background: #eee !important;color: #000 !important;}
</style>
<section class="digiBon" style="<?php if ($activetab=='digibon'){echo 'display:block';} ?>">
    <div id="addDigiBon">
                    <span>
                        کد دریافت دیجی بن
                    </span>
        <input name="code" class="code" type="text">
        <img style="cursor: pointer;" onclick="savecode()" src="public/images/SaveVoucher.gif">
    </div>
    <table cellspacing="0">
        <tr>
            <td>ردیف</td>
            <td>کد</td>
            <td>شرح</td>
            <td>تاریخ ثبت</td>
            <td>تاریخ انقضا</td>
            <td>اعتبار اولیه</td>
            <td>اعتبار مصرفی</td>
            <td>مانده</td>
            <td>وضعیت</td>
            <td>جزئیات</td>
        </tr>

        <?php
        $code=$data['code'];
        $i=1;
        foreach ($code as $row){
        ?>

        <tr>
            <td><?= $i ?></td>
            <td><?= $row['code'] ?></td>
            <td>بن تخفیف سفارش شما</td>
            <td><?= $row['tarikh_sabt'] ?></td>
            <td><?= $row['tarikh_end'] ?></td>
            <td><?= $row['maxnum'] ?></td>
            <td><?= $row['usenum'] ?></td>
            <td><?= $row['maxnum']-$row['usenum']  ?></td>
            <td><?= $row['status'] ?></td>
            <td><img onclick="showDetailsTr(this)" style="margin-top: 5px;cursor: pointer;" src="public/images/orderdetailsopen.png"></td>
        </tr>
        <tr class="details" style="background: #fff !important;">
            <td colspan="11">
                <div class="sub">
                    <table cellspacing="0">
                        <tr>
                            <td>سفارش</td>
                            <td>نوع</td>
                            <td>تاریخ</td>
                        </tr>
                        <?php
                        $orders=$row['orders'];
                        foreach ($orders as $row2) {
                            ?>
                            <tr>
                                <td><?= $row2['id']; ?></td>
                                <td>محصول</td>
                                <td><?= $row2['pay_year'].'/'.$row2['pay_month'].'/'.$row2['pay_day'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </td>
        </tr>
        <?php
            $i++;
        }
        ?>
    </table>
</section>

<script>

    function savecode() {
        var code=$('.code').val();
        var url='panel/savecode';
        var data={'code':code};
        $.post(url,data,function (msg) {
            window.location='panel/index/digibon'
        })
    }

</script>