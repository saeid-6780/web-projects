<?php
$option=model::get_option()
?>



<style>

    #footer{
        height: 300px;
        width: 100%;
        float: right;
        margin-top: 40px;
    }
    #footer-top{
        background: #6d717a none repeat scroll 0 0 ; height: 45px;
    }
    #footer-bottom{
        height: 255px;
        background: #f7f8fa none repeat scroll 0 0;
    }
    #footer .footer-top-content{
        width: 1200px;height: 100%;margin: auto;
    }

    #footer .footer-top-content span {
        color: white;
    }

    .footer-top-content i{
        width: 17px;
        height: 17px;
        display:inline-block;
        margin-left: 5px;
        background: url(public/images/slices.png);
        vertical-align: middle;
    }

    .footer-top-content ul{
        padding: 0;
        float: left;
        height: 100%;
    }
    .footer-top-content ul li{
        float: right; height: 100%;margin-left: 15px;
    }

    .footer-top-content a {
        color: white;
        line-height: 42px;
    }


</style>

<div id="footer">
    <div id="footer-top">
        <div class="footer-top-content">
            <span class="byekan fontmd">۷ روز هفته، ۲۴ ساعته پاسخگوی شما هستیم.</span>
            <ul class="byekan">
                <li>
                    <a>
                        <?= $option['tell'];  ?>
                        <i style="background-position: -397px -420px"></i>
                    </a>
                </li>
                <li>
                    <a>
                        سوالات متدوال
                        <i style="background-position: -358px -420px"></i>
                    </a>
                </li>
                <li>
                    <a>
                        <?= $option['email'];  ?>
                        <i style="background-position: -321px -420px"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <style>
        #footer-bottom .right {width: 220px;height: 100%;float: right}
        #footer-bottom .center {width: 220px;height: 100%;float: right}
        #footer-bottom .left {width: 590px;height: 100%;float: left}
        #footer-bottom .main {width: 1200px;height: 100%;margin: auto;}
        #footer-bottom ul li {font-size: 11.3pt;line-height: 58px}
        #footer-bottom ul li:first-child{font-size: 14pt}
    </style>
    <div id="footer-bottom">
        <div class="main">
            <div class="right byekan">
                <ul>
                    <li>
                        <a>راهنمای خرید از دیجی کالا</a>
                    </li>
                    <li>
                        <a>ثبت سفارش</a>
                    </li>
                    <li>
                        <a>رویه های ارسال سفارش</a>
                    </li>
                    <li>
                        <a>معرفی دیجی بن</a>
                    </li>
                </ul>
            </div>
            <div class="center"style="margin-right: 15px">
                <ul>
                    <li>
                        <a>راهنمای خرید مشتریان</a>
                    </li>
                    <li>
                        <a>ثبت سفارش</a>
                    </li>
                    <li>
                        <a>رویه های ارسال سفارش</a>
                    </li>
                    <li>
                        <a>معرفی دیجی بن</a>
                    </li>
                </ul>
            </div>

            <style>
                #footer-bottom .email input{width: 430px; height:38px;border: 1px solid #ccc;font-family: byekan}
                #footer-bottom .email .btn{width: 110px;height: 38px;display: inline-block; float:left;background: #208de6 none repeat scroll 0 0 ;margin-left: 28px;margin-top: 2px;box-shadow: 0 2px 3px rgba(0,0,0,0.2);text-align: center;color: #fff;line-height:32px ;
                    font-family: byekan;font-size: 10pt;}
                .social{float: left;margin-top: 26px;width: 100%;line-height: 50px;}
                .social img{float: left;margin-left: 5px}
                .social .social-btn{width: 28px;height: 28px; display: block;float: right;background: url(public/images/slices.png); margin-right: 4px ;}
            </style>

            <div class="left">
                <p class="byekan " style="font-size: 14pt">اولین نفری که مطلع می شود باشید!</p>
                <div class="email">
                    <input type="text">
                    <span class="btn">تایید ایمیل</span>
                </div>
                <div class="social">
                    <a>
                        <img src="public/images/android_app_bg.png">
                    </a>
                    <a>
                        <img src="public/images/ios_app_bg.png">
                    </a>
                    <span class="social-btn"style="background-position:-577px -621px;"></span>
                    <span class="social-btn"style="background-position:-453px -621px;"></span>
                    <span class="social-btn"style="background-position:-494px -621px;"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

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


</body>
</html>