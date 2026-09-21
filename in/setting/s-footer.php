<?php
CSF::createSection( $prefix, array(
    'parent' => 'footer_setting', // The slug id of the parent section
    'title'  => 'تنظیمات کلی فوتر',
    'fields' => array(


        array(
            'id'        => 'footer-select',
            'type'      => 'image_select',
            'title'     => 'مدل فوتر',
            'options'   => array(
                'footer-1' => get_template_directory_uri().'/assets/img/footer-1.png',
                'footer-2' => get_template_directory_uri().'/assets/img/footer-2.png',
                'footer-3' => get_template_directory_uri().'/assets/img/footer-3.png',
            ),
            'default'   => 'footer-1'
        ),


        array(
            'id'        => 'about',
            'type'      => 'fieldset',
            'title'     => 'درباره ما',
            'fields'    => array(
                array(
                    'id'      => 'about_site-title',
                    'type'    => 'text',
                    'title'   => 'تیتر',
                    'subtitle'   => 'میتوانید خالی بذارید',
                ),
                array(
                    'id'            => 'about_site',
                    'type'          => 'wp_editor',
                    'title'         => 'متن درباره ما',
                    'tinymce'       => true,
                    'quicktags'     => true,
                    'media_buttons' => false,
                    'height'        => '100px',
                ),

            ),
            'default'        => array(
                'footer-menu-1-title'     => 'درباره ما',
            ),
        ),





        array(
            'id'        => 'footer-menu-1',
            'type'      => 'fieldset',
            'title'     => 'لینک های اول فوتر',
            'fields'    => array(
                array(
                    'id'      => 'footer-menu-1-title',
                    'type'    => 'text',
                    'title'   => 'تیتر',
                    'subtitle'   => 'میتوانید خالی بذارید',
                ),
                array(
                    'id'         => 'footer-menu-1-radio',
                    'type'       => 'radio',
                    'title'      => 'انتخاب منو',
                    'options'    => 'menus',
                ),

            ),
            'default'        => array(
                'footer-menu-1-title'     => 'دسترسی سریع',
                'footer-menu-1-radio'    => "1",
            ),
        ),

        array(
            'id'        => 'footer-menu-2',
            'type'      => 'fieldset',
            'title'     => 'لینک های دوم فوتر',
            'fields'    => array(
                array(
                    'id'      => 'footer-menu-2-title',
                    'type'    => 'text',
                    'title'   => 'تیتر',
                    'subtitle'   => 'میتوانید خالی بذارید',
                ),
                array(
                    'id'         => 'footer-menu-2-radio',
                    'type'       => 'radio',
                    'title'      => 'انتخاب منو',
                    'options'    => 'menus',
                ),

            ),
            'default'        => array(
                'footer-menu-2-title'     => 'دسترسی سریع',
                'footer-menu-2-radio'    => "1",
            ),
        ),

        array(
            'id'        => 'footer-menu-3',
            'type'      => 'fieldset',
            'title'     => 'لینک های سوم فوتر',
            'fields'    => array(
                array(
                    'id'      => 'footer-menu-3-title',
                    'type'    => 'text',
                    'title'   => 'تیتر',
                    'subtitle'   => 'میتوانید خالی بذارید',
                ),
                array(
                    'id'         => 'footer-menu-3-radio',
                    'type'       => 'radio',
                    'title'      => 'انتخاب منو',
                    'options'    => 'menus',
                ),

            ),
            'default'        => array(
                'footer-menu-3-title'     => 'دسترسی سریع',
                'footer-menu-3-radio'    => "1",
            ),
        ),

        array(
            'id'        => 'footer-menu-4',
            'type'      => 'fieldset',
            'title'     => 'لینک های چهارم فوتر',
            'fields'    => array(
                array(
                    'id'      => 'footer-menu-4-title',
                    'type'    => 'text',
                    'title'   => 'تیتر',
                    'subtitle'   => 'میتوانید خالی بذارید',
                ),
                array(
                    'id'         => 'footer-menu-4-radio',
                    'type'       => 'radio',
                    'title'      => 'انتخاب منو',
                    'options'    => 'menus',
                ),

            ),
            'default'        => array(
                'footer-menu-4-title'     => 'دسترسی سریع',
                'footer-menu-4-radio'    => "1",
            ),
        ),




    )
));
CSF::createSection( $prefix, array(
    'parent' => 'footer_setting', // The slug id of the parent section
    'title'  => 'شبکه های اجتماعی',
    'fields' => array(


        array(
            'id'        => 'telegram',
            'type'      => 'fieldset',
            'title'     => 'تلگرام',
            'fields'    => array(
                array(
                    'id'    => 'fa-telegram',
                    'type'  => 'text',
                    'title' => 'آیکون',
                    'subtitle' => 'از سایت  <a href="https://fontawesome.com/search">fontawsome</a>',
                ),
                array(
                    'id'    => 't-telegram',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
                array(
                    'id'         => 'telegram-switcher',
                    'type'       => 'switcher',
                    'title'      => 'نمایش آیکون',
                    'text_on'    => 'فعال',
                    'text_off'   => 'غیرفعال',
                    'text_width' => 100
                ),

            ),
            'default'        => array(
                'fa-telegram'     => '<i class="fab fa-telegram"></i>',
                't-telegram'    => 'https://t.me/codeato',
                'telegram-switcher'    => true,
            ),
        ),

        array(
            'id'        => 'youtube',
            'type'      => 'fieldset',
            'title'     => 'یوتیوب',
            'fields'    => array(
                array(
                    'id'    => 'fa-youtube',
                    'type'  => 'text',
                    'title' => 'آیکون',
                    'subtitle' => 'از سایت  <a href="https://fontawesome.com/search">fontawsome</a>',
                ),
                array(
                    'id'    => 't-youtube',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
                array(
                    'id'         => 'youtube-switcher',
                    'type'       => 'switcher',
                    'title'      => 'نمایش آیکون',
                    'text_on'    => 'فعال',
                    'text_off'   => 'غیرفعال',
                    'text_width' => 100
                ),
            ),
            'default'        => array(
                'fa-youtube'     => '<i class="fa-brands fa-youtube"></i>',
                't-youtube'    => 'https://youtube.com',
                'youtube-switcher'    => true,
            ),
        ),

        array(
            'id'        => 'instagram',
            'type'      => 'fieldset',
            'title'     => 'اینستاگرام',
            'fields'    => array(
                array(
                    'id'    => 'fa-instagram',
                    'type'  => 'text',
                    'title' => 'آیکون',
                    'subtitle' => 'از سایت  <a href="https://fontawesome.com/search">fontawsome</a>',
                ),
                array(
                    'id'    => 't-instagram',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
                array(
                    'id'         => 'instagram-switcher',
                    'type'       => 'switcher',
                    'title'      => 'نمایش آیکون',
                    'text_on'    => 'فعال',
                    'text_off'   => 'غیرفعال',
                    'text_width' => 100
                ),
            ),
            'default'        => array(
                'fa-instagram'     => '<i class="fa-brands fa-instagram"></i>',
                't-instagram'    => 'https://instagram.com',
                'instagram-switcher'    => true,
            ),
        ),

        array(
            'id'        => 'twitter',
            'type'      => 'fieldset',
            'title'     => 'ایکس (توییتر)',
            'fields'    => array(
                array(
                    'id'    => 'fa-twitter',
                    'type'  => 'text',
                    'title' => 'آیکون',
                    'subtitle' => 'از سایت  <a href="https://fontawesome.com/search">fontawsome</a>',
                ),
                array(
                    'id'    => 't-twitter',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
                array(
                    'id'         => 'twitter-switcher',
                    'type'       => 'switcher',
                    'title'      => 'نمایش آیکون',
                    'text_on'    => 'فعال',
                    'text_off'   => 'غیرفعال',
                    'text_width' => 100
                ),
            ),
            'default'        => array(
                'fa-twitter'     => '<i class="fa-brands fa-x-twitter"></i>',
                't-twitter'    => 'https://twitter.com',
                'twitter-switcher'    => true,
            ),
        ),

        array(
            'id'        => 'linkedin',
            'type'      => 'fieldset',
            'title'     => 'لینکدین',
            'fields'    => array(
                array(
                    'id'    => 'fa-linkedin',
                    'type'  => 'text',
                    'title' => 'آیکون',
                    'subtitle' => 'از سایت  <a href="https://fontawesome.com/search">fontawsome</a>',
                ),
                array(
                    'id'    => 't-linkedin',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
                array(
                    'id'         => 'linkedin-switcher',
                    'type'       => 'switcher',
                    'title'      => 'نمایش آیکون',
                    'text_on'    => 'فعال',
                    'text_off'   => 'غیرفعال',
                    'text_width' => 100
                ),
            ),
            'default'        => array(
                'fa-linkedin'     => '<i class="fa-brands fa-linkedin"></i>',
                't-linkedin'    => 'https://linkedin.com',
                'linkedin-switcher'    => true,
            ),
        ),

        array(
            'id'        => 'rss',
            'type'      => 'fieldset',
            'title'     => 'فید',
            'fields'    => array(
                array(
                    'id'    => 'fa-rss',
                    'type'  => 'text',
                    'title' => 'آیکون',
                    'subtitle' => 'از سایت  <a href="https://fontawesome.com/search">fontawsome</a>',
                ),
                array(
                    'id'    => 't-rss',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
                array(
                    'id'         => 'rss-switcher',
                    'type'       => 'switcher',
                    'title'      => 'نمایش آیکون',
                    'text_on'    => 'فعال',
                    'text_off'   => 'غیرفعال',
                    'text_width' => 100
                ),
            ),
            'default'        => array(
                'fa-rss'     => '<i class="fa-solid fa-rss"></i>',
                't-rss'    => 'https://rss.com',
                'rss-switcher'    => true,
            ),
        ),
    )
));

CSF::createSection( $prefix, array(
    'parent' => 'footer_setting', // The slug id of the parent section
    'title'  => 'متن کپی رایت',
    'fields' => array(

        array(
            'id'      => 'copyright-text',
            'type'    => 'textarea',
            'title'   => 'متن کپی رایت',
            'default' => '© 1402 - 1389 کپی بخش یا کل هر کدام از مطالب مگیت تنها با کسب مجوز مکتوب امکان پذیر است'
        ),


    )
));