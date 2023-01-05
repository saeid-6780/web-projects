<style>
    #comments-result{width: 510px;float: right;}
    #comments-send{width: 630px;float: right;margin-right: 10px;}
    #comments-result p{font-family: byekan;font-size: 13.5pt;}
    #comments-result p span{font-family: byekan;font-size: 11pt;}
    .navbar .row {width: 100%;float: right;margin-bottom: 5px;}
    .navbar .row .title {font-size: 10.3pt;display: block;width: 85px;float: right;}
    .navbar ul {padding: 0;height: 10px;float: right;margin-top: 10px;margin-right: 10px;}
    .navbar ul li{width: 64px;height: 100%;float: right;background: #eee;border-left: 1px solid #fff;}
    .navbar ul li span{width: 64px;display: block;height: 100%;background: green;}
    .navbar ul li span.full{width: 100%;display: block;height: 100%;background: green;}

    .email .btn{width: 110px;height: 38px;display: inline-block; float:left;background: #208de6 none repeat scroll 0 0 ;margin-left: 28px;margin-top: 2px;box-shadow: 0 2px 3px rgba(0,0,0,0.2);text-align: center;color: #fff;line-height:32px;font-family: byekan;font-size: 10pt;}

</style>
    <div id="comments-result" class="navbar">
        <p>امتیاز کاربران به
            <span>
                        گوشی سامسونگ j7
                    </span>
        </p>

        <?php
        foreach ($data[0] as $row) {
            $score=$data[2][$row['id']];
            $score_sahih=floor($score);
            $score_ashari=$score-$score_sahih;
            $li_num=$score_sahih
            ?>

            <div class="row">
                <span class="title"><?= $row['title']; ?></span>
                <ul>
                    <?php
                    for($i=0;$i<$score_sahih;$i++){
                        ?>
                        <li>
                            <span></span>
                        </li>
                        <?php
                    }
                    ?>

                    <?php if ($score_sahih<5){
                        $li_num++;
                        ?>
                    <li>
                        <span style="width:<?= $score_ashari*100 ?>%"></span>
                    </li>
                    <?php }
                    $li_remain_num=5-$li_num;
                    for ($i=0;$i<$li_remain_num;$i++) {
                        ?>
                        <li>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
        ?>

    </div>
    <div id="comments-send">
        <p class="byekan" style="font-size: 13pt;">شما هم می توانید نظر خود را ارسال نمایید</p>
        <p class="byekan" style="font-size: 11pt;">برای ثبت نظر و یا نقد و بررسی ابتدا لازم است وارد حساب کاربری خود شوید. اگر این محصول را قبلا از دیجیکالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.</p>

        <div class="email" style="text-align: left;">
            <span class="btn">ارسال نظر</span>
        </div>
    </div>

    <style>
        #comments{float: right;width: 100%;margin-top: 15px;}
        #comments .comments{float: right;width: 97%;box-shadow: 0 2px 3px rgba(0,0,0,0.15);border-radius: 2px;overflow: hidden;}
        #comments .comments .comments-header{height: 57px;background: #eee;font-family: byekan;padding: 0 5px;}
        #comments .comments .comments-header .right{float: right;}
        #comments .comments .comments-header .right span{display: block;}
        #comments .comments .comments-header .left{float: left;}
        #comments .comments .comments-header .left span{float: left;display: block;margin-right: 8px;font-size: 10.6pt;margin-top: 13px;}
        #comments .comments .comments-header .left .like{width: 65px;height: 25px;background: #fff;}
        #comments .comments .comments-header .left .like i{width: 20px;height: 20px;display: block;float: right;background: url(public/images/slices.png)no-repeat -305px -190px;margin-top: 3px;margin-right: 3px;}
        #comments .comments .comments-header .left .like span{margin: 0;margin-left: 10px;}
        #comments .comments .comments-header .left .dislike{width: 65px;height: 25px;background: #fff;}
        #comments .comments .comments-header .left .dislike i{width: 20px;height: 20px;display: block;float: right;background: url(public/images/slices.png)no-repeat -267px -193px;margin-top: 5px;margin-right: 3px;}
        #comments .comments .comments-header .left .dislike span{margin: 0;margin-left: 10px;}

    </style>

<style>
    #comments .comments .comments-content .left {
        width: 580px;
        float: left;
    }

    #comments .comments .comments-content .left .top {
        font-size: 13.3pt;
    }

    #comments .comments .comments-content .left .center {
        float: right;
        width: 100%;
    }

    #comments .comments .comments-content .left .bottom {
        font-size: 10.3pt;
        margin-top: 10px
    }

    .ghovvat {
        width: 280px;
        float: right;
        font-size: 10.5pt;
    }

    .zaaf {
        width: 280px;
        float: right;
        margin-right: 15px;
        font-size: 10.5pt;
    }
</style>


<style>
    #comments .comments .comments-content .right {
        float: right;
        width: 440px;
    }

    #comments .comments .comments-content {
        float: right;
        width: 98%;
        padding: 10px;
    }

</style>

    <div id="comments">
        <p class="byekan" style="font-size: 13pt;">نظرات کاربران</p>
        <div class="horizental-row"></div>

        <?php
        foreach ($data[1] as $row){
        ?>

        <div id="comment<?= $row['id'] ?>" class="comments">
            <div class="comments-header">
                <div class="right">
                    <span class="name" style="font-size: 12.8pt;">سعید صدیق زاده</span>
                    <span class="date" style="font-size: 9pt;"><?= $row['date'] ?></span>
                </div>
                <div class="left">
                                <span class="dislike">
                                    <i></i>
                                    <span><?= $row['dislikenum'] ?></span>
                                </span>
                    <span class="like">
                                    <i></i>
                                    <span><?= $row['likenum'] ?></span>
                                </span>
                    <span>آیا این نظر برای شما مفید بود؟</span>
                </div>
            </div>

            <div class="comments-content">
                <div class="right">
                    <div class="navbar">

                        <?php
                        $scores=unserialize($row['param']);
                        foreach ($data[0] as $param){
                            $param_id=$param['id'];
                            $score=$scores[$param_id];
                            ?>

                            <div class="row">
                                <span class="title"><?= $param['title']; ?></span>
                                <ul>
                                    <?php
                                    for($i=0;$i<$score;$i++){
                                        ?>
                                        <li>
                                            <span></span>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <?php
                                        for($i=0;$i<5-$score;$i++){
                                        ?>
                                    <li>
                                    </li>
                                <?php
                                }
                                ?>

                                </ul>
                            </div>
                            <?php
                        }
                            ?>

                        </div>
                    </div>

                    <div class="left">
                        <div class="top"><?= $row['title'] ?></div>
                        <div class="center">
                            <div class="ghovvat">
                                <p style="color: red;">نقاط قوت</p>
                                <p><?= $row['positive'] ?></p>
                            </div>
                            <div class="zaaf">
                                <p style="color: green;">نقاط ضعف</p>
                                <p><?= $row['negative'] ?></p>
                            </div>
                        </div>
                        <div class="bottom"><?= $row['matn'] ?></div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

