<style>
    .box {font-family: byekan}
    .box .header{height: 40px;background: #3c3c3c;color: #fff;font-size: 11pt;padding-right: 10px;line-height: 34px;}
    .box .content {background: #fff;}
    .box .content table {width: 100%;}
    .box .content table tr td {padding: 5px;}
    .box .content table tr td .title {font-size: 10.5pt;color:darkblue}
    .box .content table tr td .value {font-size: 10pt;}

</style>

<?php
$userinfo=$data['userinfo']
?>
<div class="box">
    <div class="header">
        اطلاعات کاربر
    </div>
    <div class="content">
        <table>
            <tr>
                <td>
                    <span class="title">نام و نام خانوادگی: </span>
                    <span class="value"><?= $userinfo['family'] ?></span>
                </td>
                <td>
                    <span class="title">آدرس ایمیل: </span>
                    <span class="value"><?= $userinfo['email'] ?></span>
                </td>
                <td>
                    <span class="title">کد ملی: </span>
                    <span class="value"><?= $userinfo['codemelli'] ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">شماره تلفن ثابت: </span>
                    <span class="value"><?= $userinfo['tel'] ?></span>
                </td>
                <td>
                    <span class="title">شماره همراه: </span>
                    <span class="value"><?= $userinfo['mobile'] ?></span>
                </td>
                <td>
                    <span class="title">تاریخ تولد: </span>
                    <span class="value"><?= $userinfo['tavallod'] ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">محل سکونت: </span>
                    <span class="value"><?= $userinfo['address'] ?></span>
                </td>
                <td>
                    <span class="title">جنسیت: </span>
                    <span class="value">
                        <?php
                        $jensiat=$userinfo['jensiat'];
                        if ($jensiat==1){
                            echo 'مرد';
                        }else{
                            echo 'خانم';
                        }
                        ?>
                    </span>
                </td>
                <td>
                    <span class="title">دریافت خبرنامه: </span>
                    <span class="value">
                        <?php
                        $khabarnameh=$userinfo['khabarnameh'];
                        if ($khabarnameh==1){
                            echo 'بله';
                        }else{
                            echo 'خیر';
                        }
                        ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left;">
                    <a href="panel/profile">
                        <img src="public/images/Edit.png">
                    </a>
                    <a href="panel/changepass"><img src="public/images/ChangePassword.png"></a>
                </td>
            </tr>

        </table>
    </div>
</div>