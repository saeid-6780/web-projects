<style>
    .sliderscroll {
        width: 1150px;
        height: 320px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.19);
        background: #fff;
        float: right;
        margin-top: 20px;
        border-radius: 4px;
        overflow: hidden;
    }

    .sliderscroll h3 {
        font-family: byekan;
        font-size: 11pt;
        background: #f7f9fa;
        height: 60px;
        padding-right: 10px;
        padding-top: 7px;
        margin: 0px;
        font-weight: normal;
        color: #2eb92a;
    }

    .sliderscroll .sliderscroll-content {
        height: 278px;
    }

    .sliderscroll-prev, .sliderscroll-next {
        height: 100%;
        width: 50px;
        float: right;
        position: relative;
    }

    .sliderscroll-main {
        float: right;
        height: 100%;
        width: 1050px;
        overflow: hidden;
    }

    .sliderscroll-prev .prev {
        width: 15px;
        height: 42px;
        background: url(public/images/slices.png) no-repeat;
        background-position: -852px -677px;
        display: block;
        position: absolute;
        top: 80px;
        right: 15px;
        cursor: pointer;
    }

    .sliderscroll-next .next {
        width: 15px;
        height: 42px;
        background: url(public/images/slices.png) no-repeat;
        background-position: -812px -677px;
        display: block;
        position: absolute;
        top: 80px;
        left: 15px;
        cursor: pointer;
    }

    .sliderscroll .sliderscroll-main ul {
        padding: 0px;
        height: 100%;
    }

    .sliderscroll .sliderscroll-main ul li {
        padding: 0px;
        width: 208px;
        height: 100%;
        float: right;
    }

    .sliderscroll .sliderscroll-main ul li a {
        padding: 0px;
        display: block;
        height: 100%;
        text-align: center;
    }

    .sliderscroll .sliderscroll-main .newprice {
        color: green;
        font-size: 13pt;
        margin-top: 2px;
    }

    .sliderscroll .sliderscroll-main p {
        text-align: center;
    }

    .sliderscroll .sliderscroll-main .oldprice {
        margin: -14px 0;
        color: #837f7a;
        position: relative;
        font-size: 10pt;
        text-align: center;
    }

    .sliderscroll .sliderscroll-main .oldprice::before {
        content: "";
        top: 12px;
        right: 68px;
        width: 30%;
        height: 0;
        position: absolute;
        border-top: 1px solid black;
    }
</style>

<div class="sliderscroll">
    <h3>کالاهای مشابه</h3>
    <div class="sliderscroll-content">
        <div class="sliderscroll-prev">
            <span class="prev" onclick="sliderscroll('right',this);"></span>
        </div>
        <div class="sliderscroll-main">
            <ul>
                <?php
                foreach ($data['onlydigikala'] as $row) {
                    ?>
                    <li>
                        <a>
                            <img style="width: 150px;" src="public/images/products/<?= $row['id']; ?>/product_220.jpg">
                            <p class="byekan fontsm"><?= $row['title']; ?></p>
                            <p class="newprice byekan"><?= $row['price']; ?> تومان</p>
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
        <div class="sliderscroll-next">
            <span class="next" onclick="sliderscroll('left',this)"></span>
        </div>
    </div>
</div>

<script>

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
</script>