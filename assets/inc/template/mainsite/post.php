        <div class="main-item">
            <div class="more-post">
                <a class="pin-post-img" href="<?php the_permalink() ?>">
                    <?php
                    if (!empty(get_the_post_thumbnail())) {
                        the_post_thumbnail(array(180, 180));

                    } else {
                        ?>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image.jpg"
                             alt="<?php the_title() ?>" style="width: 180px;height: auto">
                        <?php
                    }
                    ?>
                </a>
                <div class="more-post-title">
                    <div class="pin-cat">
                        <?php //the_category(' '); ?>
                    </div>
                    <div class="clearfix"></div>
                    <a class="title" href="<?php the_permalink() ?>">
                        <p class="rotitr">
                            <?php echo get_post_meta($post->ID, $key = '_subtitle', true); ?>
                        </p>
                        <h2><?php the_title() ?></h2>
                    </a>
                    <div class="clearfix"></div>
                    <span>
                                       <?php echo get_the_excerpt(); ?>
                                </span>
                    <ul class="post-detaile">
                        <li><?php the_time('l، d F Y ') ?></li>
                    </ul>
                </div>
            </div>
        </div>