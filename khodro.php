<?php
/**
 * Template Name: آگهی مفقودی خودرو
 *
 * @package WordPress
 * @subpackage chapeagahi
 * @since chapeagahi 1.0
 */
?>


<?php

$send_q = QEYMAT_CHAP_AGHAHI;

$connection = mysqli_connect('localhost','chapeaga_chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
if (!$connection) {
    die("خطا در اتصال به پایگاه داده: " . mysqli_connect_error());
}


//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");


if(isset($_POST['submit-t'])){

//    vars
    $f_noe = @$_POST['motaghazi'];
    $f_query = "car";
    $f_name = @$_POST['ip_1'];
    $f_fname = @$_POST ['ip_2'];
    $f_melli = @$_POST ['ip_3'];
    $f_shsh = @$_POST ['ip_4'];
    $f_pedar = "-";
    $f_phone = @$_POST ['ip_6'];
    $f_ostan = @$_POST ['ip_7'];
    $f_shahr = @$_POST ['ip_8'];
    $f_address = @$_POST ['ip_9'];
    $f_zipcode = @$_POST ['ip_10'];
    $f_girandeh = @$_POST ['ip_11'];
    $f_tgiran = @$_POST ['ip_12'];
    $f_pm_mores = @$_POST['moretext'];
    $f_mafghoodi = @$_POST ['iteeems'];
    $f_uid = @$_POST ['uniqid'];
    $f_date = date('m/d/Y h:i:s A', time());

//    car and notor

        $f_noe_v = @$_POST['ip_1_1'];
        $f_name_v = @$_POST ['ip_2_2'];
        $f_color_v = @$_POST ['ip_3_3'];
        $f_year_v = @$_POST ['ip_4_4'];
        $f_no_v = @$_POST ['ip_5_5'];
        $f_shasi_v = @$_POST ['ip_6_6'];
        $f_motor_v = @$_POST ['ip_7_7'];
        $f_saheb_v = @$_POST ['ip_8_8'];
        $f_saheb_cmelli_v = @$_POST ['ip_9_9'];


//    connection
    if($connection){


        $check_ad = "SELECT * FROM ad_personals WHERE u_id = '$f_uid'";
        $result = @mysqli_query($connection,$check_ad);
        $row = @mysqli_fetch_array($result);
        if($row['u_id'] == $f_uid){

            $sql_del_ad = "DELETE FROM ad_personals WHERE u_id = '$f_uid'";
            $sql_del_ad_meta = "DELETE FROM ad_meta WHERE ad_id = '$f_uid'";

            if($connection->query($sql_del_ad) === TRUE && $connection->query($sql_del_ad_meta) === TRUE){

                $queryadduser = "INSERT INTO `ad_personals` (`noe`, `u_id`, `query`, `name`, `fname`, `cmelli`, `shsh`, `dname`, `phone`, `ostan`, `city`, `address`, `zipcode`, `tname`, `sbattime`, `mafqodis`, `pm_mores`, `tgiran`)
         VALUES ('$f_noe', '$f_uid', '$f_query','$f_name', '$f_fname', '$f_melli', '$f_shsh', '$f_pedar', '$f_phone', '$f_ostan', '$f_shahr', '$f_address', '$f_zipcode', '$f_girandeh', '$f_date', '$f_mafghoodi', '$f_pm_mores','$f_tgiran')";
                $addQuery = mysqli_query($connection , $queryadduser);



                    $queryaddusermeta = "INSERT INTO `ad_meta` (`ad_id`, `noe_v`, `name_v`, `color_v`, `year_v`, `no_v`, `shasi_v`, `motor_v`, `saheb_v`,`saheb_cmail_v`)
         VALUES ('$f_uid', '$f_noe_v','$f_name_v', '$f_color_v', '$f_year_v', '$f_no_v', '$f_shasi_v', '$f_motor_v', '$f_saheb_v','$f_saheb_cmelli_v')";
                    $addQuerymeta = mysqli_query($connection , $queryaddusermeta);



            }



        }
        else{
            $queryadduser = "INSERT INTO `ad_personals` (`noe`, `u_id`, `query`, `name`, `fname`, `cmelli`, `shsh`, `dname`, `phone`, `ostan`, `city`, `address`, `zipcode`, `tname`, `sbattime`, `mafqodis`, `pm_mores`, `tgiran`)
         VALUES ('$f_noe', '$f_uid', '$f_query','$f_name', '$f_fname', '$f_melli', '$f_shsh', '$f_pedar', '$f_phone', '$f_ostan', '$f_shahr', '$f_address', '$f_zipcode', '$f_girandeh', '$f_date', '$f_mafghoodi', '$f_pm_mores','$f_tgiran')";
            $addQuery = mysqli_query($connection , $queryadduser);



                $queryaddusermeta = "INSERT INTO `ad_meta` (`ad_id`, `noe_v`, `name_v`, `color_v`, `year_v`, `no_v`, `shasi_v`, `motor_v`, `saheb_v`,`saheb_cmail_v`)
         VALUES ('$f_uid', '$f_noe_v','$f_name_v', '$f_color_v', '$f_year_v', '$f_no_v', '$f_shasi_v', '$f_motor_v', '$f_saheb_v','$f_saheb_cmelli_v')";
                $addQuerymeta = mysqli_query($connection , $queryaddusermeta);



        }



        if (!$addQuery) {
            // اگر کوئری اجرا نشد، خطا را نمایش بده
            die("خطا در اجرای کوئری: " . mysqli_error($connection));
        }



        if ($addQuerymeta || $addQuery){

            $myuid = $f_uid;
            $desc = $f_uid . " سفارش چاپ آگهی ";
            require_once("zarinpal-ch/zarinpal_function.php");
            $MerchantID 	= "242fb580-117e-4fdb-9f4a-de39e596d27e";
            $Amount 		= $send_q;
            $Description 	= $desc;
            $Email 			= "";
            $Mobile 		= $f_phone;
            $CallbackURL 	= "https://chapeagahi.ir/ad-verify?use=$myuid";
            $ZarinGate 		= false;
            $SandBox 		= false;

            $zp 	= new zarinpal();
            $result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);

            if (isset($result["Status"]) && $result["Status"] == 100)
            {
                // Success and redirect to pay
                $zp->redirect($result["StartPay"]);
            } else {
                // error
                echo "خطا در ایجاد تراکنش";
                echo "<br />کد خطا : ". $result["Status"];
                echo "<br />تفسیر و علت خطا : ". $result["Message"];
            }



//            -----------------------------------









        }

    }






}

