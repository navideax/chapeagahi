<section>
    <div class="cars-section energy-back">
        <div class="container">
            <div class="Theater">
                <h3 style="color: #ffffff">
                    <a href="https://etebarenovin.ir/category/energy" target="_blank">
                        مطالعات اقتصادی
                    </a>
                </h3>
            </div>
            <div class="clearfix"></div>
            <div class="cars-flex">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 ender-for-mob">
                    <?php
                    $q = new WP_Query(array('posts_per_page' => 4, 'cat' => '22595'));
                    while ($q->have_posts()):
                        $q->the_post();

                        ?>
                        <div class="col-md-3 col-sm-6 item-6box">
                            <div class="bg-white item-list-box">
                                <div class="item-list-img">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        if (!empty(get_the_post_thumbnail())) {
                                            the_post_thumbnail(array(288, 192));

                                        } else {
                                            ?>
                                            <img src="<?php echo get_template_directory_uri() ?>../img/no-image.jpg"
                                                 alt="" style="width: 288px;height: 192px">
                                            <?php
                                        }
                                        ?>                                </a>
                                </div>
                                <div class="item-list-text">
                                    <div>
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

