<h2 id="recommendslidertitle" class="byekan"
    style="height: 35px;padding-top: 20px;padding-bottom: 13px;font-size: 20px;font-weight:normal;margin: 0;color: #66666e">
    پیشنهادهای دیجی کالا برای شما</h2>

<style>
    .sliderscroll {
        width: 890px;
        height: 320px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.19);
        background: #fff;
        margin: 0;
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
        width: 790px;
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
        width: 192px;
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
    <h3>گوشی موبایل</h3>
    <div class="sliderscroll-content">
        <div class="sliderscroll-prev">
            <span class="prev" onclick="sliderscroll('right',this);"></span>
        </div>
        <div class="sliderscroll-main">
            <ul>
                <li>
                    <a>
                        <img src="public/images/sliderscroll-mobile-1.jpg">
                        <p class="byekan fontsm">گوشی موبایل سامسونگ</p>
                        <p class="byekan oldprice">500,000</p>
                        <p class="newprice byekan">449,000 تومان</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="public/images/sliderscroll-mobile-2.jpg">
                        <p class="byekan fontsm">گوشی موبایل سامسونگ</p>
                        <p class="newprice byekan">669,000 تومان</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="public/images/sliderscroll-mobile-3.jpg">
                        <p class="byekan fontsm">گوشی موبایل ال جی</p>
                        <p class="newprice byekan">495,000 تومان</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="public/images/sliderscroll-mobile-2.jpg">
                        <p class="byekan fontsm">گوشی موبایل لنوو</p>
                        <p class="newprice byekan">3,089,000 تومان</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="public/images/sliderscroll-mobile-5.jpg">
                        <p class="byekan fontsm">گوشی موبایل اپل</p>
                        <p class="newprice byekan">195,000 تومان</p>
                    </a>
                </li>
                <li>
                    <a>
                        <img src="public/images/sliderscroll-mobile-1.jpg">
                        <p class="byekan fontsm">گوشی موبایل سامسونگ</p>
                        <p class="newprice byekan">195,000 تومان</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sliderscroll-next">
            <span class="next" onclick="sliderscroll('left',this)"></span>
        </div>
    </div>
</div>
