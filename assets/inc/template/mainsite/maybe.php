<div class="maybe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="ser-title"> شاید برایتان مفید باشد </h2>
            </div>
            <?php
            $q = new WP_Query(array('posts_per_page' => 4, 'cat' => '9'));
            while ($q->have_posts()):
                $q->the_post();

                ?>
                <div class="col-12 col-md-3">
                    <div class="services-boxs">
                        <div class="icon">
                            <?php
                            the_post_thumbnail(array(288, 192));
                            ?>
                        </div>
                        <h2 class="title">
                            <a href="<?php the_permalink() ?>" class="link">

                            <?php the_title() ?>
                            </a>

                        </h2>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>