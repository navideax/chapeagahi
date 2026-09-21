<?php
/**
 * Template Name: تائید پرداخت
 *
 * @package WordPress
 * @subpackage chapeagahi
 * @since chapeagahi 1.0
 */





$connection = mysqli_connect('localhost','chapeaga_chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");


?>
<?php
/*
 * ZarinPal Advanced Class
 *
 * version 	: 1.0
 * link 	: https://vrl.ir/zpc
 *
 * author 	: milad maldar
 * e-mail 	: miladworkshop@gmail.com
 * website 	: https://miladworkshop.ir
*/
$send_q = QEYMAT_CHAP_AGHAHI;
require_once("zarinpal-ch/zarinpal_function.php");

$MerchantID 	= "242fb580-117e-4fdb-9f4a-de39e596d27e";
$Amount 		= $send_q;
$ZarinGate 		= false;
$SandBox 		= false;

$zp 	= new zarinpal();
$result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);

?>
<style>
    a.title h2{
        font-size: 20px;
        font-weight: 700;
        text-align: center;
        color: #c57126;
    }
    .movafaq{
        text-align: center;
        margin: 30px 0;
        font-size: 20px;
        font-weight: 700;
        background: green;
        padding: 10px;
        border-radius: 5px;
        color: #ffffff;
    }
    .namovafaq{
        text-align: center;
        margin: 30px 0;
        font-size: 20px;
        font-weight: 700;
        background: red;
        padding: 10px;
        border-radius: 5px;
        color: #ffffff;
    }
    .pardakht,.mablagh{
        text-align: center;
        margin: 20px 0;
    }
    .ad-cod{
        text-align: center;
        margin: 20px 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;

    }
    .ad-cod b{
        margin-top: 20px;
        font-size: 35px;
        padding: 10px;
        border: 2px dashed #a3a3a3;
        border-radius: 5px;
    }
    .ad-cod p{
        font-size: 13px;
        color: red;
        margin-top: 10px;
    }
</style>
<?php get_header(); ?>
<?php
if (isset($result["Status"]) && $result["Status"] == 100 || isset($result["Status"]) && $result["Status"] == 101)
{

    $pacod = $result["RefID"];
    $use = $_GET["use"];
    $Amount = $result["Amount"];

    if($connection){
        $queryadduser = "UPDATE `ad_personals`
SET vaziat = 'ثبت اولیه توسط کاربر', pardakht = '$pacod',qeymat = '$Amount'
WHERE u_id = '$use';";
        $addQuery = mysqli_query($connection , $queryadduser);

        $queryGetSbattime = "SELECT sbattime 
FROM `ad_personals`
WHERE u_id = '$use';";
        $result44 = mysqli_query($connection, $queryGetSbattime);


        if ($result44) {
            $row = mysqli_fetch_assoc($result44);
            $sbattime = $row['sbattime'];
        } else {
            echo "Error: " . mysqli_error($connection);
        }

    }



    ?>

    <div class="main-site">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="single-main main">
                        <div class="main-box">
                            <div class="pin-post">
                                <div class="clearfix"></div>
                                <div class="col-12  mt-4">
                                    <a class="title" href="<?php the_permalink() ?>">
                                        <h2><?php the_title() ?></h2>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="post-contant page">

                                            <div class="movafaq">
                                                تراکنش با موفقیت انجام شد
                                            </div>
                                            <div class="mablagh">
                                                مبلغ پرداختی :
                                                <b><?php echo $result["Amount"] ?></b>
                                            </div>
                                            <div class="pardakht">
                                                کد پیگیری پرداخت :
                                                <b><?php echo $result["RefID"] ?></b>
                                            </div>
                                            <div class="pardakht">
                                                زمان پرداخت :
                                                <b><?php

                                                    date('l، d F Y  :: h:s',strtotime($sbattime));

                                                    $g_y = date('Y',strtotime($sbattime));
                                                    $g_d = date('d',strtotime($sbattime));
                                                    $g_m = date('m',strtotime($sbattime));

                                                    //echo gregorian_to_jalali($g_y,$g_m,$g_d,"/");




                                                    $date = new DateTime($row['sbattime']);
                                                    $result = $date->format('Y-m-d H:i:s');

                                                    $date = $result;
                                                    $array = explode(' ', $date);
                                                    //print_r($array);
                                                    list($year, $month, $day) = explode('-', $array[0]);
                                                    list($hour, $minute, $second) = explode(':', $array[1]);
                                                    $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                                                    //echo $timestamp;
                                                    echo $jalali_date = jdate("H:i:s - Y/m/d", $timestamp);

                                                    ?></b>
                                            </div>
                                            <div class="ad-cod">
                                                کد رهگیری آگهی :
                                                <b><?php echo $_GET["use"]; ?></b>
                                                <p>تا زمان چاپ آگهی میتوانید با استفاده از کد بالا در سایت آگهی خود را پیگیری کنید</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Success
    /*    echo "تراکنش با موفقیت انجام شد";
        echo "<br />مبلغ : ". $result["Amount"];
        echo "<br />کد پیگیری : ". $result["RefID"];
        echo "<br />Authority : ". $result["Authority"];
        echo "<br />کد رهگیری آگهی : ". $_GET["use"];*/
} else {

    ?>

    <div class="main-site">
        <div class="container">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="single-main main">
                        <div class="main-box">
                            <div class="pin-post">
                                <div class="clearfix"></div>
                                <div class="col-12  mt-4">
                                    <a class="title" href="<?php the_permalink() ?>">
                                        <h2>خطا در پرداخت</h2>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-12 ">
                                        <div class="post-contant page">

                                            <div class="namovafaq">
                                                پرداخت ناموفق
                                            </div>
                                            <div class="mablagh">
                                                کد خطا :
                                                <b><?php echo $result["Status"]; ?></b>
                                            </div>
                                            <div class="pardakht">
                                                تفسیر و علت خطا :
                                                <b><?php echo $result["Message"]; ?></b>
                                            </div>
                                            <div class="ad-cod">
                                                تماس با پشتیبانی :
                                                <b>09914220080</b>
                                                <p>چنانچه در پرداخت و ثبت آگهی خود با مشکل مواجه شده اید، با ما تماس بگیرید</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // error
    /*    echo "پرداخت ناموفق";
        echo "<br />کد خطا : ". $result["Status"];
        echo "<br />تفسیر و علت خطا : ". $result["Message"];*/
}
?>
<?php get_footer(); ?>
