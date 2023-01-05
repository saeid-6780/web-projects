<style>
    .favorites ul {padding: 10px;background: #eee;border: 1px dashed #ccc;width: 96%;float: right;padding-bottom: 22px;font-family:byekan;}
    .favorites ul li{width: 280px;height: 36px;margin-right: 20px;float: right;}
    .favorites ul li a{display: block;height: 100%;position:relative;padding: 5px;cursor: pointer;}
    .favorites ul li.active a{background: #fff ;border: 1px solid #ccc ;}
    .favorites ul li a:hover{background: #fff;border: 1px solid #ccc;}
    .favorites ul li a .folder{vertical-align: middle;}
    .favorites ul li a .edit{position: absolute;top: 2px;left: 2px;display: none;}
    .favorites ul li a span{font-family: byekan;font-size: 10.3pt;margin-right: 7px;}
    .favorites .savebtn {
        display: block;background: green;color:#fff;font-family: byekan;font-size: 9pt;text-align: center;padding:0 3px;border-radius: 2px;position: absolute;bottom: 1px;left: 1px;cursor: pointer;display: none;}
</style>

<section class="favorites" >
    <ul>
        <li onclick="getfavorit(0)" >
            <a>
                <img class="folder" src="public/images/folder_documents_all.png">
                <span>همه پوشه ها</span>

            </a>
        </li>
        <?php
        $favoritfolder=$data['favoritfolder'];
        foreach ($favoritfolder as $row) {
            ?>
            <li onclick="getfavorit(<?= $row['id'] ?>)">
                <a>
                    <img class="folder" src="public/images/folder_documents_all.png">

                    <span class="title"><?= $row['title'] ?></span>
                    <img onclick="startedit(this)" class="edit" src="public/images/icon_edit_16.png">
                    <span onclick="saveedit(<?= $row['id'] ?>,this)" class="savebtn">ذخیره</span>
                </a>
            </li>
            <?php
        }
        ?>
    </ul>

    <style>
        .favorites .item {float: right;width: 96%;margin-top: 10px;border 1px dotted;padding: 7px;}
        .favorites .item .right{float: right;}
        .favorites .item .right img{width: 110px; height: 110px;border: 1px solid #eee;border-radius:3px; }
        .favorites .item .left{width: 962px;float: right;margin-right: 5px;padding-left: 25px;}
        .favorites .item .left h4{font-family: byekan;margin: 0px;font-size: 12.8pt;position: relative}
        .favorites .item .left h4 .edit{position: absolute;left:20px ;top: 5px;cursor: pointer;}
        .favorites .item .left h4 .delete{position: absolute;left:-1px ;top: 5px;cursor: pointer;}
        .favorites .item .left .discription{font-family: byekan;font-size: 11pt;}
    </style>

    <div class="items">

    </div>

</section>

<script>

    function deletefavorit(favoritid,tag) {
        var item=$(tag).parents('.item');
        var url='panel/deletefavorit';
        var data={'favoritid':favoritid};
        $.post(url,data,function (msg) {
            item.remove();
        })
    }

    function saveedit(folderid,tag) {
        var spantag=$(tag);
        var litag=spantag.parents('li');
        var inputtag=litag.find('.title input');
        var newname=inputtag.val();

        var url='panel/saveedit';
        var data={'folderid':folderid,'newname':newname};
        $.post(url,data,function (msg) {
            litag.find('.title').html(newname);
            litag.find('.savebtn').hide();
        })
    }

    $('.favorites li .edit').click(function(e){
       e.stopPropagation();
    });
    $('.favorites li .savebtn').click(function(e){
        e.stopPropagation();
    });


    function startedit(tag) {

        var imgtag=$(tag);
        var litag=imgtag.parents('li');
        var spantitle=litag.find('.title');
        var title=spantitle.text();

        var inputtag='<input type="text" value="'+title+'">';
        spantitle.html(inputtag);
        $('.favorites li input').click(function(e){
            e.stopPropagation();
        });

        litag.find('.savebtn').fadeIn(50);
    }

    function getfavorit(folderid) {
        url='panel/getfavorit';
        data={'folderid':folderid};
        $.post(url,data,function (msg) {
            console.log(msg);

            $('.items').html('');
            
            $.each(msg,function (index,val) {
                var item='<div class="item"><div class="right"><img src="public/images/products/'+val['productid']+'/product_220.jpg"></div><div class="left"><h4>'+val['producttitle']+'<img class="edit" src="public/images/Edit.gif"><img onclick="deletefavorit('+val['id']+',this)" class="delete" src="public/images/Delete.gif"></h4><p class="discription">'+val['description']+'</p></div></div>';
                $('.items').append(item);
            })

            
        },'json');
    }

    $('.favorites ul li a').hover(function () {
        $('.edit',this).fadeIn(100);
    },function () {
        $('.edit',this).fadeOut(100);
    });

    $('.favorites ul li').click(function () {
        $('.favorites ul li').find('.savebtn').hide();
        $('.favorites ul li').removeClass('active');
        $(this).addClass('active');
    })

</script>