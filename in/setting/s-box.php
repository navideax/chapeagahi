<?php
CSF::createSection( $prefix, array(
    'parent' => 'box_setting',
    'title'  => 'باکس (با چشم باز خرید کنید)',
    'fields' => array(

        // A textarea field
        array(
            'id'    => 'opt-textarea',
            'type'  => 'textarea',
            'title' => 'Simple Textarea',
        ),

    )
) );


CSF::createSection( $prefix, array(
    'parent' => 'box_setting',
    'title'  => 'باکس (پیشنهاد سردبیر)',
    'fields' => array(

        array(
            'id'         => 'sw-editor',
            'type'       => 'switcher',
            'title'      => 'آیا این بخش نمایش داده شود؟',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'      => 'editor-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'پیشنهاد سردبیر'
        ),

        array(
            'id'      => 'editor-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),


        array(
            'id'         => 'editor-cat',
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

CSF::createSection( $prefix, array(
    'parent' => 'box_setting',
    'title'  => 'باکس (آخرین مطالب)',
    'fields' => array(

        array(
            'id'      => 'last-post-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'آخرین مطالب'
        ),

        array(
            'id'      => 'last-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),


        array(
            'id'         => 'last-cat',
            'type'       => 'checkbox',
            'title'      => 'انتخاب دسته بندی',
            'options'    => 'categories',
            'query_args' => array(
                'orderby'  => 'post_title',
                'order'    => 'ASC',
            ),
        ),

        array(
            'id'         => 'sw-last-post-info',
            'type'       => 'switcher',
            'title'      => 'اطلاعات پست ها',
            'subtitle'      => 'تعداد دیدگاه ها و تاریخ',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'         => 'sw-last-post-page',
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
    'parent' => 'box_setting',
    'title'  => 'باکس (فهرست های مطالعاتی)',
    'fields' => array(

        array(
            'id'         => 'sw-list',
            'type'       => 'switcher',
            'title'      => 'آیا این بخش نمایش داده شود؟',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'      => 'list-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'فهرست های مطالعاتی'
        ),

        array(
            'id'      => 'list-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),


        array(
            'id'         => 'list-cat',
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

CSF::createSection( $prefix, array(
    'parent' => 'box_setting',
    'title'  => 'باکس (بهترین مقالات)',
    'fields' => array(

        array(
            'id'         => 'sw-suggestion',
            'type'       => 'switcher',
            'title'      => 'آیا این بخش نمایش داده شود؟',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'      => 'suggestion-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'بهترین مقالات'
        ),

        array(
            'id'      => 'suggestion-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),


        array(
            'id'         => 'suggestion-cat',
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

CSF::createSection( $prefix, array(
    'parent' => 'box_setting',
    'title'  => 'باکس (پیشنهاد)',
    'fields' => array(

        array(
            'id'         => 'sw-proposal',
            'type'       => 'switcher',
            'title'      => 'آیا این بخش نمایش داده شود؟',
            'text_on'    => 'در حال نمایش',
            'text_off'   => 'غیر فعال است',
            'text_width' => 100,
            'default' => true,
        ),

        array(
            'id'      => 'proposal-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'بهترین مقالات'
        ),

        array(
            'id'      => 'proposal-post-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),


        array(
            'id'         => 'proposal-cat',
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