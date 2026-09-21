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
            <div class="clearfix"></div>
            <a class="title" href="<?php the_permalink() ?>8">
                <h2><?php the_title();?></h2>
            </a>
            <div class="container">
                <div class="row">
                    <div class="col-6 p-0">
                        <a class="author" href="#">
                            <img src="<?php wpdir("assets/img/test-img.webp"); ?>" alt="">
                            <span><?php the_author(); ?></span>
                        </a>
                    </div>
                    <div class="col-6 p-0">

                        <div class="pin-title">
                            <a href="#">مطلب سنجاق شده<img src="<?php wpdir("assets/img/paperclip.svg"); ?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>