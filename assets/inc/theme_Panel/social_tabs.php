<?php

if (isset($social)){

    $socialTab = $social->createTab(
        array(
            'name'=>'تنظیمات صفحه مطالب',
            'desc'=>'',
            'id'=>'single_settings'
        )
    );
    $socialTab->createOption(
        array(
            'name'=>'لینک شبکه های اجتماعی',
            'type'=>'heading',
            'desc'=>'لینک شبکه های اجتماعی خود را وارد کنید',
        ));

    $socialTab->createOption(
        array(
            'name'=>'اینستاگرام',
            'id'=>'instagram_link',
            'type'=>'text',
            'desc'=>'فقط نام کاربری اینستاگرام(ID) خود را وارد کنید',
            'default'=>'',
            'placeholder'=>'instagram',
            'is_password'=>'',
            'unit'=>'',
        ));
    $socialTab->createOption(
        array(
            'name'=>'تلگرام',
            'id'=>'telegram_link',
            'type'=>'text',
            'desc'=>'فقط نام کاربری تلگرام(ID) خود را وارد کنید',
            'default'=>'',
            'placeholder'=>'telegram',
            'is_password'=>'',
            'unit'=>'',
        ));
    $socialTab->createOption(
        array(
            'name'=>'توییتر',
            'id'=>'twitter_link',
            'type'=>'text',
            'desc'=>'فقط نام کاربری توییتر(ID) خود را وارد کنید',
            'default'=>'',
            'placeholder'=>'twitter',
            'is_password'=>'',
            'unit'=>'',
        ));
    $socialTab->createOption(
        array(
            'name'=>'یوتیوب',
            'id'=>'youtube_link',
            'type'=>'text',
            'desc'=>'فقط نام کاربری یوتیوب(ID) خود را وارد کنید',
            'default'=>'',
            'placeholder'=>'youtube',
            'is_password'=>'',
            'unit'=>'',
        ));

    $socialTab->createOption(
        array(
            'type'=>'save',
            'save'=>'ذخیره تغییرات',
            'reset'=>'بازنشانی تنظیمات'
        )
    );

}
