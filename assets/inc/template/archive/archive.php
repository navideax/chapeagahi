<?php
$titan = TitanFramework::getInstance('NEGIT');
?>
<div class="main-site">
    <div class="container">
        <div class="row">
            <?php get_template_part( 'assets/inc/template/sidebar/archive_right' ) ?>
            <div class="col-lg-7 col-xl-7 col-md-7 col-sm-12 col-12 p-0 order-first-1">
                <div class="main">
                    <div class="main-box">
                        <?php
                        negit_breadcrumbs();
                        $query = new WP_Query(array());
                        while (have_posts()):
                            the_post();
                            $my_meta = get_post_meta($post->ID,$titan->getOption('negit_vip_post'),TRUE);
                            if($my_meta['negit_vip_post']['0']=="1"){
                                get_template_part( 'assets/inc/template/mainsite/big_post' );
                            }else{
                                get_template_part( 'assets/inc/template/mainsite/post' );
                            }
                        endwhile;
                        ?>
                    </div>
                </div>
                <?php wp_pagenavi(); ?>
            </div>
            <?php get_template_part( 'assets/inc/template/sidebar/archive_left' ) ?>
        </div>
    </div>

</div>