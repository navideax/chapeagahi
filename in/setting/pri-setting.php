<?php
CSF::createSection( $prefix, array(
    'parent' => 'pri_setting',
    'title'  => 'برنامه نویسی!',
    'fields' => array(

        array(
            'id'       => 'custom-css',
            'type'     => 'code_editor',
            'title'    => 'سی اس اس اختصاصی',
            'settings' => array(
                'theme'  => 'monokai',
                'mode'   => 'css',
            ),
        ),

        array(
            'id'       => 'custom-js',
            'type'     => 'code_editor',
            'title'    => 'جاوا اسکریپت اختصاصی',
            'settings' => array(
                'theme'  => 'monokai',
                'mode'   => 'javascript',
            ),
        ),

    )
) );
CSF::createSection( $prefix, array(
    'parent' => 'pri_setting',
    'title'  => 'وارد / صادر کردن تنظیمات',
    'fields' => array(

        array(
            'type' => 'backup',
        ),


    )
) );