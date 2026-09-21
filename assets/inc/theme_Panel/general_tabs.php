<?php

if (isset($general)) {
    $generalTab = $general->createTab(
        array(
            'name'=>'تنظیمات اصلی',
            'desc'=>'',
            'id'=>'general_settings'
        )
    );
    $generalTab->createOption(
        array(
            'name'=>'لوگو',
            'type'=>'heading',
            'desc'=>'آپلود لوگو',
        ));
    $generalTab->createOption(
        array(
            'name'=>' آپلود لوگو',
            'id'=>'logo_upload',
            'type'=>'upload',
            'desc'=>'پیشنهاد میشود لوگو در سایز 148x34 باشد',
            'placeholder'=>'javascript',
        ));

    $generalTab->createOption(
        array(
            'name'=>'عضویت در سایت',
            'type'=>'heading',
            'desc'=>'لینک عضویت در سایت',
        ));
    $generalTab->createOption(
        array(
            'name'=>'صفحه عضویت',
            'id'=>'signup_link',
            'type'=>'text',
            'desc'=>'لینک عضویت در سایت نگیت را وارد کنید',
            'default'=>'',
            'placeholder'=>'https://negit.ir/signup',
            'is_password'=>'',
            'unit'=>'',
        ));
    $generalTab->createOption(
        array(
            'name'=>'ایندکس',
            'type'=>'heading',
            'desc'=>'تنظیمات ایندکس سایت',
        ));
    $generalTab->createOption(
        array(
            'name'=>'دسته مطالب صفحه ایندکس',
            'id'=>'index_categories',
            'type'=>'multicheck-categories',
            'desc'=>'دسته ای که مایل هستید در ایندکس مشاهده شود را انتخاب کنید - درصورت عدم انتخاب آخرین مطالب نمایش داده خواهد شد',
            'taxonomy'=>'category',
            'default'=>'',
            'orderby'=>'',
            'order'=>'',
            'hide_empty'=>'',
            'show_count' => true
        ));

    $generalTab->createOption(
        array(
            'type'=>'save',
            'save'=>'ذخیره تغییرات',
            'reset'=>'بازنشانی تنظیمات'
        )
    );
}
