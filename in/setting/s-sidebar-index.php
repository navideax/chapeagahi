<?php
CSF::createSection( $prefix, array(
    'parent' => 'sidebar_index_setting', // The slug id of the parent section
    'title'  => 'مطالب سایدبار',
    'fields' => array(


        array(
            'id'     => 'sidebar-box',
            'type'   => 'fieldset',
            'title'  => 'پست های سایدبار',
            'fields' => array(

                array(
                    'id'     => 'sidebar-box-repeater',
                    'type'   => 'repeater',
                    'button_title'   => 'افزودن باکس جدید',
                    'fields' => array(

                        array(
                            'id'      => 'sidebar-box-title',
                            'type'    => 'text',
                            'title'   => 'تیتر باکس',
                        ),

                        array(
                            'id'    => 'sidebar-box-count',
                            'type'  => 'slider',
                            'title' => 'تعداد محتوا در باکس',
                            'min'     => 1,
                            'max'     => 3,
                            'default' => 3,
                        ),

                        array(
                            'id'         => 'sidebar-box-cat',
                            'type'       => 'checkbox',
                            'title'      => 'انتخاب دسته بندی',
                            'options'    => 'categories',
                        ),


                    ),
                ),



            ),
        ),







    )
));
CSF::createSection( $prefix, array(
    'parent' => 'sidebar_index_setting', // The slug id of the parent section
    'title'  => 'شبکه های اجتماعی سایدبار',
    'fields' => array(

        array(
            'id'        => 's-telegram',
            'type'      => 'fieldset',
            'title'     => 'تلگرام',
            'fields'    => array(
                array(
                    'id'    => 'si-telegram',
                    'type'  => 'text',
                    'title' => 'نام سایت',
                    'subtitle' => 'مثلا : مگیت',
                ),
                array(
                    'id'    => 'sl-telegram',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
            ),
            'default'        => array(
                'si-telegram'     => 'مگیت',
                'sl-telegram'    => 'https://t.me/codeato',
            ),
        ),

        array(
            'id'        => 's-youtube',
            'type'      => 'fieldset',
            'title'     => 'یوتیوب',
            'fields'    => array(
                array(
                    'id'    => 'si-youtube',
                    'type'  => 'text',
                    'title' => 'نام سایت',
                    'subtitle' => 'مثلا : مگیت',
                ),
                array(
                    'id'    => 'sl-youtube',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),

            ),
            'default'        => array(
                'si-youtube'     => 'مگیت',
                'sl-youtube'    => 'https://youtube.com',
            ),
        ),

        array(
            'id'        => 's-instagram',
            'type'      => 'fieldset',
            'title'     => 'اینستاگرام',
            'fields'    => array(
                array(
                    'id'    => 'si-instagram',
                    'type'  => 'text',
                    'title' => 'نام سایت',
                    'subtitle' => 'مثلا : مگیت',
                ),
                array(
                    'id'    => 'sl-instagram',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),

            ),
            'default'        => array(
                'si-instagram'     => 'مگیت',
                'sl-instagram'    => 'https://instagram.com',
            ),
        ),

        array(
            'id'        => 's-twitter',
            'type'      => 'fieldset',
            'title'     => 'ایکس (توییتر)',
            'fields'    => array(
                array(
                    'id'    => 'si-twitter',
                    'type'  => 'text',
                    'title' => 'نام سایت',
                    'subtitle' => 'مثلا : مگیت',
                ),
                array(
                    'id'    => 'sl-twitter',
                    'type'  => 'text',
                    'title' => 'لینک',
                ),
            ),
            'default'        => array(
                'si-twitter'     => 'مگیت',
                'sl-twitter'    => 'https://twitter.com',
            ),
        ),

    )
));