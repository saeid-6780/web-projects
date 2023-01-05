
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{width: 1150px; margin:10px auto ; padding: 25px;background: #fff;padding: 6px;font-family: byekan;}
    .orderSteps {padding-right: 160px;padding-top: 50px;height: 100px;}
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
            <li>
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
        .content .right{width: 540px;float: right}
        .content .right i{width: 48px;height:54px;margin: auto;display: block;background: url(public/images/slices.png)no-repeat -795px -22px; }
        .content .left{width: 540px;float: right;margin-right:20px; }
        .content .left i{width: 48px;height:54px;margin: auto;display: block;background: url(public/images/slices.png)no-repeat -795px -90px; }
        .content p{text-align: center;}
        .btn-green{display: block;width:170px;height:37px;background:#36be2b;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;margin: auto;}
        .btn-blue{display: block;width:170px;height:37px;background:#464aff;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;margin: auto;}

    </style>
    <div class="content">
        <div class="right">
            <i></i>
            <p style="font-size: 12pt;">عضو دیجی کالا هستید؟</p>
            <p style="font-size: 10.5pt;margin-top: 2px;">جهت تکمیل خرید وارد شوید</p>
            <p>
                <a href="login" class="btn-green">ورود به دیجی کالا</a>
            </p>
        </div>
        <div class="left">
            <i></i>
            <p style="font-size: 12pt;">هنوز عضو نشده اید؟</p>
            <p style="font-size: 10.5pt;margin-top: 2px;">جهت خرید باید ثبت نام کنید</p>
            <p>
                <a href="register" class="btn-blue"> ثبت نام در دیجی کالا</a>
            </p>
        </div>
    </div>
</div>


<script>

    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    })

    $('#tab li').click(function () {
        $('#tabChild section').hide();
        $('#tab li').removeClass('active');
        var index=$(this).index();
        $('#tabChild section').eq(index).fadeIn(300);
        $(this).addClass('active');

    })

    $('#introduction .more').click(function () {
        $('#introduction').toggleClass('active')
    });

    $('#selectList').click(function () {
        var ulTag=$('ul ', this);
        ulTag.slideToggle(200);
    });

    $('#selectList ul li').click(function () {
        var zemanattxt=$(this).text();
        $('#selectList .zemanattitle').text(zemanattxt);

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

    $('.flipTimer').flipTimer({
        direction: 'down',
        date: 'june 18, 2017 16:56:0',
        callback: function () {
            $('.slider2-content-right').css('opacity', 0.4);
            $('.slider2-content-left').css('opacity', 0.4);
            $('.slider2Finish').fadeIn(200);
        }

    });

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

