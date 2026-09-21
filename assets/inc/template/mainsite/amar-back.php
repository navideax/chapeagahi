<div class="col-12 mt-5">
    <div class="row" style="  justify-content: center;  align-items: center;">
        <div class="col-12 ">

            <?php
            $connection = mysqli_connect('localhost','chapeaga','19ax2Jo8dA','chapeaga_maindbforch');
            //$connection = mysqli_connect('localhost','root','','chap');
            mysqli_set_charset($connection,"utf8");


            $datee = strval(date('m/d/Y'));
            $queryadduser = "SELECT  COUNT(*) as id  FROM `ad_personals`";
            $emrooz = "SELECT  COUNT(*) as id  FROM `ad_personals` WHERE sbattime LIKE '%$datee%' ";
            $ersali = "SELECT  COUNT(*) as id  FROM `ad_personals` WHERE vaziat LIKE '%تائید %' ";


            $addQuery = mysqli_query($connection , $emrooz);
            $addQuery2 = mysqli_query($connection , $queryadduser);
            $addQuery3 = mysqli_query($connection , $ersali);

            $row = $addQuery->fetch_row();
            $row2 = $addQuery2->fetch_row();
            $row3 = $addQuery3->fetch_row();

            ?>
            <div class="row">
                <div class="col-12 col-md-3 mb-2">
                    <div class="counterAd " style="border: 2px solid #f79b20;border-radius: 10px;background: #ffffff;padding: 10px;position: relative">
                        <p id="my-element" style="margin: 0;font-size: 40px;font-weight: 600;" data-final-number="<?php echo get_option('my_daily_number'); ?>">0</p>
                        <span style="font-size: 15px;line-height: 2;" >آگهی های در حال ثبت</span>
                        <i class="fa-duotone fa-hourglass-start" style="font-size: 60px;position: absolute;left: 20px;top: 26px;bottom: 0;color: #f79b20b3;"></i>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="counterAd " style="border: 2px solid #f79b20;border-radius: 10px;background: #ffffff;padding: 10px;position: relative">
                        <p id="my-element2" style="margin: 0;font-size: 40px;font-weight: 600;" data-final-number="<?php echo get_option('sabtshode_today_number')+$row[0]; ?>">0</p>
                        <span style="font-size: 15px;line-height: 2;" >آگهی های ثبت شده امروز</span>
                        <i class="fa-duotone fa-ballot-check" style="font-size: 60px;position: absolute;left: 20px;top: 26px;bottom: 0;color: #f79b20b3;"></i>
                    </div>
                </div>

                <div class="col-12 col-md-3 mb-2">
                    <div class="counterAd " style="border: 2px solid #f79b20;border-radius: 10px;background: #ffffff;padding: 10px;position: relative">
                        <p id="my-element3" style="margin: 0;font-size: 40px;font-weight: 600;" data-final-number="<?php echo get_option('sabtshode_all_number')+$row2[0]; ?>">0</p>
                        <span style="font-size: 15px;line-height: 2;" >آگهی های ثبت شده تا کنون</span>
                        <i class="fa-duotone fa-list-ol" style="font-size: 60px;position: absolute;left: 20px;top: 26px;bottom: 0;color: #f79b20b3;"></i>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-2">
                    <div class="counterAd " style="border: 2px solid #f79b20;border-radius: 10px;background: #ffffff;padding: 10px;position: relative">
                        <p id="my-element4" style="margin: 0;font-size: 40px;font-weight: 600;" data-final-number="<?php echo get_option('sabtshode_send_number')+$row3[0]; ?>">0</p>
                        <span style="font-size: 15px;line-height: 2;" >آگهی های ارسال شده</span>
                        <i class="fa-duotone fa-mailbox" style="font-size: 60px;position: absolute;left: 20px;top: 26px;bottom: 0;color: #f79b20b3;"></i>
                    </div>
                </div>

            </div>
        </div>
        <!--                            <div class="col-6 col-md-2">-->
        <!--                                <img src="https://chapeagahi.ir/wp-content/uploads/2024/09/chapgif.gif" alt="چاپ آگهی">-->
        <!--                            </div>-->
        <div class="col-12 col-md-5">

            <div class="row">

            </div>

            <!--                        <script>-->
            <!--                            jQuery(document).ready(function($) {-->
            <!--                                // فرض کنید متغیر وردپرسی شما در یک data attribute ذخیره شده است-->
            <!--                                var finalNumber = $('#my-element').data('final-number');-->
            <!---->
            <!--                                $('#my-counter').animateNumber({-->
            <!--                                    number: finalNumber,-->
            <!--                                    easing: 'easeInQuad',-->
            <!--                                    duration: 5000 // مدت زمان انیمیشن به میلی‌ثانیه-->
            <!--                                });-->
            <!--                            });-->
            <!--                        </script>-->


            <!--                        <div id="my-element" data-final-number="1000"></div>-->
            <!--                        <div id="my-counter">0</div>-->

            <script>
                $(document).ready(function() {
                    var finalNumber = $('#my-element').data('final-number');

                    $('#my-element').animateNumber({
                        number: finalNumber,
                        duration: 0,
                        easing: 'easeOutBounce',
                        step: function(now, tween) {
                            $(tween.elem).text(Math.floor(now));
                        }
                    }, 5000);
                });
            </script>
            <script>
                $(document).ready(function() {
                    var finalNumber = $('#my-element2').data('final-number');

                    $('#my-element2').animateNumber({
                        number: finalNumber,
                        duration: 0,
                        easing: 'easeOutBounce',
                        step: function(now, tween) {
                            $(tween.elem).text(Math.floor(now));
                        }
                    }, 5000);
                });
            </script>
            <script>
                $(document).ready(function() {
                    var finalNumber = $('#my-element3').data('final-number');

                    $('#my-element3').animateNumber({
                        number: finalNumber,
                        duration: 0,
                        easing: 'easeOutBounce',
                        step: function(now, tween) {
                            $(tween.elem).text(Math.floor(now));
                        }
                    }, 5000);
                });
            </script>
            <script>
                $(document).ready(function() {
                    var finalNumber = $('#my-element4').data('final-number');

                    $('#my-element4').animateNumber({
                        number: finalNumber,
                        duration: 0,
                        easing: 'easeOutBounce',
                        step: function(now, tween) {
                            $(tween.elem).text(Math.floor(now));
                        }
                    }, 5000);
                });
            </script>
        </div>


    </div>
</div>