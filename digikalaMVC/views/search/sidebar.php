<style>
    #sidebar {width: 250px;/*border: 1px solid #ccc;*/float: right;font-family: byekan;}
    #content {width: 880px;float: left;}
    #sidebar > h3{height: 30px;background: #777780;color: #fff;padding-right: 5px;padding-top: 5px;margin: 0;font-size: 10.5pt;line-height: 25px}
    #sidebar h3 .arrow {width: 20px;height: 11px;display: inline-block;background: url(public/images/subcatarrow.gif) no-repeat;float: left;margin-top: 8px;margin-left: 8px;}
    #sidebar ul:first-child{font-family: byekan;font-size: 10pt;padding-right: 20px;}
    .horizental-row {height: 1px;background: #ccc;margin:15px ;width: 88%;float: right;}
</style>

    <div id="sidebar">
        <h3 class="byekan">گوشی موبایل
            <span class="arrow"></span>
        </h3>
        <ul>
            <li>کالای دیجیتال
                <ul>
                    <li>
                        موبایل
                        <ul>
                            <li>
                                گوشی موبایل

                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="horizental-row"></div>
        <style>
            .filter-ul {padding-right: 5px;font-family: byekan;font-size: 10pt;}
            .filter-ul li{position: relative;}
            .filter-ul .title{font-size: 11pt;}
            .check-input{width: auto;height: auto;position: relative;z-index: 2;opacity: 0;cursor: pointer;margin-left: 8px;}
            .check-label{width: 17px !important;height: 17px;display: block;position: absolute;right: 4px;top: 3px;background:rgba(0,0,0,0) url(public/images/a-checkbox-medium-sprite.png) no-repeat -1px -1px;}
            .checked{background:rgba(0,0,0,0) url(public/images/a-checkbox-medium-sprite.png) no-repeat -1px -32px;border: none;
            }
            .filter-ul .product-color {width: 4px;height: 12px;display: inline-block;position: relative;top: 2px;margin-left: 4px;}
        </style>

        <?php
        $filterright=$data['attrright'];
        foreach ($filterright as $attr) {
            ?>

            <ul class="filter-ul">
                <li class="title">بر اساس <?= $attr['title'] ?></li>

                <?php
                $attrvalue=$attr['values'];
                foreach ($attrvalue as $val){
                ?>
                <li><label class="check-label"></label>
                    <input name="attr-<?= $attr['id'] ?>[]" value="<?= $val['id'] ?>" class="check-input" type="checkbox">
                    <?= $val['val'] ?>
                </li>
                <?php
                }
                ?>


        <div class="horizental-row"></div>

                <?php
                }
                ?>

            <ul class="filter-ul">
            <li class="title">بر اساس رنگ</li>

                <?php
                $colors=$data['colors'];
                foreach ($colors as $color){
                ?>

            <li><label class="check-label"></label>
                <input name="colorSelected[]" value="<?= $color['id'] ?>" class="check-input" type="checkbox">
                <span class="product-color"style="background: <?= $color['hex'] ?>"></span>
                <?= $color['title'] ?>
            </li>
                    <?php
                }
                ?>

        </ul>
    </div>

<script>
    $('.check-input').click(function () {
        if($(this).is(':checked')){
            $(this).parents('li').find('.check-label').addClass('checked')

        }
        else{
            $(this).parents('li').find('.check-label').removeClass('checked')
        }
        dosearch();
    })
</script>