<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <title>فروشگاه اینترنتی دیجی کالا</title>
    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/jquery.flipTimer.js"></script>
    <link href="public/css/flipTimer.css" rel="stylesheet">
</head>
<body style="margin: 0;background: #<?= body_color ?>">

<style>
    @font-face {
        font-family: 'byekan';
        src: url('public/fonts/BYekan.otf?#iefix') format('embedded-opentype'),
        url('public/fonts/BYekan.ttf') format('truetype');
    }

    div, span, p, a, li, ul {
        text-align: right;
        direction: rtl
    }

    a {
        text-decoration: none
    }

    .byekan {
        font-family: byekan
    }

    .fontsm {
        font-size: 10.3pt
    }

    .fontmd {
        font-size: 11.3pt
    }

    .fontlg {
        font-size: 12.3pt
    }

    .error {border: 1px solid red; font-size: 12pt; color: red; font-family: yekan;padding: 8px;text-align: center}
    .success {border: 1px solid green; font-size: 12pt; color: green; font-family: yekan;padding: 8px;text-align: center}

    .row2{width: 100%;float: right;margin-bottom: 10px;}

    .btn_green {
        background: #36be2b none repeat scroll 0 0;
        box-shadow: 1px 1px 3px #ccc;
        color: #fff;
        display: inline-block;
        font-family: yekan;
        font-size: 11pt;
        height: 37px;
        line-height: 34px;
        text-align: center;
        width: 170px;
        border-radius: 4px;
        cursor: pointer;
    }

</style>

<header style="background:#fff; ">

    <div class="byekan fontmd" id="header" style="width: 1200px;height: 100px;margin:0 auto;padding-top: 15px">
        <div id="header_right" style="width: 720px; height: 100px;float: right">
            <div id="header_right_top" style="height: 40px;">

                <?php
                Model::sessionInit();
                $userid=Model::sessionGet('userid');
                if ($userid==false) {
                    ?>

                    <span
                        style="width: 20px;height: 20px;background: url(public/images/locked-padlock-logo.png);display: block;float: right"></span>
                    <a href="<?= URL ?>login" style="float: right;margin-right: 10px">فروشگاه اینترنتی دیجی کالا، وارد
                        شوید</a>
                    <span
                        style="width: 20px;height: 20px;background: url(public/images/user-logo.png);display: block;float :right;margin-right: 20px"></span>
                    <a href="<?= URL ?>sabt" style="float: right;margin-right: 10px">ثبت نام کنید</a>

                    <?php
                }else{
                ?>

                    <span
                        style="width: 20px;height: 20px;background: url(public/images/locked-padlock-logo.png);display: block;float: right"></span>
                    <a  style="float: right;margin-right: 10px">خوش آمدید</a>
                    <span
                        style="width: 20px;height: 20px;background: url(public/images/user-logo.png);display: block;float :right;margin-right: 20px"></span>
                    <a href="<?= URL ?>panel" style="float: right;margin-right: 10px">مشاهده پیام کاربری</a>
                    <a href="<?= URL ?>panel/logout" style="float: right;margin-right: 10px">خروج</a>

                    <?php
                }
                ?>

            </div>
            <div id="header_right_buttom" style="height: 50px">
                <div id="basket" style="width: 190px;height: 40px;float: right;">
                    <div id="basket-right"
                         style="width: 54px;height: 100%;background: #67b92c url(public/images/basket-logo.png) no-repeat center ;float: right;"></div>
                    <div id="basket-left"
                         style=" width: 96px;height: 100%; background:#38a24f;float: right;padding: 0 20px;line-height: 40px">
                        <span class="byekan fontsm" style="color: #010201; ">سبد خرید</span>
                        <span style="width: 25px;height: 25px;display: block;text-align: center;background: #eee;float: left;margin-top: 7px;line-height: 25px;border-radius: 100%">0</span>
                    </div>
                </div>

                <div id="search" style="width: 480px;height: 40px;float: right;margin-right: 20px;position: relative">
                    <input class="byekan fontmd" type="text"
                           style=" width: 480px;height: 32px;margin-top: 2px;border: 1px solid #eee;padding-right: 10px;color: #1f451f"
                           placeholder="محصول، دسته یا برند مورد نظر خود را جستجو کنید">
                    <span style="width: 42px;height: 35px;background: #ccc url(public/images/search-logo.png)no-repeat center;display: block;position: absolute ;left: -12px;top: 3px"></span>
                </div>
            </div>
        </div>
        <div id="header_left" style="float: left">
            <a href="<?= URL ?>index">
            <img src="public/images/digikala-logo.png">
            </a>
        </div>

    </div>
