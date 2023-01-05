<style>
    #tabChild .item{padding: 7px;}
    #tabChild .item h4{font-size: 13.5pt;font-family: byekan;margin: 5px;position: relative ;padding: 5px 0;padding-right: 40px;cursor: pointer;}
    #tabChild .item h4::after{
        content: " ";width: 91%;height: 1px;background: #ccc;position: absolute;top: 22px;left: 3px;display: block;}
    #tabChild .item h4 i {background: url(public/images/slices.png)no-repeat -259px -606px ;width: 31px;height: 56px;display: block;position: absolute;right: -17px ;}
    #tabChild .item h4.active i {background-position: -207px -606px}
    #tabChild .item:first-child h4 i {background: url(public/images/slices.png)no-repeat -153px -614px ;width: 31px;height: 44px;display: block;position: absolute;right: -16px ;}
    #tabChild .item:first-child h4.active i {background: url(public/images/slices.png)no-repeat -98px -614px ;width: 31px;height: 44px;display: block;position: absolute;right: -16px ;}
    #tabChild .item:last-child h4 i {background: url(public/images/slices.png)no-repeat -313px -615px ;width: 31px;height: 44px;display: block;position: absolute;right: -17px ;}
    #tabChild .item:last-child h4:active i {background: url(public/images/slices.png)no-repeat -207px -606px ;width: 31px;height: 44px;display: block;position: absolute;right: -17px ;}
    .itemcontainer{margin-right: 8px;border-right: 3px solid #f0f1f2;padding-bottom: 22px;}
    #tabChild .item h4 span {z-index: 1;position: relative;background: #fff;display: block;}
    .itemContainer .item .description {display: none;margin: 10px 44px;}
</style>


نقد و بررسی دیجی کالا
    <br><br><br>
    <div class="itemContainer">

        <?php
        foreach ($data[0] as $row){
        ?>

        <div class="item">
            <h4>
                <i></i>
                <span style="width: 113px;">
                       <?= $row['title']; ?>
                   </span></h4>
            <div class="description">
                <?= $row['description']; ?>
            </div>
        </div>

        <?php
        }
    ?>

    </div>

<script>
    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    });
</script>
