<section>
    <div class="cars-section">
        <div class="container">
            <div class="Theater">
                <h3 class="light">
                    <a href="https://etebarenovin.ir/category/%d8%a8%d8%a7%d9%86%da%a9-%d8%a7%d8%ae%d8%a8%d8%a7%d8%b1%d8%a8%d8%a7%d9%86%da%a9%d8%8c-%d8%ae%d8%a8%d8%b1%d9%87%d8%a7%db%8c-%d8%a8%d8%a7%d9%86%d9%83" target="_blank">
                        مفاهیم اقتصادی
                    </a>
                </h3>
            </div>
            <div class="cars-flex">
                <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 col-12 formob">
                    <div class="solid-right">
                        <?php
                        $q = new WP_Query(array('posts_per_page' => 1, 'cat' => '22382'));
                        while ($q->have_posts()):
                            $q->the_post();

                            ?>
                            <a href="<?php the_permalink() ?>">
                                <h3>
                                    <?php the_title() ?>
                                </h3>
                                <p>
                                    <?php the_excerpt() ?>
                                </p>
                            </a>
                            <a href="https://etebarenovin.ir/category/%d8%a8%d8%a7%d9%86%da%a9-%d8%a7%d8%ae%d8%a8%d8%a7%d8%b1%d8%a8%d8%a7%d9%86%da%a9%d8%8c-%d8%ae%d8%a8%d8%b1%d9%87%d8%a7%db%8c-%d8%a8%d8%a7%d9%86%d9%83" class="footerSection">
                            <span class="pull-right">
                                مشاهده همه
                            </span>
                                <i class="fal fa-chevron-circle-left"></i>
                            </a>
                        <?php
                        endwhile;
                        ?>
                    </div>
                </div>
                <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 col-12 ender-for-mob">
                    <?php
                    $q = new WP_Query(array('posts_per_page' => 3, 'offset' => 1, 'cat' => '52'));
                    while ($q->have_posts()):
                        $q->the_post();

                        ?>
                        <div class="col-md-4 col-sm-6 item-6box">
                            <div class="bg-white item-list-box">

                                <div class="item-list-text">

                                    <div>
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </div>
                                    <h6 class="hidden-xs">
                                        <?php the_category(" | ") ?>
                                    </h6>
                                    <p>
                                        <?php the_excerpt() ?>
                                    </p>
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

