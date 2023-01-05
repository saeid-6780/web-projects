<section style="display: none;">

    <table cellspacing="0">
        <tr>
            <td>ردیف</td>
            <td>تاریخ</td>
            <td>کالا</td>
            <td>می پسندم</td>
            <td>مشاهده</td>
            <td>ویرایش</td>
            <td>حذف</td>
        </tr>

        <?php
        $comment=$data['comment'];
        $i=1;
        foreach ($comment as $row) {
            ?>

            <tr>
                <td><?= $i ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['producttitle'] ?></td>
                <td><?= $row['likenum'] ?></td>
                <td><a href="product/index/<?= $row['productid'] ?>/nazar#comment<?= $row['id'] ?>">
                        <img src="public/images/View.gif">
                    </a>
                </td>
                <td><a href="addcomment/index/<?= $row['productid'] ?>">
                        <img src="public/images/Edit.gif">
                    </a>
                    </td>
                <td><img onclick="deletecomment(<?= $row['id'] ?>,this)" style="cursor: pointer" src="public/images/Delete.gif"></td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </table>
</section>

<script>
    function deletecomment(commentid,tag) {
        var imgtag=$(tag);
        var parrenttag=imgtag.parents('tr');

        var url='panel/deletecomment/'+commentid;
        var data={};
        $.post(url,data,function (msg) {
            parrenttag.remove();
        })
    }
</script>