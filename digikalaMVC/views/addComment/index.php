<script src="public/slider/jquery-ui.min.js"></script>
<script src="public/slider/slider.js"></script>
<link href="public/slider/style.css" rel="stylesheet">

<style xmlns="http://www.w3.org/1999/html">
    #main::after{content: " ";clear: both;display: block;}
    #main{width: 1150px; margin:10px auto ; padding: 5px;background: #fff;}
    .btn-green{display: block;width:170px;height:37px;background:#36be2b;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;cursor: pointer;}

    #main >form > .right {width: 350px;float: right}
    #main >form > .left {width: 770px;float: left;}
    #main > .left h4 {font-size: 12pt;font-family: byekan;color: #363436}
    .left .right{width: 330px;float: right}
    .left .left{width: 330px;float: right;margin-right: 10px;}
    .row2{width: 100%;float: right;margin-bottom: 20px;}
    .row2 p{font-family: byekan;font-size: 10.5pt;margin-top:0;margin-bottom: 10px;}
</style>

<div id="main">

    <?php
    $productinfo=$data['productinfo'];
    ?>

    <form method="post" action="addComment/savecomment/<?= $productinfo['id'] ?>">

    <div class="right">
        <img src="public/images/products/3/product_350.jpg">
    </div>

    <div class="left">
        <h4>امتیاز شما به محصول</h4>

        <?php

        $commentinfo=$data['commentinfo'];
        $commentresult=unserialize($commentinfo['param']);

        $params=$data['params'];
        $number=sizeof($params);
        $right=ceil($number/2);
        $left=$number-$right;
        $params_right=array_slice($params,0,$right);
        $params_left=array_slice($params,$right,$left);
        ?>

        <div class="right">
            <?php
            foreach ($params_right as $row) {
                ?>
                <div class="row2">
                    <p><?= $row['title'] ?></p>
                    <input data-val="<?= $commentresult[$row['id']] ?>" name="param<?= $row['id'] ?>" value="<?= $commentresult[$row['id']] ?>" type="hidden" class="flat-slider">
                </div>
                <?php
            }
            ?>
        </div>
        <div class="left">
            <?php
            foreach ($params_left as $row) {
                ?>
                <div class="row2">
                    <p><?= $row['title'] ?></p>
                    <input data-val="<?= $commentresult[$row['id']] ?>" name="param<?= $row['id'] ?>" value="<?= $commentresult[$row['id']] ?>" type="hidden" class="flat-slider">
                </div>
                <?php
            }
            ?>

        </div>
    </div>

    <style>
        .comment{float: right;width: 100%;padding:0 20px;}
        .comment input {width: 300px;height: 24px;border: 1px solid #ccc;font-family: byekan;font-size: 10.5pt;}
        .comment .row2{margin-top: 15px;}
        .comment textarea{width: 400px;height: 200px;border: 1px solid #ccc;font-family: byekan;}
    </style>

    <div class="comment">
        <h4>دیگران را با نوشتن نظرات و نقد و بررسی خود، در خرید این محصول راهنمایی کنید</h4>
        <div class="row2">
            <input name="title" value="<?= $commentinfo['title']; ?>" placeholder="عنوان نقد و بررسی" type="text">
        </div>
        <div class="row2">
            <input name="positive" value="<?= $commentinfo['positive']; ?>" placeholder="نقاط قوت" type="text">
        </div>
        <div class="row2">
            <input name="negative" value="<?= $commentinfo['negative']; ?>" placeholder="نقاط ضعف" type="text">
        </div>
        <div class="row2">
            <textarea name="comment"><?= $commentinfo['matn']; ?></textarea>
        </div>
        <div class="row2">
            <span onclick="submitform()" class="btn-green">ثبت نظر</span>
        </div>
    </div>

    </form>

</div>

<script>

    function submitform() {
        $('form').submit()
    }

    $('.flat-slider').flatslider({
       min:1,
        max:5,
        step:1,
        value:3,
        range:'min'
    });
</script>