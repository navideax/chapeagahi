<?php


$connection = mysqli_connect('localhost','chapeaga_chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");


$records_per_page = 50;

// گرفتن شماره صفحه جاری از URL (اگر وجود داشته باشد)
$page = isset($_GET['thispage']) ? $_GET['thispage'] : 1;

// محاسبه مقدار offset برای پرس و جو
$offset = ($page - 1) * $records_per_page;



if(isset($_POST['submit_search'])){
    $sss_name = $_POST['search_name'];
    $queryadduser2 = "SELECT * FROM `ad_personals` WHERE name LIKE '%$sss_name%' or fname LIKE '%$sss_name%' ORDER BY `id` DESC LIMIT $records_per_page OFFSET $offset";

}else{
    $queryadduser2 = "SELECT * FROM `ad_personals` ORDER BY `id` DESC LIMIT $records_per_page OFFSET $offset";

}


//$queryadduser = "SELECT COUNT(*) as id from ad_personals";
//$queryadduser3 = "SELECT COUNT(*) as id from ad_personals WHERE booll = '0'";
//
//$addQuery = mysqli_query($connection , $queryadduser);
//$addQuery3 = mysqli_query($connection , $queryadduser3);
$addQuery2 = mysqli_query($connection , $queryadduser2);

//$row2 = $addQuery->fetch_assoc();
//$row3 = $addQuery3->fetch_assoc();
//
//$count_adv = $row2['id'];
//$count_adv3 = $row3['id'];


if(isset($_POST['submit_del'])){

    $myid_un = $_POST['uniqidddddd'];

    $sql_del_ad = "DELETE FROM ad_personals WHERE u_id = '$myid_un'";
    /*if ($row['query'] == "car" || $row['query'] == "motor"){
        $sql_del_ad_meta = "DELETE FROM ad_meta WHERE ad_id = '$myid_un'";
    }*/
    if($connection->query($sql_del_ad) === TRUE){
        header('Location: '.get_site_url()."/ad-admin/");
    }else{
        echo "nasjod";
    }

}



// تعداد رکورد در هر صفحه




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




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper2">
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


          <section class="content">
              <div class="row">

                  <!-- /.col -->
                  <div class="col-md-12">
                      <div class="card card-primary card-outline">
                          <div class="card-header">
                              <h3 class="card-title">آگهی ها</h3>

                              <div class="card-tools">
                                  <div class="input-group input-group-sm">
                                      <form action="" class="input-group" method="post">
                                          <input type="text" name="search_name" class="form-control" placeholder="جستجو بر اساس نام">
                                          <div class="input-group-append">
                                              <div class="btn btn-primary">
                                                  <button type="submit" name="submit_search" style="padding: 0;background: none;border: navajowhite; color: #ffffff;">
                                                      <i class="fa fa-search"></i>
                                                  </button>

                                              </div>
                                          </div>
                                          <?php
                                          if(isset($_POST['submit_search'])){
                                              ?>
                                              <a href="">لغو جستجو</a>
                                              <?php
                                          }
                                          ?>
                                      </form>

                                  </div>
                              </div>
                              <!-- /.card-tools -->
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body p-0">
                              <div class="table-responsive mailbox-messages">
                                  <table class="table table-hover table-striped">
                                      <tbody>



                                      <?php
                                      $i = 1;
                                      while ($row = mysqli_fetch_array($addQuery2)){
                                          $tago = $row['sbattime'];
                                          ?>
                                          <tr>
                                              <td><input type="checkbox"></td>
                                              <td class="mailbox-star"><?php if($row['pardakht'] != ""){ ?><span class="right badge badge-success">پرداخت شده</span><?php }else{ ?><span class="right badge badge-danger">پرداخت نشده</span><?php } ?></td>
                                              <td class="mailbox-name"><a href="?edit=<?php echo $row['u_id']; ?>" target="_blank">ویرایش</a></td>
                                              <td class="mailbox-subject"><b><?php echo $row['u_id']; ?></b> - <?php echo $row['name']." ". $row['fname']; ; ?> - <b><?php echo $row['mafqodis']; ?></b>
                                                  <?php if($row['vaziat'] == "ثبت اولیه توسط کاربر"){ ?><span class="right badge badge-danger">جدید</span><?php }
                                                  elseif($row['vaziat'] == "چاپ شده"){ ?><span class="right badge badge-success">چاپ شده</span><?php }
                                                  elseif($row['vaziat'] == "ارسال به آدرس سفارش دهنده" || $row['vaziat'] == "تائید و ارسال برای چاپ"){ ?><span class="right badge badge-success">ارسال شده</span> <span class="right badge badge-warning"><?php echo $row['tarikhchap']; ?></span><?php }
                                                  else{ ?><span class="right badge badge-warning"><?php echo $row['vaziat']; ?></span><?php } ?></td>
                                              <td class="mailbox-attachment"></td>
                                              <td class="mailbox-date" style="font-size: 12px"><?php

                                                  //

                                                  // تنظیم منطقه زمانی به تهران
                                                  date_default_timezone_set('Asia/Tehran');

                                                  // دریافت تاریخ از دیتابیس
                                                  $tago = $row['sbattime'];

                                                  // تبدیل تاریخ و زمان به فرمت دلخواه
                                                  $date = new DateTime($tago, new DateTimeZone('Asia/Tehran')); // اضافه کردن منطقه زمانی
                                                  $result = $date->format('Y-m-d H:i:s');

                                                  // تبدیل تاریخ به timestamp
                                                  $array = explode(' ', $result);
                                                  list($year, $month, $day) = explode('-', $array[0]);
                                                  list($hour, $minute, $second) = explode(':', $array[1]);
                                                  $timestamp = mktime($hour, $minute, $second, $month, $day, $year);

                                                  // تبدیل به تاریخ جلالی
                                                  echo $jalali_date = jdate("H:i:s - Y/m/d", $timestamp);



                                                  //jdate($tago,'l، d F Y  :: h:s' );
                                                   ?></td>
                                              <td class="mailbox-date">
                                                  <!-- Trigger the modal with a button -->
                                                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal_<?php echo $i; ?>">حذف</button>

                                                  <!-- Modal -->
                                                  <div id="myModal_<?php echo $i; ?>" class="modal fade" role="dialog">
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
                                              </td>


                                              <!-- Modal -->




                                          </tr>
                                          <?php
                                          $i++;
                                      }
                                      ?>


                                      </tbody>
                                  </table>
                                  <!-- /.table -->
                              </div>
                              <!-- /.mail-box-messages -->
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer p-0">
                              <div class="mailbox-controls">
                                  <!-- Check all button -->
<!--                                  <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>-->
<!--                                  </button>-->
<!--                                  <div class="btn-group">-->
<!--                                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>-->
<!--                                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>-->
<!--                                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>-->
<!--                                  </div>-->
<!--                                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>-->
                                  <div class="float-left">
                                      <?php echo "صفحه فعلی : " . $page ?>
                                      <div class="btn-group">
                                          <a href="<?php echo "?thispage=";echo $page-1; ?>" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i> قبلی </a>
                                          <a href="<?php echo "?thispage=";echo $page+1; ?>" class="btn btn-default btn-sm"> بعدی <i class="fa fa-chevron-left"></i></a>

                                      </div>
                                      <!-- /.btn-group -->
                                  </div>
                                  <!-- /.float-right -->
                              </div>
                          </div>
                      </div>
                      <!-- /. box -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </section>
      </div>



        <!-- شروع صفحه‌بندی -->




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




<!-- Button to Open the Modal -->





</body>
</html>
