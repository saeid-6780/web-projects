
<div id="main" style="width: 1200px; margin: 10px auto">
    <div id="banner-top" style="width: 100%; height: 138px;">
        <img style="box-shadow: 0 4px 5px #eee; border-radius: 4px;width: 100%;" src="public/images/banner.jpg">
    </div>

    <?php
    require ('sidebar-right.php');
    ?>

    <div id="content" style="width: 890px; float: left;margin-top: 10px">

        <?php
        require ('slider1.php');
        require ('slider2.php');
        ?>

        </div>

    <?php
    require ('services-feature.php');
    require('mobile.php');
    require ('direct-access.php');
    require ('lavazem-mobile.php');
    require ('health.php');
    require ('onlydigikala.php');
    require ('newgoods.php');


    ?>





    </div>
</div>


<script>


    function sliderScrollNumbers(itemNum) {

        if (itemNum < 4) {
            return 1;
        }
        else {
            return (itemNum - 3);
        }
    }
    function sliderscroll(direction, tag) {
        var spanTag = $(tag);
        var sliderscrolltag = spanTag.parents('.sliderscroll');
        var sliderscrollUL = sliderscrolltag.find('.sliderscroll-main ul');
        var sliderscrollItems = sliderscrollUL.find('li');
        var sliderscrollItemsNumbers = sliderscrollItems.length;
        var maxNegativeMargin = (sliderScrollNumbers(sliderscrollItemsNumbers) - 1) * -192;
        sliderscrollUL.css('width', sliderscrollItemsNumbers * 195);
        var marginrightnew = sliderscrollUL.css('margin-right');
        marginrightnew = parseFloat(marginrightnew);
        if (direction == 'left') {
            marginrightnew = marginrightnew - 192;
        }
        else if (direction == 'right') {
            marginrightnew = marginrightnew + 192;
        }
        if (marginrightnew < maxNegativeMargin) {
            marginrightnew = 0;
        }
        if (marginrightnew > 0) {
            marginrightnew = maxNegativeMargin;
        }
        sliderscrollUL.animate({'marginRight': marginrightnew}, 1000)
    }

    /*$('.sliderscroll-next').click(function () {
     sliderscroll('left');
     })
     $('.sliderscroll-prev').click(function () {
     sliderscroll('right');
     })*/

    var slidertag = $('#slider');
    var slideritem = slidertag.find('.item');
    var nextslide = 1;
    var numitems = slideritem.length;
    var slidernavigator = slidertag.find('#slider-navigator ul li')
    function slider() {
        if (nextslide > numitems) {
            nextslide = 1;
        }
        if (nextslide < 1) {
            nextslide = numitems;
        }
        slideritem.hide();
        slideritem.eq(nextslide - 1).fadeIn(200);
        slidernavigator.removeClass('active');
        slidernavigator.eq(nextslide - 1).addClass('active');
        nextslide++;
    }
    function goToNext() {
        slider();
    }

    $('#slider #next').click(function () {
        clearInterval(topslidertimer);
        goToNext();
    })

    function goToPrev() {
        nextslide = nextslide - 2;
        slider();
    }

    $('#slider #prev').click(function () {
        clearInterval(topslidertimer);
        goToPrev();
    })

    function goToSlide(index) {

        nextslide = index;
        slider();
    }

    $('#slider #slider-navigator ul li').hover(function () {
        clearInterval(topslidertimer);
        var index = $(this).index();
        goToSlide(index + 1);
    }, function () {

    })

    $('#services-feature ul li a').hover(function () {
        $(this).addClass('activetopnav');
    }, function () {
        $(this).removeClass('activetopnav');
    })

    var timeout = 5000;
    slider();
    var topslidertimer = setInterval(slider, timeout);

    slidertag.mouseleave(function () {
        clearInterval(topslidertimer);
        topslidertimer = setInterval(slider, timeout);
    })

    /*main-slider*/

</script>

