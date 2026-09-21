<?php
class Negit_view_posts extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_view_posts','نمایش مطالب پر بازدید',array('description'=>'مطالب پربازدید کاملا واقعی') );
    }

    function widget( $args, $instance ) {
        // Widget output

        echo $args['before_widget'];

        if(!empty($instance['title'])) {


            echo $args['before_title'] . $instance['title'] . $args['after_title'];


        }else{
            echo "";
        }
        ?>

        <?php $q = new WP_Query(array('posts_per_page'=>$instance['count'],'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'));?>

            <?php

                if($instance['count']==''){

             $instance['count']="15";

            }

                if($instance['style']=='small_pic'){
            ?>
                    <?php while ($q->have_posts()) : $q->the_post(); ?>

                        <div class="sidebarpadd">
                        <div class="sid-left-post-img">

                                <a href="<?php the_permalink() ?>">
                                <?php
                                if(!empty(get_the_post_thumbnail())){
                                    the_post_thumbnail(array(70,70));

                                }else{
                                    ?>
                                    <img src="<?php echo get_template_directory_uri() ?>../img/no-image.jpg" alt="" style="width: 70px;height: 70px">
                                    <?php
                                }

                                ?>
                            </a>
                        </div>
                        <div class="sid-right-post-titr">
                            <a href="<?php the_permalink() ?>">
                                <h2>
                                    <?php the_title() ?>
                                </h2>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>


                <?php } elseif ($instance['style']=='big_pic'){ ?>
                    <div class="big-post-img">
                        <ul>
                            <?php while ($q->have_posts()) : $q->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        if (!empty(get_the_post_thumbnail())) {
                                            the_post_thumbnail(array(308, 308));

                                        } else {
                                            ?>
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image.jpg"
                                                 alt="<?php the_title() ?>" style="width: 308px;height: 308px">
                                            <?php
                                        }
                                        ?>
                                        <h3><?php the_title() ?></h3>
                                        <span class="clearfix"></span>
                                        <span><?php the_time('l، d F Y ') ?></span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php } ?>
        <?php
        echo $args['after_widget'];
    }


    function form( $instance ) {
        // Output admin widget options form
//        var_dump($instance);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">نام ستون:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>">تعداد نمایش:</label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" step="1" min="1" value="<?php if(empty($instance['count'])){echo "15";}else{ echo $instance['count'];} ?>" size="3">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('style'); ?>">استایل:</label>
            <select id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" value="<?php $instance['style'] ?>">
                <option value="small_pic" <?php if(($instance['style']=='small_pic')) echo 'selected';?>>تصویر کوچک</option>
                <option value="big_pic" <?php if($instance['style']=='big_pic') echo 'selected';?>>تصویر بزرگ</option>

            </select>
        </p>

        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';
        $instance['count'] = (!empty($new_instance['count']))? $new_instance['count'] : '15';
        $instance['style'] = (!empty($new_instance['style']))? $new_instance['style'] : '';


        return $instance;
    }
}

function myplugin_register_widgets_view_posts() {
    register_widget( 'Negit_view_posts' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_view_posts' );