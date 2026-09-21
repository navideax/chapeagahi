<?php

//$general->createOption(
//    array(
//        'name'=>'',
//        'id'=>'',
//        'type'=>'',
//        'desc'=>'',
//        'default'=>'',
//        'placeholder'=>'',
//        'is_password'=>'',
//        'unit'=>'',
//    ));

if (isset($general)) {
    $generalTab = $general->createTab(
        array(
            'name'=>'تنظیمات',
            'desc'=>'',
            'id'=>''
        )
    );
    $generalTab->createOption(
        array(
            'type'=>'save',
            'save'=>'ذخیره تغییرات',
            'reset'=>'بازنشانی تنظیمات'

        )
    );

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'settingsss',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'',
            'is_password'=>'',
            'unit'=>'',
        ));



    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'textarea',
            'type'=>'textarea',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'',
            'is_password'=>'',
            'unit'=>'',
            'is_code' => false
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'type'=>'note',
            'desc'=>'هووووووووووووووووی نگیت',
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'number',
            'type'=>'number',
            'desc'=>'',
            'default'=>'20',
            'min'=>'10',
            'max'=>'30',
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'checkbox',
            'type'=>'checkbox',
            'desc'=>'',
            'default'=>false,
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'multicheck',
            'type'=>'multicheck',
            'desc'=>'',
            'options'=>array(
                '1'=>'q',
                '2'=>'w',
                '3'=>'e',
            ),
            'default'=>array('2','3'),
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'multicheck-categories',
            'type'=>'multicheck-categories',
            'desc'=>'',
            'taxonomy'=>'category',
            'default'=>'',
            'orderby'=>'',
            'order'=>'',
            'hide_empty'=>'',
            'show_count' => true
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'multicheck-pages',
            'type'=>'multicheck-pages',
            'desc'=>'',
            'default'=>'',
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'multicheck-posts',
            'type'=>'multicheck-posts',
            'desc'=>'',
            'post_type'=>'post',
            'default'=>'',
            'num'=>'5',
            'post_status' => 'publish',
            'orderby'=>'',
            'order'=>'',

        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'select',
            'type'=>'select',
            'desc'=>'',
            'options'=>array(
                '1'=>'qsdvbfzgbzr',
                '2'=>'wSDvazsdv',
                '3'=>'eSDGvSD',
            ),
            'default'=>array('2','3'),
            'multiple'=> false
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'select2',
            'type'=>'select',
            'desc'=>'',
            'options'=>array(
                'گروه اول' => array(
                    '1'=>'qsdvbfzgbzr',
                    '2'=>'wSDvazsdv',
                ),
                'گروه دوم' => array(
                    '3'=>'eSDGvSD',
                ),
            ),
            'default'=>array('2','3'),
            'multiple'=> false
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'select-categories',
            'type'=>'select-categories',
            'desc'=>'',
            'taxonomy'=>'category',
            'default'=>'',
            'orderby'=>'',
            'order'=>'',
            'hide_empty'=>'',
            'show_count' => true
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'select-posts',
            'type'=>'select-posts',
            'desc'=>'',
            'post_type'=>'post',
            'default'=>'',
            'num'=>'5',
            'post_status' => 'publish',
            'orderby'=>'',
            'order'=>'',

        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'select-pages',
            'type'=>'select-pages',
            'desc'=>'',
            'default'=>'',
        ));


    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'enable',
            'type'=>'enable',
            'default'=>'',
            'desc'=>'',
            'enabled'=>'فعال',
            'disabled'=>'غیرفعال',
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'color',
            'type'=>'color',
            'default'=>'red',
            'desc'=>'',
            'alpha'=> true,
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'type'=>'heading',
            'desc'=>'هوووووووووووووووووی نگیت',
        ));
    $generalTab->createOption(
        array(
            'type'=>'iframe',
            'url'=>'https://azardid.ir',
            'height'=>'500',
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'radio',
            'type'=>'radio',
            'desc'=>'',
            'options'=>array(
                '1'=>'qsdvbfzgbzr',
                '2'=>'wSDvazsdv',
                '3'=>'eSDGvSD',
            ),
            'default'=>'3',
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'radio-image',
            'type'=>'radio-image',
            'desc'=>'',
            'options'=>array(
                '1'=> get_template_directory_uri(). "/assets/img/search.svg",
                '2'=> get_template_directory_uri(). "/assets/img/home.svg",
            ),
            'default'=>'3',
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'radio-palette',
            'type'=>'radio-palette',
            'desc'=>'',
            'options'=>array(
                array(
                    "#dd9933",
                    "#dd3360",
                    "#560d0d",
                ),
                array(
                    "#dd9933",
                    "#560d0d",
                    "#dd3360",
                ),
                array(
                    "#560d0d",
                    "#dd3360",
                    "#dd9933",
                ),
            ),
            'default'=>'1',
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'editor',
            'type'=>'editor',
            'desc'=>'',
            'default'=>'',
            'media_buttons'=>'',
            'rows'=>'10',
            'editor_settings'=>array(),
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'code-css',
            'type'=>'code',
            'desc'=>'',
            'lang'=>'css',
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'code-js',
            'type'=>'code',
            'desc'=>'',
            'lang'=>'javascript',
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'upload',
            'type'=>'upload',
            'desc'=>'',
            'placeholder'=>'javascript',
        ));

    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'sortable',
            'type'=>'sortable',
            'desc'=>'',
            'visible_button'=>true,
            'options'=>array(
                '1'=>'qsdvbfzgbzr',
                '2'=>'wSDvazsdv',
                '3'=>'eSDGvSD',
            ),
        ));
    $generalTab->createOption(
        array(
            'name'=>'تنظیمات',
            'type'=>'custom',
            'custom'=>'<div id="1660928165"><script type="text/JavaScript" src="https://www.aparat.com/embed/cxfPZ?data[rnddiv]=1660928165&data[responsive]=yes&data[title]=%D8%B2%D9%85%DB%8C%D9%86%D9%87%20%7C%20%C2%AB%D8%A8%D9%87%D8%AA%20%DA%AF%D9%81%D8%AA%D9%85%20%DA%A9%D9%87%20%D9%81%D8%B1%D8%AF%D8%A7%20%D8%B1%D9%88%D8%B2%20%D8%AC%D9%86%DA%AF%D9%87%C2%BB%20%7C%20%D8%A8%D8%A7%D9%85%D8%AF%D8%A7%D8%AD%DB%8C%3A%20%D8%AD%D8%A7%D8%AC%20%D9%85%D9%87%D8%AF%DB%8C%20%D8%B1%D8%B3%D9%88%D9%84%DB%8C&&recom=none"></script></div>',
        ));

    $generalTab->createOption(
        array(
            'type'=>'save',
            'save'=>'ذخیره تغییرات',
            'reset'=>'بازنشانی تنظیمات'
        )
    );
}


if (isset($base_meta)) {
    $base_meta->createOption(
        array(
            'name'=>'تنظیمات',
            'id'=>'metaaa',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'',
            'is_password'=>'',
            'unit'=>'',
        ));
}