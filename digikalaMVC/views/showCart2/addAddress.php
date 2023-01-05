<style>
    #add-address{width: 900px;height: 560px;position: fixed;background: #fff;left:0 ;top:10px; right: 0;margin: auto;z-index: 3;display: none;}
    #dark {width: 100%;height: 100% ;background: rgba(0,0,0,0.3);position: fixed;top: 0;right: 0;z-index: 2;display: none;}
    #add-address h4 {font-family: byekan;font-size: 13.5pt;padding: 8px;background: #eee;  margin: 0;position: relative}
    #add-address h4 .close{width: 28px;height: 28px;display: block;float: left;background: url(public/images/slices.png) no-repeat -134px -123px;position: absolute;top: 8px;left: 8px;border: 1px solid #ccc;border-radius: 50%;cursor: pointer;}
    #add-address .row {float: right;width: 95%;font-family: byekan;padding: 12px 19px;}
    #add-address .row .right{float: right;width: 225px;}
    #add-address .row .left{float: right;}
    #add-address .row .right .title {font-size: 10.5pt;}
    #add-address .row .left input {width: 260px;height: 28px;border: 1px solid #ccc;margin-top: 3px;}
    #add-address .row .left textarea {width: 260px;height: 90px;border: 1px solid #ccc;margin-top: 3px;}
    .btn-green{display: block;width:170px;height:37px;background:#36be2b;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;}
</style>

<form id="addaddress" action="showCart2/addaddress" method="post">
    <div id="add-address">
        <h4>افزودن آدرس جدید
            <span class="close"></span>
        </h4>
        <div class="row">
            <div class="right">
                <span class="title">نام و نام خانوادگی تحویل گیرنده</span>
            </div>
            <div class="left">
                <input name="family">
            </div>
        </div>
        <div class="row">
            <div class="right">
                <span class="title">شماره همراه</span>
            </div>
            <div class="left">
                <input name="mobile">
            </div>
        </div>
        <div class="row">
            <div class="right">
                <span class="title">شماره ثابت</span>
            </div>
            <div class="left">
                <input name="tel">
            </div>
        </div>
        <div class="row">
            <div class="right">استان/شهر تحویل گیرنده
                <span class="title"></span>
            </div>
            <div class="left">

                <style>
                    .filter-option .pull-left {
                        text-align: right !important;
                    }
                </style>

                <select id="ostan" name="state"  class="selectpicker state " data-live-search="true">

                    <option value="">
                        انتخاب استان
                    </option>


                </select>

                <span class="shahr">
                <select id="city" name="city"  class="selectpicker city" onchange="mahale(this)" data-live-search="true">
                    <option value="">
                        انتخاب شهر
                    </option>
                </select>
            </span>

            </div>
        </div>

        <div class="row">
            <div class="right">
                <span class="title">محله</span>
            </div>
            <div class="left">

            <span class="mahale">
                <select name="mahale"  class="selectpicker" >
                    <option value="">
                        محله خود را انتخاب کنید
                    </option>
                </select>
            </span>
            </div>
        </div>

        <div class="row">
            <div class="right">
                <span class="title">آدرس پستی</span>
            </div>
            <div class="left">
                <textarea name="address"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="right">
                <span class="title">کد پستی</span>
            </div>
            <div class="left">
                <input name="codeposti">
            </div>
        </div>
        <div class="row">
            <div class="right">
                <span class="title"></span>
            </div>
            <div class="left" style="text-align: left;width:100% ">
                <span onclick="submitform()" style="float: left;cursor: pointer;" class="btn-green">ذخیره اطلاعات و بازگشت</span>
            </div>
        </div>

    </div>

</form>

<div id="dark"></div>

<script>

    function submitform() {
        var url='showCart2/addaddress/'+editaddressid;
        var data=$('#addaddress').serializeArray();
        var ostan_name=$('#ostan option:selected').text();
        var city_name=$('#city option:selected').text();

        data.push({'name':'ostan_name','value':ostan_name});
        data.push({'name':'city_name','value':city_name});

        $.post(url,data,function (msg) {
            window.location='showCart2'
        })

    }

    $('.close').click(function () {
        $('#add-address').fadeOut(200);
        $('#dark').fadeOut(100);
    });

    function showwindow() {
        editaddressid='';
        $('#add-address').fadeIn(200);
        $('#dark').fadeIn(100);
        $('#addaddress').trigger('reset');
        $('.selectpicker').selectpicker('refresh');
    }

    loadOstan('ostan');

    $("#ostan").change(function(){
        var i=$(this).find('option:selected').val();
        ldMenu(i,'city');
        $('.selectpicker').selectpicker('refresh');
    })

</script>