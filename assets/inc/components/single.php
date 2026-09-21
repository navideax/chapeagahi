<div class="brud">
    <?php

    while (have_posts()) {
        the_post();
            negit_breadcrumbs();

    }

    ?>
</div>
<div class="main-item">
<?php
$titan = TitanFramework::getInstance('NEGIT');

while (have_posts()): the_post();

    $my_meta = get_post_meta($post->ID,$titan->getOption('negit_vip_post'),TRUE);
    $post_id = get_the_id()
?>

<div class="pin-post">

    <div class="single-detaile">
        <div class="category">
            <?php //the_category(' ');?>
        </div>
        <ul class="post-detaile">
            <li><?php the_time('l، d F Y  :: h:s') ?></li>
        </ul>
    </div>

    <div class="clearfix"></div>
    <div class="col-12  mt-4">
        <p class="rotitr">
            <?php echo get_post_meta($post->ID, $key = '_subtitle', true); ?>
        </p>
        <a class="title" href="<?php the_permalink() ?>">
            <h1><?php the_title() ?></h1>
        </a>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-12 ">
            <div class="post-contant page">
				<div class="exprt">
					                   <?php
                    the_excerpt()
                   ?>
				</div>

            <?php the_content(); ?>


                <?php
                $meta = 0;
                $my_options = get_option( 'setting_magit' ); // prefix of framework
                $meta = get_post_meta( get_the_ID(), 'magit_post_options', true );





                if(!empty($meta['show-call']) && $meta['show-call'] == 1){
                    if($my_options['allsitecall'] == 1){
                        ?>
                        <style>
                            .callbox{
                                background: #ff455c;
                                border-radius: 5px;
                                max-width: 100%;
                                padding: 10px;
                                width: 600px;
                                margin: 0 auto;
                            }
                            .infocall h3{
                                color: #ffffff !important;
                                margin-top: 0!important;
                                font-size: 20px!important;
                            }
                            .infocall span{
                                font-size: 15px!important;
                                color: #ffffff!important;
                            }
                            .infocall p{
                                font-size: 12px!important;
                                color: #ffffff!important;
                                margin: 0!important;
                            }
                        </style>
                        <div class="callbox">
                            <div class="infocall">
                                <h3 style="color: #ffffff !important;">مشاوره تلفنی <?php echo $my_options['callnum']; ?></h3>
                                <p><?php echo $my_options['yescall-textarea']; ?></p>
                            </div>
                        </div>
                        <?php
                    }

                }



                ?>





                <?php if($my_meta['negit_curse_name']['0']){
                    echo "منبع : " . $my_meta['negit_curse_name']['0'];
                }else{
                    echo "";
                } ?>
            
            </div>
            <div class="clearfix"></div>
            <br><br>
            <div class="post-footer">

                <div class="shares">
                    <ul>
                        <li><a class="twitter-share" href="http://twitter.com/home?status=<?php the_permalink();?>" title="<?php the_title();?>" target="_blank"><img src="<?php wpdir("assets/img/twitter.svg"); ?>" alt="share-twitter"></a></li>
                        <li><a class="telegram-share" href="https://telegram.me/share/url?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" title="<?php the_title();?>" target="_blank"><img src="<?php wpdir("assets/img/send.svg"); ?>" alt="share-telegram"></a></li>

                        <li><a class="whatsapp-share" href="https://api.whatsapp.com/send?text=<?php the_permalink() ?> "><img src="https://shahrkhan.ir/wp-content/themes/negit/assets/img/whatsapp.svg" alt="share-email"></a></li>

                        <li><a href="/&print?id=<?php echo $post->ID;?>" target="blank" rel="nofollow" title="نسخه چاپی" class="print"  onclick="window.open(&quot;<?php echo bloginfo('url') . '/&print?id='. $post->ID; ?>&quot;, &quot;printwin&quot;,&quot;left=200,top=200,width=820,height=550,toolbar=1,resizable=0,status=0,scrollbars=1&quot;);">
                                <img src="https://shahrkhan.ir/wp-content/themes/negit/assets/img/print.svg"></a></li>
                    </ul>
                </div>
                <div class="short-link" style="background: #eee">

                    <?php $sh_link = get_site_url() . "/" . $post->ID;
                    ?><p>
                        <span id="matn-1"><?php echo $sh_link; ?></span>
                        <button id="chmtn-1" onclick="copyToClipboard('#matn-1')">کپی کردن</button></p>
                </div>

                <div class="clearfix"></div>
                <div class="tags">
                    <ul>
                        <li class="tagimg" ><img class="tag-item" src="<?php wpdir("assets/img/tag.svg"); ?>" alt=""></li>
                        <?php
                        the_tags("<li>" ,"</li><li>","</li>") ?>


                    </ul>
                </div>
            </div>

        </div>
    </div>




</div>
    <?php endwhile;
    ?>
</div>

    <?php

    while (have_posts()) {
    the_post();
    if (comments_open() || get_comments_number()) {
    comments_template();
    }
    }
    ?>


