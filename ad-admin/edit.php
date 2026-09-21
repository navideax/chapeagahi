<?php
$connection = mysqli_connect('localhost','chapeaga_chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");

$perss = $_GET['edit'];


$queryadduser = "SELECT * from ad_personals WHERE u_id = $perss";
$addQuery = mysqli_query($connection , $queryadduser);

$row = mysqli_fetch_array($addQuery);

if ($row['query'] == "car" || $row['query'] == "motor"){
    $queryadduser2 = "SELECT * from ad_meta WHERE ad_id = $perss";
    $addQuery2 = mysqli_query($connection , $queryadduser2);

    $row2 = mysqli_fetch_array($addQuery2);
}




if(isset($_POST['submit-update'])){
    $newvaziat = $_POST['ed_newvaziat'];
    /*    $queryadduser3 = "UPDATE ad_personals SET vaziat = '$newvaziat' , booll = '1' WHERE u_id = $perss";
        $addQuery3 = mysqli_query($connection , $queryadduser3);*/

    $newname = $_POST['ed_name'];
    $newfname = $_POST['ed_fname'];
    $newdname = $_POST['ed_dname'];
    $newcmelli = $_POST['ed_cmelli'];
    $newphone = $_POST['ed_phone'];
    $newmafqodis = $_POST['ed_mafqodis'];
    $newpm_mores = $_POST['ed_pm_mores'];
    $newsbattime = $_POST['ed_sbattime'];
    $newostan = $_POST['ed_ostan'];
    $newcity = $_POST['ed_city'];
    $newaddress = $_POST['ed_address'];
    $newzipcode = $_POST['ed_zipcode'];
    $newtname = $_POST['ed_tname'];
    $newtgiran = $_POST['ed_tgiran'];
    $newqeymat = $_POST['ed_qeymat'];
    $newpardakht = $_POST['ed_pardakht'];
    $newu_id = $_POST['ed_u_id'];
    echo $newtarikhchap = $_POST['ed_tarikhchap'];


    $queryadduser3 = "UPDATE ad_personals SET name = '$newname',
    fname = '$newfname',
    phone = '$newphone',
    mafqodis = '$newmafqodis',
    pm_mores = '$newpm_mores',
    ostan = '$newostan',
    city = '$newcity',
    address = '$newaddress',
    tgiran = '$newtgiran',
    zipcode = '$newzipcode',
    tname = '$newtname',
    qeymat = '$newqeymat',
    pardakht = '$newpardakht',
    u_id = '$newu_id',
    tarikhchap = '$newtarikhchap',
    vaziat = '$newvaziat',
    booll = '1'
    WHERE u_id = '$perss'";

    $addQuery3 = mysqli_query($connection, $queryadduser3);

    if (!$addQuery3) {
        echo "خطا در اجرای کوئری: " . mysqli_error($connection);
    } else {
        echo "کوئری با موفقیت اجرا شد.";
    }


    if ($row['query'] == "car" || $row['query'] == "motor"){

        $newnoe_v = $_POST['ed_noe_v'];
        $newname_v = $_POST['ed_name_v'];
        $newcolor_v = $_POST['ed_color_v'];
        $newyear_v = $_POST['ed_year_v'];
        $newno_v = $_POST['ed_no_v'];
        $newshasi_v = $_POST['ed_shasi_v'];
        $newmotor_v = $_POST['ed_motor_v'];
        $newsaheb_v = $_POST['ed_saheb_v'];
        $newsaheb_cmail_v = $_POST['ed_saheb_cmail_v'];

        $queryadduser22 = "UPDATE ad_meta SET
noe_v = '$newnoe_v' ,
name_v = '$newname_v' ,
color_v = '$newcolor_v' ,
year_v = '$newyear_v' ,
no_v = '$newno_v' ,
shasi_v = '$newshasi_v' ,
motor_v = '$newmotor_v' ,
saheb_v = '$newsaheb_v',
saheb_cmail_v = '$newsaheb_cmail_v'
WHERE ad_id = $perss";
        $addQuery22 = mysqli_query($connection , $queryadduser22);

        //$row22 = mysqli_fetch_array($addQuery22);
    }








}



if(isset($_POST['submit_del'])){

    echo $myid_un = $_POST['uniqidddddd'];

    $sql_del_ad = "DELETE FROM ad_personals WHERE u_id = '$myid_un'";
    if ($row['query'] == "car" || $row['query'] == "motor"){
        $sql_del_ad_meta = "DELETE FROM ad_meta WHERE ad_id = '$myid_un'";
    }
    if($connection->query($sql_del_ad) === TRUE){
        header('Location: '.get_site_url()."/ad-admin/");
    }

}


$queryadduser = "SELECT * from ad_personals WHERE u_id = $perss";
$addQuery = mysqli_query($connection , $queryadduser);

$row = mysqli_fetch_array($addQuery);

if ($row['query'] == "car" || $row['query'] == "motor"){
    $queryadduser2 = "SELECT * from ad_meta WHERE ad_id = $perss";
    $addQuery2 = mysqli_query($connection , $queryadduser2);

    $row2 = mysqli_fetch_array($addQuery2);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>پنل مدیریت | داشبورد اول</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/font-awesome/css/font-awesome.min.css"); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/dist/css/adminlte.min.css"); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/iCheck/flat/blue.css"); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/morris/morris.css"); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css"); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/datepicker/datepicker3.css"); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/daterangepicker/daterangepicker-bs3.css"); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/dist/css/bootstrap-rtl.min.css"); ?>">
    <!-- template rtl version -->
    <link rel="stylesheet" href="<?php wpdir("ad-admin/dist/css/custom-style.css"); ?>">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">




    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="https://chapeagahi.ir/ad-admin" target="_blank">بازگشت به لیست آگهی</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <?php
            if($addQuery3){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card bg-success-gradient">
                            <div class="card-header">
                                <h3 class="card-title">تغییرات با موفقیت اعمال شد</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <?php
            }
            ?>


            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">ویرایش <?php echo $perss; ?> - <?php echo "وضعیت : " . $row['vaziat']; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post">
                            <div class="card-body">
                                <!-- text input -->
                                <label>سفارش دهنده</label>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>نام</label>
                                            <input name="ed_name" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['name']; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>نام خانوادگی</label>
                                            <input name="ed_fname" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['fname']; ?>">
                                        </div>
                                    </div>

                                    <!--                                        <div class="col">
                                                              <div class="form-group">
                                                                  <label>نام پدر</label>
                                                                  <input name="ed_dname" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php /*echo $row['dname']; */?>">
                                                              </div>
                                                          </div>
                                                          <div class="col">
                                                              <div class="form-group">
                                                                  <label>کد ملی</label>
                                                                  <input name="ed_cmelli" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php /*echo $row['cmelli']; */?>">
                                                              </div>
                                                          </div>-->
                                    <div class="col">
                                        <div class="form-group">
                                            <label>شماره تماس</label>
                                            <input name="ed_phone" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['phone']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <?php if($row['query'] == "car" || $row['query'] == "motor"){
                                    ?>

                                    <hr style="color: black;height: 1px;background: #007bff;border-radius: 5px;">

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>نوع وسیله نقلیه</label>
                                                <input name="ed_noe_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['noe_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>نام وسیله نقلیه (سیستم)</label>
                                                <input name="ed_name_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['name_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>تیپ</label>
                                                <input name="ed_color_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['color_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>مدل وسیله نقلیه</label>
                                                <input name="ed_year_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['year_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>شماره پلاک</label>
                                                <input name="ed_no_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['no_v']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>شماره موتور</label>
                                                <input name="ed_motor_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['motor_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>شماره
                                                <?php echo $row['query'] == "car" ? "شاسی" : "تنه" ?>
                                                </label>
                                                <input name="ed_shasi_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['shasi_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>نام صاحب سند</label>
                                                <input name="ed_saheb_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['saheb_v']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>کد ملی صاحب سند</label>
                                                <input name="ed_saheb_cmail_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['saheb_cmail_v']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">

                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <p></p>
                                                <p id="etelaaaaaaat">

                                                    <?php
                                                    $pieces = explode("-", $row['mafqodis']);
                                                    foreach ($pieces as $piece){
                                                        if(strstr($piece , "موتور") ){
                                                            echo $piece . " سیکلت - ";
                                                        }else{
                                                            echo $piece . " - ";

                                                        }
                                                    }

                                                    ?>
                                                    <?php echo $row2['noe_v'] . " "; ?>
                                                    <!--                                                        نام وسیله نقلیه (سیستم)-->
                                                    <?php echo $row2['name_v'] . " "; ?>
                                                    <!--                                                        تیپ-->
                                                    <?php echo $row2['color_v']; ?>
                                                    مدل
                                                    <?php echo $row2['year_v']; ?>
                                                    به شماره پلاک
                                                    <?php echo $row2['no_v']; ?>
                                                    به شماره موتور
                                                    <?php echo $row2['motor_v']; ?>
                                                    و شماره <?php echo $row['query'] == "car" ? "شاسی" : "تنه" ?>
                                                    <?php echo $row2['shasi_v']; ?>
                                                    به مالكيت
                                                    <?php echo $row2['saheb_v']; ?>
                                                    با کد ملی
                                                    <?php echo $row2['saheb_cmail_v']; ?>
                                                    مفقود گرديده و از درجه اعتبار ساقط می باشد.

                                                </p>
                                                <button type="button" class="btn btn-info" onclick="copy111()">کپی کردن</button>

                                            </div>

                                        </div>
                                    </div>



                                    <script>
                                        function copy111() {
                                            // Get the text field
                                            var copyText = document.getElementById("etelaaaaaaat");



                                            // Copy the text inside the text field
                                            navigator.clipboard.writeText(copyText.innerText);

                                            // Alert the copied text
                                            alert("اطلاعات کپی شد");
                                        }
                                    </script>

                                    <?php
                                }
                                ?>

                                <hr style="color: black;height: 1px;background: #007bff;border-radius: 5px;">

                                <div class="form-group">
                                    <label>مفقودی ها</label>
                                    <input name="ed_mafqodis" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['mafqodis']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>متن ها</label>
