<style>
    #pagination {float: right;width: 100%;}
    #pagination .prev {font-family: "B Yekan";font-size:9.3pt;float: left;width: 60px;height: 20px;display: block;border: 1px solid #cccccc;box-shadow: 3px 3px 2px rgba(0,0,0,0.2);border-radius: 3px;text-align: center;background: linear-gradient(center top,#fff 0%,#efefef 100%);background:-moz-linear-gradient(center top,#fff 0%,#efefef 100%);background:-webkit-linear-gradient(center top,#fff 0%,#efefef 100%);margin-left: 3px; cursor: pointer;}
    #pagination ul{padding: 0;float: left;display: block;}
    #pagination ul li {float: right;font-family: "B Yekan";font-size:9.3pt;background: linear-gradient(center top,#fff 0%,#efefef 100%);background:-moz-linear-gradient(center top,#fff 0%,#efefef 100%);background:-webkit-linear-gradient(center top,#fff 0%,#efefef 100%);width: 25px;height: 23px;border: 1px solid #eee;border-radius: 2px;text-align: center;margin-left: 2px;margin-right: 2px;cursor: pointer;border-radius: 4px;}
    #pagination .next{font-family: "B Yekan";font-size:9.3pt;float: left;width: 60px;height: 20px;display: block;border: 1px solid #cccccc;box-shadow: 3px 3px 2px rgba(0,0,0,0.2);border-radius: 3px;text-align: center;background: linear-gradient(center top,#fff 0%,#efefef 100%);background:-moz-linear-gradient(center top,#fff 0%,#efefef 100%);background:-webkit-linear-gradient(center top,#fff 0%,#efefef 100%); margin-right: 3px;cursor: pointer;}
    #pagination ul li.active {background: #6e717b;color: #fff;}
</style>

<div id="pagination">
    <span onclick="dosearch(current_page+1)" class="next">صفحه بعد</span>
    <ul>
<li>1</li>
    </ul>
    <span onclick="dosearch(current_page-1)" class="prev">صفحه قبل</span>
</div>

<style>
    #product {float: right;width: 100%;margin-top: 30px;}
    #product ul{padding: 0;width: 100%;}
    #product ul li {width: 208px;height: 330px;border: 1px solid #eee;float: right;margin-right: 10px;margin-bottom: 18px;}
    #product ul li a {display: block;}
    #product .colors .color {width: 12px; height: 12px;display: inline-block;border: 1px solid #ccc}
    .textcenter {text-align: center;}
    .gray {width: 55px;height: 9px;background: url(public/images/stars.png) repeat 0 -9px;margin: 0 auto;position: relative}
    .red {width: 50%;height: 9px;background: url(public/images/stars.png) repeat 0 0px;margin: 0 auto;position: absolute;left: 0;top: 0;}
    #product .title {text-align: left;font-size: 10pt;padding:0 6px;color: red}
    #product .price-old{color: red;font-size: 10pt;text-decoration: line-through;margin: 0;}
    #product .price-new{color: green;font-size: 11pt;margin: 0;}
    #product .price {margin: 0 6px;position: relative}
    #product .price .addToCard{width: 30px;height: 30px;display: block;background: url(public/images/addtocart-min.png)no-repeat;position: absolute;top: 22px ;left: 2px}
    #product .discription {height: 208px;display: none;font-size: 10pt;font-family: byekan;}
    .display1 li{width: 100% !important;}
    .display1 .right{float: right;width: 217px;}
    .display1 .left{float: left;width: 660px;}
    .display1 .title{text-align: right !important;font-size: 14pt !important;}
    .display1 .discription{display: block !important;}
    #product li img{width: 100%;max-height: 215px;}
</style>
<div id="product">
    <ul>

    </ul>

</div>

<script>
    function pagination(tag,page) {
        var litag=$(tag);
        $('#pagination ul li').removeClass('active');
        litag.addClass('active');
        dosearch(page);
    }
</script>