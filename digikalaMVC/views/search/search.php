<style>
    #search {position: relative;float: right;width: 100%;}
    #search input {width: 330px;height: 17px; border: 1px solid #eee;padding-right: 10px;}
    #search .exist { margin-right: 31px;position: relative;top: 6px;cursor: pointer;}
    #search .exist-back {width: 40px;height: 21px;display: inline-block;background: url(public/images/btnchecked.png) no-repeat scroll 0 0  ;}
    #search .exist.active .exist-back {background-position: -40px 0 !important ;}
    #search .exist.active .exist-YesNo {background-position: 0 0 !important ;}
    #search .exist-YesNo {width: 30px;height: 21px;display: inline-block;background: url(public/images/yesno.png) no-repeat scroll 0 -21px  ;position: absolute;top: -6px;left: 4px;}
    .display-type {float: left}
    .type1 , .type2 {width: 24px;height: 24px;background: url(public/images/displaytype.png) no-repeat;display: block;float: left;cursor: pointer;}
    .type1.active {background-position: -24px 0 }
    .type2.active {background-position: 0 -24px }
    .type1 {background-position: -24px -24px;}

</style>

<div id="search">
    <input id="keyword" type="text" placeholder="جستجو...">
    <img onclick="dosearch()" style="position: absolute;right: 317px;top:7px ;cursor: pointer" src="public/images/search2.png">
    <span class="exist">
            <span class="exist-back"></span>
            <span class="exist-YesNo"></span>
            </span>
    <span class="byekan"style="margin-right: 7px;font-size: 9.8pt;">
                فقط نمایش کالاهای موجود
            </span>

    <span class="display-type">
<span class="byekan"style="font-size: 9.8pt;margin-left: 7px;"> نوع نمایش</span>
            <span class="type2"></span>
            <span class="type1"></span>
            </span>


</div>
<style>
    #sort {float: right;width: 100%;margin-top: 13px;}
</style>
<div id="sort">
    <span class=" byekan"style="font-size: 9.8pt">مرتب سازی بر اساس</span>
    <select name="orderType1" onchange="dosearch()">
        <option value="1">قیمت</option>
        <option value="2">پربازدیدترین</option>
        <option value="3">جدیدترین</option>
        <option value="4">پیشنهاد ویژه</option>
        <option value="5">پرفروش ترین</option>

    </select>

    <select name="orderType2" onchange="dosearch()">
        <option value="1">صعودی</option>
        <option value="2">نزولی</option>

    </select>

    <span class=" byekan"style="font-size: 9.8pt">تعداد نمایش</span>
    <select id="limit" onchange="dosearch()">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>

    </select>

</div>

<script>
    $('.exist').click(function () {
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $('.exist-YesNo',this).animate({'left':'14px'},500)
        }
        else{
            $('.exist-YesNo',this).animate({'left':'4px'},500)
        }
        dosearch();
    });

    $('.type1').click(function () {
        $('#product').addClass('display1');
        $(this).addClass('active');
        $('.type2').removeClass('active');

    })
    $('.type2').click(function () {
        $('#product').removeClass('display1');
        $(this).addClass('active');
        $('.type1').removeClass('active');
    })
</script>