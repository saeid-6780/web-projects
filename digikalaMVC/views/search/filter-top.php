<style>
    .filter-top{padding: 0;width: 100%;float: right;margin-top: 15px;}
    .filter-top > li{width: 140px;height: 24px;float: right;font-size: 9.5pt;background: #eee; ;border-radius: 1px;border: 1px solid #ccc;margin-left: 10px;padding-right: 4px;position: relative;
        cursor: pointer;}
    .filter-top li img{float: left;margin-top: 5px;margin-left: 8px;}
    .filter-top li .options{width: 155px;height: 205px;background: #fff;box-shadow: -4px 4px 3px rgba(0,0,0,0.2);border-right: 1px solid #ccc;position: absolute;top: 24px;right: -1px;line-height: 19px;overflow-y: auto;overflow-x: hidden;display: none;z-index: 2;}
    .options ul li {font-size: 9.6pt;padding-right: 12px;cursor: pointer}
    .options ul {padding-top: 10px;}
    .filter-top .options .square {width: 10px;height: 10px;display: inline-block;background: url(public/images/spritefiltercontrols.png)no-repeat -58px -154px ;vertical-align: middle;margin-left: 3px}


    .square-hover{background: url(public/images/spritefiltercontrols.png)no-repeat -58px -205px !important;}

    .square-selected {background: url(public/images/spritefiltercontrols.png)no-repeat -58px -256px !important;}
    .filters-selected {width: 100%;}
    .remove-filter{width: 9px;height: 14px;background: url(public/images/spritefiltercontrols.png)no-repeat -57px -382px ;display:inline-block;margin-left: 4px;margin-right: 4px;vertical-align: middle;cursor: pointer;}
    .filter-selected-span{background: #eeeeee;font-size: 9.6pt;font-family: byekan;margin-left: 10px;border-radius: 2px;box-shadow: 1px 1px 3px rgba(0,0,0,.15);float: right}
</style>

<div id="filters-selected" >

</div>

<ul class="filter-top">

    <?php
    $attr=$data['attr'];
    foreach ($attr as $row){
    ?>

    <li class="byekan">
        <img src="public/images/sideArrow.gif">
        <span class="title">
                <?= $row['title']; ?>
                    </span>
        <div class="options">
            <ul>
                <li data-id="0">
                    <span class="square"></span>
                    نمایش همه
                </li>
                <div class="horizental-row"></div>
                <?php
                $values=$row['values'];
                foreach ($values as $value) {
                    ?>
                    <li data-id="<?= $value['id']; ?>" data-attr-id="<?= $row['id']; ?>">
                        <span class="square"></span>
                        <?= $value['val']; ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </li>

    <?php
    }
?>

</ul>

<script>
    var filters=$('.filter-top > li');
    filters.hover(function () {
        $('.options',this).slideDown(200);
    },function () {
        $('.options',this).slideUp(200);
    });

    var items=$('.filter-top .options ul li');
    items.hover(function () {
        $('.square',this).addClass('square-hover');
    },function () {
        $('.square',this).removeClass('square-hover');
    });

    var removeIcon=$('.filter-selected-span i');

    items.click(function () {

        var title = $(this).parents('li').find('.title').text();
        var value = $(this).text();
        var id = $(this).attr('data-id');
        var attrid = $(this).attr('data-attr-id');

        var filterSelected = $('#filters-selected');
        var filterSselectedSpan=filterSelected.find('span[data-id='+id+']')
        var len = filterSselectedSpan.length;
        if (len > 0) {
            filterSselectedSpan.remove();
        }
        else {
            var span = '<span data-id="' + id + '" class="filter-selected-span">' + title + ':' + value + '<i class="remove-filter" onclick="removeSelected(this)" ></i><input type="hidden" name="attr-'+attrid+'[]" value="'+id+'"></span>';
            filterSelected.append(span);
        }
        $('.square', this).toggleClass('square-selected');

        dosearch();

    });

    function removeSelected(tag) {
        var spanTag =$(tag).parents('span');
        spanTag.remove();
        var id =spanTag.attr('data-id');
        $('.options li[data-id='+id+']').find('.square').removeClass('square-selected');

        dosearch();
    }

</script>