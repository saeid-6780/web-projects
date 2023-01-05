<style>
    #details {float: right;width: 100%; background: #fff; box-shadow: 0 1px 3px #eee;margin-top: 5px;}
    #details .right{width: 450px;height: 100%;float: right;}
    #details .share {width: 100%;float: right;padding: 20px 0;}
    #details .share i {background: url(public/images/slices.png) no-repeat;width: 20px;height: 20px;display:inline-block;float: left;margin-left: 6px;}
    #details .gallery {width: 100%;float: right;text-align: center;}
    #details .gallery ul {padding: 0;float: right;width: 100%;margin-top: 20px;}
    #details .gallery ul li{float: left;width: 80px;height: 71px;border: 1px solid #eee;margin-right: 6px;text-align: center;padding-top: 10px;cursor: pointer;}
</style>

<div id="details" >
    <div class="right">
        <div class="share">
            <i class="social" style="background-position: -213px -187px;"></i>
            <i class="addToFavorites" style="background-position: -160px -187px;"></i>
        </div>
        <div class="gallery">
            <img id="zoom-product" src="public/images/products/<?= $productInfo['id'] ?>/product_350.jpg" data-zoom-image="public/images/products/<?= $productInfo['id'] ?>/product.jpg">

            <?php
            require('gallery.php');
            ?>
    <style>
        #details .left{width: 700px;height: 100%;float: left;padding: 20px 0;}
        #details .left .title {font-family: byekan;font-size: 10pt;border-radius: 4px;padding: 8px;background: #eee;}
        #details .left .stars {float: left;margin-left: 15px;margin-top: -2px;}
        .gray {width: 55px;height: 9px;background: url(public/images/stars.png) repeat 0 -9px;margin: 0 auto;position: relative}
        .red {width: 50%;height: 9px;background: url(public/images/stars.png) repeat 0 0px;margin: 0 auto;position: absolute;left: 0;top: 0;}
        #details .left .rate {font-size: 9.5pt;font-family: byekan;float: left; margin-top: 3px;}
        #details .left .right {width: 415px;float: right;}
        #details .left .left {width: 300px;float: left;}
        #details .left .right h4{font-family: byekan;font-size: 10pt}
        #details .left .right .colors{padding: 0;float: right;width: 100%;margin-bottom: 13px;}
        #details .left .right .colors li{width: 46px;height: 28px;float: right;margin-left: 6px;border: 1px solid #ccc;background: #eee;font-size: 9pt;font-family: byekan;padding-right: 32px;padding-top: 6px;position: relative;}
        #details .left .right .colors li .circle {width: 17px;height: 17px;border-radius: 50%;display: block;position: absolute;right: 6px;top:7px;cursor: pointer;}
        #details .left .right .colors li .circle.active::after {content: ""; width: 10px;height: 10px;position: absolute;right: 4px;top:4px;background: url(public/images/slices.png)no-repeat -169px -83px;display: block;}
    </style>
    <div class="left">
        <div class="title">
            <?= $productInfo['title'] ?>
            <div class="stars">
                <div class="gray textcenter">
                    <div class="red"></div>
                </div>
                <span class="rate">4 رای از 85 رای</span>
            </div>
        </div>
        <div class="right">
            <h4>انتخاب رنگ</h4>
            <ul class="colors">
                <?php
                foreach ($productInfo['all_colors'] as $color) {
                    ?>
                    <li>
                        <span data-id="<?= $color['id'] ?>" class="circle" style="background: <?= $color['hex'] ?>;"></span>

<?= $color['title'] ?>
                    </li>
                    <?php
                }
                ?>

            </ul>


            <style>
                #selectlist {
                    width: 390px;
                    height: 37px;
                    border: 1px solid #ccc;
                    background: #eee;
                    position: relative;
                    text-align: center;
                    cursor: pointer;
                    font-family: byekan;
                }

                #selectlist::before {
                    content: " ";
                    width: 23px;
                    height: 23px;
                    display: block;
                    position: absolute;
                    right: 3px;
                    top: 9px;
                    background: url(public/images/slices.png) no-repeat -138px -79px;
                }

                #selectlist::after {
                    content: " ";
                    width: 22px;
                    height: 17px;
                    display: block;
                    position: absolute;
                    left: 3px;
                    top: 13px;
                    background: url(public/images/slices.png) no-repeat -31px -461px;
                }

                #selectlist span {
                    font-size: 9.7pt;
                    line-height: 36px;
                }

                #selectlist ul {
                    padding: 0;
                    box-shadow: 0 2px 2px #cacaca;
                    display: none;
                    background: #fff;

                }

                #selectlist ul li {
                    font-family: yekan;
                    font-size: 10pt;
                    padding: 2px 5px;
                    font-family: byekan;
                }

                #selectlist ul li:hover {
                    background: #f9f9ff;

                }


            </style>

            <h4>انتخاب گارانتی</h4>
            <div id="selectlist">
                <span class="zemanattitle">گارانتی مورد نظرتان را انتخاب کنید</span>
                <ul>
                    <?php
                    foreach ($productInfo['all_gauranty'] as $gauranty) {
                        ?>
                        <li data-id="<?= $gauranty['id'] ?>"><?= $gauranty['title'] ?></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <style>
                #price{float: right;width: 100%;margin-top: 40px;}
                #price .discount {width: 135px;height: 22px;display: block;float: left;font-family: byekan;font-size: 9pt;margin-left: 110px;margin-top: 5px;}
                .discount-right{width: 50px;height: 100%;float: right;display: block;background: red;color: #fff;text-align: center;}
                .discount-left{width: 85px;height: 100%;float: right;display: block;background: #ef4d5b;color: #fff;text-align: center;}
            </style>
            <div id="price">
                <span class="byekan" style="font-size: 9pt;">قیمت</span>
                <span class="byekan"style="font-size: 11pt;text-decoration: line-through"><?= $productInfo['price']; ?></span>
                <span class="byekan" style="font-size: 9pt;">تومان</span>
                <span class="discount">
                            <span class="discount-right">تخفیف</span>
                            <span class="discount-left"><?= $productInfo['price_discount']; ?> تومان</span>
                        </span>
            </div>
            <style>
                #priceForYou {float: right;width: 100%;margin-top: 30px;}
                #compare {float: right;width: 100%;margin-top: 30px;}
                #compare .compare-btn {width: 155px;height: 40px;background: #ccc;border-radius: 4px;float: right;display: block;font-size: 12.4pt;color: #fff;text-align: center;cursor: pointer;box-shadow: 0 2px 3px 0 rgba(0,0,0,0.15);cursor: pointer;}
                #compare .addToCard-btn {width: 210px;height: 40px;background: green;border-radius: 4px;float: right;display: block;margin-right: 7px;font-size: 12.4pt;overflow: hidden;text-align: center;cursor: pointer;box-shadow: 0 2px 3px 0 rgba(0,0,0,0.15);}
                #compare .addToCard-btn i{width:34px ;height:100% ;float: right;display: block;background: #1ac400 url(public/images/slices.png) no-repeat -153px -412px}
                .horizental-row {height: 1px;background: #ccc;margin:15px ;width: 88%;float: right;}
            </style>
            <div id="priceForYou">
                <span class="byekan" style="font-size: 12.5pt">قیمت برای شما</span>
                <span class="byekan" style="font-size: 13.5pt;color: #0f0;"><?= $productInfo['price_total']; ?></span>
                <span class="byekan" style="font-size: 9pt">تومان</span>
            </div>
            <div id="compare">
                <span class="compare-btn byekan">مقایسه کن</span>
                <span style="cursor: pointer;" class="addToCard-btn byekan" onclick="addToBasket(<?= $productInfo['id'] ?>)">افزودن به سبد خرید
                            <i></i>
                        </span>
            </div>
            
            <script>

                var gauranty_selected='';

                function addToBasket(productiid) {
                    var color=$('.colors').find('.circle.active').attr('data-id');
                    var url='<?= URL ?>product/addtobasket/'+productiid+'/'+color+'/'+gauranty_selected;
                    var data={};
                    $.post(url,data,function (msg) {
                        alert(msg);
                    });
                }
            </script>
            
        </div>

        <div class="left"></div>

        <div class="horizental-row"></div>
        <style>

            #services-feature {
                width: 695px;
                height: 76px;
                background: #fff;
                box-shadow: 0 5px 3px rgba(0, 0, 0, 0.3);
                border-radius: 4px;
                margin: 6px 0;
                overflow: hidden;
            }

            #services-feature ul {
                padding: 0;
                height: 100%;
            }

            #services-feature ul li {
                width: 139px;
                height: 100%;
                float: right;
                cursor: pointer;
                color: #798a8c;
            }

            #services-feature ul li a {
                height: 100%;
                display: block;
                line-height: 72px;
                padding: 0 10px;
            }

            .activetopnav {
                color: black;
            }

            #services-feature ul li a i {
                width: 40px;
                height: 40px;
                display: inline-block;
                background: url(public/images/slices.png) no-repeat;;
                margin-left: 8px;
                float: right;
                margin-top: 20px
            }

        </style>
        <div id="services-feature">
            <ul class="byekan fontsm">
                <li>
                    <a>
                        <i style="background-position: -312px -473px ;"></i>
                        تحویل اکسپرس
                    </a>
                </li>
                <li>
                    <a>
                        <i style=" background-position: -208px -473px ;"></i>
                        7 روز ضمانت بازگشت
                    </a>
                </li>
                <li>
                    <a>
                        <i style="background-position: -262px -473px ;"></i>
                        پرداخت در محل
                    </a>
                </li>
                <li>
                    <a>
                        <i style="background-position: -102px -473px ;"></i>
                        تضمین بهترین قیمت
                    </a>
                </li>
                <li>
                    <a>
                        <i style="background-position: -156px -473px ;"></i>
                        ضمانت اصل بودن کالا
                    </a>
                </li>
            </ul>

        </div>

    </div>

</div>

<Script>
    $('#selectlist').click(function () {
        var ulTag=$('ul ', this);
        ulTag.slideToggle(200);
    });

    $('#selectlist ul li').click(function () {
        gauranty_selected=$(this).attr('data-id');
        var zemanattxt=$(this).text();
        $('#selectlist .zemanattitle').text(zemanattxt);

    });

    $('#details .left .right .colors li ').click(function () {
        $('.circle').removeClass('active');
        $('.circle' , this).toggleClass('active');
    })
</Script>