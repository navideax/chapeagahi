<?php
class Negit_signup extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_signup','دکمه ورود به حساب کاربری',array('description'=>'ورود به حساب کاربری') );
    }

    function widget( $args, $instance ) {
        // Widget output

        echo $args['before_widget'];

        if(($instance['signup_link'])) { ?>

                <div class="signin">
                    <a href="<?php echo $instance['signup_link'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/key.svg" alt=""> ورود به حساب کاربری</a>
                </div>

        <?php }else{
        echo "";
        }



        echo $args['after_widget'];

    }


    function form( $instance ) {

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('signup_link'); ?>">  لینک صفحه ورود : </label>
            <input class="widefat" id="<?php echo $this->get_field_id('signup_link'); ?>" name="<?php echo $this->get_field_name('signup_link'); ?>" type="text" value="<?php echo $instance['signup_link'] ?>">
        </p>


<!--        <p>
            <label for="<?php /*echo $this->get_field_id('url_target'); */?>">نحوه بازکردن لینک:</label>
            <select id="<?php /*echo $this->get_field_id('url_target'); */?>" name="<?php /*echo $this->get_field_name('url_target'); */?>">
                <option value="" <?php /*if(empty($instance['url_target'])) echo 'selected';*/?>>-انتخاب کنید-</option>
                <option value="_parent" <?php /*if($instance['url_target']=='_parent') echo 'selected';*/?>>قاب والد</option>
                <option value="_self" <?php /*if($instance['url_target']=='_self') echo 'selected';*/?>>صفحه جاری</option>
                <option value="_top" <?php /*if($instance['url_target']=='_top') echo 'selected';*/?>>قاب موجود</option>
                <option value="_blank" <?php /*if($instance['url_target']=='_blank') echo 'selected';*/?>>تب جدید</option>
            </select>
        </p>-->



        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['signup_link'] = (!empty($new_instance['signup_link']))? $new_instance['signup_link'] : '';


//        $instance['url_target'] = (!empty($new_instance['url_target']))? $new_instance['url_target'] : '';




        return $instance;
    }
}

function myplugin_register_widgets_signup() {
    register_widget( 'Negit_signup' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_signup' );