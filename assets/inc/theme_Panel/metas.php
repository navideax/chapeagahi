<?php

if (isset($possibilities)) {



    $possibilities->createOption(
        array(
            'name'=>'نام منبع',
            'id'=>'curse_name',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'نگیت',
            'is_password'=>'',
            'unit'=>'',
        ));

}

if (isset($buttons)) {

    $buttons->createOption(
        array(
            'name'=>'لینک دانلود',
            'id'=>'download_link',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'https://negit.ir/file.zip',
            'is_password'=>'',
            'unit'=>'',
        ));
    $buttons->createOption(
        array(
            'name'=>'لینک صفحه',
            'id'=>'curse_link',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'https://site.com/post',
            'is_password'=>'',
            'unit'=>'',
        ));
    $buttons->createOption(
        array(
            'name'=>'لینک راهنما',
            'id'=>'help_link',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'https://negit.ir/faq',
            'is_password'=>'',
            'unit'=>'',
        ));
    $buttons->createOption(
        array(
            'name'=>'لینک پیوند',
            'id'=>'link_link',
            'type'=>'text',
            'desc'=>'',
            'default'=>'',
            'placeholder'=>'https://negit.ir',
            'is_password'=>'',
            'unit'=>'',
        ));

}
