<style>
    #introduction{float: right;width: 1130px;margin-top: 20px;background: #fff; box-shadow: 0 1px 3px #eee;padding: 10px;height: 430px;overflow: hidden;position: relative; }
    #introduction .more{display: block;text-align: center;position: absolute;bottom: 20px;font-size: 11pt;font-family: byekan;width: 100%;cursor: pointer;}
    #introduction.active{height: auto !important;}
    #introduction p {margin: 1px 3px;font-size: 10.5pt;}
</style>
<div id="introduction">
    <?= $productInfo['introduction']; ?>
</div>

<script>
    $('#introduction .more').click(function () {
        $('#introduction').toggleClass('active')
    });
</script>