
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main{
        width: 1150px; margin:10px auto ; padding: 25px;font-family: byekan;
    }

</style>

<div id="main">

    <script src="public/js/jquery.elevatezoom.js"></script>
    <script src="public/js/scroll/jquery.mCustomScrollbar.js"></script>
    <script src="public/js/3d/jsc3d.js"></script>
    <script src="public/js/3d/jsc3d.touch.js"></script>
    <script src="public/js/3d/jsc3d.webgl.js"></script>
    <link href="js/scroll/jquery.mCustomScrollbar.css" rel="stylesheet">

<?php
$productInfo=$data['productinfo'];
if($productInfo['special']==1) {
    require('offer.php');
}
require ('details.php');
require ('introduction.php');
require ('onlydigikala.php');
require ('tabs.php');

?>




</div>

<script>




    /*$('.sliderscroll-next').click(function () {
     sliderscroll('left');
     })
     $('.sliderscroll-prev').click(function () {
     sliderscroll('right');
     })*/



    </script>