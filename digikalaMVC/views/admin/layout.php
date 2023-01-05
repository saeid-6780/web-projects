
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{
        width: 1200px; margin:10px auto ; padding: 20px;background: #fff;font-family: byekan;
    }
</style>
<div id="main" >

<style>
    .right{width: 240px;float: right;border: 1px solid #ccc;padding: 10px;}
    .right ul {padding: 0;margin: 0}
    .right ul li a {display: block;padding: 3px;font-size: 11pt;border: 1px dashed #ccc;}
    .right ul li.active{background: #badde2;color:#6b6e78;border: 1px solid blue}
    .left{width: 910px;float: left;padding: 10px;box-shadow: 1px 1px 3px #ccc;}
    .left .title {font-size: 12pt;border-bottom: 1px solid #ccc;background: #a9f3aa;color: #0da200}
    .left .title a{font-size: 11pt;color: #0da200}
    table.list{width: 100%;}
    table.list td{padding: 4px;font-size: 11pt;border: 1px solid #eee;background: #cefed4}
    table.list tr td .showchildcat{width: 28px;height: 16px;display: block;background: url(public/images/slices.png) no-repeat -25px -592px;}
    table.list .w400{width: 400px;}
    .btn-green{padding: 2px 15px;color: #fff;background: #4ed133;text-align: center;border: 1px solid #eee;border-radius: 3px;margin-bottom: 3px;font-size: 9pt;float: left;cursor: pointer;}
    .btn-red{padding: 2px 15px;color: #fff;background: red;text-align: center;border: 1px solid #eee;border-radius: 3px;margin-bottom: 3px;font-size: 9pt;float: left;margin-right: 5px;cursor: pointer;}
</style>

<div class="right">

    <?php
    $level=Model::getuserlevel();
    ?>
    <ul>
        <li class="<?php if ($active=='dashboard'){echo 'active';} ?>">
            <a href="adminDashboard/index">
                داشبورد
            </a>
        </li>
        <?php
        if ($level==1) {
            ?>
            <li class="<?php if ($active == 'category') {
                echo 'active';
            } ?>">
                <a href="admincategory/index">
                    مدیریت دسته ها
                </a>
            </li>
            <?php
        }
        ?>
        <li class="<?php if ($active=='product'){echo 'active';} ?>">
            <a href="adminproduct/index">
                مدیریت محصولات
            </a>
        </li>
        <li class="<?php if ($active=='order'){echo 'active';} ?>">
            <a href="adminorder/index">
                مدیریت سفارشات
            </a>
        </li>
        <?php
        if ($level==1) {
            ?>
            <li class="<?php if ($active == 'report') {
                echo 'active';
            } ?>">
                <a href="adminStats/index">
                    آمار و گزارشات
                </a>
            </li>
            <?php
        }
        ?>
        <li class="<?php if ($active=='comment'){echo 'active';} ?>">
            <a href="adminComment/index">
                نظرات
            </a>
        </li>
        </li>
        <li class="<?php if ($active=='setting'){echo 'active';} ?>">
            <a href="adminsetting/index">
                تنظیمات فروشگاه
            </a>
        </li>
        <li class="<?php if ($active=='slider'){echo 'active';} ?>">
            <a href="adminSlider/index">
مدیریت اسلاید شو            </a>
        </li>
        <?php
        if ($level==1) {
            ?>
            <li class="<?php if ($active == 'user') {
                echo 'active';
            } ?>">
                <a href="adminUser/index">
                    مدیریت اعضا
                </a>
            </li>
            <?php
        }
        ?>
    </ul>

</div>


    <script>

        function submintForm() {
            $('form').submit();
        }
    </script>