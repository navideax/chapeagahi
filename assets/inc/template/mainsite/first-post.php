<div class="first-post">
    <a href="<?php the_permalink() ?>">
        <?php
        if (!empty(get_the_post_thumbnail())) {
            the_post_thumbnail();

        } else {
            ?>
            <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image.jpg"
                 alt="<?php the_title() ?>">
            <?php
        }
        ?>
        <h1><?php the_title() ?></h1>
    </a>
</div>