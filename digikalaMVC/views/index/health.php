<div class="sliderscroll" style="margin-top: 9px;float: right;">
    <h3>پربازدید ترین کالاها</h3>
    <div class="sliderscroll-content">
        <div class="sliderscroll-prev">
            <span class="prev" onclick="sliderscroll('right',this);"></span>
        </div>
        <div class="sliderscroll-main">
            <ul>
                <?php
                foreach ($data[4] as $row) {
                    ?>

                    <li>
                        <a href="<?= URL; ?>product/index/<?= $row['id']; ?>">
                            <img style="width: 150px;" src="public/images/products/<?= $row['id']; ?>/product_220.jpg"">
                            <p class="byekan fontsm"><?= $row['title'] ?></p>
                            <p class="byekan newprice"><?= $row['price'] ?></p>
                        </a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
        <div class="sliderscroll-next">
            <span class="next" onclick="sliderscroll('left',this)"></span>
        </div>
    </div>

</div>