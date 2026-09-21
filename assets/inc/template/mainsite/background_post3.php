        <div class="col-lg-4 col-xl-4 col-md-4 col-sm-6 col-12 resp-padding bottom-post-padding mb-2">
    <div class="bottom-post-item">
        <a href="<?php the_permalink() ?>">
            <?php
            if (!empty(get_the_post_thumbnail())) {
                ?>
                <img class="bottom-post-item-img" src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php the_title() ?>"">
                <?php

            } else {
                ?>
                <img class="bottom-post-item-img" src="<?php echo get_template_directory_uri() ?>/assets/img/no-image.jpg"
                     alt="<?php the_title() ?>" style="width: 100%;">
                <?php
            }
            ?>
        </a>
        <div class="more-post-title">
            <div class="pin-cat">
                <?php the_category(' ');?>
            </div>
            <div class="clearfix"></div>
            <a class="title" href="<?php the_permalink() ?>">
                <h2><?php the_title();?></h2>
            </a>
            <div class="clearfix"></div>

    <!--        <ul class="detail">
                <li><a href="#">5.6k<img src="assets/img/eye.svg" alt=""></a></li>
                <li><a href="#">2.65k<img src="assets/img/message-square.svg" alt=""></a></li>
                <li><a href="#">1256<img src="assets/img/share.svg" alt=""></a></li>
            </ul>-->
        </div>
    </div>
        </div>