
<style>
    #main::after{content: " ";clear: both;display: block;}
    #main {width: 1150px;margin: 10px auto;background: #fff;box-shadow: 0 1px 3px #eee;padding: 25px}
</style>

<div id="main">
    <form id="form-search" action="search/dosearch" method="post">
    <?php
    require ('sidebar.php');
    ?>
    <div id="content">

        <?php
        require ('navigator.php');
        ?>

        <div class="horizental-row"></div>
        <?php
        require ('filter-top.php');
        require ('search.php');
        require ('product.php');
        ?>

    </div>

    </form>


</div>


<script>

    var current_page=1;

function dosearch(page) {

        if (typeof (page)!='undefined'){
            current_page=page;
        }else {
            current_page=1;
        }

        if (current_page<1){
            current_page=1;
        }

        var last_page=$('#pagination ul li:last').text();;
    if (current_page>last_page){
        current_page=last_page;
    }

    var data=$('#form-search').serializeArray();
    var exist=0;
    if ($('.exist').hasClass('active')==true){
        exist=1;
    }
    data.push({'name':'exist','value':exist});
    var keyword=$('#keyword').val();
    data.push({'name':'keyword','value':keyword});


    data.push({'name':'current_page','value':current_page});

    var limit=$('#limit option:selected').val();
    data.push({'name':'limit','value':limit});

    var url='search/dosearch';
    $.post(url,data,function (msg) {

        var item='<li><a><div class="right"><div class="textcenter" style="margin-top: 4px;"><img src="public/images/product1.jpg"></div><div class="colors textcenter"><span class="color" style="background: silver;"></span><span class="color" style="background: gold;"></span><span class="color" style="background: #fff;"></span></div><div class="stars"><div class="gray textcenter"><div class="red"></div></div></div></div><div class="left"><div class="title byekan">گوشی موبایل سامسونگ</div><div class="discription">برخی توضیحات محصول</div><div class="byekan price "><p class="price-old textcenter"> تومان2,000,000</p><p class="price-new textcenter"> تومان1,600,000</p><span class="addToCard"></span>/div></div></a></li>';

        $('#product ul').html('');

        $.each(msg[0],function (index,val) {
            var item='<li><a><div class="right"><div class="textcenter" style="margin-top: 4px;"><img src="public/images/products/'+val['id']+'/product_220.jpg"></div><div class="colors textcenter"><span class="color" style="background: silver;"></span><span class="color" style="background: gold;"></span><span class="color" style="background: #fff;"></span></div><div class="stars"><div class="gray textcenter"><div class="red"></div></div></div></div><div class="left"><div class="title byekan">'+val['title']+'</div><div class="discription">برخی توضیحات محصول</div><div class="byekan price "><p class="price-old textcenter"> تومان'+val['price']+'</p><p class="price-new textcenter"> تومان1,600,000</p><span class="addToCard"></span></div></div></a></li>';

           $('#product ul').append(item);

        })

        var pagenumber=msg[1];
        var i;
        var active='';
        $('#pagination ul').html('');

        var start=current_page-2;
        if (start<1){start=1;}
        var end=current_page+2;
        if (end>pagenumber){end=pagenumber;}
        for (i=start;i<=end;i++){
            if (i==current_page){
                active='active'
            }
            $('#pagination ul').append('<li onclick="pagination(this,'+i+')" class="'+active+'">'+i+'</li>')
            active='';
        }

    },'json')
}
dosearch();

</script>

