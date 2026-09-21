<?php
/**
 * Template Name: مدارک سفارسی
 *
 * @package WordPress
 * @subpackage chapeagahi
 * @since chapeagahi 1.0
 */
?>


<?php
$send_q = QEYMAT_CHAP_AGHAHI;

$connection = mysqli_connect('localhost','chapeaga_chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");


if(isset($_POST['submit-t'])){

//    vars
    $f_noe = @$_POST['motaghazi'];
    $f_query = @$_GET['q'];
    $f_name = @$_POST['ip_1'];
    $f_fname = @$_POST ['ip_2'];
    $f_melli = @$_POST ['ip_3'];
    $f_shsh = @$_POST ['ip_4'];
    $f_pedar = @$_POST ['ip_5'];
    $f_phone = @$_POST ['ip_6'];
    $f_ostan = @$_POST ['ip_7'];
    $f_shahr = @$_POST ['ip_8'];
    $f_address = @$_POST ['ip_9'];
    $f_zipcode = @$_POST ['ip_10'];
    $f_girandeh = @$_POST ['ip_11'];
    $f_pm_mores = @$_POST['moretext'];
    $f_mafghoodi = @$_POST ['iteeems'];
    $f_uid = @$_POST ['uniqid'];
    $f_date = date('m/d/Y h:i:s A', time());





//    connection
    if($connection){


        $check_ad = "SELECT * FROM ad_personals WHERE u_id = '$f_uid'";
        $result = @mysqli_query($connection,$check_ad);
        $row = @mysqli_fetch_array($result);
        if($row['u_id'] == $f_uid){

            $sql_del_ad = "DELETE FROM ad_personals WHERE u_id = '$f_uid'";
            $sql_del_ad_meta = "DELETE FROM ad_meta WHERE ad_id = '$f_uid'";

            if($connection->query($sql_del_ad) === TRUE && $connection->query($sql_del_ad_meta) === TRUE){
                $queryadduser = "INSERT INTO `ad_personals` (`noe`, `u_id`, `query`, `name`, `fname`, `cmelli`, `shsh`, `dname`, `phone`, `ostan`, `city`, `address`, `zipcode`, `tname`, `sbattime`, `mafqodis`, `pm_mores`)
         VALUES ('$f_noe', '$f_uid', '$f_query','$f_name', '$f_fname', '$f_melli', '$f_shsh', '$f_pedar', '$f_phone', '$f_ostan', '$f_shahr', '$f_address', '$f_zipcode', '$f_girandeh', '$f_date', '$f_mafghoodi', '$f_pm_mores')";
                $addQuery = mysqli_query($connection , $queryadduser);

            }



        }
        else{
            $queryadduser = "INSERT INTO `ad_personals` (`noe`, `u_id`, `query`, `name`, `fname`, `cmelli`, `shsh`, `dname`, `phone`, `ostan`, `city`, `address`, `zipcode`, `tname`, `sbattime`, `mafqodis`, `pm_mores`)
         VALUES ('$f_noe', '$f_uid', '$f_query','$f_name', '$f_fname', '$f_melli', '$f_shsh', '$f_pedar', '$f_phone', '$f_ostan', '$f_shahr', '$f_address', '$f_zipcode', '$f_girandeh', '$f_date', '$f_mafghoodi', '$f_pm_mores')";
            $addQuery = mysqli_query($connection , $queryadduser);


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

<style>



</style>
<div class="form-mafghoodi" onload="mooosa()">
    <div class="container">
        <div class="row">
            <?php
            get_template_part( 'assets/inc/template/mainsite/amarargham' );
            ?>
            <div class="col-12">
                <div class="form-m-header">
                    <h1>
                         <?php the_title(); ?>
                    </h1>
                    <h2> <?php echo get_post_meta($post->ID, $key = '_subtitle', true); ?></h2>

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
                                        <label class="form-item-title" style="font-size: 15px;font-weight: 900;">

                                            اطلاعات سفارش دهنده آگهی :

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
                                                    <input type="text" name="ip_1" id="ip_1" value="<?php if(!empty($_POST['ip_1'])){echo $_POST['ip_1'];} ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_2">
                                                        نام خانوادگی <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_2" id="ip_2"  value="<?php if(!empty($_POST['ip_2'])){echo $_POST['ip_2'];} ?>">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <div class="form-m-item-box">
                                                    <label class="form-item-title" for="ip_6"> شماره همراه <b class="foooor-force">*</b> </label>
                                                    <input type="text" name="ip_6" id="ip_6" placeholder="به لاتین وارد کنید"  value="<?php if(!empty($_POST['ip_6'])){echo $_POST['ip_6'];} ?>">
                                                </div>
                                            </div>

                                        </div>
                                    </li>

                                    <li class="mt-4">

                                        <div class="form-m-body mb-3" style="  background: #f8f8f8;  border: 1px solid #00000030;
    box-shadow: 0 0 10px 0 #00000030;">
                                            <h3 style="
    font-size: 15px;
    font-weight: 900;
">نمونه متن آگهی : </h3>
                                            <div>
                                                <span id="nemoneaaaaa" style="
    text-align: justify;
    font-size: 14px;
    font-weight: 400;
    color: gray;
    line-height: 2;
">
                                                    <?php echo get_the_content(); ?>

                                                </span>
                                                <span>
                                                     <button id="copyButton" style="

    display: inline-flex;
    align-items: center;
    background-color: transparent;
    border: none;
    cursor: pointer;
    font-size: 16px;
    color: gray;
    margin-top: 10px;
    gap: 5px;
    font-size: 13px;
    padding: 3px 10px;
    border: 1px solid #444444;
    border-radius: 5px;

">
                                                    <i class="fas fa-copy" style="margin-right: 5px;"></i> کپی کن
                                                </button>
                                                </span>

                                                <!-- دکمه کپی -->

                                            </div>


                                            <!-- اسکریپت جاوااسکریپت -->
                                            <script>
                                                document.getElementById('copyButton').addEventListener('click', function () {
                                                    // انتخاب متن از پاراگراف
                                                    const textToCopy = document.getElementById('nemoneaaaaa').innerText;

                                                    // استفاده از Clipboard API برای کپی
                                                    navigator.clipboard.writeText(textToCopy).then(function () {
                                                        alert('متن کپی شد!');
                                                    }).catch(function (err) {
                                                        console.error('خطا در کپی متن:', err);
                                                    });
                                                });
                                            </script>
                                        </div>


                                        <label class="form-item-title" style="font-size: 15px;font-weight: 900;"> متن آگهی خود را بنویسید : <b class="foooor-force">*</b>
                                            <span style="font-size: 10px;background: #eeeeee;padding: 5px;border-radius: 50px;font-weight: 300;">
                                            جهت درج در آگهی
                                        </span>
                                        </label>


                                        <div class="row">
                                            <div class="col">
                                                <div class="form-m-item-box">
                                                    <textarea name="massmoz" id="moreadv" cols="30" rows="10" style="display: block" placeholder="متن خود را طبق نمونه وارد کنید" required><?php echo get_post_meta($post->ID, '_EXad_textarea', true) ?></textarea>
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
                                        $random;
                                        ?>
                                        <input type="text" style="display: none" name="uniqid" value="<?php echo $random ?>">
                                        <button type="submit" name="submit-s" onclick="chtab()">ثبت اطلاعات و تائید نهایی</button>
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

                                        if(!empty($iteeems) || !empty($_POST['massmoz']) || !empty($_POST['moretext'])){
                                            if(!empty($iteeems)){
                                                $N = count($iteeems);

                                                for($i=0; $i < $N; $i++)
                                                {
                                                    echo "<li> " . ($iteeems[$i]) . "</li> " ;
                                                }
                                            }



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
                                        <!--                                    <li>کد ملی : <b>--><?php //echo $_POST['ip_3']; ?><!--</b></li>-->
                                        <?php if(!empty($_POST['ip_4'])){
                                            echo "<li>شماره شناسنامه : <b>". $_POST['ip_4'] ."</b></li>";
                                        }
                                        ?>
                                        <!--                                    <li>نام پدر : <b>--><?php //echo $_POST['ip_5']; ?><!--</b></li>-->
                                        <li>آدرس : <b><?php echo $_POST['ip_7']." - ".$_POST['ip_8']." - ".$_POST['ip_9']; ?></b></li>
                                        <li>کد پستی : <b><?php echo $_POST['ip_10']; ?></b></li>
                                        <li>شماره تماس : <b><?php echo $_POST['ip_6']; ?></b></li>
                                        <li>تحویل گیرنده : <b><?php echo $_POST['ip_11']; ?></b></li>
                                    </ul>
                                    <!--                                    <p>
                                        ، <b><?php /*echo $_POST['ip_1'].$_POST['ip_2']; */?></b>
                                        با کد ملی
                                        <b><?php /*echo $_POST['ip_3']; */?></b>
                                        شماره شناسنامه
                                        <b><?php /*echo $_POST['ip_4']; */?></b>
                                        فرزند
                                        <b> <?php /*echo $_POST['ip_5']; */?></b>
                                        مفقود گردیده و از درجه اعتبار ساقط می باشد.
                                    </p>-->
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
                                <!--                                <div class="adressh">
                                    <p>
                                        آدرس :
                                        <?php /*echo $_POST['ip_7']." - ".$_POST['ip_8']." - ".$_POST['ip_9']; */?>
                                        - کدپستی
                                        <?php /*echo $_POST['ip_10']; */?>
                                        - گیرنده :
                                        <?php /*echo $_POST['ip_11']; */?>
                                        - شماره تماس :
                                        <?php /*echo $_POST['ip_6']; */?>
                                    </p>
                                </div>-->
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
                                                    <input type="text" style="display: none" name="iteeems" value="<?php if($iteeems){ echo implode("-", $iteeems);} ?>">
                                                    <input type="text" style="display: none" name="moretext" value="<?php echo $_POST['moretext'] . $_POST['massmoz']; ?>">


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
<div style="display: none">
    <div class="col">
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardmelli" id="cardmelli" >
            <label class="form-item-title" for="cardmelli">کارت ملی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardmellih" id="cardmellih" >
            <label class="form-item-title" for="cardmellih">کارت ملی هوشمند</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="rcardmelli" id="rcardmelli" >
            <label class="form-item-title" for="rcardmelli">رسید کارت ملی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="shenasnameh" id="shenasnameh" >
            <label class="form-item-title" for="shenasnameh">شناسنامه</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardnezami" id="cardnezami" >
            <label class="form-item-title" for="cardnezami">کارت شناسایی نظامی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardhranande" id="cardhranande" >
            <label class="form-item-title" for="cardhranande">كارت‌ هوشمند‌ راننده</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardhsokht" id="cardhsokht" >
            <label class="form-item-title" for="cardhsokht">كارت هوشمند سوخت</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="gpayeyek" id="gpayeyek" >
            <label class="form-item-title" for="gpayeyek">گواهينامه‌ پايه‌ یک</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="gpayedo" id="gpayedo" >
            <label class="form-item-title" for="gpayedo">گواهینامه پایه دو</label>
        </div>
    </div>
    <div class="col">
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="gpayese" id="gpayese" >
            <label class="form-item-title" for="gpayese">گواهینامه پایه سه</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="gmotor" id="gmotor" >
            <label class="form-item-title" for="gmotor">گواهینامه موتور</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="mojavezselah" id="mojavezselah" >
            <label class="form-item-title" for="mojavezselah">مجوز سلاح</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="dastecheck" id="dastecheck" >
            <label class="form-item-title" for="dastecheck">دسته چک</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="check" id="check" >
            <label class="form-item-title" for="check">چک</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="mbanki" id="mbanki" >
            <label class="form-item-title" for="mbanki">مدارك بانكی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardhekmat" id="cardhekmat" >
            <label class="form-item-title" for="cardhekmat">حکمت کارت</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardaber" id="cardaber" >
            <label class="form-item-title" for="cardaber">کارت عابر بانک</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardnp" id="cardnp" >
            <label class="form-item-title" for="cardnp">کارت نظام پرستاری</label>
        </div>
    </div>
    <div class="col">
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="carduni" id="carduni" >
            <label class="form-item-title" for="carduni">کارت دانشجویی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="madraktahsili" id="madraktahsili" >
            <label class="form-item-title" for="madraktahsili">مدرک تحصیلی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="passportg" id="passportg" >
            <label class="form-item-title" for="passportg">گذرنامه</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="aqd" id="aqd" >
            <label class="form-item-title" for="aqd">عقد نامه</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="vasiat" id="vasiat" >
            <label class="form-item-title" for="vasiat">وصیت نامه</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="dbimeh" id="dbimeh" >
            <label class="form-item-title" for="dbimeh">دفترچه بیمه</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardshenasaei" id="cardshenasaei" >
            <label class="form-item-title" for="cardshenasaei">کارت شناسایی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="payankh" id="payankh" >
            <label class="form-item-title" for="payankh">کارت پایان خدمت</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardbazargani" id="cardbazargani" >
            <label class="form-item-title" for="cardbazargani">کارت بازرگانی</label>
        </div>
    </div>
    <div class="col">
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardmoafiat" id="cardmoafiat" >
            <label class="form-item-title" for="cardmoafiat">کارت معافیت سربازی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="parvaneh" id="parvaneh" >
            <label class="form-item-title" for="parvaneh">پروانه/جواز کسب</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="sanadmalekiat" id="sanadmalekiat" >
            <label class="form-item-title" for="sanadmalekiat">سند مالکیت</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="sanadcompany" id="sanadcompany" >
            <label class="form-item-title" for="sanadcompany">سند کمپانی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="bargsabzkh" id="bargsabzkh" >
            <label class="form-item-title" for="bargsabzkh">برگ سبز خودرو</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="sanadforosh" id="sanadforosh" >
            <label class="form-item-title" for="sanadforosh">سند کمپانی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardkhodro" id="cardkhodro" >
            <label class="form-item-title" for="cardkhodro">کارت خودرو</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardhkhodro" id="cardhkhodro" >
            <label class="form-item-title" for="cardhkhodro">کارت هوشمند خودرو</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="cardbkhodro" id="cardbkhodro" >
            <label class="form-item-title" for="cardbkhodro">کارت بیمه خودرو</label>
        </div>
    </div>
    <div class="col">
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="moayenefani" id="moayenefani" >
            <label class="form-item-title" for="moayenefani">معاینه فنی خودرو</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="pelakkhodro" id="pelakkhodro" >
            <label class="form-item-title" for="pelakkhodro">پلاک خودرو</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="daftarchetaxi" id="daftarchetaxi" >
            <label class="form-item-title" for="daftarchetaxi">دفترچه تاکسیرانی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="serqatkhodro" id="serqatkhodro" >
            <label class="form-item-title" for="serqatkhodro">سرقت خودرو</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="karnametaxi" id="karnametaxi" >
            <label class="form-item-title" for="karnametaxi">کارنامه تاکسیرانی</label>
        </div>
        <div class="form-m-item-box-ch">
            <input type="checkbox" name="more" id="more" >
            <label class="form-item-title" for="more">سایر مدارک</label>
        </div>
    </div>
</div>