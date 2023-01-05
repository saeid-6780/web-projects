<style>
    #tab {width: 1150px;margin-top: 20px;background: #f5f6f7;padding: 0;float: right;}
    #tab li{float: right;padding: 15px;font-size: 11.5pt;font-family: byekan;border-left: 1px solid #eee;cursor: pointer;position: relative;padding-right: 37px;}
    #tab li::before{content: "";width: 30px;height: 26px;display: block;background: url(public/images/slices.png) no-repeat;position: absolute;right: 3px;top: 17px;}
    #tab .naghd::before {background-position: -105px -266px}
    #tab .fanni::before {background-position: -315px -266px}
    #tab .nazar::before {background-position: -261px -266px}
    #tab .porsesh::before {background-position: -210px -266px}
    #tab .naghd.active::before {background-position: -105px -308px}
    #tab .fanni.active::before {background-position: -315px -308px}
    #tab .nazar.active::before {background-position: -261px -308px}
    #tab .porsesh.active::before {background-position: -210px -308px}
    #tab li.active{background: #fff;box-shadow: 0 1px 3px rgba(0,0,0,0.2) ;border-top: 2px solid blue;color: blue;}

</style>
<ul id="tab">
    <li class="naghd">
        نقد و بررسی تخصصی
    </li>
    <li class="fanni">
        مشخصات فنی
    </li>
    <li class="nazar">
        نظرات کاربران
    </li>
    <li class="porsesh">
        پرسش و پاسخ
    </li>
</ul>

<style>
    #tabChild {float: right;width: 100%;background: #fff;}
    #tabChild section{padding: 10px;font-family: byekan;font-size: 12pt;display: none;float: right;width: 100%;}
    #tabChild section:first-child{display: block;}

</style>

<div id="tabChild">


    <section>
    </section>
    <section class="section-fanni">
    </section>
    <section>
    </section>
    <section>
    </section>

    <?php
    /*require ('tab1.php');
    require ('tab2.php');
    require ('tab2.php');
    require ('tab2.php');*/
    ?>



</div>

<script>

    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    });

    $('#tab li').click(function () {

        changetab($(this));

    });

    function changetab(tag) {

        $('#tab li').removeClass('active');
        tag.addClass('active');
        $('#tabChild section').hide();
        var index=tag.index();
        var section_selected=$('#tabChild section').eq(index);

        var url='<?= URL ?>product/tab/<?= $productInfo['id'] ?>/<?= $productInfo['categoryid'] ?>';
        var data={'number':index};
        $.post(url,data,function (msg) {
            section_selected.html(msg);
        });
        section_selected.fadeIn(200);
    }

    $('#tab .<?= $data['activetab'] ?>').trigger('click');

</script>