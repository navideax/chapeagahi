<?php
$titan = TitanFramework::getInstance('NEGIT');
$logo = $titan->getOption('logo_upload');
$register = $titan->getOption('signup_link');


$logoImg = wp_get_attachment_url($logo); ?>

<head>
    <base target="_blank">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="OVu6OX26EsiEbBir_5uJH34-bfQ2NziqKu151N4snjg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php wpdir("bootstrap/css/bootstrap.rtl.min.css"); ?>">
    <link rel="stylesheet" href="<?php wpdir("style.css"); ?>">
    <link rel="stylesheet" href="<?php wpdir("assets/fonts/iconly/css/style.css"); ?>">
    <link rel="stylesheet" href="<?php wpdir("assets/fonts/fontaw/css/all.min.css"); ?>">
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>-->

    <link rel="stylesheet" href="<?php wpdir("assets/fonts/iconly/css/bulk-style.css"); ?>">
    <link rel="stylesheet" href="<?php wpdir("assets/fonts/irsans/style.css"); ?>">
    <title><?php wp_title(); ?></title>
    <script src=<?php wpdir("assets/js/jquery.js"); ?>></script>
    <script src=<?php wpdir("assets/js/swiper.js"); ?>></script>

    <script src=<?php wpdir("assets/js/animateNumber.min.js"); ?>></script>



	    <?php wp_head(); ?>
</head>

<body>
<header>
    <?php
    $my_options = get_option( 'setting_magit' ); // prefix of framework

    if($my_options['allsitecall'] == 1){
        ?>
        <div style="
    width: 100%;
    height: 50px;
    display: inline-flex;
    background: #f79b20;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    font-weight: 600;
    color: #000000;
">
            تماس با دفتر پشتیبانی :
            <a href="tel:<?php echo str_replace("-", "",$my_options['callnum']); ?>" style="
    margin-right: 20px;
    font-size: 15px;
    color: #000000;
    text-decoration: underline;
    font-weight: 900;
"><?php echo $my_options['callnum']; ?></a>
        </div>
    <?php
    }
    ?>

    <div class="header-box">

        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-xl-2 col-md-2 col-sm-12 p-0">
                    <div class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php wpdir("assets/img/chap-min.png"); ?>" alt="اعتبار نوین" width="148"></a></div>
                </div>
                <div class="col-6 p-0 header-menu">
<!--                    <nav class="navbar navbar-expand-lg desc-menu">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                 <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">
                                            <img src="<?php /*wpdir("assets/img/home.svg"); */?>" alt="">
                                            خانه
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><img src=<?php /*wpdir("assets/img/cpu.svg"); */?> alt="">
                                            فناوری</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><img src="assets/img/zap.svg" alt=""> بررسی</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="assets/img/trello.svg" alt=""> علمی
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><img src="assets/img/briefcase.svg" alt=""> کسب
                                            و کار</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><img src="assets/img/truck.svg" alt="">
                                            خودرو</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><img src="assets/img/film.svg" alt="">
                                            ویدیو</a>
                                    </li>

                                </ul>


                            </div>

                        </div>
                    </nav>-->

                    <nav class="navbar navbar-expand-lg desc-menu">
                        <div class="container-fluid">

                    <?php
                    wp_nav_menu(array(
                        'menu'                 => 'primary',
                        'container'            => 'div',
                        'container_class'      => 'collapse navbar-collapse',
                        'container_id'         => 'navbarNavDropdown',
                        'container_aria_label' => 'navid_seyfi',
                        'menu_class'           => 'navbar-nav',
                        'menu_id'              => '',
                        'echo'                 => true,
                        'fallback_cb'          => 'wp_bootstrap_navwalker::fallback',
                        'before'               => '',
                        'after'                => '',
                        'link_before'          => '<li class="nav-item">',
                        'link_after'           => '</li>',
//                        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'item_spacing'         => 'preserve',
//                        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'                => 10,
                        'walker'               => new wp_bootstrap_navwalker(),
                        'theme_location'       => 'primary',
                    ));
                    ?>
                        </div>
                    </nav>


                    <div class="mobile-menu">
                        <div id="resp-menu" class="resp-menu" onclick="resmenu()">
                            <div id="open-menu" class="openmenu"  data-status="false"><img src="<?php wpdir("assets/img/menu.svg"); ?>" alt="منو"> منو </div>
                        </div>
                        <aside id="resmin" class="sidemenu-container ">
                            <div class="sidemenu">
                                <section id="menu-close" onclick="resmenucl()">
                                    <img src="<?php wpdir("assets/img/x.svg"); ?>" alt="بستن منو">
                                </section>
                                <div class="clearfix"></div>
                                <!--<section class="login">
                                    <a href="#" title="" class="login-button">ورود</a>
                                    <a href="#" class="signup-button">ثبت نام</a>
                                </section>-->
                                <nav>
                                    <ul>
                                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => '' ) ); ?>
                                    </ul>
                                </nav>
                            </div>
                        </aside>
                    </div>

                </div>
<!--                <div class="col-lg-1 col-xl-1 col-md-1 col-sm-6 col-6 resp-padding p-0">
                    <div class="signup">
                        <a href="<?php /*echo $register; */?>">
                           <img src=--><?php /*//wpdir("assets/img/log-in.svg"); */?><!-- alt="">
                        </a>
                    </div>
                </div>-->
                <div class="col-lg-4 col-xl-4 col-md-4 col-sm-12 col-12 resp-padding p-0">
                    <div class="search">
                        <form action="<?php bloginfo("home") ?>/" method="get">
                            <input type="text" name="s" placeholder="جستجو در سایت ">
                            <button type="submit"><img src="<?php wpdir("assets/img/search.svg"); ?>" alt="جستجو"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>