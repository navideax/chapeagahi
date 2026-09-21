<?php
/**
 * Template Name: پیگیری آگهی
 *
 * @package WordPress
 * @subpackage chapeagahi
 * @since chapeagahi 1.0
 */

$connection = mysqli_connect('localhost','chapeaga_chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
//$connection = mysqli_connect('localhost','root','','chap');
mysqli_set_charset($connection,"utf8");


if(isset($_POST['submit'])){

    $use = $_POST['u_id'];
    if ($connection){

        $names = explode(' ', $use);

        // بررسی اینکه آیا ورودی دو بخش دارد یا خیر
        if (count($names) >= 2) {
            // اگر ورودی شامل بیش از یک کلمه باشد
            $firstNameOptions = [];
            $lastNameOptions = [];

            // نام و نام خانوادگی را در ترکیب‌های مختلف جدا می‌کنیم
            for ($i = 1; $i < count($names); $i++) {
                $firstName = implode(' ', array_slice($names, 0, $i));
                $lastName = implode(' ', array_slice($names, $i));

                $firstNameOptions[] = $firstName;
                $lastNameOptions[] = $lastName;
            }

            // ایجاد شرط‌های مختلف برای ترکیب‌های نام و نام خانوادگی
            $nameConditions = [];
            for ($j = 0; $j < count($firstNameOptions); $j++) {
                $nameConditions[] = "(name = '{$firstNameOptions[$j]}' AND fname = '{$lastNameOptions[$j]}')";
            }

            $queryCheckCopun = "SELECT * FROM `ad_personals` WHERE u_id = '$use' OR phone = '$use' OR tname = '$use' OR (" . implode(' OR ', $nameConditions) . ")";

        } else {
            // اگر فقط یک کلمه وارد شده باشد، آن را در هر دو ستون جستجو می‌کنیم
            $queryCheckCopun = "SELECT * FROM `ad_personals` WHERE u_id = '$use' OR phone = '$use' OR name = '$use' OR fname = '$use' OR tname = '$use'";
        }


        $emailQuery = mysqli_query($connection , $queryCheckCopun);

        $queryadduser2 = "SELECT * FROM `ad_meta` WHERE ad_id = '$use'";
        $addQuery2 = mysqli_query($connection , $queryadduser2);

        // بررسی نتیجه اجرای کوئری
        if ($addQuery2) {
            $row2 = $addQuery2->fetch_assoc();
        } else {
            // نمایش خطا در صورت بروز مشکل در کوئری
            echo "خطا در اجرای کوئری ad_meta: " . mysqli_error($connection);
        }
    }
}


?>

<?php get_header();

?>
<style>
    a.title h2{
        font-size: 20px;
        font-weight: 700;
        text-align: center;
        color: #c57126;
    }

</style>
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

                                        <form class="row g-3 justify-content-center" method="post" action="">
                                            <div class="col-8">
                                                <label for="inputPassword2" class="visually-hidden">کد رهگیری</label>
                                                <input type="text" class="form-control" name="u_id" id="inputPassword2"  placeholder="کد رهگیری خود را وارد کنید" <? if(isset($_POST['u_id'])){echo 'value="' . $_POST['u_id'] . '"';} ?>>
                                            </div>
                                            <div class="col-2">
                                                <button type="submit" name="submit" class="btn btn-primary mb-3">جستجو کن!</button>
                                            </div>
                                        </form>


                                        <?php
                                        if(isset($_POST['submit'])){
                                            ?>



                                                <div style="overflow: auto;">
                                                    <table style="width: 100vh;" class="table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">ثبت کننده</th>
                                                            <th scope="col">صاحب سند</th>
                                                            <th scope="col">کد رهگیری</th>
                                                            <th scope="col">مفقودی ها</th>
                                                            <th scope="col">وضعیت</th>
                                                            <?php if(current_user_can('manage_options')){ echo '<th scope="col">مدیریت</th>'; } ?>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $i = 1;
                                                        if ($emailQuery->num_rows > 0){
                                                            while ($row = $emailQuery->fetch_assoc()){




                                                                ?>
                                                                <tr>

                                                                    <td scope="row"><?php echo $i; ?></td>
                                                                    <td><?php echo $row['name'] . " " . $row['fname']; ?></td>
                                                                    <td><?php echo strstr($row2['saheb_v'] , "09") ? " " : $row2['saheb_v'] ; ?></td>
                                                                    <td><?php echo $row['u_id']; ?></td>
                                                                    <td><?php echo $row['mafqodis']; ?></td>

                                                                    <td data-bs-toggle="modal" data-bs-target="#wexampleModal<?php echo $i; ?>" ><?php echo $row['tarikhchap']; ?></td>

                                                                    <?php if(current_user_can('manage_options')){ echo '<td scope="col"><a href="'. get_site_url() .'/ad-admin/?edit='.$row['u_id'].'">ویرایش</a></td>'; } ?>

                                                                </tr>

                                                                <?php

                                                                ?>

                                                                <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog  modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title " id="exampleModalLabel">متن آگهی (<? echo $row['name'] . " " . $row['fname']; ?>)</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php echo $row['mafqodis'] . " "; ?>
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
                                                                                و شماره شاسی
                                                                                <?php echo $row2['shasi_v']; ?>
                                                                                به مالكيت
                                                                                <?php echo $row2['saheb_v']; ?>
                                                                                با کد ملی
                                                                                <?php echo $row2['saheb_cmail_v']; ?>
                                                                                مفقود گرديده و از درجه اعتبار ساقط می باشد.

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <?php


                                                                $i++;
                                                            }
                                                            ?>
                                                            <?php if($row['tarikhchap']){ ?>
                                                                <span style="background: green;color: #ffffff;padding: 5px 10px;border-radius: 10px;"><?php echo $row['tarikhchap']; ?></span>

                                                                <?
                                                            }

                                                        }
                                                        ?>

                                                        </tbody>
                                                    </table>
                                                </div>


<?php
                                        }
                                        ?>

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





<?php get_footer(); ?>
