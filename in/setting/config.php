<?php
require get_template_directory() .'/in/csf/codestar-framework.php';


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'setting_magit';
    // Create options
    CSF::createOptions($prefix, array(
        'menu_title' => 'تنظیمات تماس',
        'menu_slug' => 'setting_magit',
        'framework_title' => 'تنظیمات تماس چاپ آگهی <small style="font-weight: 800"><b>کدیاتو</b></small>',
        'menu_position' => 60,
    ));




    //
    // Create a top-tab
    CSF::createSection( $prefix, array(
        'id'    => 'main_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات عمومی',
    ) );
    require get_template_directory() .'/in/setting/s-main.php';

/*

    //
    // Create a top-tab
    CSF::createSection( $prefix, array(
        'id'    => 'box_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات باکس مطالب',
    ) );
    require get_template_directory() .'/in/setting/s-box.php';

    CSF::createSection( $prefix, array(
        'id'    => 'sidebar_index_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات سایدبار صفحه اصلی',
    ) );
    require get_template_directory() .'/in/setting/s-sidebar-index.php';


    CSF::createSection( $prefix, array(
        'id'    => 'single_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات صفحه مطالب',
    ) );
    require get_template_directory() .'/in/setting/s-single.php';

    CSF::createSection( $prefix, array(
        'id'    => 'cat_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات صفحه دسته بندی',
    ) );
    require get_template_directory() .'/in/setting/s-category.php';

    CSF::createSection( $prefix, array(
        'id'    => 'footer_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات فوتر',
    ) );
    require get_template_directory() .'/in/setting/s-footer.php';


    CSF::createSection( $prefix, array(
        'id'    => 'pri_setting', // Set a unique slug-like ID
        'title' => 'تنظیمات اختصاصی',
    ) );
    require get_template_directory() .'/in/setting/pri-setting.php';*/


}


// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'magit_post_options';

    //
    // Create a metabox
    CSF::createMetabox( $prefix, array(
        'title'     => 'تنظیمات مطالب',
        'post_type' => 'post',
        'context'   => 'side', // The context within the screen where the boxes should display. `normal`, `side`, `advanced`
    ) );

    //
    // Create a section
    CSF::createSection( $prefix, array(
        'title'  => 'اطلاعات تماس تلفنی',
        'fields' => array(



            array(
                'id'      => 'show-call',
                'type'    => 'switcher',
                'title'   => 'اطلاعات تماس',
                'label'   => 'آیا اطلاعات تماس نمایش داده شود؟',
                'default' => false
            ),


/*            array(
                'id'      => 'vip-post',
                'type'    => 'checkbox',
                'title'   => '',
                'label'   => 'بصورت بزرگ نمایش داده خواهد شد',
                'default' => false // or false
            ),*/



        )
    ) );

}



