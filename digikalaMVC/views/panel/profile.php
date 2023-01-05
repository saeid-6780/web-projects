<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{
        width: 1150px; margin:10px auto ; padding: 25px;box-shadow: 0 0 4px #fff;background: #fff;}
    .row2{width: 100%;float: right;margin-bottom: 15px;}
    .row2 .title{font-family: byekan;font-size: 10.5pt;float: right;width:150px;margin-right: 10px; }
    .row2 input[type=text]{width: 250px;height: 22px;padding: 2px;font-size: 10.5pt;font-family: byekan;float: right;border: 1px solid #ccc;}
    h4{font-family: byekan;font-size: 12px;}
    select {margin-right:5px;float: right;width: 120px;margin-top: 3px;font-size: 10.5pt;font-family: byekan;}
    .row2 input[type=radio]{float: right;margin-top:8px;}
    .btn-green{display: block;width:170px;height:37px;background:#36be2b;box-shadow: 1px 1px 3px #ccc;text-align: center;color: #fff;font-family: byekan;font-size: 11pt;line-height: 34px;border-radius: 3px;float: left;cursor: pointer;}

</style>

<div id="main">

    <?php
    $profile=$data['userinfo'];
    ?>

    <h4>مشخصات پروفایل</h4>

    <form method="post" action="panel/editprofile">
    <div class="row2">
        <span class="title">
            ایمیل
        </span>
            <input type="text" name="email" value="<?= $profile['email'] ?>">
    </div>
    <div class="row2">
        <span class="title">
           نام و نام خانوادگی
        </span>
            <input type="text" name="family" value="<?= $profile['family'] ?>">
    </div>
    <div class="row2">
        <span class="title">
           کد ملی
        </span>
        <input type="text" name="codemelli" value="<?= $profile['codemelli'] ?>">
    </div>
    <div class="row2">
        <span class="title">
          شماره تلفن ثابت
        </span>
        <input type="text" name="tel" value="<?= $profile['tel'] ?>">
    </div>
    <div class="row2">
        <span class="title">
          شماره همراه
        </span>
        <input type="text" name="mobile" value="<?= $profile['mobile'] ?>">
    </div>
    <div class="row2">
        <span class="title">
          تاریخ تولد
        </span>
        <span class="title" style="width: auto">روز</span>

        <?php
        $date=$profile['tavallod'];
        $array_date=explode('/',$date);
        $year=$array_date[0];
        $month=$array_date[1];
        $day=$array_date[2];
        ?>

        <select name="day">
            <?php
            for ($i=1;$i<32;$i++) {
                ?>
                <option value="<?= $i ?>"<?php if ($i==$day){echo 'selected="selected"';} ?>><?= $i ?></option>
                <?php
            }
            ?>
        </select>
        <span class="title" style="width: auto">ماه</span>
        <select name="month">
            <?php
            for ($i=1;$i<13;$i++) {
                ?>
                <option <?php if ($i==$month){echo 'selected="selected"';} ?>><?= $i ?></option>
                <?php
            }
            ?>
        </select>
        <span class="title" style="width: auto">سال</span>
        <select name="year">
            <?php
            $disyear=Model::jalalidate('Y');
            for ($i=$disyear-90;$i<=$disyear;$i++) {
                ?>
                <option <?php if ($i==$year){echo 'selected="selected"';} ?>><?= $i ?></option>
                <?php
            }
            ?>

        </select>
    </div>
    <div class="row2">
        <span class="title">
          محل سکونت
        </span>
        <input type="text" name="address" style="width: 350px;" value="<?= $profile['address'] ?>">
    </div>

    <div class="row2">
        <span class="title">
          جنسیت
        </span>
        <span style="width: auto" class="title">
مرد
        </span>
        <input type="radio" value="1" name="jensiat" <?php if ($profile['jensiat']==1){echo 'checked="true"';} ?>>
        <span style="width: auto" class="title">
زن
        </span>
        <input type="radio" value="2" name="jensiat" <?php if ($profile['jensiat']==2){echo 'checked="true"';} ?>>

    </div>

    <div class="row2">
        <span class="title">
          دریافت خبرنامه
        </span>
        <span style="width: auto" class="title">
بله
        </span>
        <input type="checkbox"  value="1" name="khabernameh" <?php if ($profile['khabarnameh']==1){echo 'checked="true"';} ?>>
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