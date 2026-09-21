<?php

if (isset($single)){

    $singleTab = $single->createTab(
        array(
            'name'=>'تنظیمات صفحه مطالب',
            'desc'=>'',
            'id'=>'single_settings'
        )
    );
    $singleTab->createOption(
        array(
            'name'=>'مطالب دیگر',
            'type'=>'heading',
            'desc'=>'تنظیمات مرتبط با نمایش مطالب دیگر در صفحه مطالب',
        ));

    $singleTab->createOption(
        array(
            'name'=>'مطالب پایین صفحه',
            'id'=>'single_categories',
            'type'=>'multicheck-categories',
            'desc'=>'دسته بندی مورد نظر را انتخاب کنید',
            'taxonomy'=>'category',
            'default'=>'',
            'orderby'=>'',
            'order'=>'',
            'hide_empty'=>'',
            'show_count' => true
        ));

    $singleTab->createOption(
        array(
            'type'=>'save',
            'save'=>'ذخیره تغییرات',
            'reset'=>'بازنشانی تنظیمات'
        )
    );

}