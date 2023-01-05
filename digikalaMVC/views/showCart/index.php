
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{width: 1150px; margin:10px auto ; padding: 5px;background: #fff;}
    .head{}
    .head h4{font-size: 12.5pt;font-family: byekan;margin-top: 5px;padding-right:10px;float: right;}
    .btn-green{display: block;width:170px;height:37px;background:#36be2b;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;}
    .head .btn-green{float: left;margin-top: 4px;margin-left: 5px;}
    .content table{width: 100%;font-family: byekan;font-size: 10.7pt;margin-top: 10px;float: right;}
    .content table tr td:not(:first-child) {text-align: center;}
    .content table td{border-left: 1px solid #ccc;padding: 3px;border-bottom: 1px solid #eeeeee;}
    .content table tr td:first-child{border-right: 1px solid #eee;}
    .content table td .right{float: right;}
    .content table td .right img{max-width:135px;max-height: 135px;}
    .content table td .left{float: right;margin-right: 8px;}
    .content table td .left p{margin: 2px 0;}
    .content table tr:first-child{background:#f7f9fa; }
    .content table tr:first-child td{text-align: center; }
</style>

<div id="main">

    <div class="head">
        <h4>سبد خرید شما در دیجی کالا</h4>
        <a href="showCart1" class="btn-green">
            خرید خود را نهایی کنید
        </a>
    </div>

    <style>
        .selectList{width: 100px;height: 37px; border: 1px solid #ccc;background: #eee;position: relative;text-align: center;cursor: pointer;margin: auto;}
        .selectList::after{content: "";width: 22px;height: 17px;display: block;position: absolute;left: 3px;top: 11px;background: url(public/images/slices.png)no-repeat -31px -461px;}
        .selectList span {font-size: 9.7pt;font-family: byekan;line-height: 36px;}
        .selectList ul{height:180px;overflow-y: auto; padding: 0;box-shadow: 0 2px 2px #cacaca;display: none;background: #fff;z-index: 2;position: relative;}
        .selectList ul li{font-family: byekan;font-size: 10pt;padding: 2px 5px;}
        .selectList ul li:hover{background: #ebf1f4;}
        .content table .price {font-size: 12pt;}
        .content table .tooman {font-size: 11pt;}
        .content table .removeTd{background: #ff829f}
        .content table .removeIcon{width: 15px;height: 15px;background: url(public/images/slices.png) no-repeat -811px -508px;display: block;margin: auto;}
        .removeTd{cursor: pointer;}
    </style>

    <div class="content">
        <table cellspacing="0">
            <thead>
            <tr>
                <td>شرح محصول</td>
                <td>تعداد</td>
                <td>قیمت واحد</td>
                <td style="border-left: 0;">قمیت کل</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <?php
            $basket=$data['basket'];

            foreach ($basket as $row){
            ?>
            <tr>
                <td>
                    <div class="right">
                        <img src="public/images/products/<?= $row['id']; ?>/product_220.jpg">
                    </div>
                    <div class="left">
                        <p><?= $row['title']; ?></p>
                        <p>رنگ: <?= $row['colortitle']; ?></p>
                        <p>گارانتی <?= $row['gaurantytitle']; ?></p>
                    </div>
                </td>

                <td>
                    <div class="selectList">
                        <span class="zemanattitle"><?= $row['tedad']; ?></span>
                        <ul>
                            <?php
                            for($i=1;$i<31;$i++){
                                ?>
                                <li onclick="updatebasket(<?= $i; ?>,<?= $row['basketrow']; ?>)"><?= $i; ?></li>
                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                </td>
                <td>
                    <span class="price"><?= $row['price']; ?></span>
                    <span class="tooman">تومان</span>
                </td>
                <td>
                    <span class="price"><?= $row['price']*$row['tedad']; ?></span>
                    <span class="tooman">تومان</span>
                </td>
                <td class="removeTd" onclick="removebasket(<?= $row['basketrow']; ?>)">
                    <i class="removeIcon"></i>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <style>
        #final-price {width: 600px;float: left;font-family: byekan;margin-top: 50px;border: 1px solid greenyellow;padding: 10px;}
        #total-price{border-bottom: 1px solid greenyellow;float: right;padding: 5px 2px;width: 100%}
        #pardakht-price{float: right;padding: 5px 2px;width: 100%}
        .tprice1{float: right;color: black;font-size: 10pt;}
        .tprice2{float: right;color: black;font-size: 12pt;margin-right: 395px;}
        .tprice3{float: right;color: black;font-size: 9pt;margin-right: 10px;margin-top: 3px;}
    </style>
    <div id="final-price">
        <div id="total-price">
            <span class="tprice1">جمع کل خرید شما: </span>
            <span class="tprice2"><?= $data['price_total_all'] ?></span>
            <span class="tprice3">تومان</span>
        </div>
        <div id="pardakht-price">
            <span style="color: #1fa900" class="tprice1">مبلغ قابل پرداخت </span>
            <span style="color: #1fa900;font-size: 14pt;" class="tprice2"><?= $data['price_total_all'] ?></span>
            <span style="color: #1fa900" class="tprice3">تومان</span>
        </div>

    </div>

    <div style="float: left;width: 100%;margin-top: 50px;">
        <a href="showCart1" style="float: right;background: #9597a1" class="btn-green">خرید خود را نهایی کنید ></a>
        <a href="showCart1" style="float: left" class="btn-green">خرید خود را نهایی کنید ></a>
    </div>

</div>
<script>
    $('.content table .selectList').click(function () {
        var ulTag=$('ul ', this);
        ulTag.slideToggle(200);
    });


    function updatebasket(tedad,basketid){
        var url='showcart/updatebasket1/';
        var data={'basketid':basketid,'tedad':tedad};

        $.post(url,data,function (msg) {

            var basket=msg[0];
            var price_total_all=msg[1];
            createbasketlist(basket,price_total_all);

            },'json')
    }
    
    function createbasketlist(basket,price_total_all) {

        $('table tbody tr').remove();

        $.each(basket,function (index,value) {
            var basketid=value['basketrow'];
            var trTag='<tr><td><div class="right"><img src="public/images/products/'+value['id']+'/product_220.jpg"></div><div class="left"><p>'+value['title']+'</p><p>رنگ: '+value['colortitle']+'</p><p>گارانتی '+value['gaurantytitle']+' </p></div></td><td><div class="selectList"><span class="zemanattitle">'+value['tedad']+'</span><ul><?php for($i=1;$i<31;$i++){?><li onclick="updatebasket(<?= $i ?>,'+basketid+')"><?= $i ?></li><?php } ?></ul></div></td><td><span class="price">'+value['price']+'</span><span class="tooman">تومان</span></td><td><span class="price">'+value['price']*value['tedad']+'</span><span class="tooman">تومان</span></td><td class="removeTd" onclick="removebasket('+value['basketrow']+')"><i class="removeIcon"></i></td></tr>';

            $('table tbody').append(trTag);

        });
        $('.tprice2').text(price_total_all);

        $('.content table .selectList').click(function () {
            var ulTag=$('ul ', this);
            ulTag.slideToggle(200);
        });

        $('.selectList ul li').click(function () {
            var zemanattxt=$(this).text();
            $('.selectList .zemanattitle').text(zemanattxt);

        });

    }

    function removebasket(basketid) {
        var url='showcart/deletebasket/'+basketid;
        var data=[];

        $.post(url,data,function (msg) {

            var basket=msg[0];
            var price_total_all=msg[1];
            createbasketlist(basket,price_total_all);

            console.log(msg);
        },'json')
    }
</script>

<script>


    $('.selectList ul li').click(function () {
        var zemanattxt=$(this).text();
        $('.selectList .zemanattitle').text(zemanattxt);

    });

    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    })

    $('#introduction .more').click(function () {
        $('#introduction').toggleClass('active')
    });

    $('#details .left .right .colors li ').click(function () {
        $('.circle').removeClass('active');
        $('.circle' , this).addClass('active');
    })

</script>

