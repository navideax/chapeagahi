<?php
$titan = TitanFramework::getInstance('NEGIT');
$single_category = $titan->getOption('single_categories');
?>
<div class="main-site">
    <div class="container">
        <div class="row">
            <?php get_template_part( 'assets/inc/template/sidebar/post_right' ) ?>
            <div class="col-lg-7 col-xl-7 col-md-7 col-sm-12 col-12 p-0">
                <div class="single-main main">
                    <div class="main-box">
                            <?php
                            //negit_breadcrumbs();

                            get_template_part( 'assets/inc/components/single' );


                            ?>


                    </div>
                </div>
            </div>
            <?php get_template_part( 'assets/inc/template/sidebar/post_left' ) ?>

            <?php

            get_template_part( 'assets/inc/template/mainsite/hamkaran' );
            get_template_part( 'assets/inc/template/mainsite/moshtarian' );
            ?>
        </div>
    </div>
</div>