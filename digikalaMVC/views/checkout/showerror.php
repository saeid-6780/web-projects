<?php
$error=$data['error'];
?>
<style>

    #main::after {
        content: " ";
        clear: both;
        display: block;
    }

    #main {
        font-family: yekan;
    }

    .head {
        float: right;
        margin-top: 36px;
        width: 100%;
    }

    .head h4 {
        font-size: 12.5pt;
        font-family: yekan;
        margin-top: 5px;
        padding-right: 10px;
        float: right;
    }

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
    }

    .head .btn_green {
        float: left;
        margin-left: 5px;
        margin-top: 8px;
    }
    .error {border: 1px solid red; font-size: 12pt; color: red; font-family: yekan;padding: 8px;text-align: center}

</style>

<div id="main" style="width: 1200px;margin:10px auto;padding: 5px;background: #fff;">

    <p class="error">
        <?php
        echo $error;
        ?>
    </p>
    <p style="text-align: center">
        <a class="btn_green" href="checkout/index/<?= $data['orderid'] ?>">بازگشت</a>
    </p>

</div>
