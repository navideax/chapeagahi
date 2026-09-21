<?php
/*
template name: مدیریت آگهی ها
*/

if(get_current_user_id() == 1){
    if(!isset($_GET['edit'])){
        include 'ad-admin/index.php';
    }elseif(isset($_GET['edit'])){
        include 'ad-admin/edit.php';
    }
}else{
    header('Location: '.get_site_url());

}
