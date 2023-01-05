
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{width: 1150px; margin:10px auto ; padding: 5px;background: #fff;}
    .head{float: right;width: 100%;margin-top: 36px;}
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

    .orderSteps {padding-right: 160px;padding-top: 50px;height: 100px;font-family: byekan;}
    .orderSteps .dashed{float: right;}
    .orderSteps .dashed span{width: 11px;height: 3px;background: blue;display: block;float: right;margin-left: 3px;}
    .orderSteps ul{padding: 0;}
    .orderSteps ul li{position: relative;width: 180px;float: right;height: 2px;right: -20px;}
    .orderSteps ul li .circle{width: 19px;height: 19px;display: block;border: 3px solid #ccc;border-radius: 50%;position: absolute;top: -12px;right: 25px;}
    .orderSteps ul li.active .circle{border: 3px solid #2396f3;background:#2396f3 url(public/images/slices.png)no-repeat -810px -476px ; }
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
            <li class="active">
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


    <div class="head">
        <h4>سبد خرید شما در دیجی کالا</h4>
        <a href="showCart4" class="btn-green">
          ادامه خرید
        </a>
    </div>

    <style>
        .selectList{width: 100px;height: 37px; border: 1px solid #ccc;background: #eee;position: relative;text-align: center;cursor: pointer;margin: auto;}
        .selectList::after{content: "";width: 22px;height: 17px;display: block;position: absolute;left: 3px;top: 11px;background: url(public/images/slices.png)no-repeat -31px -461px;}
        .selectList span {font-size: 9.7pt;font-family: byekan;line-height: 36px;}
        .selectList ul{padding: 0;box-shadow: 0 2px 2px #cacaca;display: none;z-index: 2;background: #fff;}
        .selectList ul li{font-family: byekan;font-size: 10pt;padding: 2px 5px;}
        .selectList ul li:hover{background: #ebf1f4;}
        .content table .price {font-size: 12pt;}
        .content table .tooman {font-size: 11pt;}
        .content table .editTd{background: #c4e5ff;cursor: pointer;}
        .content table .editIcon{width: 15px;height: 15px;background: url(public/images/slices.png) no-repeat -811px -414px;display: block;margin: auto;}
    </style>
    <div class="content">
        <table cellspacing="0">
            <tr>
                <td>شرح محصول</td>
                <td>تعداد</td>
                <td>قیمت واحد</td>
                <td style="border-left: 0;">قمیت کل</td>
                <td></td>
            </tr>
            <?php
            $basketinfo=$data['basketinfo'];
            $basket=$basketinfo[0];
            foreach ($basket as $row) {
                ?>
                <tr>
                    <td>
                        <div class="right">
                            <img src="public/images/products/<?= $row['id'] ?>/product_220.jpg">
                        </div>
                        <div class="left">
                            <p><?= $row['title'] ?></p>
                            <p>رنگ: <?= $row['colortitle'] ?></p>
                            <p>گارانتی <?= $row['gaurantytitle'] ?></p>
                        </div>
                    </td>
                    <td>
                            <span class="zemanattitle"><?= $row['tedad'] ?></span>

                    </td>
                    <td>
                        <span class="price"><?= $row['price'] ?></span>
                        <span class="tooman">تومان</span>
                    </td>
                    <td>
                        <span class="price"><?= $row['tedad']*$row['price'] ?></span>
                        <span class="tooman">تومان</span>
                        <br>
                        <span style="color: red"><?= $row['discounttotal'] ?></span>
                        <span class="tooman">تومان</span>
                    </td>
                    <a href="showCart">
                    <td class="editTd">
                        <i class="editIcon"></i>
                    </td>
                    </a>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <style>
        #final-price {width: 600px;float: left;font-family: byekan;margin-top: 50px;border: 1px solid greenyellow;padding: 10px;}
        #total-price,#send-price,#discount-price{border-bottom: 1px solid greenyellow;float: right;padding: 5px 2px;width: 100%}
        #pardakht-price{float: right;padding: 5px 2px;width: 100%}
        .tprice1{float: right;color: black;font-size: 10pt;}
        .tprice2{float: right;color: black;font-size: 12pt;margin-right: 395px;}
        .tprice3{float: right;color: black;font-size: 9pt;margin-right: 10px;margin-top: 3px;}
    </style>
    <div id="final-price">
        <div id="total-price">
            <span class="tprice1">جمع کل خرید شما: </span>
            <span class="tprice2"><?php echo $basketinfo[1];?></span>
            <span class="tprice3">تومان</span>
        </div>
        <div id="send-price" >
            <span class="tprice1">هزینه ارسال، بسته بندی و بیمه</span>
            <span class="tprice2" style="margin-right:329px;"><?= $data['postprice'];?></span>
            <span class="tprice3">تومان</span>
        </div>
        <div id="discount-price" >
            <span class="tprice1">جمع کل مبلغ تخفیف</span>
            <span class="tprice2" style="margin-right:387px;"><?= $basketinfo[2];?></span>
            <span class="tprice3">تومان</span>
        </div>
        <div id="pardakht-price">
            <span style="color: #1fa900" class="tprice1">مبلغ قابل پرداخت </span>
            <span style="color: #1fa900;font-size: 14pt;" class="tprice2"><?= $basketinfo[1]+ $data['postprice']-$basketinfo[2];?></span>
            <span style="color: #1fa900" class="tprice3">تومان</span>
        </div>

    </div>

    <div class="head">
        <h4>اطلاعات ارسال سفارش</h4>

    </div>

    <style>

        .review-send-info{width: 100%;float: right;margin-top: 30px;font-size: 11pt;font-family: byekan;}
        .review-send-info td{border-right: 1px solid #eee;border-bottom:1px solid #eee;padding: 5px; }
        .review-send-info tr:first-child td{border-top: 1px solid #eee;}
        .review-send-info tr td:last-child{border-left: 1px solid #eee;}
        .review-send-info td i{width: 29px;height: 29px;background: url(public/images/slices.png)no-repeat;display: block;}
    </style>
    <table class="review-send-info" cellspacing="0">

        <?php
        $addressinfo=$data['addressinfo'];
        ?>

        <tr>
            <td>
                <i style="background-position: -810px -205px"></i>
            </td>
            <td>
                سفارش به
                <?= $addressinfo['family'] ?>
                به آدرس
                <?= $addressinfo['address'] ?>
              و شماره تماس
                <?= $addressinfo['mobile'] ?>
                تحویل می گردد
            </td>
        </tr>
        <tr>
            <td>
                <i style="background-position: -806px -250px;"></i>
            </td>
            <td>سفارش از طریق
                <?php
$posttype=$data['posttype'];
                if ($posttype==1){
                    echo 'پست پیشتاز';
                }else{
                    echo 'پست سفارشی';
                }
?>
                با هزینه
                قابل محاسبه
                به شما تحویل می گردد</td>
        </tr>
    </table>

    <div style="float: left;width: 100%;margin-top: 50px;">
        <a href="showCart2" style="float: left;background: #93918d;" class="btn-green"> ویرایش</a>
    </div>
    <div style="float: left;width: 100%;margin-top: 50px;">
        <span style="float: right;background: #9597a1" class="btn-green">< بازگشت به مرحله قبل </span>
        <a href="showCart4" style="float: left" class="btn-green"> ادامه خرید ></a>
    </div>


</div>


<script>

    $('.selectList').click(function () {
        var ulTag=$('ul ', this);
        ulTag.slideToggle(200);
    });

    $('.selectList ul li').click(function () {
        var zemanattxt=$(this).text();
        $('.selectList .zemanattitle').text(zemanattxt);

    });

    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    })

    $('#selectList').click(function () {
        var ulTag=$('ul ', this);
        ulTag.slideToggle(200);
    });

    $('#details .left .right .colors li ').click(function () {
        $('.circle').removeClass('active');
        $('.circle' , this).addClass('active');
    })

</script>

<script>

    $("#product-gallery .gleft").mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        setTop: 0,
        setLeft: 0,
        axis: "y",
        scrollbarPosition: "inside",
        scrollInertia: 950,
        autoDraggerLength: true,
        autoHideScrollbar: false,
        autoExpandScrollbar: false,
        alwaysShowScrollbar: 0,
        snapAmount: null,
        snapOffset: 0,
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y",
            preventDefault: false,
            deltaFactor: "auto",
            normalizeDelta: false,
            invert: false,
            disableOver: ["select", "option", "keygen", "datalist", "textarea"]
        },
        scrollButtons: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        keyboard: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        contentTouchScroll: 25,
        advanced: {
            autoExpandHorizontalScroll: false,
            autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
            updateOnContentResize: true,
            updateOnImageLoad: true,
            updateOnSelectorChange: false,
            releaseDraggableSelectors: false
        },
        theme: "3d-dark",

        callbacks: {
            onInit: false,
            onScrollStart: false,
            onScroll: false,
            onTotalScroll: false,
            onTotalScrollBack: false,
            whileScrolling: false,
            onTotalScrollOffset: 0,
            onTotalScrollBackOffset: 0,
            alwaysTriggerOffsets: true,
            onOverflowY: false,
            onOverflowX: false,
            onOverflowYNone: false,
            onOverflowXNone: false
        },
        live: false,
        liveSelector: null

    });





    function sliderScrollNumbers(itemNum) {
        if (itemNum < 5) {
            return 1;
        }
        else {
            return (itemNum - 4);
        }
    }
    function sliderscroll(direction, tag) {
        var spanTag = $(tag);
        var sliderscrolltag = spanTag.parents('.sliderscroll');
        var sliderscrollUL = sliderscrolltag.find('.sliderscroll-main ul');
        var sliderscrollItems = sliderscrollUL.find('li');
        var sliderscrollItemsNumbers = sliderscrollItems.length;
        var maxNegativeMargin = (sliderScrollNumbers(sliderscrollItemsNumbers) - 1) * -208;
        sliderscrollUL.css('width', sliderscrollItemsNumbers * 208);
        var marginrightnew = sliderscrollUL.css('margin-right');
        marginrightnew = parseFloat(marginrightnew);
        if (direction == 'left') {
            marginrightnew = marginrightnew - 208;
        }
        else if (direction == 'right') {
            marginrightnew = marginrightnew + 208;
        }
        if (marginrightnew < maxNegativeMargin) {
            marginrightnew = 0;
        }
        if (marginrightnew > 0) {
            marginrightnew = maxNegativeMargin;
        }
        sliderscrollUL.animate({'marginRight': marginrightnew}, 1000)
    }

    /*$('.sliderscroll-next').click(function () {
     sliderscroll('left');
     })
     $('.sliderscroll-prev').click(function () {
     sliderscroll('right');
     })*/

    $

    var slidertag = $('#slider');
    var slideritem = slidertag.find('.item');
    var nextslide = 1;
    var numitems = slideritem.length;
    var slidernavigator = slidertag.find('#slider-navigator ul li')
    function slider() {
        if (nextslide > numitems) {
            nextslide = 1;
        }
        if (nextslide < 1) {
            nextslide = numitems;
        }
        slideritem.hide();
        slideritem.eq(nextslide - 1).fadeIn(200);
        slidernavigator.removeClass('active');
        slidernavigator.eq(nextslide - 1).addClass('active');
        nextslide++;
    }
    function goToNext() {
        slider();
    }

    $('#slider #next').click(function () {
        clearInterval(topslidertimer);
        goToNext();
    })

    function goToPrev() {
        nextslide = nextslide - 2;
        slider();
    }

    $('#slider #prev').click(function () {
        clearInterval(topslidertimer);
        goToPrev();
    })

    function goToSlide(index) {

        nextslide = index;
        slider();
    }

    $('#slider #slider-navigator ul li').hover(function () {
        clearInterval(topslidertimer);
        var index = $(this).index();
        goToSlide(index + 1);
    }, function () {

    })

    $('#services-feature ul li a').hover(function () {
        $(this).addClass('activetopnav');
    }, function () {
        $(this).removeClass('activetopnav');
    })

    var timeout = 5000;
    slider();
    var topslidertimer = setInterval(slider, timeout);

    slidertag.mouseleave(function () {
        clearInterval(topslidertimer);
        topslidertimer = setInterval(slider, timeout);
    })

    /*main-slider*/


    var slidertag2 = $('#slider2');
    var slideritem2 = slidertag2.find('.item');
    var nextslide2 = 1;
    var numitems2 = slideritem2.length;
    var slidernavigator2 = slidertag2.find('#slider2-navigator ul li')
    function slider2() {
        if (nextslide2 > numitems2) {
            nextslide2 = 1;
        }
        if (nextslide2 < 1) {
            nextslide2 = numitems2;
        }
        slideritem2.hide();
        slideritem2.eq(nextslide2 - 1).fadeIn(200);
        slidernavigator2.removeClass('active');
        slidernavigator2.eq(nextslide2 - 1).addClass('active');
        nextslide2++;
    }

    function goToSlide2(index) {

        nextslide2 = index;
        slider2();
    }

    $('#slider2 #slider2-navigator ul li').click(function () {
        clearInterval(topslidertimer2);
        var index = $(this).index();
        goToSlide2(index + 1);
    })

    var timeout2 = 5000;
    slider2();
    var topslidertimer2 = setInterval(slider2, timeout);

    slidertag2.mouseleave(function () {
        clearInterval(topslidertimer2);
        topslidertimer2 = setInterval(slider2, timeout);
    })

    /*slider2*/

    var timer = [];
    $('#menu_top li').hover(function () {
        var tag = $(this);
        var timerAttr = tag.attr('data-time');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $('>ul', tag).fadeIn(0);
            tag.addClass('active-menu');
            $('>.submenu3', tag).fadeIn(0);
        }, 500)

    }, function () {
        var tag = $(this);
        var timerAttr = tag.attr('data-time');
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $('>ul', tag).fadeOut(0);
            tag.removeClass('active-menu');
            $('>.submenu3', tag).fadeOut(0);
        }, 500)
    })

</script>

