<?php
CSF::createSection( $prefix, array(
    'parent' => 'single_setting', // The slug id of the parent section
    'title'  => 'اطلاعات زیر تیتر',
    'fields' => array(

        array(
            'id'      => 'category-switcher',
            'type'    => 'switcher',
            'title'   => 'دسته بندی ها',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

        array(
            'id'      => 'time-switcher',
            'type'    => 'switcher',
            'title'   => 'تاریخ انتشار',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

        array(
            'id'      => 'read-switcher',
            'type'    => 'switcher',
            'title'   => 'زمان مطالعه',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

        array(
            'id'      => 'author-switcher',
            'type'    => 'switcher',
            'title'   => 'نویسنده',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

    )
));

CSF::createSection( $prefix, array(
    'parent' => 'single_setting', // The slug id of the parent section
    'title'  => 'سایدبار سمت راست',
    'fields' => array(

        array(
            'id'      => 'cm-switcher',
            'type'    => 'switcher',
            'title'   => 'تعداد کامنت ها',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

/*        array(
            'id'      => 'li-switcher',
            'type'    => 'switcher',
            'title'   => ' لایک ها',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),*/

/*        array(
            'id'      => 'bo-switcher',
            'type'    => 'switcher',
            'title'   => 'بوکمارک',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),*/

        array(
            'id'      => 'sh-switcher',
            'type'    => 'switcher',
            'title'   => 'اشتراک گذاری',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

        array(
            'id'      => 'sc-switcher',
            'type'    => 'switcher',
            'title'   => 'اسکرولر',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

    )
));

CSF::createSection( $prefix, array(
    'parent' => 'single_setting', // The slug id of the parent section
    'title'  => 'باکس نویسنده پایین مطالب',
    'fields' => array(

        array(
            'id'      => 'tags-switcher',
            'type'    => 'switcher',
            'title'   => 'برچسب ها (هشتگ)',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true,

        ),


        array(
            'id'      => 'b-switcher',
            'type'    => 'switcher',
            'title'   => 'نمایش باکس',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),

        array(
            'id'      => 'b-cm-switcher',
            'type'    => 'switcher',
            'title'   => ' کامنت ها',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true,
            'dependency' => array( 'b-switcher', '==', 'true' ) // check for true/false by field id

        ),

/*        array(
            'id'      => 'b-li-switcher',
            'type'    => 'switcher',
            'title'   => ' لایک ها',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true,
            'dependency' => array( 'b-switcher', '==', 'true' ) // check for true/false by field id

        ),*/

/*        array(
            'id'      => 'b-bo-switcher',
            'type'    => 'switcher',
            'title'   => 'بوکمارک',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true,
            'dependency' => array( 'b-switcher', '==', 'true' ) // check for true/false by field id

        ),*/

        array(
            'id'      => 'b-sh-switcher',
            'type'    => 'switcher',
            'title'   => 'اشتراک گذاری',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true,
            'dependency' => array( 'b-switcher', '==', 'true' ) // check for true/false by field id

        ),

        array(
            'id'      => 'b-fl-switcher',
            'type'    => 'switcher',
            'title'   => 'دنبال کردن',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true,
            'dependency' => array( 'b-switcher', '==', 'true' ) // check for true/false by field id

        ),

    )
));

CSF::createSection( $prefix, array(
    'parent' => 'single_setting', // The slug id of the parent section
    'title'  => 'تنظیمات مطالب بیشتر',
    'fields' => array(

        array(
            'id'      => 'more-posts-switcher',
            'type'    => 'switcher',
            'title'   => 'نمایش بخش مطالب بیشتر',
            'text_on'  => 'در حال نمایش',
            'text_off' => 'غیرفعال',
            'text_width' => 100,
            'default' => true
        ),


        array(
            'id'      => 'more-posts-text',
            'type'    => 'text',
            'title'   => 'نام این بخش',
            'default' => 'مطالب مشابه بیشتر'
        ),

        array(
            'id'      => 'more-posts-count',
            'type'    => 'slider',
            'title'   => 'تعداد محتوا',
            'min'     => 0,
            'max'     => 100,
            'step'    => 1,
            'default' => 10,
        ),

        array(
            'id'         => 'more-posts-mode',
            'type'       => 'radio',
            'title'      => 'نمایش مطالب بیشتر',
            'options'    => array(
                'option-1' => 'مرتبط',
                'option-2' => 'خاص',
            ),
            'default'    => 'option-1'
        ),

        array(
            'id'         => 'more-posts-cat',
            'type'       => 'checkbox',
            'title'      => 'انتخاب دسته بندی',
            'options'    => 'categories',
            'query_args' => array(
                'orderby'  => 'post_title',
                'order'    => 'ASC',
            ),
            'dependency' => array( 'more-posts-mode', '==', 'option-2' ) // check for true/false by field id
        ),

        array(
            'id'         => 'more-posts-pe',
            'type'       => 'radio',
            'title'      => 'انتخاب نوع',
            'options'    => array(
                'option-1' => 'مرتبط با دسته بندی ها',
                'option-2' => 'مرتبط با برچسب ها',
                'option-3' => 'تصادفی',
            ),
            'default'    => 'option-1',
            'dependency' => array( 'more-posts-mode', '==', 'option-1' ) // check for true/false by field id
        ),

    )
));