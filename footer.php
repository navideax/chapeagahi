<?php
$titan = TitanFramework::getInstance('NEGIT');
$instagram = $titan->getOption('instagram_link');
$telegram = $titan->getOption('telegram_link');
$twitter = $titan->getOption('twitter_link');
$youtube = $titan->getOption('youtube_link');
?>
</body>
<?php wp_footer(); ?>
<a id="back2Top" title="Back to top" href="#"><img src="<?php wpdir("assets/img/up.svg"); ?>" alt="رفتن به بالا"></a>
<footer>
    <div class="footer-box">
        <div class="container">
            <div class="footerborder">
                <div class="row">
                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        <div class="footer-logo">


                            <div class="caption">
                                <h3>درباره ما</h3>
                                <p>
                                    سایت چاپ آگهی به منظور کاهش هزینه های مشتریان و ارتباط با روزنامه های سراسری کثیرالانتشار راه اندازی شده است و از بابت خدمات انجام شده به غیر از هزینه چاپ آگهی هیچ هزینه ای دریافت نمی شود.
                                </p><p>
                                    برای سهولت مشتریان نسخه pdf و نسخه چاپی روزنامه برای مشتریان ارسال شده و خدمات ما بصورت ۲۴ ساعت و بدون تعطیلی و بصورت آنلاین و تلفنی می باشد.
                                </p>
                            </div>
                            <a href="#">
                                <img src="<?php wpdir("assets/img/chap-min.png"); ?>" alt="اعتبار نوین" width="148" height="44">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        <div class="footer-menu">
                            <div class="caption">
                                <h3>مجوز ها و اعتبارات</h3>
                                <div class="items">
                                    <a href="https://trustseal.enamad.ir/?id=5196985&code=eg4jY2t75N15969vGimyRja3U" target="_blank">
                                        <img width="106" height="109" src="https://chapeagahi.ir/wp-content/uploads/2024/10/Enamad.jpg" class="attachment-large size-large wp-image-28148 entered lazyloaded" alt="" data-lazy-src="https://forisabt.com/wp-content/uploads/Enamad.jpg" data-ll-status="loaded"><noscript><img width="106" height="109" src="https://forisabt.com/wp-content/uploads/Enamad.jpg" class="attachment-large size-large wp-image-28148" alt="" /></noscript>								</a>
                                    <a href="https://logo.samandehi.ir/Verify.aspx?id=1017653&amp;p=rfthobpdrfthjyoegvkadshwxlao" target="_blank">
                                        <img width="106" height="109" src="https://chapeagahi.ir/wp-content/uploads/2024/10/samandehi.jpg" class="attachment-large size-large wp-image-28147 entered lazyloaded" alt="" data-lazy-src="https://forisabt.com/wp-content/uploads/samandehi.jpg" data-ll-status="loaded"><noscript><img width="106" height="109" src="https://forisabt.com/wp-content/uploads/samandehi.jpg" class="attachment-large size-large wp-image-28147" alt="" /></noscript>								</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12">
                        <div class="footer-logo">


                            <div class="caption">
                                <h3>ارتباط با ما</h3>
                                <p>
                                    دفتر پشتیبانی: میدان بعثت، ساختمان شماره 8، طبقه 3
                                </p><p>
                                    پشتیبانی:
                                </p><p>
                                    تلفن : 09914220080
                                </p><p>
                                    پست الکترونیک: Info@chapeagahi.ir
                                </p>
                            </div>

                        </div>
                        <div class="footer-menu">
                            <ul class="social">
                                <li><a class="social-instagram" href="<?php echo "https://instagram.com/".$instagram?>"><img src="<?php wpdir("assets/img/instagram.svg"); ?>" alt="اینستاگرام"></a></li>
                                <li><a class="social-telegram" href="<?php echo "https://t.me/".$telegram?>"><img src="<?php wpdir("assets/img/send.svg"); ?>" alt="تلگرام"></a></li>
                                <li><a class="social-twitter" href="<?php echo "https://twitter.com".$twitter?>"><img src="<?php wpdir("assets/img/twitter.svg"); ?>" alt="توییتر"></a></li>
                                <li><a class="social-youtube" href="<?php echo "https://www.youtube.com/channel/".$youtube?>"><img src="<?php wpdir("assets/img/youtube.svg"); ?>" alt="یوتیوب"></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="footer-menu faree-menu">
                            <ul>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => '' ) ); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p><b> © تمامی حقوق وبسایت متعلق به چاپ آگهی میباشد - طراحی و اجرا :  <a href="https://onecode.ir" target="_blank">طراحی سایت وان کد</a></b> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src=<?php wpdir("bootstrap/js/bootstrap.min.js"); ?>></script>
<script src=<?php wpdir("assets/fonts/fontaw/js/all.min.js"); ?>></script>
<script src=<?php wpdir("assets/js/js.js"); ?>></script>
