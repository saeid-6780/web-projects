<style>
    #slider2 {
        width: 890px;
        height: 380px;
        background: #fff;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.19);
        margin-top: 8px;
        position: relative;
    }

    #slider2-content {
        width: 705px;
        height: 100%;
        float: right;
        background: url(public/images/slider2_bg.jpg) no-repeat;
    }

    #slider2-navigator {
        width: 184px;
        height: 100%;
        border-right: 1px solid #ccc;
        float: left;
        background: #eee;
    }

    #slider2-navigator ul li a {
        display: block;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 10pt;
        line-height: 38px;
        cursor: pointer;
    }

    #slider2-content a {
        display: block;
        height: 100%
    }

    #slider2-navigator ul {
        padding: 0;
    }

    .slider2-content-right {
        width: 400px;
        height: 100%;
        float: right
    }

    .slider2-content-left {
        width: 305px;
        height: 100%;
        float: left
    }

    .slider2-content-left img {
        width: 220px;
        margin-right: 40px;
    }

    .slider2-content-left p {
        text-align: center;
        font-size: 15pt;
    }

    .slider2-content-right .title {
        color: red;
        font-family: byekan;
        font-size: 14pt;
        padding-right: 30px;
        padding-top: 15px;
    }

    .slider2-content-right .price-info {
        height: 35px;
        margin-right: 30px;
    }

    .slider2-content-right .price-info-old {
        width: 75px;
        height: 100%;
        background: #ccc;
        float: right;
        position: relative;
        margin-left: 2px;
        color: #fff;
        text-align: center;
        font-size: 20pt;
        line-height: 29px;
    }

    .slider2-content-right .price-info-old::after {
        content: " ";
        position: absolute;
        top: 9px;
        left: -11px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 12px 8px 0;
        border-color: transparent #cccccc transparent transparent;
        z-index: 2;
    }

    .slider2-content-right .price-info-old::before {
        content: "";
        top: 17px;
        right: 5px;
        width: 90%;
        height: 0;
        position: absolute;
        border-top: 1px solid #000;
        transform: rotate(-23deg);

    }

    .slider2-content-right .price-info-new {
        width: 190px;
        height: 100%;
        background: red;
        float: right;
        position: relative;
        color: #fff;
        text-align: center;
        font-size: 20pt;
        line-height: 29px;
    }

    .slider2-content-right .price-info-new::before {
        content: " ";
        position: absolute;
        top: 9px;
        right: 0px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 12px 8px 0;
        border-color: transparent #ffffff transparent transparent;
    }

    #slider2-timer, #slider2-timer div {
        direction: ltr;

    }

    #slider2-timer {
        transform: scale(0.3);
        position: absolute;
        top: 190px;
        right: -142px;
    }

    .slider2Finish {
        width: 705px;
        height: 100%;
        background: rgba(0, 0, 0, 0.01);
        font-family: byekan;
        text-align: center;
        position: absolute;
        top: 0;
        right: 0px;
        color: red;
        font-size: 35pt;
        line-height: 265px;
        display: none;
        z-index: 2;
    }

    #slider2-navigator .active {
        background: #fb2621;
        color: #fff;
        position: relative;

    }

    #slider2-navigator .active::after {
        content: "";
        position: absolute;
        right: -17px;
        top: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 19px 0 19px 17px;
        border-color: transparent transparent transparent #fb2521;
    }

</style>
<div id="slider2">
    <div id="slider2-timer" class="flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>

    </div>
    <div class="slider2Finish">
        تمام شد!
    </div>
    <div id="slider2-content">

        <?php
        foreach ($data[1] as $row) {
            ?>

            <a class="byekan item" href="<?= URL; ?>product/index/<?= $row['id']; ?>">
                <div class="slider2-content-right">
                    <p class="title">پیشنهاد شگفت انگیز امروز</p>
                    <div class="price-info">
                        <div class="price-info-old byekan "><?= $row['price']; ?></div>
                        <div class="price-info-new byekan "><?= $row['price_total']; ?> هزار تومان</div>
                        <p class="byekan fontsm" style="float: right; width: 100%; margin: 2px;">پشتیبانی از دو سیم
                            کارت و شبکه 3G</p>
                        <p class="byekan fontsm" style="float: right; width: 100%; margin: 2px;">پشتیبانی از کارت
                            حافظه جانبی</p>
                        <p class="byekan fontsm" style="float: right; width: 100%; margin: 2px;">مجهز به اندروید
                            لالی پاپ</p>

                    </div>
                </div>
                <div class="slider2-content-left">
                    <p><?= $row['title']; ?></p>
                    <img src="public/images/products/<?= $row['id']; ?>/product_220.jpg"></div>
            </a>

            <?php
        }
        ?>

    </div>
    <div id="slider2-navigator">
        <ul class="byekan">

            <?php
            foreach ($data[1] as $row) {
            ?>

            <li>
                <a>
                    <?= $row['title'] ?>
                </a>
            </li>
            <?php } ?>

        </ul>
    </div>

    <script>

        $('.flipTimer').flipTimer({
            direction: 'down',
            date: '<?php echo $data[2]; ?>',
            callback: function () {
                $('.slider2-content-right').css('opacity', 0.4);
                $('.slider2-content-left').css('opacity', 0.4);
                $('.slider2Finish').fadeIn(200);
            }

        });

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

    </script>