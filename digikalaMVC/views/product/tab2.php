<style>
    .section-fanni h4 {font-size: 13.5pt;font-family: byekan;}
    .section-fanni .row {width: 100%;float: right;font-family: byekan;font-size: 10pt;margin-bottom: 10px;}
    .section-fanni .row .right {width: 225px;float: right;background: #efefef;padding: 5px;margin-left: 20px;border-radius: 4px;}
    .section-fanni .row .left {width: 870px;float: right;background: #f7f9fa;padding: 5px;border-radius: 4px;}
</style>


<?php
foreach ($data[0] as $attrparent) {
    $children=$attrparent['children'];
    ?>

    <h4>
        <?= $attrparent['title'] ?>
    </h4>
    <?php
    foreach ($children as $child){
    ?>
    <div class="row">
        <div class="right">
            <?= $child['title'] ?>
        </div>
        <div class="left">
            <?php
            if ($child['value']==''){echo '-';}
            else {echo $child['value']; }
            ?>
        </div>
    </div>
        <?php
}
?>

    <?php
}
?>

