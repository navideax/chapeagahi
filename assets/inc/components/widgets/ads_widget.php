<?php
class Negit_adv extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_adv','ابزارک تبلیغات',array('description'=>'ابزارک مخصوص ستون ها') );
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

        <a href="<?php echo $instance['img_url'] ?>" target="<?php echo $instance['url_target'] ?>"><img src="<?php echo $instance['src_img'] ?>" alt=""></a>

        <?php

//        var_dump($args);
//        var_dump($instance);

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
            <label for="<?php echo $this->get_field_id('src_img'); ?>">آدرس تصویر:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('src_img'); ?>" name="<?php echo $this->get_field_name('src_img'); ?>" type="text" value="<?php echo $instance['src_img'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('img_url'); ?>">آدرس لینک:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('img_url'); ?>" name="<?php echo $this->get_field_name('img_url'); ?>" type="text" value="<?php echo $instance['img_url'] ?>">
        </p>



        <p>
            <label for="<?php echo $this->get_field_id('url_target'); ?>">نحوه بازکردن لینک:</label>
            <select id="<?php echo $this->get_field_id('url_target'); ?>" name="<?php echo $this->get_field_name('url_target'); ?>">
                <option value="" <?php if(empty($instance['url_target'])) echo 'selected';?>>-انتخاب کنید-</option>
                <option value="_parent" <?php if($instance['url_target']=='_parent') echo 'selected';?>>قاب والد</option>
                <option value="_self" <?php if($instance['url_target']=='_self') echo 'selected';?>>صفحه جاری</option>
                <option value="_top" <?php if($instance['url_target']=='_top') echo 'selected';?>>قاب موجود</option>
                <option value="_blank" <?php if($instance['url_target']=='_blank') echo 'selected';?>>تب جدید</option>
            </select>
        </p>



        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';
        $instance['src_img'] = (!empty($new_instance['src_img']))? $new_instance['src_img'] : '';
        $instance['img_url'] = (!empty($new_instance['img_url']))? $new_instance['img_url'] : '';
        $instance['url_target'] = (!empty($new_instance['url_target']))? $new_instance['url_target'] : '';




        return $instance;
    }
}

function myplugin_register_widgets_adv() {
    register_widget( 'Negit_adv' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_adv' );