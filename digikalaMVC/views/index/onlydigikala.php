<div class="sliderscroll" style="margin-top: 9px;float: right;">
    <h3>فروش انحصاری فقط در دیجی کالا</h3>
    <div class="sliderscroll-content">
        <div class="sliderscroll-prev">
            <span class="prev" onclick="sliderscroll('right',this);"></span>
        </div>
        <div class="sliderscroll-main">
            <ul>

                <?php
                    foreach ($data[3] as $row) {
                        ?>

                        <li>
                            <a href="<?= URL; ?>product/index/<?= $row['id']; ?>">
                                <img style="width: 150px;" src="public/images/products/<?= $row['id']; ?>/product_220.jpg"">
                                <p class="byekan fontsm"><?= $row ['title']; ?></p>
                                <p class="byekan oldprice"><?= $row ['price']; ?></p>
                                <p class="newprice byekan"><?= $row ['price_total']; ?></p>
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