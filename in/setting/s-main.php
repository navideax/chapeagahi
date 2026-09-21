<?php
//
// Create a sub-tab
CSF::createSection( $prefix, array(
    'parent' => 'main_setting', // The slug id of the parent section
    'title'  => ' سایت',
    'fields' => array(

        array(
              'id'         => 'allsitecall',
              'type'       => 'switcher',
              'title'      => 'اطلاعات تماس در سایت فعال باشد؟',
              'text_on'    => 'فعال',
              'text_off'   => 'غیرفعال',
              'text_width' => 100
            ),


        array(
            'id'      => 'errorcall-textarea',
            'type'    => 'textarea',
            'title'   => 'متن قطع بودن',
            'default' => 'به دلیل بروزرسانی زیر ساخت ها، تا اطلاع ثانوی بخش مشاوره تلفنی در دسترس نمی باشد.',
            'dependency' => array( 'allsitecall', '==', 'false' ) // check for true/false by field id
        ),
        array(
            'id'    => 'nocall',
            'type'  => 'upload',
            'title' => 'تصویر هنگام قطع بودن ارتباط',
            'dependency' => array( 'allsitecall', '==', 'false' ) // check for true/false by field id
        ),




        array(
            'id'      => 'callnum',
            'type'    => 'text',
            'title'   => 'شماره تماس پشتیبانی',
            'dependency' => array( 'allsitecall', '==', 'true' ) // check for true/false by field id
        ),

        array(
            'id'      => 'yescall-textarea',
            'type'    => 'textarea',
            'title'   => 'متن فعال بودن',
            'default' => 'از ساعت ۸ صبح تا ۸ شب راهنمای شما در ثبت انواع آگهی ها هستیم!',
            'dependency' => array( 'allsitecall', '==', 'true' ) // check for true/false by field id
        ),
        array(
            'id'    => 'yescall',
            'type'  => 'upload',
            'title' => 'تصویر هنگام فعال بودن ارتباط',
            'dependency' => array( 'allsitecall', '==', 'true' ) // check for true/false by field id
        ),

    )
) );