?>


<?php get_header(); ?>

<div class="form-mafghoodi" onload="mooosa()">
    <div class="container">
        <div class="row">
            <?php
            get_template_part( 'assets/inc/template/mainsite/amarargham' );
            ?>
            <div class="col-12">
                <div class="form-m-header">
                    <h1>
                        ثبت آگهی مفقودی مدارک خودرو
                    </h1>
                    <h2>
                        سفارش آنلاین چاپ آگهی سند کمپانی، کارت و برگ سبز خودرو و... در روزنامه سراسری کثیرالانتشار با ارسال رایگان
                    </h2>

                </div>
                <div class="form-m-body">

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">۱ ثبت اطلاعات آگهی مفقودی</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">۲ مشاهده آگهی مفقودی و ثبت نهایی</button>
                        </li>
                    </ul>



                    <div class="tab-content" id="pills-tabContent" >
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form method="post" enctype="multipart/form-data" action="" onsubmit="submitForm()">
                                <ul class="infos">
                                    <li style="display: none">
                                        <label class="form-item-title" for=""> متقاضی <b class="foooor-force">*</b> </label>
                                        <div class="radios">
                                            <div>
                                                <input type="radio" name="motaghazi" value="حقیقی" id="haghighi" onclick="porc()" checked>
                                                <label for="haghighi"> شخص حقیقی(افراد)  </label>
                                            </div>

                                        </div>
                                    </li>
                                    <li class="mt-5">
                                        <label class="form-item-title" style="font-size: 15px;font-weight: 900;" >اطلاعات سفارش دهنده آگهی :
                                            <span style="font-size: 10px;background: #eeeeee;padding: 5px;border-radius: 50px;font-weight: 300;">
                                            جهت هماهنگی
                                        </span>
                                        </label>
                                    </li>
                                    <li class="mt-3" id="personals" style="background: #eeeeee;padding: 15px;border-radius: 5px;">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_1"> نام <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_1" id="ip_1" value="<?php if(!empty($_POST['ip_1'])){echo $_POST['ip_1'];} ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_2">
                                                        نام خانوادگی <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_2" id="ip_2"  value="<?php if(!empty($_POST['ip_2'])){echo $_POST['ip_2'];} ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_6"> شماره همراه <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_6" id="ip_6" placeholder="به لاتین وارد کنید"  value="<?php if(!empty($_POST['ip_6'])){echo $_POST['ip_6'];} ?>" required>
                                                </div>
                                            </div>

                                        </div>
                                    </li>


                                    <li class="mt-4">
                                        <label class="form-item-title" style="font-size: 15px;font-weight: 900;"> مفقودی ها را انتخاب کنید : <b class="foooor-force">*</b>
                                            <span style="font-size: 10px;background: #eeeeee;padding: 5px;border-radius: 50px;font-weight: 300;">
                                            جهت درج در آگهی
                                        </span>
                                        </label>
                                    </li>
                                    <li class="mt-3" style="background: #eeeeee;padding: 15px;border-radius: 5px;">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                              <!--  <div class="form-m-item-box-ch d-none">
                                                    <input type="checkbox" name="it_car[]" id="it_1" value="كارت‌ هوشمند‌ راننده">
                                                    <label class="form-item-title" for="it_1">كارت‌ هوشمند‌</label>
                                                </div>-->
                                                <div class="form-m-item-box-ch">
                                                    <input type="checkbox" name="it_car[]" id="it_9" value="برگ سبز خودرو">
                                                    <label class="form-item-title" for="it_9">برگ سبز خودرو</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-m-item-box-ch">
                                                    <input type="checkbox" name="it_car[]" id="it_10" value="سند کمپانی">
                                                    <label class="form-item-title" for="it_10">سند کمپانی</label>
                                                </div>
                                                <div class="form-m-item-box-ch">
                                                    <input type="checkbox" name="it_car[]" id="it_11" value="کارت خودرو">
                                                    <label class="form-item-title" for="it_11">کارت خودرو</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <div class="form-m-item-box-ch">
                                                    <input type="checkbox" name="it_car[]" id="it_17" value="پلاک خودرو">
                                                    <label class="form-item-title" for="it_17">پلاک خودرو</label>
                                                </div>
                                                <div class="form-m-item-box-ch">
                                                    <input type="checkbox" name="it_car[]" id="it_66" value="فاکتور بلوک سرسیلندر">
                                                    <label class="form-item-title" for="it_66">فاکتور بلوک سرسیلندر</label>
                                                </div>
                                                <div class="form-m-item-box-ch">
                                                    <input type="checkbox" name="more" id="more" onclick="checkmore()" >
                                                    <label class="form-item-title" for="more">سایر مدارک</label>
                                                </div>
                                            </div>


                                        </div>
                                    </li>
                                    <li >
                                        <div class="form-m-item-box">
                                            <textarea name="moretext" id="moreadv" cols="30" rows="5" placeholder=" در صورتی که مدرک و سند مفقود شده در لیست بالا نیست، عنوان آن را در این کادر بنویسید یا اگر متن خاصی برای آگهی تان دارید را میتوانید در اینجا بنویسید."></textarea>
                                        </div>
                                    </li>


                                    <li class="mt-2">
                                        <label class="form-item-title" style="font-size: 15px;font-weight: 900;">اطلاعات مدارک وسیله نقیه :
                                            <span style="font-size: 10px;background: #eeeeee;padding: 5px;border-radius: 50px;font-weight: 300;">
                                            جهت درج در آگهی
                                        </span>
                                        </label>
                                    </li>
                                    <li>
                                        <div class="row p_styles">
                                            <div class="col-12 col-md-4 mb-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_1_1" style="font-size: 14px;font-weight: 500;"> نوع وسیله نقلیه <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_1_1" id="ip_1_1" placeholder="مثال : سواری، کشنده، تراکتور و..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_2_2"  style="font-size: 14px;font-weight: 500;">نام وسیله نقلیه (سیستم)<b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_2_2" id="ip_2_2" placeholder="مثال : سایپا، بنز، پژو و..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_5_5" style="font-size: 14px;font-weight: 500;"> شماره پلاک <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_5_5" id="ip_5_5"  placeholder="مثال: xxایرانxxxبxx" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_3_3" style="font-size: 14px;font-weight: 500;"> تیپ <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_3_3" id="ip_3_3" placeholder="مثال : تیبا2 ، 405 و..." required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_4_4" style="font-size: 14px;font-weight: 500;"> مدل وسیله نقلیه <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_4_4" id="ip_4_4" placeholder="مثال : 1400" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_7_7" style="font-size: 14px;font-weight: 500;"> شماره موتور  <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_7_7" id="ip_7_7" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_6_6" style="font-size: 14px;font-weight: 500;"> شماره شاسی <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_6_6" id="ip_6_6" required>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_8_8" style="font-size: 14px;font-weight: 500;"> نام مالک  <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_8_8" id="ip_8_8" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_9_9" style="font-size: 14px;font-weight: 500;"> شماره ملی یا شناسه ملی صاحب سند  <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_9_9" id="ip_9_9" required>
                                                </div>
                                            </div>
                                        </div>
                                    </li>


                                    <li class="mt-4">
                                        <label class="form-item-title" style="font-size: 15px;font-weight: 900;"> آدرس پستی : <b class="foooor-force">*</b>
                                            <span style="font-size: 10px;background: #eeeeee;padding: 5px;border-radius: 50px;font-weight: 300;">
                                            جهت ارسال آگهی
                                        </span>
                                        </label>
                                    </li>
                                    <li class="mt-3" style="background: #eeeeee;padding: 15px;border-radius: 5px;" id="personals">
                                        <div class="row">
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_7"> استان <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_7" id="ip_7"  value="<?php if(!empty($_POST['ip_7'])){echo $_POST['ip_7'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_8"> شهر <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_8" id="ip_8" value="<?php if(!empty($_POST['ip_8'])){echo $_POST['ip_8'];} ?>" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_9"> ادامه آدرس جهت تحویل آگهی <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_9" id="ip_9" placeholder="خیابان، کوچه، واحد، پلاک و.. (دقیق وارد کنید)" value="<?php if(!empty($_POST['ip_9'])){echo $_POST['ip_9'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_10"> کد پستی <b class="foooor-force">*</b></label>
                                                    <input type="text" name="ip_10" id="ip_10"  value="<?php if(!empty($_POST['ip_10'])){echo $_POST['ip_10'];} ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_11"> نام و نام‌خانوادگی تحویل گیرنده <b class="foooor-force">*</b></label>
                                                    <input type="text" name="ip_11" id="ip_11"  value="<?php if(!empty($_POST['ip_11'])){echo $_POST['ip_11'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_12"> شماره تلفن تحویل گیرنده <b class="foooor-force">*</b></label>
                                                    <input type="text" name="ip_12" id="ip_12"  value="<?php if(!empty($_POST['ip_12'])){echo $_POST['ip_12'];} ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <div class="form-m-item-box">
                                        <?php
                                        $number = rand(1, 10);
                                        $t = time();
                                        $random = $number . '' . $t;

                                        ?>
                                        <input type="text" style="display: none" name="uniqid" value="<?php echo $random ?>">
                                        <button type="submit" name="submit-s" onclick="chtab()">این اطلاعات را تائید و ثبت میکنم</button>
                                    </div>
                                </ul>
                            </form>

                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="matnad">
                                <div class="title">
                                    <h3>محتوای آگهی شما</h3>
                                </div>
                                <div class="items">

                                    <h3>موارد انتخابی شما : (مفقودی)</h3>
                                    <ol>
                                        <?php

                                        $iteeems = $_POST['it_car'];
                                        if($_GET['q'] == "car"){
                                            $iteeems = $_POST['it_car'];
                                        }elseif($_GET['q'] == "motor"){
                                            $iteeems = $_POST['it_motor'];
                                        }elseif($_GET['q'] == "tahsili"){
                                            $iteeems = $_POST['it_tahsili'];
                                        }elseif($_GET['q'] == "personal"){
                                            $iteeems = $_POST['it_personal'];
                                        }elseif($_GET['q'] == "passport"){
                                            $iteeems = $_POST['it_passport'];
                                        }
                                        if(!empty($iteeems) || !empty($_POST['massmoz']) || !empty($_POST['moretext'])){
                                            if(!empty($iteeems)){
                                                $N = count($iteeems);

                                                for($i=0; $i < $N; $i++)
                                                {
                                                    echo "<li> " . ($iteeems[$i]) . "</li> " ;
                                                }
                                            }

                                                ?>
                                                <hr>
                                                <li>نوع وسیله نقلیه : <b><?php echo $_POST['ip_1_1']; ?></b></li>
                                                <li>نام وسیله نقلیه : <b><?php echo $_POST['ip_2_2']; ?></b></li>
                                                <li>تیپ : <b><?php echo $_POST['ip_3_3']; ?></b></li>
                                                <li>مدل وسیله نقلیه : <b><?php echo $_POST['ip_4_4']; ?></b></li>
                                                <li>شماره پلاک : <b><?php echo $_POST['ip_5_5']; ?></b></li>
                                                <?php if(!empty($_POST['ip_6_6'])){?><li>شماره شاسی : <b><?php echo $_POST['ip_6_6']; ?></b></li><?php } ?>
                                                <?php if(!empty($_POST['ip_7_7'])){?><li>شماره موتور : <b><?php echo $_POST['ip_7_7']; ?></b></li><?php } ?>
                                                <?php if(!empty($_POST['ip_8_8'])){?><li>نام صاحب سند : <b><?php echo $_POST['ip_8_8']; ?></b></li><?php } ?>
                                                <?php if(!empty($_POST['ip_9_9'])){?><li>کد ملی صاحب سند : <b><?php echo $_POST['ip_9_9']; ?></b></li><?php } ?>

                                                <?php


                                            if(!empty($_POST['massmoz'])){
                                                echo "<hr><p class='moretext'>" . $_POST['massmoz'] . "</p>";
                                            }
                                            if(!empty($_POST['moretext'])){
                                                echo "<hr><p class='moretext'>" . $_POST['moretext'] . "</p>";
                                            }
                                        }else{
                                            echo "<p style='color: red'>" . "هیچ موردی انتخاب نشده است" . "</p>";

                                        }
                                        ?>
                                    </ol>
                                </div>
                                <div class="texts">
                                    <h3>اطلاعات ارسال کننده آگهی :</h3>
                                    <ul>
                                        <li>نام و نام خانوادگی : <b><?php echo $_POST['ip_1']." ".$_POST['ip_2']; ?></b></li>

                                        <li>آدرس : <b><?php echo $_POST['ip_7']." - ".$_POST['ip_8']." - ".$_POST['ip_9']; ?></b></li>
                                        <li>کد پستی : <b><?php echo $_POST['ip_10']; ?></b></li>
                                        <li>شماره تماس : <b><?php echo $_POST['ip_6']; ?></b></li>
                                        <li>تحویل گیرنده : <b><?php echo $_POST['ip_11']; ?></b></li>
                                        <li>تلفن تحویل گیرنده : <b><?php echo $_POST['ip_12']; ?></b></li>
                                    </ul>


                                </div>
                                <div class="alerts">
                                    <h3>توجه!</h3>
                                    <p>
                                        1 - در صورت مغایرت اطلاعات با زدن دکمه مرحله قبلی اطلاعات را اصلاح نمایید.
                                    </p>
                                    <p>
                                        2 - آدرس پستی را دقیق درج نمایید تا از برگشت خوردن مرسوله جلوگیری شود. چنانچه مرسوله برگشت داده شود، ارسال مجدد آن مشمول هزینه ارسال میگردد.
                                    </p>
                                </div>

                                <?php get_template_part( 'assets/inc/components/hazine' ) ?>

                            </div>
                            <ul class="infos">
                                <li>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-m-item-box">
                                                <button class="paymn2" onclick="chtab2()">مرحله قبلی</button>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-m-item-box">
                                                <form method="POST">
                                                    <input type="text" style="display: none" name="uniqid" value="<?php echo $_POST['uniqid']; ?>">
                                                    <input type="text" style="display: none" name="motaghazi" value="<?php echo $_POST['motaghazi']; ?>">
                                                    <input type="text" style="display: none" name="ip_1" value="<?php echo $_POST['ip_1']; ?>">
                                                    <input type="text" style="display: none" name="ip_2" value="<?php echo $_POST['ip_2']; ?>">
                                                    <input type="text" style="display: none" name="ip_3" value="<?php echo $_POST['ip_3']; ?>">
                                                    <input type="text" style="display: none" name="ip_4" value="<?php echo $_POST['ip_4']; ?>">
                                                    <input type="text" style="display: none" name="ip_5" value="<?php echo $_POST['ip_5']; ?>">
                                                    <input type="text" style="display: none" name="ip_6" value="<?php echo $_POST['ip_6']; ?>">
                                                    <input type="text" style="display: none" name="ip_7" value="<?php echo $_POST['ip_7']; ?>">
                                                    <input type="text" style="display: none" name="ip_8" value="<?php echo $_POST['ip_8']; ?>">
                                                    <input type="text" style="display: none" name="ip_9" value="<?php echo $_POST['ip_9']; ?>">
                                                    <input type="text" style="display: none" name="ip_10" value="<?php echo $_POST['ip_10']; ?>">
                                                    <input type="text" style="display: none" name="ip_11" value="<?php echo $_POST['ip_11']; ?>">
                                                    <input type="text" style="display: none" name="ip_12" value="<?php echo $_POST['ip_12']; ?>">
                                                    <input type="text" style="display: none" name="iteeems" value="<?php if($iteeems){ echo implode("-", $iteeems);} ?>">
                                                    <input type="text" style="display: none" name="moretext" value="<?php echo $_POST['moretext'] . $_POST['massmoz']; ?>">

                                                    <!-- موتور و ماشین -->


                                                        <input type="text" style="display: none" name="ip_1_1" value="<?php echo $_POST['ip_1_1']; ?>">
                                                        <input type="text" style="display: none" name="ip_2_2" value="<?php echo $_POST['ip_2_2']; ?>">
                                                        <input type="text" style="display: none" name="ip_3_3" value="<?php echo $_POST['ip_3_3']; ?>">
                                                        <input type="text" style="display: none" name="ip_4_4" value="<?php echo $_POST['ip_4_4']; ?>">
                                                        <input type="text" style="display: none" name="ip_5_5" value="<?php echo $_POST['ip_5_5']; ?>">
                                                        <input type="text" style="display: none" name="ip_6_6" value="<?php echo $_POST['ip_6_6']; ?>">
                                                        <input type="text" style="display: none" name="ip_7_7" value="<?php echo $_POST['ip_7_7']; ?>">
                                                        <input type="text" style="display: none" name="ip_8_8" value="<?php echo $_POST['ip_8_8']; ?>">
                                                        <input type="text" style="display: none" name="ip_9_9" value="<?php echo $_POST['ip_9_9']; ?>">


                                                    <button class="paymn" name="submit-t" onclick="chtab()">ثبت و پرداخت</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>




































































            </div>
            </div>
        </div>
        <?php
        get_template_part( 'assets/inc/template/mainsite/hamkaran' );
        get_template_part( 'assets/inc/template/mainsite/moshtarian' );
        ?>
    </div>
</div>
<meta id="request-method" name="request-method" content="<?php echo htmlentities($_SERVER['REQUEST_METHOD']); ?>">
<script>


    if(document.getElementById("request-method").content == 'POST') {
        var element1 = document.getElementById("pills-home-tab");
        var element2 = document.getElementById("pills-home");
        element1.classList.remove("active");
        element2.classList.remove("active");
        element2.classList.remove("show");

        var element3 = document.getElementById("pills-profile-tab");
        var element4 = document.getElementById("pills-profile");
        element3.classList.add("active");
        element4.classList.add("active");
        element4.classList.add("show");
    }


    function chtab2(){
        var element1 = document.getElementById("pills-home-tab");
        var element2 = document.getElementById("pills-home");
        element1.classList.add("active");
        element2.classList.add("active");
        element2.classList.add("show");

        var element3 = document.getElementById("pills-profile-tab");
        var element4 = document.getElementById("pills-profile");
        element3.classList.remove("active");
        element4.classList.remove("active");
        element4.classList.remove("show");
    }

    //add more textarea
    function checkmore(){
        let mmm = document.getElementById('moreadv');
        if(document.getElementById('more').checked === true){
            mmm.style.display = "block";
            mmm.setAttribute('placeholder', " در صورتی که مدرک و سند مفقود شده در لیست بالا نیست، عنوان آن را در این کادر بنویسید یا اگر متن خاصی برای آگهی تان دارید را میتوانید در اینجا بنویسید.");
        }
        if(document.getElementById('more').checked === false){
            mmm.setAttribute('placeholder', " در صورتی که مدرک و سند مفقود شده در لیست بالا نیست، عنوان آن را در این کادر بنویسید یا اگر متن خاصی برای آگهی تان دارید را میتوانید در اینجا بنویسید.");
            mmm.innerText = " ";
            mmm.style.display = "none";
        }
    }

    function checkmore2(){
        let mmm = document.getElementById('moreadv');
        let mmm2 = document.getElementById('nemone');
        if(document.getElementById('more').checked === true || document.getElementById('more2').checked === true || document.getElementById('more3').checked === true){
            mmm.style.display = "block";
            mmm2.style.display = "block";
            mmm.setAttribute('placeholder', " در صورتی که مدرک و سند مفقود شده در لیست بالا نیست، عنوان آن را در این کادر بنویسید یا اگر متن خاصی برای آگهی تان دارید را میتوانید در اینجا بنویسید.");
        }
        if(document.getElementById('more').checked === false || document.getElementById('more2').checked === false || document.getElementById('more3').checked === false){
            mmm.setAttribute('placeholder', " در صورتی که مدرک و سند مفقود شده در لیست بالا نیست، عنوان آن را در این کادر بنویسید یا اگر متن خاصی برای آگهی تان دارید را میتوانید در اینجا بنویسید.");
            mmm.innerText = " ";
            mmm.style.display = "none";
            mmm2.style.display = "none";
        }
    }


    var fac = 0;
    if(fac === 0){
        document.getElementById('ip_1').required = true;
        document.getElementById('ip_2').required = true;
        // document.getElementById('ip_5').required = true;
        document.getElementById('ip_6').required = true;
        document.getElementById('ip_7').required = true;
        document.getElementById('ip_8').required = true;
        document.getElementById('ip_9').required = true;
        document.getElementById('ip_11').required = true;
    }
    function porc(){
        let companys = document.getElementById('companys');
        let personals = document.getElementById('personals');

        if(document.getElementById('haghighi').checked === true){
            personals.style.display = "block";
            companys.style.display = "none";
            fac =  0;
        }
        if(document.getElementById('hoghoghi').checked === true){
            personals.style.display = "none";
            companys.style.display = "block";
            fac =  1;
        }

        if(fac === 0){
            document.getElementById('ip_1').required = true;
            document.getElementById('ip_2').required = true;
            // document.getElementById('ip_5').required = true;
            document.getElementById('ip_6').required = true;
            document.getElementById('ip_7').required = true;
            document.getElementById('ip_8').required = true;
            document.getElementById('ip_9').required = true;
            document.getElementById('ip_11').required = true;

            //    ------------

            document.getElementById('ic_1').required = false;
            document.getElementById('ic_2').required = false;
            document.getElementById('ic_3').required = false;
            document.getElementById('ic_5').required = false;
            document.getElementById('ic_6').required = false;
            document.getElementById('ic_7').required = false;
            document.getElementById('ic_9').required = false;

            document.getElementById('ic_1').value = "";
            document.getElementById('ic_2').value = "";
            document.getElementById('ic_3').value = "";
            document.getElementById('ic_4').value = "";
            document.getElementById('ic_5').value = "";
            document.getElementById('ic_6').value = "";
            document.getElementById('ic_7').value = "";
            document.getElementById('ic_8').value = "";
            document.getElementById('ic_9').value = "";

        }
        else if(fac === 1) {
            document.getElementById('ic_1').required = true;
            document.getElementById('ic_2').required = true;
            document.getElementById('ic_3').required = true;
            document.getElementById('ic_5').required = true;
            document.getElementById('ic_6').required = true;
            document.getElementById('ic_7').required = true;
            document.getElementById('ic_9').required = true;

            //------------------

            document.getElementById('ip_1').required = false;
            document.getElementById('ip_2').required = false;
            // document.getElementById('ip_5').required = false;
            document.getElementById('ip_6').required = false;
            document.getElementById('ip_7').required = false;
            document.getElementById('ip_8').required = false;
            document.getElementById('ip_9').required = false;
            document.getElementById('ip_11').required = false;

            document.getElementById('ip_1').value = "";
            document.getElementById('ip_2').value = "";
            document.getElementById('ip_3').value = "";
            document.getElementById('ip_4').value = "";
            document.getElementById('ip_5').value = "";
            document.getElementById('ip_6').value = "";
            document.getElementById('ip_7').value = "";
            document.getElementById('ip_8').value = "";
            document.getElementById('ip_9').value = "";
            document.getElementById('ip_10').value = "";
            document.getElementById('ip_11').value = "";
        }

    }







    //person or company

</script>

<?php get_footer(); ?>
