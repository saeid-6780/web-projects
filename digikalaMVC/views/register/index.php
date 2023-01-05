
<style>
    #main{
        width: 1200px;height: 500px; margin:10px auto ; background: #fff; box-shadow: 0 1px 3px #eee;
    }
    #main .header {height: 160px; width: 100%;background:#fafcfc ;text-align: center;padding-top: 15px}
    .header i{width: 70px;height: 52px;background: url(public/images/slices.png) no-repeat;background-position: -870px -88px;display: block;margin: auto}
    .header h2{font-size: 14pt;font-family: byekan;text-align: center;color: #979996}
    .header .right{width: 50%;float: right;}
    .header .left{width: 40%;float: right;padding-top: 32px;line-height: 52px}
    .header .right{padding-right: 40px;padding-top: 32px;}
    .header input {width: 250px;height: 30px;border: 1px solid #eee;}
    .header label {font-family: byekan;font-size:10.5pt;width: 150px;display: inline-block }
    .header .right , .left > div {margin-top: 25px;font-size: 10.3pt;font-family: byekan;line-height: 57px;color: #979996}
    .header .btn{width: 110px;height: 38px;display: inline-block; float:left;background: #208de6 none repeat scroll 0 0 ;margin-left: 28px;margin-top: 2px;box-shadow: 0 2px 3px rgba(0,0,0,0.2);text-align: center;color: #fff;line-height:32px ;
        font-family: byekan;font-size: 10pt;}
    .header .check-label{width: 14px !important;height: 14px;display: block;position: absolute;right: 4px;top: 18px;border: 1px solid #eeeeee;}
    .checked{background: url(public/images/slices.png) #595cef no-repeat -193px -81px;border: none;
    }
    .check-div .check-input{width: auto;height: auto;position: relative;z-index: 2;opacity: 0;cursor: pointer;margin-left: 30px;}
</style>

<div id="main">
    <div class="header">
        <i></i>
        <h2>به دیجی کالا بپیوندید!</h2>
        <div class="right">
            <div>
                <label>پست الکترونیک</label>
                <input type="text">
            </div>
            <div>
                <label>رمز عبور</label>
                <input type="password">
            </div>
            <div class="check-div" style="position: relative">
                <label class="check-label"></label>
                <input class="check-input" type="checkbox">
                قوانین را مطالعه نموده ام و موافقم
            </div>
            <div class="check-div" style="position: relative">
                <label class="check-label"></label>
                <input class="check-input" type="checkbox">
                خبرنامه را برای من ارسال کن
            </div>
            <div>
            <span class="btn">
                ثبت نام
            </span>
            </div>
        </div>

        <script>
            $('.check-input').click(function () {
                if($(this).is(':checked')){
                    $(this).parents('.check-div').find('.check-label').addClass('checked')

                }
                else{
                    $(this).parents('.check-div').find('.check-label').removeClass('checked')
                }
            })
        </script>

        <style>
            .header .left ul{padding: 0;font-family: byekan;font-size: 10.6pt;color: #979996}
            .header .left li i {width: 27px;height: 27px;display: inline-block;background: url(public/images/slices.png) no-repeat;vertical-align: middle;margin-left: 21px;color: white}
        </style>
        <div class="left">
            <ul>
                <li>
                    <i style="background-position: -980px -330px"></i>
                    سریع تر و ساده تر خرید کنید
                </li>

                <li>
                    <i style="background-position: -980px -286px"></i>
                    به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید
                </li>
                <li>
                    <i style="background-position: -980px -243px"></i>
                    لیست علاقه مدی های خود را بسازید و تغییرات آنها را دنبال کنید
                </li>
                <li>
                    <i style="background-position: -980px -202px"></i>
                    نقد، بررسی و نظرات خود را با دیگران به اشتراک گذارید
                </li>
                <li>
                    <i style="background-position: -980px -163px">%</i>
                    در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید
                </li>

            </ul>
        </div>
    </div>

</div>


<script>


    function sliderScrollNumbers(itemNum) {

        if (itemNum < 4) {
            return 1;
        }
        else {
            return (itemNum - 3);
        }
    }
    function sliderscroll(direction, tag) {
        var spanTag = $(tag);
        var sliderscrolltag = spanTag.parents('.sliderscroll');
        var sliderscrollUL = sliderscrolltag.find('.sliderscroll-main ul');
        var sliderscrollItems = sliderscrollUL.find('li');
        var sliderscrollItemsNumbers = sliderscrollItems.length;
        var maxNegativeMargin = (sliderScrollNumbers(sliderscrollItemsNumbers) - 1) * -192;
        sliderscrollUL.css('width', sliderscrollItemsNumbers * 195);
        var marginrightnew = sliderscrollUL.css('margin-right');
        marginrightnew = parseFloat(marginrightnew);
        if (direction == 'left') {
            marginrightnew = marginrightnew - 192;
        }
        else if (direction == 'right') {
            marginrightnew = marginrightnew + 192;
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

