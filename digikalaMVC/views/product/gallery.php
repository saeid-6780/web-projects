<style>
    #product-gallery{width: 900px;height: 560px;position: fixed;background: #fff;left:0 ;top:10px; right: 0;margin: auto;z-index: 3;display: none;}
    #dark {width: 100%;height: 100% ;background: rgba(0,0,0,0.3);position: fixed;top: 0;right: 0;z-index: 2;display: none;}
    #product-gallery h4 {font-family: byekan;font-size: 13.5pt;padding: 8px;background: #eee;  margin: 0;position: relative}
    #product-gallery h4 .close{width: 28px;height: 28px;display: block;float: left;background: url(public/images/slices.png) no-repeat -134px -123px;position: absolute;top: 8px;left: 8px;border: 1px solid #ccc;border-radius: 50%;cursor: pointer;}
    #product-gallery .gright{width: 700px;float: right;height:515px; }
    #product-gallery .gright .item {height: 100%;}
    #product-gallery .gright img{max-height: 100%;max-width: 100%}
    #product-gallery .gleft{width: 197px;float: left;height:515px;border-right: 1px solid #ccc;overflow-y: auto; }
    #product-gallery .gleft ul{padding: 0;width: 100%;}
    #product-gallery .gleft ul li{height: 123px;border-bottom: 1px solid #ccc;text-align: center;width:100% ;margin: 0 auto;display: block;cursor: pointer;opacity: 0.6}
    #product-gallery .gleft ul li.active{opacity: 1 !important;}
    #product-gallery .gleft ul li img{margin-top: 7px;max-width: 100%;max-height: 100%;position: relative;}
    #product-gallery .gright .item {display: none;}
    #product-gallery .Icon3D{background: url(public/images/slices.png) no-repeat -363px -117px;display: block;width: 28px;height: 28px;position: absolute;left: 4px;bottom: 4px;}
    #product-gallery .gright #cv{width:420px ;height:320px;margin: auto;position: relative;right: 133px;}

</style>
<div id="product-gallery">
    <h4><?= $data['productinfo']['title']; ?>
        <span class="close"></span>
    </h4>
    <div class="gright">
        <canvas id="cv"></canvas>
        <img class="mainImage" src="">

    </div>
    <div class="gleft">
        <ul>

            <?php
            foreach ($data['gallery'] as $row){
            ?>
                <?php
                if ($row['threed']==1){
                ?>
                    <li data-image-src="">
                        <img src="public/images/products/<?= $row['productid']; ?>/gallery/small/<?= $row['img']; ?>">
                        <span class="Icon3D"></span>
                    </li>
                <?php } else{ ?>
                <li data-image-src="public/images/products/<?= $row['productid']; ?>/gallery/large/<?= $row['img']; ?>">
                    <img src="public/images/products/<?= $row['productid']; ?>/gallery/small/<?= $row['img']; ?>">
                </li>
            <?php }} ?>

        </ul>
    </div>
</div>

<div id="dark"></div>

<ul>
    <?php
    foreach ($data['gallery'] as $row){
        if ($row['threed']==0){
    ?>
    <li style="width: 60px;" data-image-src="public/images/products/<?= $row['productid']; ?>/gallery/large/<?= $row['img']; ?>"><img src="public/images/products/<?= $row['productid']; ?>/gallery/small/<?= $row['img']; ?>"></li>
    <?php } }?>

    <li>
        <span style="width: 35px;height: 17px;display: block;background: url(public/images/slices.png)no-repeat -562px -28px;float: right;margin-right: 20px;margin-top: 21px;"></span>
    </li>
</ul>
</div>
</div>

<script>

    var canvasTag = document.getElementById('cv');
    var viewer = new JSC3D.Viewer(canvasTag, {
        SceneUrl:'public/images/products/<?= $data['productinfo']['id']; ?>/3d/bmw.obj',
        InitRotationX:-100,
        InitRotationY:-100,
        InitRotationZ:0,
        RenderMode:'texturesmooth'
    });
    viewer.init();
    viewer.update();


    $('#zoom-product').elevateZoom({'zoomWindowOffetx':-800,'scrollZoom':true,'easing':true,'zoomWindowWidth':500,'zoomWindowHeight':500,'lensFadeIn':true ,'lensFadeOut':true,'zoomWindowFadeIn':true,'zoomWindowFadeOut':true});


    var productGallery=$('#product-gallery');
    var productGalleryItems=productGallery.find('.item');
    function showGallery(imageUrl,index) {
        productGalleryThumbnails.removeClass('active');
        productGalleryThumbnails.eq(index).toggleClass('active');
        if(imageUrl.length>0){
            productGallery.find('.mainImage').attr('src',imageUrl);
            $('#cv').fadeOut(1);
            $('.mainImage').fadeIn(100);
        }else {
            $('.mainImage').fadeOut(1);
            $('#cv').fadeIn(100);
        }

    }
    var productGalleryThumbnails=productGallery.find('.gleft ul li');
    productGalleryThumbnails.click(function () {
        var index =$(this).index();
        var imgSrc=$(this).attr('data-image-src');
        showGallery(imgSrc,index);
    });

    productGallery.find('.close').click(function () {
        productGallery.fadeOut(200);
        $('#dark').fadeOut(100);
    });

    $('.gallery ul li').click(function () {
        productGallery.fadeIn(200);
        $('#dark').fadeIn(100);
        var index=$(this).index();
        var imgSrc=$(this).attr('data-image-src');
        showGallery(imgSrc,index);
    })


    $("#product-gallery .gleft").mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        setTop: 0,
        setLeft: 0,
        axis: "y",
        scrollbarPosition: "inside",
        scrollInertia: 950,
        autoDraggerLength: true,
        autoHideScrollbar: false,
        autoExpandScrollbar: false,
        alwaysShowScrollbar: 0,
        snapAmount: null,
        snapOffset: 0,
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y",
            preventDefault: false,
            deltaFactor: "auto",
            normalizeDelta: false,
            invert: false,
            disableOver: ["select", "option", "keygen", "datalist", "textarea"]
        },
        scrollButtons: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        keyboard: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        contentTouchScroll: 25,
        advanced: {
            autoExpandHorizontalScroll: false,
            autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
            updateOnContentResize: true,
            updateOnImageLoad: true,
            updateOnSelectorChange: false,
            releaseDraggableSelectors: false
        },
        theme: "3d-dark",

        callbacks: {
            onInit: false,
            onScrollStart: false,
            onScroll: false,
            onTotalScroll: false,
            onTotalScrollBack: false,
            whileScrolling: false,
            onTotalScrollOffset: 0,
            onTotalScrollBackOffset: 0,
            alwaysTriggerOffsets: true,
            onOverflowY: false,
            onOverflowX: false,
            onOverflowYNone: false,
            onOverflowXNone: false
        },
        live: false,
        liveSelector: null

    });
</script>