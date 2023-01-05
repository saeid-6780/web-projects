
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{
        width: 1150px; margin:10px auto ; padding: 25px}

</style>

<div id="main">

    <?php
    require ('user-profile.php');
    require ('report.php');
    require ('tab.php');
    ?>

    </div>

    <script>

        function showDetailsTr(tag) {
            var imgTag=$(tag);
            imgTag.toggleClass('open');
            if (imgTag.hasClass('open')){
                imgTag.attr('src','public/images/orderdetailsclose.png');
            }else {
                imgTag.attr('src','public/images/orderdetailsopen.png');
            }
            var parentTr=imgTag.parents('tr');
            parentTr.next().fadeToggle(100);
        }

        $('#tab li').click(function () {
            $('#tabChild section').hide();
            $('#tab li').removeClass('active');
            var index=$(this).index();
            $('#tabChild section').eq(index).fadeIn(200);
            $(this).addClass('active');
        })
        //$('#tabChild section').eq(0).fadeIn(200);
        //$('#tab li').eq(0).addClass('active');

    </script>


</div>


<script>

    $('.itemContainer .item h4').click(function () {
        var item=$(this).parents('.item');
        $(this).toggleClass('active');
        $('.description',item).slideToggle(200);
    })

    $('#tab li').click(function () {
        $('#tabChild section').hide();
        $('#tab li').removeClass('active');
        var index=$(this).index();
        $('#tabChild section').eq(index).fadeIn(300);
        $(this).addClass('active');

    })

    $('#introduction .more').click(function () {
        $('#introduction').toggleClass('active')
    });

    $('#selectList').click(function () {
        var ulTag=$('ul ', this);
        ulTag.slideToggle(200);
    });

    $('#selectList ul li').click(function () {
        var zemanattxt=$(this).text();
        $('#selectList .zemanattitle').text(zemanattxt);

    });

    $('#details .left .right .colors li ').click(function () {
        $('.circle').removeClass('active');
        $('.circle' , this).addClass('active');
    })

</script>


