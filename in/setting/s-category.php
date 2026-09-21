<?php

CSF::createSection( $prefix, array(
    'parent' => 'cat_setting', // The slug id of the parent section
    'title'  => 'مطالب سایدبار',
    'fields' => array(


        array(
            'id'     => 'c-sidebar-box',
            'type'   => 'fieldset',
            'title'  => 'پست های سایدبار',
            'fields' => array(

                array(
                    'id'     => 'c-sidebar-box-repeater',
                    'type'   => 'repeater',
                    'button_title'   => 'افزودن باکس جدید',
                    'fields' => array(

                        array(
                            'id'      => 'c-sidebar-box-title',
                            'type'    => 'text',
                            'title'   => 'تیتر باکس',
                        ),

                        array(
                            'id'    => 'c-sidebar-box-count',
                            'type'  => 'slider',
                            'title' => 'تعداد محتوا در باکس',
                            'min'     => 1,
                            'max'     => 3,
                            'default' => 3,
                        ),

                        array(
                            'id'         => 'c-sidebar-box-cat',
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
    'parent' => 'cat_setting',
    'title'  => 'مطالب دسته بندی',
    'fields' => array(

        array(
            'id'      => 'c-last-post-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'آخرین مطالب'
        ),

        array(
            'id'      => 'c-last-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),

        array(
            'id'         => 'c-sw-last-post-info',
            'type'       => 'switcher',
            'title'      => 'اطلاعات پست ها',
            'subtitle'      => 'تعداد دیدگاه ها و تاریخ',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'         => 'c-sw-last-post-page',
            'type'       => 'switcher',
            'title'      => 'صفحه بندی',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

    )
) );

CSF::createSection( $prefix, array(
    'parent' => 'cat_setting',
    'title'  => 'باکس (پیشنهاد)',
    'fields' => array(

        array(
            'id'         => 'c-sw-proposal',
            'type'       => 'switcher',
            'title'      => 'آیا این بخش نمایش داده شود؟',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'      => 'c-proposal-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'پیشنهاد ها'
        ),

        array(
            'id'      => 'c-proposal-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),


        array(
            'id'         => 'c-proposal-cat',
            'type'       => 'checkbox',
            'title'      => 'انتخاب دسته بندی',
            'options'    => 'categories',
            'query_args' => array(
                'orderby'  => 'post_title',
                'order'    => 'ASC',
            ),
        ),

    )
) );