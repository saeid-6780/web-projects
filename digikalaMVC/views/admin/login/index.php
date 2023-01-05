<?php


?>

<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{
        width: 1200px; margin:10px auto ; padding: 20px;background: #fff;font-family: byekan;
    }
</style>
<div id="main" >

    <p class="title">
        <a>
            ورود به پنل مدیریت
        </a>
    </p>

    <style>
        .title-tag{width: 200px;float: right;display: block;}
        input[type=text]{width: 300px;height: 23px;border: 1px solid #ccc;}

    </style>

        <form action="adminLogin/check" method="post">

    <div class="row2">
        <span class="title-tag">نام کاربری</span>
        <input type="text" name="email">
    </div>
    <div class="row2">
        <span class="title-tag">پسورد</span>
        <input type="text" name="password">
    </div>

            <div class="row2">
                <span onclick="submitForm()" class="btn_green" style="float: left">ورود</span>
            </div>

    </form>


</div>

<script>
    function submitForm() {
        $('form').submit();
    }
</script>












