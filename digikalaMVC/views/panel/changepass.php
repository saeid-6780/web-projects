<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{
        width: 1150px; margin:10px auto ; padding: 25px;box-shadow: 0 0 4px #fff;background: #fff;}
    .row2{width: 100%;float: right;margin-bottom: 15px;}
    .row2 .title{font-family: byekan;font-size: 10.5pt;float: right;width:150px;margin-right: 10px; }
    .row2 input[type=password]{width: 250px;height: 22px;padding: 2px;font-size: 10.5pt;font-family: byekan;float: right;border: 1px solid #ccc;}
    h4{font-family: byekan;font-size: 12px;}
    select {margin-right:5px;float: right;width: 120px;margin-top: 3px;font-size: 10.5pt;font-family: byekan;}
    .row2 input[type=radio]{float: right;margin-top:8px;}
    .btn-green{display: block;width:170px;height:37px;background:#36be2b;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;float: left;cursor: pointer;}


</style>

<div id="main">

    <h4>تغییر رمز عبور</h4>

    <?php
    if (isset($_GET['error'])){
    if (@$_GET['error']==0) {
        ?>
        <p class="success">
            عملیات تغییر رمز با موفقیت انجام شد
        </p>
    <?php
    }if (@$_GET['error']==1) {
        ?>
        <p class="error">
            کلمه عبور فعلی نادرست است
        </p>

        <?php
    }else if(@$_GET['error']==2){
    ?>
        <p class="error">
            دو رمز وارد شده مشابه نیستند
        </p>

        <?php
    }}
    ?>

    <form method="post" action="panel/changepass">
        <div class="row2">
        <span class="title">
            رمز عبور فعلی
        </span>
            <input type="password" name="pass_old" >
        </div>
        <div class="row2">
        <span class="title">
رمز عبور جدید
        </span>
            <input type="password" name="pass_new" >
        </div>
        <div class="row2">
        <span class="title">
          تکرار رمز عبور جدید
        </span>
            <input type="password" name="pass_confirm" >
        </div>

        <div class="row2">
        <span onclick="submitform()" class="btn-green">
ثبت اطلاعات
        </span>
        </div>

    </form>

</div>

<script>
    function submitform() {
        $('form').submit();
    }
</script>