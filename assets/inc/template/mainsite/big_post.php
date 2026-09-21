<?php


        ?>



        <div class="main-item">
        <div class="pin-post">
            <a class="pin-post-img" href="<?php the_permalink() ?>" >
                <?php
                if (!empty(get_the_post_thumbnail())) {
                    the_post_thumbnail(array(730, 730));

                } else {
                    ?>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image.jpg"
                         alt="<?php the_title() ?>" style="width: 100%;">
                    <?php
                }
                ?>
            </a>
            <div class="pin-cat" ><?php the_category(' ');?></div>
    <!--        <ul class="detail">
                <li><a >5.6k<img src="<?php /*wpdir("assets/img/eye.svg"); */?>" alt=""></a></li>
                <li><a >2.65k<img src="<?php /*wpdir("assets/img/message-square.svg"); */?>" alt=""></a></li>
                <li><a >1256<img src="<?php /*wpdir("assets/img/share.svg"); */?>" alt=""></a></li>
            </ul>-->
            <div class="clearfix"></div>
            <a class="title" href="<?php the_permalink() ?>">
                <h2><?php the_title();?></h2>
            </a>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12 p-0">
                        <ul class="post-detaile">
                            <li>توسط <a class="author" ><?php the_author(); ?></a></li>
                            <li><?php the_time('l، d F Y ') ?></li>
                            <li> مطالعه در <?php echo do_shortcode('[rt_reading_time]') ?> دقیقه</li>
                        </ul>
                    </div>

                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 col-12 p-0">
                        <div class="pin-title resp-margin">
                            <a href="<?php the_permalink() ?>">پیشنهاد میکنیم بخوانید<img src="<?php wpdir("assets/img/paperclip.svg"); ?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

