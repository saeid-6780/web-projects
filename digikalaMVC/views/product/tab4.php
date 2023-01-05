<style>
    #questions {font-family: byekan;}
    #questions h4{font-size: 12.8pt}
    #question-text {width: 98%;height: 190px;border: 1px solid #ccc;border-radius: 4px;}
    .row{float: right;width: 100%;}
    #questions .questions{box-shadow:0 2px 3px rgba(0,0,0,0.15) ;border-radius: 3px;overflow: hidden;margin-bottom: 8px;}
</style>

    <h4 id="questions" >پرسش خود را مطرح نمایید</h4>
    <textarea id="question-text"></textarea>
    <div class="row">
        <div class="email" style="text-align: left;">
            <span class="btn">ثبت پرسش</span>
        </div>
    </div>
    <h4>پرسش ها و پاسخ ها</h4>
    <div class="horizental-row"></div>
    <style>
        .questions .questions-header{height: 35px;background: #ccc; }
        .questions .questions-header i{ width: 24px;height:24px;display: block; float: right;margin-right: 7px; background: url(public/images/slices.png) no-repeat -284px -126px;margin-top: 6px; }
        .questions .questions-content{background: #eee;padding: 10px; }
        #questions-container {width: 98%}
        .questions .questions-content p {font-size: 11.5pt;}
        .answer {padding: 10px;background: #fff;font-size: 11pt;}

    </style>
    <div id="questions-container" class="row">

        <?php
        foreach ($data[0] as $row) {
            ?>

            <div class="questions">
                <div class="questions-header">
                    <i></i>
                    <span style="float: right;font-size: 10pt;margin-right: 6px;margin-top: 3px;">پرسش</span>
                    <span style="float: left;font-size: 10pt;margin-right: 6px;margin-top: 3px;margin-left: 5px"><?= $row['date'] ?></span>

                    <span style="float: left;font-size: 10pt;margin-right: 6px;margin-top: 3px;">سعید صدیق زاده</span>
                </div>
                <div class="questions-content">
                    <p><?= $row['matn'] ?></p>
                </div>
                <div class="answer">
                    <p style="margin-top: 2px;">
                        پاسخ
                    </p>
                    <?= $data[1][$row['id']]['matn'] ?>
                </div>
            </div>

            <?php
        }
        ?>

    </div>