</header>

<style>
    nav {
        box-shadow: 1px 3px 4px #ccc;
        -webkit-box-shadow: 1px 3px 4px #ccc;
        -moz-box-shadow: 1px 3px 4px #ccc;
    }

    li {
        list-style: none
    }

    ul {
        margin: 0;
        padding: 0;
    }

    #menu_top > ul {
        position: relative;z-index: 2;
    }

    #menu_top > ul > li {
        float: right;
        height: 40px
    }

    #menu_top > ul > li > a {
        padding: 0 10px;
        height: 40px;
        display: block;
        line-height: 40px;
        font-size: 11pt
    }

    #menu_top ul > li > ul {
        position: absolute;
        right: 0;
        background-color: #fff;
        width: 1200px;
        padding: 0;
        box-shadow: 0 2px 3px #aaa;
        display: none;
    }

    #menu_top ul > li > ul > li {
        float: right
    }

    #menu_top ul > li > ul > li > a {
        padding: 5px 10px;
        display: block
    }

    .submenu3 {
        display: none
    }

    .menu_down_icon {
        width: 11px;
        height: 7px;
        background: url(public/"images/down-arrow.png") no-repeat;
        display: inline-block;
        margin-right: 2px
    }

    .top_menu3_col {
        width: 299px;
        height: 100%;
        float: right;
        border-left: 1px solid #eee;
    }

    .top_menu3_col_ul li {
        padding: 4px;
        padding-right: 10px;

    }

    .top_menu3_col_ul li.level3 {
        padding-right: 5px;
        color: #8ba2e6;
    }

    .active-menu {
        background: #fff;
        box-shadow: 0 -1px 3px #eee;
    }

    .active-menu > a {
        color: red
    }

    #menu_top a {
        cursor: pointer
    }

    #menu-top-nav{width: 100%;height: 40px;background: #<?= menu_color ?>;border-top: 1px solid #e0e0e2;box-shadow: 0 2px 3px #aaa; }

</style>

<nav id="menu-top-nav">

    <div id="menu_top" style="width: 1200px;height: 40px;margin: auto; ">
        <ul class="byekan">

            <?php
            $model=new Model();
            $menu=$model->getmenu();

            foreach ($menu as $level1) {
                ?>

                <li data-time="<?= $level1['id'] ?>">
                    <a>
                        <?= $level1['title'] ?>
                        <span class="menu_down_icon"></span>
                    </a>

                    <ul class="byekan fontsm">
                        <?php

                        $children1=$level1['children'];
                        foreach ($children1 as $level2) {
                            ?>
                            <li data-time="<?= $level1['id'] ?>">
                                <a>
                                   <?= $level2['title']; ?>
                                </a>

                                <div class="submenu3" style="width: 1200px; height: 300px;position: absolute;right: 0;background: #fff;">

                                        <ul class="top_menu3_col_ul fontsm byekan top_menu3_col" style="padding-right: 10px;">

                                            <?php

                                            $children2=$level2['children'];
                                            $i=1;
                                            foreach ($children2 as $level3) {
                                                if ($i%10==0) {
                                                    ?>
                                                    </ul>
                                                    <ul class="top_menu3_col_ul fontsm byekan top_menu3_col" style="padding-right: 10px;">
                                    <?php
                                                }
                                                    ?>

                                            <li class="level3"><?= $level3['title'] ?></li>
                                            <?php
                                            $i++;
                                            if (isset($level3['children'])){
                                            $children3=$level3['children'];
                                            foreach ($children3 as $level4) {
                                            if ($i%10==0) {
                                            ?>
                                                    </ul>
                                    <ul class="top_menu3_col_ul fontsm byekan top_menu3_col" style="padding-right: 10px;">
                                        <?php
                                        }
                                        ?>

                                            <li><?= $level4['title'] ?></li>
                                                <?php
                                            $i++;}
                                                ?>
                                                <?php
                                            }//if

                                            }
                                            ?>
                                        </ul>

                                    <img src="public/images/mobile-menu-picture.png" width="379" height="335"
                                         style="position: absolute; left: 2px;bottom: 2px;">
                                </div>

                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </li>
                <?php
            }
            ?>

        </ul>
    </div>

</nav>



