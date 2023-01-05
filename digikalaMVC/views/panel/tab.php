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

<?php
$activetab=$data['activetab']
?>
<div class="box">
    <div class="header"></div>

    <ul id="tab">
        <li class="<?php if ($activetab=='message'){ echo 'active'; } ?>">
            پیغام های من
        </li>
        <li >
            سفارشات من
        </li>
        <li >
            لیست مورد علاقه
        </li>
        <li >
            نقدهای من
        </li>
        <li >
            نظرات من
        </li>
        <li class="<?php if ($activetab=='digibon'){ echo 'active'; } ?>" >
            دیجی بن های من
        </li>
    </ul>

    <style>
        #tabChild {float: right;width: 100%;background: #fff;}
        #tabChild section{padding: 10px;font-family: byekan;font-size: 12pt;display: none;float: right;width: 100%;}
        #tabChild section:first-child{/*display: block;*/}
        #tabChild section > table{width: 97%;}

        #tabChild section > table td{text-align: center;padding: 4px;border-left: 1px solid #ccc;border-bottom: 1px solid #ccc;}
        #tabChild section > table tr{background: #eee;color: #000;font-size: 10pt;font-family: byekan;}
        #tabChild section > table tr:first-child{background: #3c3c3c;color: #fff;font-size: 10.7pt;font-family: byekan;}

        #tabChild section > table .subtable{box-shadow: 0 0 5px #ccc;background: #fff;padding: 10px;}
        #tabChild .myOrders > table .subtable > table{width: 100%}
        #tabChild .myOrders > table .subtable > table tr{background: #fff ;color: #000;font-size: 11pt;}
        #tabChild .myOrders > table .subtable > table tr:first-child{background: #eee ;color: #000;font-size: 11pt;}
        h4.title {font-family: byekan;font-size: 11.4pt;font-weight: normal;padding-right: 10px;margin: 4px 0;background: #eeeeee;}
        table .details{display: none}

    </style>

    <div id="tabChild">
        <?php
        require ('tab1.php');
        require ('tab2.php');
        require ('tab3.php');
        require ('tab4.php');
        require ('tab5.php');
        require ('tab6.php');
        ?>

    </div>