<textarea name="ed_pm_mores" class="form-control" rows="3" placeholder="وارد کردن اطلاعات ...">
    <?php echo isset($row) && isset($row['pm_mores']) ? $row['pm_mores'] : ''; ?>
</textarea>


                                </div>
                                <div class="form-group">
                                    <label>تاریخ ثبت</label>
                                    <input name="ed_sbattime" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php


                                    $tago = $row['sbattime']; // زمان ذخیره‌شده از دیتابیس

                                    // فرض می‌کنیم که زمان ذخیره‌شده به فرمت 12 ساعته باشد
                                    $date = new DateTime($tago); // شیء DateTime ایجاد می‌کنیم

                                    // دریافت زمان به فرمت 24 ساعته
                                    $timestamp = $date->getTimestamp(); // به Timestamp تبدیل می‌کنیم

                                    // نمایش تاریخ جلالی با ساعت 24 ساعته
                                    echo $jalali_date = jdate("H:i:s - Y/m/d", $timestamp);




                                    ?>" readonly>
                                </div>
                                <hr style="color: black;height: 1px;background: #007bff;border-radius: 5px;">

                                <div class="form-group">
                                    <label>آدرس</label>
                                    <div class="row">
                                        <div class="col">
                                            <input name="ed_ostan" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['ostan']; ?>">
                                        </div>
                                        <div class="col">
                                            <input name="ed_city" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['city']; ?>">
                                        </div>
                                        <div class="col">
                                            <input name="ed_address" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['address']; ?>">
                                        </div>
                                        <div class="col">
                                            <input name="ed_zipcode" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['zipcode']; ?>">
                                        </div>
                                        <div class="col">
                                            <input name="ed_tname" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['tname']; ?>">
                                        </div>
                                        <div class="col">
                                            <input name="ed_tgiran" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['tgiran']; ?>">
                                        </div>
                                    </div>
                                    <br>


                                    <div class="col-12">

                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <p></p>
                                                <p id="adddddressss">

                                                    <?php echo " استان " . $row['ostan'] . " - شهر " . $row['city']  . " - " . $row['address'] . " -  کد پستی : " . "<span dir='ltr'>" . $row['zipcode'] . "</span>"  . " - تحویل گیرنده :  " . $row['tname'] . " - شماره همراه : " . $row['tgiran']; ?>

                                                </p>

                                                <button type="button" class="btn btn-info" onclick="copy112()">کپی کردن</button>





                                            </div>

                                        </div>
                                    </div>

                                    <script>
                                        function copy112() {
                                            // Get the text field
                                            var copyText = document.getElementById("adddddressss");



                                            // Copy the text inside the text field
                                            navigator.clipboard.writeText(copyText.innerText);

                                            // Alert the copied text
                                            alert("آدرس کپی شد");
                                        }
                                    </script>


                                </div>

                                <hr style="color: black;height: 1px;background: #007bff;border-radius: 5px;">


                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>مبلغ پرداخت شده</label>
                                            <input name="ed_qeymat" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['qeymat']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>کد رهگیری پرداخت</label>
                                            <input name="ed_pardakht" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['pardakht']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>کد رهگیری آگهی</label>
                                            <input name="ed_u_id" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['u_id']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>وضعیت پرداخت</label>
                                            <input type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php if($row['pardakht'] != ""){ echo "پرداخت شده";}else{ echo "پرداخت نشده!";} ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <hr style="color: black;height: 1px;background: #007bff;border-radius: 5px;">


                                <div class="form-group">
                                    <label>وضعیت فعلی</label>
                                    <input type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['vaziat']; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>تغییر وضعیت به : </label>
                                    <select class="form-control" name="ed_newvaziat">
                                        <option value="مشاهده شده توسط پشتیبان" <?php echo ($row['vaziat']=="مشاهده شده توسط پشتیبان"? "selected" : "") ?>>مشاهده شده توسط پشتیبان</option>
                                        <option value="دارای نقص و تماس با کاربر" <?php echo ($row['vaziat']=="دارای نقص و تماس با کاربر"? "selected" : "") ?>>دارای نقص و تماس با کاربر</option>
                                        <option value="انصراف کاربر" <?php echo ($row['vaziat']=="انصراف کاربر"? "selected" : "") ?>>انصراف کاربر</option>
                                        <option value="تائید و ارسال برای چاپ" <?php echo ($row['vaziat']=="تائید و ارسال برای چاپ"? "selected" : "") ?>>تائید و ارسال برای چاپ</option>
                                        <option value="چاپ شده" <?php echo ($row['vaziat']=="چاپ شده"? "selected" : "") ?>>چاپ شده</option>
                                        <option value="ارسال به آدرس سفارش دهنده" <?php echo ($row['vaziat']=="ارسال به آدرس سفارش دهنده"? "selected" : "") ?>>ارسال به آدرس سفارش دهنده</option>
                                    </select>
                                </div>
                                <?php echo $row2['tarikhchap']; ?>

                                <div class="form-group">
                                    <label>اطلاعات تکمیلی</label>
                                    <input name="ed_tarikhchap" type="text" class="form-control" value="<?php echo $row['tarikhchap']; ?>" placeholder="این آگهی در تاریخ ... در روزنامه ... در صفحه ... به چاپ رسید">
                                </div>




                            </div>                                <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="submit-update" class="btn btn-primary">بروز رسانی وضعیت</button>


                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف</button>

                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>برای حذف این آگهی آیا مطمئن هستید؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">بیخیال</button>
                                                <form method="post">
                                                    <input type="hidden" name="uniqidddddd" value="<?php echo $row['u_id']; ?>">
                                                    <button type="submit" name="submit_del" class="btn btn-danger " style="margin-right: 5px">بله، حذف کن</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </form>
                    </div>
                    <!-- /.card -->




                </div>

            </div>
        </div>

    </section>
    <!-- /.content -->




