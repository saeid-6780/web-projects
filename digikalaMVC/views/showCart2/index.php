
    <script src="public/js/frotel/ostan.js"></script>
    <script src="public/js/frotel/city.js"></script>
    <script src="public/js/frotel/mahale.js"></script>
    <script src="public/js/bootstrap-select.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <link href="public/js/bootstrap-select.css" rel="stylesheet">
    <link href="public/js/bootstrap.css" rel="stylesheet">


<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{width: 1150px; margin:10px auto ; padding: 25px;background: #fff;padding: 10px;font-family: byekan;}
    .orderSteps {padding-right: 160px;padding-top: 50px;height: 100px;}
    .orderSteps .dashed{float: right;}
    .orderSteps .dashed span{width: 11px;height: 3px;background: blue;display: block;float: right;margin-left: 3px;}
    .orderSteps ul{padding: 0;}
    .orderSteps ul li{position: relative;width: 180px;float: right;height: 2px;right: -20px;}
    .orderSteps ul li .circle{width: 19px;height: 19px;display: block;border: 3px solid #ccc;border-radius: 50%;position: absolute;top: -12px;right: 25px;}
    .orderSteps ul li.active .circle{border: 3px solid #2396f3;background:#2396f3 url(public/images/slices.png) no-repeat -810px -476px; }
    .orderSteps ul li .title{color: #534f51;font-size: 11.6px;position: absolute;top: 27px;right: 3px;width: 150px;}
    .orderSteps ul li.active .title{color: #2396f3;}
    .orderSteps ul li .line{width: 138px;height: 2px;display: block;background: #ccc;position: absolute;top: 1px;right: 55px;}
    .orderSteps ul li.active .line{background:#2396f3;}

</style>

<div id="main">

    <div class="orderSteps">
        <div class="dashed">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <li class="active">
                <span class="circle "></span>
                <span class="title">ورود به دیجی کالا</span>
                <span class="line"></span>
            </li>
            <li>
                <span class="circle"></span>
                <span class="title">اطلاعات ارسال سفارش</span>
                <span class="line"></span>
            </li>
            <li>
                <span class="circle"></span>
                <span class="title">بازبینی سفارش</span>
                <span class="line"></span>
            </li>
            <li>
                <span class="circle"></span>
                <span class="title">اطلاعات پرداخت</span>
                <span class="line"></span>
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
        .head{float: right;margin-top: 10px;width: 98%;}
        .head h4 {font-size: 12.4pt;font-weight: normal;float: right;padding-right: 20px;}
        .btn-gray{display: block;width:170px;height:37px;background:#939697;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;margin: auto;}

        .head .btn-gray {margin-top: 20px;margin-left: 3px;float: left;cursor: pointer;}

    </style>

    <div class="head">
        <h4>انتخاب آدرس</h4>
        <span class="btn-gray" onclick="showwindow()">افزودن آدرس جدید</span>
    </div>

    <style>
        .content{margin-top: 20px;float: right;width: 100%;}
        .content table{width: 100%;margin-top: 14px;}
        table td{border-left: 1px solid #eee;border-bottom: 1px solid #eee;padding: 5px;}
        table .circle{width: 15px;height: 15px;border: 1px solid #ccc;border-radius: 50%;display:block;margin: auto;cursor: pointer;}
        .content table .girandeh {font-size: 12pt;}
        .content table .edit{background: #c3f9ff;cursor: pointer}
        .content table .edit i{background: url(public/images/slices.png)no-repeat -809px -444px;width: 19px;height: 19px;display: block;margin: auto;}
        .content table .remove{background:#ffa89e;cursor: pointer}
        .content table .remove i{background: url(public/images/slices.png)no-repeat -809px -506px;width: 19px;height: 19px;display: block;margin: auto;}
        table.active .circle{background: #3db51f;border: 1px solid #3db51f;position: relative;}
        table.active >tr:first-child >td:first-child{background: #f7fff7;}
        table.active .circle::after{content: ""; background: #fff;display: block;width: 5px;height: 5px;border-radius: 50%;position: absolute;top: 5px;right: 5px;}
        .content table.active .triangle{width: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 42px 42px 0;
            border-color: transparent #3db51f transparent transparent;
            position: absolute;top: 0;right: 0;
        }
    </style>
    <div class="content">
        <?php
        $address=$data['address'];
        $first=1;
        foreach ($address as $row) {
            ?>
            <table data-id="<?= $row['id'] ?>" data-city="<?= $row['city'] ?>" class="table-address <?php if ($first==1){echo 'active';}?>" cellspacing="0" >
                <tr>
                    <td class="select-address" rowspan="3" style="width: 60px;position: relative;cursor: pointer;">
                        <span class="triangle"></span>
                        <span class="circle"></span>
                    </td>
                    <td colspan="3" class="girandeh"><?= $row['family'] ?></td>
                    <td rowspan="3" style="width: 60px;padding: 0;">
                        <table cellspacing="0" style="width: 100%;height: 120px;">
                            <tr>
                                <td onclick="editaddress(<?= $row['id'] ?>)" class="edit" style="border: 0" ;>
                                    <i></i>
                                </td>
                            </tr>
                            <tr>
                                <td onclick="deleteAddress(<?= $row['id'] ?>)" class="remove" style="border: 0;cursor: pointer" ;><i></i>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 200px;font-size: 10pt;">استان: <?= $row['ostan_name'] ?></td>
                    <td rowspan="2" style="font-size: 10.5pt;color: #553f49"><?= $row['address'] ?><br>کد پستی: <?= $row['codeposti'] ?>
                    </td>
                    <td style="width: 200px;font-size: 10.5pt;">شماره تماس همراه:<?= $row['mobile'] ?></td>
                </tr>
                <tr>
                    <td style="width: 200px;font-size: 10pt;">شهر: <?= $row['shahr_name'] ?></td>
                    <td style="width: 200px;font-size: 10.5pt;">شماره تماس ثابت: <?= $row['tel'] ?></td>
                </tr>
            </table>
            <?php
            $first=0;
        }
        ?>


    </div>

    <div class="head" style="margin-top: 30px;">
        <h4>انتخاب شیوه ارسال</h4>
    </div>
    <style>

        .send-types{margin-top: 15px;float: right;width: 100%;}
        .send-types table {width: 100%;margin-top: 14px;}

    </style>

    <div class=" send-types">

        <?php
        $posttype=$data['posttype'];
        foreach ($posttype as $row) {
            ?>

            <table data-post-type="<?= $row['id'] ?>" class="table-post" cellspacing="0">
                <tr>
                    <td class="select-post" style="width: 60px;position: relative;cursor: pointer;">
                        <span class="circle"></span>
                    </td>
                    <td style="width: 980px">
                        <img style="float: right;margin-top: 8px;" src="public/images/post_48_icon.png">
                        <div style="float: right;margin-right: 10px;">
                            <p style="font-size: 12pt;margin: 1px 0;"><?= $row['title'] ?></p>
                            <p style="font-size: 10.5pt;color: #56535d;margin: 1px 0;"><?= $row['description'] ?></p>
                        </div>
                    </td>
                    <td>
                        <p style="font-size: 10pt;margin: 1px 0;text-align: center;">هزینه ارسال</p>
                        <p style="font-size: 12pt;margin: 1px 0;color: green;text-align: center;">
                            <span id="post-price<?= $row['id'] ?>"></span>
                            تومان</p>
                    </td>
                </tr>
            </table>

            <?php
        }
        ?>

        <div style="float: left;width: 100%;margin-top: 15px;">
            <a href="showCart3" class="btn-green" style="float: left;background: blue;">دخیره و رفتن به مرحله بعد</a>
        </div>

    </div>



</div>


<script>


    function deleteAddress(id){

        var url='showcart2/deleteaddress/'+id;
        var data={};
        $.post(url,data,function (msg) {

            window.location='showcart2/index';

        })
    }

    getpostprice();

    function getpostprice() {
        var url='showCart2/getpostprice';
        var addresstableactive=$('.table-address.active');
        var cityid=addresstableactive.attr('data-city');
        var addressid=addresstableactive.attr('data-id');
        /*var postid=$('.table-post.active').attr('data-post-type');*/
        var data={'cityid':cityid,'addressid':addressid};
        $.post(url,data,function (msg) {
            console.log(msg);
            var pishtaz=msg['pishtaz'];
            var sefareshi=msg['sefareshi'];
            $('#post-price1').text(pishtaz);
            $('#post-price2').text(sefareshi);
        },'json');
    }


    $('.select-address').click(function () {
        $('.table-address').removeClass('active');
        $(this).parents('.table-address').addClass('active');
        getpostprice();
    });

    $('.select-post').click(function () {
        $('.table-post').removeClass('active');
        $(this).parents('.table-post').addClass('active');
        /*getpostprice();*/
        sessionposttype();
    });

    
    function sessionposttype() {
        var posttypeid=$('.table-post.active').attr('data-post-type');

        var url='showCart2/sessionposttype';
        var data={'posttypeid':posttypeid};
        $.post(url,data,function (msg) {

        });
    }

    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    })

</script>


<script>

    var editaddressid='';

function editaddress(addressid) {
    editaddressid=addressid;
    var url='showCart2/editaddress/'+addressid;
    var data={};
    $.post(url,data,function (msg) {
        //console.log(msg);

        $('input[name=family]').val(msg['family']);
        $('input[name=mobile]').val(msg['mobile']);
        $('input[name=tel]').val(msg['tel']);
        $('textarea[name=address]').val(msg['address']);
        $('input[name=codeposti]').val(msg['codeposti']);

        var ostan=msg['ostan'];
        $('.state option').each(function (index) {
            if ($(this).val()==ostan){
                $(this).attr('selected','selected');
                ldMenu($(this).val(),'city');
                $('.selectpicker').selectpicker('refresh');
            }
        });

        var city=msg['city'];
        $('.city option').each(function (index) {
            if ($(this).val()==city){
                $(this).attr('selected','selected');
                $('.selectpicker').selectpicker('refresh');
            }
        });

        var mahale=msg['mahale'];

        $('#add-address').fadeIn(200);
        $('#dark').fadeIn(100);

    },'json');

}


</script>


    <?php
    require ('addAddress.php')
    ?>
<div id="dark"></div>
</body>
</html>