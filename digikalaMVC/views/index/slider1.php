

<style>

    #slider {
        height: 310px;
    }

    #slider-img {
        height: 260px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        background: #fff;
    }

    #slider-img img {
        height: 260px;
        width: 100%;
    }

    .item {
        display: none;

    }

    #slider-navigator {
        height: 50px;
        background: rgba(0, 0, 0, 0.5);
    }

    #slider #prev {
        width: 19px;
        height: 33px;
        display: block;
        position: absolute;
        top: 130px;
        right: 15px;
        background: url(public/images/scroll-arrows.png) no-repeat;
        background-position: -16px 0;
        cursor: pointer;
        z-index: 2;
    }

    #slider #next {
        width: 19px;
        height: 33px;
        display: block;
        position: absolute;
        top: 130px;
        left: 15px;
        background: url(public/images/scroll-arrows.png) no-repeat;
        cursor: pointer;
        z-index: 2;
    }

    #slider #slider-navigator ul li {
        width: 178px;
        height: 100%;
        float: right;
    }

    #slider #slider-navigator ul {
        height: 100%;
        padding: 0;
    }

    #slider #slider-navigator ul li a {
        width: 100%;
        height: 100%;
        display: block;
        text-align: center;
        line-height: 45px;
        color: #fff;
        cursor: pointer;
    }

    #slider #slider-navigator .active > a {
        background: #fff;
        color: black;
        position: relative;
        box-shadow: 1px 3px 2px #9BA2A7;
    }

    #slider #slider-navigator .active > a::after {
        content: " ";
        position: absolute;
        top: -13px;
        right: 0;
        left: 0;
        margin: 0 auto;

        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 12.5px 13px 12.5px;
        border-color: transparent transparent #ffffff transparent;
    }

</style>

<div id="slider" style="position: relative;">
            <span id="prev">
            </span>
    <span id="next">
            </span>
    <div id="slider-img">
        <?php
        foreach ($data[0] as $slider){

        ?>
        <a href="<?= $slider['link']; ?>" class="item">
            <img src="<?= $slider['img']; ?>">
        </a>

        <?php
        }
        ?>
    </div>
    <div id="slider-navigator">
        <ul class="byekan fontsm">
            <li>
                <a>ادوات موسیقی</a>
            </li>
            <li>
                <a>انواع ترازو</a>
            </li>
            <li>
                <a>انواع چمدان</a>
            </li>
            <li>
                <a>گردش و سفر کودک</a>
            </li>
            <li>
                <a>ساعت های خاص</a>
            </li>
        </ul>
    </div>

</div>