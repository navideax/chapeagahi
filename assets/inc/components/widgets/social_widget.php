<?php
class Negit_social extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_social','ابزارک شبکه های اجتماعی',array('description'=>'ابزارک  ستون سمت چپ') );
    }

    function widget( $args, $instance ) {
        // Widget output

        echo $args['before_widget'];

        if(($instance['social_telegram'])) { ?>

                <div class="social-telegram">
                    <a href="<?php echo $instance['social_telegram'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/send.svg" alt="">نگیت را در تلگرام دنبال کنید</a>
                </div>
        <?php }else{
        echo "";
        }
        if(($instance['social_instagram'])) {
        ?>
            <div class="social-instagram">
                <a href="<?php echo $instance['social_instagram'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/instagram.svg" alt="">نگیت را در اینستاگرام دنبال
                    کنید</a>
            </div>
        <?php }else{
            echo "";
        }
        if(($instance['social_twitter'])) {
            ?>
                <div class="social-twitter">
                    <a href="<?php echo $instance['social_twitter'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.svg" alt="">نگیت را در توییتر دنبال
                        کنید</a>
                </div>
        <?php }else{
            echo "";
        }
        if(($instance['social_youtube'])) {
            ?>

            <div class="social-youtube">
                <a href="<?php echo $instance['social_youtube'] ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/youtube.svg" alt="">نگیت را در یوتیوب دنبال
                    کنید</a>
            </div>
        <?php }else{
            echo "";
        }


        echo $args['after_widget'];

    }


    function form( $instance ) {

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('social_telegram'); ?>">تلگرام :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_telegram'); ?>" name="<?php echo $this->get_field_name('social_telegram'); ?>" type="text" value="<?php echo $instance['social_telegram'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_instagram'); ?>">اینستاگرام :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_instagram'); ?>" name="<?php echo $this->get_field_name('social_instagram'); ?>" type="text" value="<?php echo $instance['social_instagram'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_twitter'); ?>">توییتر :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_twitter'); ?>" name="<?php echo $this->get_field_name('social_twitter'); ?>" type="text" value="<?php echo $instance['social_twitter'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('social_youtube'); ?>">یوتیوب :</label>
            <input class="widefat" id="<?php echo $this->get_field_id('social_youtube'); ?>" name="<?php echo $this->get_field_name('social_youtube'); ?>" type="text" value="<?php echo $instance['social_youtube'] ?>">
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

        $instance['social_telegram'] = (!empty($new_instance['social_telegram']))? $new_instance['social_telegram'] : '';
        $instance['social_instagram'] = (!empty($new_instance['social_instagram']))? $new_instance['social_instagram'] : '';
        $instance['social_twitter'] = (!empty($new_instance['social_twitter']))? $new_instance['social_twitter'] : '';
        $instance['social_youtube'] = (!empty($new_instance['social_youtube']))? $new_instance['social_youtube'] : '';

//        $instance['url_target'] = (!empty($new_instance['url_target']))? $new_instance['url_target'] : '';




        return $instance;
    }
}

function myplugin_register_widgets_social() {
    register_widget( 'Negit_social' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_social' );