</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>CopyLeft &copy; 2023 <a href="">نوید سیفی</a>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php wpdir("ad-admin/plugins/jquery/jquery.min.js"); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php wpdir("ad-admin/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php wpdir("ad-admin/plugins/morris/morris.min.js"); ?>"></script>
<!-- Sparkline -->
<script src="<?php wpdir("ad-admin/plugins/sparkline/jquery.sparkline.min.js"); ?>"></script>
<!-- jvectormap -->
<script src="<?php wpdir("ad-admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"); ?>"></script>
<script src="<?php wpdir("ad-admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php wpdir("ad-admin/plugins/knob/jquery.knob.js"); ?>"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php wpdir("ad-admin/plugins/daterangepicker/daterangepicker.js"); ?>"></script>
<!-- datepicker -->
<script src="<?php wpdir("ad-admin/plugins/datepicker/bootstrap-datepicker.js"); ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php wpdir("ad-admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"); ?>"></script>
<!-- Slimscroll -->
<script src="<?php wpdir("ad-admin/plugins/slimScroll/jquery.slimscroll.min.js"); ?>"></script>
<!-- FastClick -->
<script src="<?php wpdir("ad-admin/plugins/fastclick/fastclick.js"); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php wpdir("ad-admin/dist/js/adminlte.js"); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php wpdir("ad-admin/dist/js/pages/dashboard.js"); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php wpdir("ad-admin/dist/js/demo.js"); ?>"></script>
</body>
</html>
