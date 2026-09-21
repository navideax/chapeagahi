<?php
$connection = mysqli_connect('localhost','eyginefo','13WTih6c2s','eyginefo_chap');
//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");

$perss = $_GET['edit'];


if(isset($_POST['submit-update'])){


    echo "dddddddddd0";
    /*    $newvaziat = $_POST['newvaziat'];
        echo $newvaziat;
        $queryadduser3 = "UPDATE ad_personals SET vaziat = '$newvaziat' , booll = '1' WHERE u_id = $perss";
        $addQuery3 = mysqli_query($connection , $queryadduser3);*/
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



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a class="brand-link">
            <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" style="direction: ltr">
            <div style="direction: rtl">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://chapeagahi.ir/wp-content/uploads/2023/06/cropped-chapeagah-logo.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">پنل مدیریت آگهی ها</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo get_site_url()."/ad-admin"; ?>" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-info"></i>
                                <p>داشبورد آگهی ها</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">داشبورد</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">پنل</a></li>
                            <li class="breadcrumb-item active">داشبورد</li>
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
                            <form method="POST">
                                <div class="card-body">
                                    <!-- text input -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>نام</label>
                                                <input name="name" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>نام خانوادگی</label>
                                                <input name="fname" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['fname']; ?>">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label>نام پدر</label>
                                                <input name="dname" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['dname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>کد ملی</label>
                                                <input name="cmelli" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['cmelli']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>شماره تماس</label>
                                                <input name="phone" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['phone']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <?php if($row['query'] == "car" || $row['query'] == "motor"){
                                        ?>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>نوع وسیله نقلیه</label>
                                                    <input name="noe_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['noe_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>نام وسیله نقلیه</label>
                                                    <input name="name_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['name_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>رنگ خوردو</label>
                                                    <input name="color_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['color_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>مدل وسیله نقلیه</label>
                                                    <input name="year_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['year_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>شماره پلاک</label>
                                                    <input name="no_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['no_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>شماره شاسی</label>
                                                    <input name="shasi_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['shasi_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>شماره موتور</label>
                                                    <input name="motor_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['motor_v']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>نام صاحب سند</label>
                                                    <input name="saheb_v" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row2['saheb_v']; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">

                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3 style="    font-size: 18px;">متن آماده آگهی برای ارسال</h3>

                                                    <p>

                                                        <?php echo $row['mafqodis'] . " "; ?>
                                                        <?php echo $row2['noe_v'] . " "; ?>
                                                        <?php echo $row2['name_v'] . " "; ?>
                                                        به رنگ
                                                        <?php echo $row2['color_v']; ?>
                                                        مدل
                                                        <?php echo $row2['year_v']; ?>
                                                        به شماره پلاک
                                                        <?php echo $row2['no_v']; ?>
                                                        به شماره شاسی
                                                        <?php echo $row2['shasi_v']; ?>
                                                        و شماره موتور
                                                        <?php echo $row2['motor_v']; ?>
                                                        به مالكيت آقا / خانم
                                                        <?php echo $row2['saheb_v']; ?>
                                                        با کد ملی
                                                        <?php echo $row['cmelli']; ?>
                                                        مفقود گرديده و از درجه اعتبار ساقط می باشد.

                                                    </p>
                                                </div>

                                            </div>
                                        </div>



                                        <?php
                                    }
                                    ?>


                                    <div class="form-group">
                                        <label>مفقودی ها</label>
                                        <input name="mafqodis" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['mafqodis']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>متن ها</label>
                                        <textarea name="pm_mores" class="form-control" rows="3" placeholder="وارد کردن اطلاعات ..."><?php echo $row['pm_mores']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>تاریخ ثبت</label>
                                        <input name="sbattime" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['sbattime']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>آدرس</label>
                                        <div class="row">
                                            <div class="col">
                                                <input name="ostan" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['ostan']; ?>">
                                            </div>
                                            <div class="col">
                                                <input name="city" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['city']; ?>">
                                            </div>
                                            <div class="col">
                                                <input name="address" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['address']; ?>">
                                            </div>
                                            <div class="col">
                                                <input name="zipcode" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['zipcode']; ?>">
                                            </div>
                                            <div class="col">
                                                <input name="tname" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['tname']; ?>">
                                            </div>
                                        </div>
                                        <br>
                                        <input type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['ostan'] . " - " . $row['city']  . " - " . $row['address'] . " - " . $row['zipcode'] . " - تحویل گیرنده :  " . $row['tname']; ?>" readonly>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>مبلغ پرداخت شده</label>
                                                <input name="qeymat" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['qeymat']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>کد رهگیری پرداخت</label>
                                                <input name="pardakht" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['pardakht']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>کد رهگیری آگهی</label>
                                                <input name="u_id" type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['u_id']; ?>">
                                                <input name="edit" type="hidden" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['u_id']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label>وضعیت پرداخت</label>
                                                <input type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php if($row['pardakht'] != ""){ echo "پرداخت شده";}else{ echo "پرداخت نشده!";} ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>وضعیت فعلی</label>
                                        <input type="text" class="form-control" placeholder="وارد کردن اطلاعات ..." value="<?php echo $row['vaziat']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>تغییر وضعیت به : </label>
                                        <select class="form-control" name="newvaziat">
                                            <option value="مشاهده شده توسط پشتیبان" <?php echo ($row['vaziat']=="مشاهده شده توسط پشتیبان"? "selected" : "") ?>>مشاهده شده توسط پشتیبان</option>
                                            <option value="دارای نقص و تماس با کاربر" <?php echo ($row['vaziat']=="دارای نقص و تماس با کاربر"? "selected" : "") ?>>دارای نقص و تماس با کاربر</option>
                                            <option value="تخلف در ارسال آگهی" <?php echo ($row['vaziat']=="تخلف در ارسال آگهی"? "selected" : "") ?>>تخلف در ارسال آگهی</option>
                                            <option value="تائید و ارسال برای چاپ" <?php echo ($row['vaziat']=="تائید و ارسال برای چاپ"? "selected" : "") ?>>تائید و ارسال برای چاپ</option>
                                            <option value="چاپ شده" <?php echo ($row['vaziat']=="چاپ شده"? "selected" : "") ?>>چاپ شده</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>اطلاعات تکمیلی</label>
                                        <input name="tarikhchap" type="text" class="form-control" placeholder="این آگهی در تاریخ ... در روزنامه ... در صفحه ... به چاپ رسید">
                                    </div>




                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit-update" class="btn btn-primary">بروز رسانی وضعیت</button>
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
        <strong>CopyRight &copy; 2023 <a href="">نوید سیفی</a>.</strong>
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



$queryadduser3 = "UPDATE ad_personals SET
name = '$newname' ,
fname = '$newfname' ,
dname = '$newdname' ,
cmelli = '$newcmelli' ,
phone = '$newphone' ,
mafqodis = '$newmafqodis' ,
pm_mores = '$newpm_mores' ,
sbattime = '$newsbattime' ,
ostan = '$newostan' ,
city = '$newcity' ,
address = '$newaddress' ,
zipcode = '$newzipcode' ,
qeymat = '$newqeymat' ,
pardakht = '$newpardakht' ,
u_id = '$newu_id' ,
tarikhchap = '$newtarikhchap' ,
vaziat = '$newvaziat' ,
booll = '1'
WHERE u_id = $perss";
$addQuery3 = mysqli_query($connection , $queryadduser3);


if ($row['query'] == "car" || $row['query'] == "motor"){

$newnoe_v = $_POST['noe_v'];
$newname_v = $_POST['name_v'];
$newcolor_v = $_POST['color_v'];
$newyear_v = $_POST['year_v'];
$newno_v = $_POST['no_v'];
$newshasi_v = $_POST['shasi_v'];
$newmotor_v = $_POST['motor_v'];
$newsaheb_v = $_POST['saheb_v'];

$queryadduser22 = "UPDATE ad_meta SET
noe_v = '$newnoe_v' ,
name_v = '$newname_v' ,
color_v = '$newcolor_v' ,
year_v = '$newyear_v' ,
no_v = '$newno_v' ,
shasi_v = '$newshasi_v' ,
motor_v = '$newmotor_v' ,
saheb_v = '$newsaheb_v'
WHERE ad_id = $perss";
$addQuery22 = mysqli_query($connection , $queryadduser22);

$row22 = mysqli_fetch_array($addQuery22);
}
}