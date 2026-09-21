<div class="maybe  pt-5" style="background: transparent;    margin-top: -50px; padding-bottom: 50px;">
    <div class="container">
    <div class="row">



<style>
    .qess li a{
        display: block;padding: 10px 15px;margin-bottom: 10px;background: #ffffff;border-radius: 10px;font-weight: 700;font-size: 14px;color: #444444;
    }
    .qess li a:hover{
        color: #c57126;
    }
</style>
        <div class="col-md-6 col-12">
            <div class="col-12">
                <h2 class="ser-title"> سوالات اکثر کاربران </h2>
            </div>
            <div class="soalat">
                <ul style="padding: 0;margin: 0;list-style: none;" class="qess">
                    <li><a href="/853" target="_blank">
                            1 - اولین کار بعد از مفقودی مدارک
                        </a></li>
                    <li><a href="/866" target="_blank">
                            2 - لیست روزنامه های کثیرالانتشار کشور
                        </a></li>
                    <li><a href="/893" target="_blank">
                            3 - سوء استفاده های احتمالی از مدارک گمشده
                        </a></li>
                    <li><a href="/501" target="_blank">
                            4 - آسان ترین روش چاپ آگهی مفقودی
                        </a></li>
                    <li><a href="/195" target="_blank">
                            5 - قیمت چاپ آگهی مفقودی در روزنامه
                        </a></li>
                </ul>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="col-12">
                <h2 class="ser-title"> شاید برایتان مفید باشد</h2>
            </div>
            <div class="soalat">
                <ul style="padding: 0;margin: 0;list-style: none;" class="qess">


                    <?php
                    $q = new WP_Query(array('posts_per_page' => 5, 'cat' => '9'));
                    $i = 1;
                    while ($q->have_posts()):
                        $q->the_post();

                        ?>
                        <li><a href="<?php the_permalink() ?>" target="_blank">
                                <?php echo $i++ . " - ";the_title() ?>
                            </a></li>
                    <?php
                    endwhile;
                    ?>
                </ul>
            </div>
        </div>


<!--        <div class="col-md-6 col-12">-->
<!--            <img src="https://chapeagahi.ir/wp-content/uploads/2023/10/Untitled.jpg" alt=""-->
<!--            style="    height: 245px;-->
<!--    border-radius: 10px;">-->
<!--        </div>-->
    </div>
</div>
</div>