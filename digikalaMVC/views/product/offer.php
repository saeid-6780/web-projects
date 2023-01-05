<style>
    #offer{height: 60px;background: #fff5f5 url(public/images/amazing-offer.png) no-repeat 97% center;position: relative}
    #slider2-timer, #slider2-timer div {
        direction: ltr;

    }

    #slider2-timer {
        transform: scale(0.3);
        position: absolute;
        top: -19px;
        left: -161px;
    }
    #offer .discount {width: 180px;height: 28px; display: block;position: absolute;top:16px ;left:180px ;border-radius: 3px;overflow: hidden;}
    #offer .discount .right{width: 105px;height: 100%;display: block;float: right;background: red;}
    #offer .discount .left{width: 75px;height: 100%;display: block;float: right;background: #e54949;font-family: byekan;color: #fff;font-size: 10pt;line-height: 20px;text-align: center;}
    #offer .discount .right .number{color: #fff;font-size: 16pt;font-family: byekan;line-height: 22px;float: right;padding-right: 10px;}
    #offer .discount .right .tooman{color: #fff;font-size: 9pt;font-family: byekan;width: 40px;display: inline-block;line-height: 13px;float: left;margin-left: 5px;}

</style>


    <div id="offer">
            <span class="discount">
                <span class="right">
                    <span class="number"><?= $productInfo['price_discount'] ?></span>
                    <span class="tooman">تومان</span>
                </span>
                <span class="left">تخفیف</span>
            </span>
        <div id="slider2-timer" class="flipTimer">
            <div class="hours"></div>
            <div class="minutes"></div>
            <div class="seconds"></div>

        </div>
    </div>

    <script>
        $('.flipTimer').flipTimer({
            direction: 'down',
            date: '<?= $productInfo['date_special']; ?>',
            callback: function () {
                $('.slider2-content-right').css('opacity', 0.4);
                $('.slider2-content-left').css('opacity', 0.4);
                $('.slider2Finish').fadeIn(200);
            }

        });
    </script>