<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور خرید</title>
</head>

<body>

<style>
    @font-face {
        font-family: 'byekan';
        src: url('public/fonts/BYekan.otf?#iefix') format('embedded-opentype'),
        url('public/fonts/BYekan.ttf') format('truetype');
    }
    .borderd{border: 1px solid #000}
    .borderd-bottom{border-bottom: 1px solid #000}
    .borderd-top{border-top: 1px solid #000}
    .borderd-right{border-right: 1px solid #000}
    .borderd-left{border-left: 1px solid #000}
    table td{direction: rtl;font-family: Tahoma;font-size: 11pt;}
    .text-center{text-align: center;}
    .padding5{padding: 5px;}

</style>

<?php
$orderinfo=$data['orderinfo'];
?>

<table class="borderd" width="500px" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td>
            <table width="100%">
                <tr>
                    <td width="120px" class="text-center">
                        <img src="public/images/digikala-logo.png" style="width: 80px;">
                    </td>
                    <td class="text-center" style="font-size: 13pt;font-weight: bold;">فروشگاه دیجی کالا</td>
                    <td width="140px" class="text-center">
                        <?php
                        require ('public/barcode/BarcodeGenerator.php');
                        require ('public/barcode/BarcodeGeneratorHTML.php');
                        require ('public/barcode/BarcodeGeneratorJPG.php');
                        require ('public/barcode/BarcodeGeneratorPNG.php');
                        require ('public/barcode/BarcodeGeneratorSVG.php');

                        $generator=new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $barcode=$generator->getBarcode($orderinfo['id'],$generator::TYPE_CODE_128);
                        echo '<img src="data:image/png;base64,'.base64_encode($barcode).'">'

                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="borderd-top borderd-left padding5" width="320px">
                        <p>نام گیرنده:
                        <?= $orderinfo['family'] ?>
                        </p>
                        <p>آدرس:
                            <?= $orderinfo['address'] ?>
                        </p>
                    </td>
                    <td class="borderd-top padding5">
                        <p>کدپستی:
                            <?= $orderinfo['codeposti'] ?>
                        </p>
                        <p>موبایل:
                            <?= $orderinfo['mobile'] ?>
                        </p>
                        <p>تلفن:
                            <?= $orderinfo['tel'] ?>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>

            <style>
                #product td{border-left: 1px solid #000;border-top: 1px solid #000;padding: 6px;}
                #product tr:first-child td{border-top: 1px solid #000;}
                #product tr td:last-child{border-left:none;}
                #product tr:last-child td{border-bottom:1px solid #000;}
            </style>

            <table id="product" cellpadding="3" cellspacing="0" width="100%">
                <tr>
                    <td>نام محصول</td>
                    <td>رنگ</td>
                    <td>گارانتی</td>
                    <td>تعداد</td>
                    <td>قیمت</td>
                    <td>تخفیف</td>
                </tr>

                <?php
                $basket=unserialize($orderinfo['basket']);
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
        </td>
    </tr>

    <tr>
        <td style="padding:15px 0;">

            <Style>
                #details td{padding: 10px;border-bottom: 1px solid #000;}
                #shopsign td{padding: 10px;border-bottom: 1px solid #000;}
            </Style>

            <table id="shopsign" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td>مبلغ کل پرداختی:
                        <?= number_format($orderinfo['amount']) ?>
                        تومان
                    </td>
                    <td>شیوه پرداخت:
                        <?= $orderinfo['paytypetitle'] ?>
                    </td>
                </tr>
                <tr>
                    <td>شیوه ارسال:
                        <?= $orderinfo['posttypetitle'] ?>
                    </td>
                    <td>هزینه ارسال:
                        <?= number_format($orderinfo['postprice']) ?>
                    </td>
                </tr>
            </table>

            <table id="details" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="text-align: left;">مهر فروشگاه
                    </td>
                </tr>

            </table>

        </td>
    </tr>

</table>

</body>

</html>