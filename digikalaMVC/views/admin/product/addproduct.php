<script src="public/ckeditor/ckeditor.js"></script>

<?php
$active='product';
require('views/admin/layout.php');
$productinfo=$data['productinfo'];
$edit=0;
if (isset($productinfo['title'])){
    $edit=1;
}

?>

<div class="left">
    <p class="title">
        <?php
        if ($edit==0){
        ?>
       ایجاد محصول جدید
        <?php } else { ?>
ویرایش محصول
        <?php }  ?>

        <style>
            .row{width: 100%;float: right;margin-top: 5px;}
            .span-title {display: inline-block;width: 150px;font-size: 10pt;}
            input {width: 200px;height: 24px;border: 1px solid #eee;}
            select {padding: 2px;height: 32px;font-family: byekan;}
            option {font-size: 10pt;font-family: byekan;padding: 2px;}
            textarea {width: 450px;border: 1px solid #eeeeee;height: 250px;vertical-align: top;}
            .span-item{padding: 2px 15px;display: inline-block;height: 27px;background:#8aea8c;color: #fff;text-align: center;font-size: 10pt;position: relative;margin-right: 5px;}
            .span-item img {width: 14px;height: 14px;position: absolute;top: 1px;left: 1px;cursor: pointer;}
        </style>

    <form action="adminproduct/addproduct/<?php echo @$productinfo['id'] ?>" enctype="multipart/form-data" method="post">

        <div class="row">
            <span class="span-title">عنوان محصول</span>
            <input type="text" name="title" value="<?= @$productinfo['title']; ?>">
        </div>
        <div class="row">
            <span class="span-title">دسته والد</span>
            <select name="categoryid" autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                $category=$data['category'];
                $categoryid=$productinfo['categoryid'];

                foreach ($category as $row){

                    if ($row['id']==$categoryid) {
                        $selected = 'selected';
                    }else{
                        $selected='';
                    }
                    ?>
                    <option value="<?= @$row['id'] ?>" <?= $selected; ?> ><?= @$row['title'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="row">
            <span class="span-title">قیمت</span>
            <input type="text" name="price" value="<?= @$productinfo['price']; ?>">
        </div>
        <div class="row">
            <span class="span-title">تصویر محصول</span>
            <input type="file" name="image" value="">
            <?php
            if (isset($productinfo['title'])) {
                ?>
                <div
                    style="width: 220px;height: 220px;display: inline-block;float: left; background: url(public/images/products/<?= $productinfo['id'] ?>/product_220)">
                </div>
                <?php
            }
            ?>
        <div class="row">
            <span class="span-title">معرفی اجمالی</span>
            <textarea class="editor1" id="editor1" name="introduction" ><?= @$productinfo['introduction']; ?></textarea>
        </div>

        <script>
            CKEDITOR.replace('editor1',{

            })
        </script>

        <div class="row">
            <span class="span-title">تعداد موجود</span>
            <input type="text" name="tedad_mojood" value="<?= @$productinfo['tedad_mojood']; ?>">
        </div>
        <div class="row">
            <span class="span-title">میزان تخفیف (بر حسب درصد)</span>
            <input type="text" name="discount" value="<?= @$productinfo['discount']; ?>">
        </div>
        <div class="row">
            <span class="span-title">رنگ بندی</span>
            <select autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                $color=$data['color'];


                foreach ($color as $row){

                    ?>
                    <option data-title="<?php echo $row['title']; ?>" onclick=addcolor("<?php echo $row['id']; ?>","<?php echo $row['hex']; ?>",this) value="<?= $row['id'] ?>" ><?= $row['title'] ?></option>
                    <?php
                }

                ?>
            </select>

            <?php
            $colorinfo=$productinfo['colorinfo'];
            $colorinfo=array_filter($colorinfo);
            foreach ($colorinfo as $row){
                ?>
                <span style="background:<?= @$row['hex'] ?>" class="span-item"><input type="hidden" value="<?= @$row['id'] ?>" name="color[]"><img onclick="removeItem(this)" src="public/images/closeIcon.png"><?= @$row['title'] ?></span>
                <?php
            }
            ?>

            </div>

        <div class="row">
            <span class="span-title">انتخاب گارانتی</span>
            <select autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                $gauranty=$data['gauranty'];


                foreach ($gauranty as $row){

                    ?>
                    <option data-title="<?php echo $row['title']; ?>" onclick=addgauranty("<?php echo $row['id']; ?>",this) value="<?= $row['id'] ?>" ><?= $row['title'] ?></option>
                    <?php
                }
                ?>
            </select>

            <?php
            $gaurantyinfo=$productinfo['gaurantyinfo'];
            $gaurantyinfo=array_filter($gaurantyinfo);
            foreach ($gaurantyinfo as $row){
                ?>
                <span class="span-item"><input type="hidden" value="<?= @$row['id'] ?>" name="gauranty[]"><img onclick="removeItem(this)" src="public/images/closeIcon.png"><?= @$row['title'] ?></span>
                <?php
            }
            ?>

        </div>

        <a style="cursor: pointer;" class="btn-green" onclick="submintForm()">اجرای عملیات</a>

    </form>

</div>



</div>

<script>

    function addcolor(colorId,colorHex,callerTag) {
        var colorName=$(callerTag).attr('data-title');
        var spanTag= '<span style="background:'+colorHex+'" class="span-item"><input type="hidden" value="'+colorId+'" name="color[]"><img onclick="removeItem(this)" src="public/images/closeIcon.png">'+colorName+'</span>';
        var rowDiv=$(callerTag).parents('.row');
        rowDiv.append(spanTag);

    }

    function removeItem(callerTag) {
        var spanItem=$(callerTag).parents('.span-item');
        spanItem.remove();

    }
    
    function addgauranty(gaurantyId,callerTag) {
        var gaurantyName=$(callerTag).attr('data-title');
        var spanTag= '<span class="span-item"><input type="hidden" value="'+gaurantyId+'" name="gauranty[]"><img onclick="removeItem(this)" src="public/images/closeIcon.png">'+gaurantyName+'</span>';
        var rowDiv=$(callerTag).parents('.row');
        rowDiv.append(spanTag);
    }
    
</script>