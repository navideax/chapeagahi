<?php
$titan = TitanFramework::getInstance('NEGIT');




$possibilities = $titan->createMetaBox(
    array(
        'name'=>'امکانات',
        'context'=> 'side',
        'priority'=>'default',
        'hide_custom_fields'=>true,
        'post_type'=>array(
            'page',
            'post'
        ),
    )
);
$buttons = $titan->createMetaBox(
    array(
        'name'=>'باتن ها',
        'context'=> 'normal',
        'priority'=>'default',
        'hide_custom_fields'=>true,
        'post_type'=>array(
            'page',
            'post'
        ),
    )
);
require (get_template_directory(). "/assets/inc/theme_Panel/metas.php");




$base_panel = $titan->createAdminPanel(
    array(
        'name'=>'تنظیمات پوسته',
        'title'=> 'پوسته نگیت',
        'desc'=>'<b>درباره پوسته اختصاصی نگیت</b>',
        'id'=>'NEGIT_options',
        'capability'=>'manage_options',
        'position'=>61,
    )
);




$general = $base_panel->createAdminPanel(
    array(
        'name'=>'تنظیمات کلی',
        'title'=> 'تنظیمات کلی',
        'desc'=>'<b>تنظیمات کلی پوسته اختصاصی نگیت</b>',
        'id'=>'NEGIT_base_options',
    )
);
require (get_template_directory(). "/assets/inc/theme_Panel/general_tabs.php");





$single = $base_panel->createAdminPanel(
    array(
        'name'=>'تنظیمات صفحه مطالب',
        'title'=> 'صفحه مطالب',
        'desc'=>'<b>تنظیمات صفحه مطالب پوسته اختصاصی نگیت</b>',
        'id'=>'NEGIT_single_options',
    )
);
require (get_template_directory(). "/assets/inc/theme_Panel/single_tabs.php");



//
//$footer = $base_panel->createAdminPanel(
//    array(
//        'name'=>'تنظیمات فوتر',
//        'title'=> 'فوتر',
//        'desc'=>'<b>تنظیمات فوتر پوسته اختصاصی نگیت</b>',
//        'id'=>'NEGIT_footer_options',
//    )
//);





$social = $base_panel->createAdminPanel(
    array(
        'name'=>'تنظیمات شبکه های اجتماعی',
        'title'=> 'شبکه های اجتماعی',
        'desc'=>'<b>تنظیمات شبکه های اجتماعی پوسته اختصاصی نگیت</b>',
        'id'=>'NEGIT_social_options',
    )
);
require (get_template_directory(). "/assets/inc/theme_Panel/social_tabs.php");
