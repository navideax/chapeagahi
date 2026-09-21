<?php
require get_template_directory() .'/in/csf/codestar-framework.php';

if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'setting_magit_moshtari';
    // Create options

    CSF::createOptions($prefix, array(
        'menu_title' => 'همکاران / مشتریان',
        'menu_slug' => 'setting_magit_m',
        'framework_title' => 'تنظیمات همکاران و مشتریان <small style="font-weight: 800"><b>کدیاتو</b></small>',
        'menu_position' => 61,
    ));


    CSF::createSection( $prefix, array(
        'title'  => ' سایت',
        'fields' => array(

//            array(
//                'id'    => 'opt-gallery-hamkaran',
//                'type'  => 'gallery',
//                'title' => 'افزودن لوگو های همکاران',
//                'add_title'   => 'افزودن تصویر',
//                'edit_title'  => 'ویرایش',
//                'clear_title' => 'حذف',
//            ),

            array(
                'id'     => 'opt-gallery-hamkaran',
                'type'   => 'repeater',
                'title'  => 'لوگو های همکاران',
                'button_title'  => 'افزودن لوگو های همکاران',
                'fields' => array(

                    array(
                        'id'           => 'opt-upload-10',
                        'type'         => 'upload',
                        'title'        => 'آپلود عکس',
                        'library'      => 'image',
                        'button_title' => 'افزودن تصویر',
                        'remove_title' => 'حذف تصویر',
                    ),

                ),
            ),




//            array(
//                'id'    => 'opt-gallery-moshtarian',
//                'type'  => 'gallery',
//                'title' => 'افزودن لوگو های مشتریان',
//                'add_title'   => 'افزودن تصویر',
//                'edit_title'  => 'ویرایش',
//                'clear_title' => 'حذف',
//            ),


            array(
                'id'     => 'opt-gallery-moshtarian',
                'type'   => 'repeater',
                'title'  => ' لوگو های مشتریان',
                'button_title'  => 'افزودن لوگو های مشتریان',
                'fields' => array(

                    array(
                        'id'           => 'opt-upload-20',
                        'type'         => 'upload',
                        'title'        => 'آپلود عکس',
                        'library'      => 'image',
                        'button_title' => 'افزودن تصویر',
                        'remove_title' => 'حذف تصویر',
                    ),

                ),
            ),




        )
    ) );

}