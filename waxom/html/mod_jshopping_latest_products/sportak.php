<div class="latest_products jshop">

    <div data-uk-slider="{center:true, autoplay:true, pauseOnHover:true, autoplayInterval:5000}">

        <div class="uk-slider-container">
            <ul class="uk-slider uk-grid-width-large-1-6 uk-grid-width-medium-1-4 uk-grid-width-small-1-1  uk-grid uk-grid-medium">



                <?php if (count($rows)) foreach ($rows as $product) { ?>
                        <li class="block_item">

                            <div class="image">
                                <div class="image_block">
                                    <?php print $product->_tmp_var_image_block; ?>
                                    <a href="<?php print $product->product_link ?>">
                                        <img class="jshop_img" src="<?php print $product->image ? $product->image : $noimage; ?>" alt="<?php print htmlspecialchars($product->name); ?>" />
                                    </a>
                                </div>
                                <div class="name">
                                    <a href="<?php print $product->product_link ?>"><?php print $product->name ?></a>
                                </div>
                            </div>
                            <div class="actions-wrap">
                            <div class="price-wrap">
                            <?php if ($product_old_price) { ?>
                                <?php if ($product->product_old_price > 0) {// option modul product_old_price?>
                                    <div class="old_price"><?php if ($jshopConfig->product_list_show_price_description) print _JSHOP_OLD_PRICE . ": "; ?><span><?php print formatprice($product->product_old_price) ?></span></div>
                                <?php } ?>
                                <?php print $product->_tmp_var_bottom_old_price; ?>
                            <?php } ?>

                            <?php if ($product->product_price_default > 0 && $jshopConfig->product_list_show_price_default && $product_price_default) { // option modul product_price_default?>
                                <div class="default_price"><?php print _JSHOP_DEFAULT_PRICE . ": "; ?><span><?php print formatprice($product->product_price_default) ?></span></div>
                            <?php } ?>

                            <?php if ($display_price) { ?>
                                <?php if ($product->_display_price) {// option modul display_price?>
                                    <div class = "jshop_price">
                                        <?php if ($jshopConfig->product_list_show_price_description) print _JSHOP_PRICE . ": "; ?>
                                        <?php if ($product->show_price_from) print _JSHOP_FROM . " "; ?>
                                        <span><?php print formatprice($product->product_price); ?></span>
                                    </div>
                                <?php } ?>
                                <?php print $product->_tmp_var_bottom_price; ?>
                            <?php } ?>
                            </div>
                            <?php if ($show_button) { ?>
                                <?php print $product->_tmp_var_top_buttons; ?>

                                <div class="buttons">
                                    <?php if ($product->buy_link && $show_button_buy) { ?>
                                        <a class="button_buy" href="<?php print $product->buy_link ?>"><?php print _JSHOP_BUY ?></a> &nbsp;
                                    <?php } ?>
                                    <?php print $product->_tmp_var_buttons; ?>
                                </div>

                                <?php print $product->_tmp_var_bottom_buttons; ?>
                            <?php } ?>
                            </div>
                        </li>	





                    <?php } ?>
            </ul>
        </div>
    </div>
</div>