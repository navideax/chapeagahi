<div class="main-item">
<?php
$titan = TitanFramework::getInstance('NEGIT');
while (have_posts()): the_post();
    $my_meta = get_post_meta($post->ID,$titan->getOption('negit_vip_post'),TRUE);
    $post_id = get_the_id()
?>
<div class="pin-post">
    <div class="clearfix"></div>
    <div class="col-12  mt-4">
        <a class="title" href="<?php the_permalink() ?>">
            <h2><?php the_title() ?></h2>
        </a>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-12 ">
            <div class="post-contant page">
            <?php the_content(); ?>
                <?php
            ?>
            </div>
            <div class="buttons">
                <?php if($my_meta['negit_download_link']['0']){ ?>
                <div class="btn-download">
                    <a href="<?php echo $my_meta['negit_download_link']['0']; ?>">
                        <img src="<?php wpdir("assets/img/download-cloud.svg"); ?>" alt="">
                        دانلود کنید
                    </a>
                </div>
            <?php }else{
                    echo "";
                }
                if($my_meta['negit_curse_link']['0']){ ?>
                <div class="btn-curse">
                    <a href="<?php echo $my_meta['negit_curse_link']['0']; ?>">
                        <img src="<?php wpdir("assets/img/plus.svg"); ?>" alt="">
                        رفتن به صفحه مربوط
                    </a>
                </div>
                <?php }else{
                    echo "";
                }
    if($my_meta['negit_help_link']['0']){ ?>
                <div class="btn-help">
                    <a href="<?php echo $my_meta['negit_help_link']['0']; ?>">
                        <img src="<?php wpdir("assets/img/help.svg"); ?>" alt="">
                        راهنما
                    </a>
                </div>
    <?php }else{
        echo "";
    }
    if($my_meta['negit_link_link']['0']){ ?>
                <div class="btn-link">
                    <a href="<?php echo $my_meta['negit_link_link']['0']; ?>">
                        <img src="<?php wpdir("assets/img/link.svg"); ?>">
                        پیوند
                    </a>
                </div>
<?php }else{
    echo "";
}
 ?>
            </div>
            <div class="clearfix"></div>
<!--            <div class="post-footer">
                <div class="source">
                    <span>منبع</span>
                    <?php /*if($my_meta['negit_curse_name']['0']){ */?>
                    <a href="<?php /*echo $my_meta['negit_cursee_link']['0'] */?>"><?php /*echo $my_meta['negit_curse_name']['0'] */?></a>
                    <?php /*}else{ */?>
                        <a href="<?php /*bloginfo('url') */?>"><?php /*bloginfo('name') */?></a>
                    <?php /*} */?>
                </div>
                <div class="shares">
                    <ul>
                        <li><a class="twitter-share" href="http://twitter.com/home?status=<?php /*the_permalink();*/?>" title="<?php /*the_title();*/?>" target="_blank"><img src=<?php /*wpdir("assets/img/twitter.svg"); */?> alt="">توییت کن!</a></li>
                        <li><a class="telegram-share" href="https://telegram.me/share/url?text=<?php /*the_title(); */?>&url=<?php /*the_permalink(); */?>" title="<?php /*the_title();*/?>" target="_blank"><img src="<?php /*wpdir("assets/img/send.svg"); */?>" alt="">تلگرام کن!</a></li>
                        <li><a class="mail-share" href="mailto:?&subject<?php /*the_title(); */?>=&body=<?php /*the_permalink() */?> "><img src=<?php /*wpdir("assets/img/mail.svg"); */?> alt="">ایمیل کن!</a></li>
                        <li><button id="chmtn-1" class="link-share" onclick="copyToClipboard('#matn')"><img src="<?php /*wpdir("assets/img/link.svg"); */?>" alt="">لینک </button>                         <span id="matn"><?php /*echo wp_get_shortlink(); */?></span>
                        </li>
                        <div class="toast-position" >
                        <div class="toast" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="<?php /*wpdir("assets/img/ls.svg"); */?>" class="rounded mr-2" alt="...">
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                لینک کپی شد
                            </div>
                        </div>
                        </div>

                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="tags">
                    <ul>
                    </ul>
                </div>
            </div>
-->        </div>
    </div>
</div>
    <?php endwhile;
    ?>
</div>



