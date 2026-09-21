<?php
class blink_adv extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'blink_adv','ابزارک بک‌لینک',array('description'=>'ابزارک مخصوص ستون ها') );
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


<div class="backlinks">
    <?php
    if($instance['backl1'] || $instance['backt1'] != ""){
        ?>
        <a href="<?php echo $instance['backl1'] ?>" target="_blank">
            <?php echo $instance['backt1'] ?>
        </a>
        <?php
    }else{
        echo "";
    }
    if ($instance['backl2'] || $instance['backt2'] != ""){
        ?>
        <a href="<?php echo $instance['backl2'] ?>" target="_blank">
            <?php echo $instance['backt2'] ?>
        </a>
        <?php
    }else{
        echo "";
        }
    ?>


</div>



        <?php
        echo $args['after_widget'];
    }
    function form( $instance ) {
        ?>
        <p>
            <label>بک‌لینک اول:</label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('backt1'); ?>">نام بک‌لینک:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('backt1'); ?>" name="<?php echo $this->get_field_name('backt1'); ?>" type="text" value="<?php echo $instance['backt1'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('backl1'); ?>">آدرس بک‌لینک:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('backl1'); ?>" name="<?php echo $this->get_field_name('backl1'); ?>" type="text" value="<?php echo $instance['backl1'] ?>">
        </p>
        <hr>
        <p>
            <label>بک‌لینک دوم:</label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('backt2'); ?>">نام بک‌لینک:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('backt2'); ?>" name="<?php echo $this->get_field_name('backt2'); ?>" type="text" value="<?php echo $instance['backt2'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('backl2'); ?>">آدرس بک‌لینک:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('backl2'); ?>" name="<?php echo $this->get_field_name('backl2'); ?>" type="text" value="<?php echo $instance['backl2'] ?>">
        </p>






        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['backt1'] = (!empty($new_instance['backt1']))? $new_instance['backt1'] : '';
        $instance['backt2'] = (!empty($new_instance['backt2']))? $new_instance['backt2'] : '';
        $instance['backl1'] = (!empty($new_instance['backl1']))? $new_instance['backl1'] : '';
        $instance['backl2'] = (!empty($new_instance['backl2']))? $new_instance['backl2'] : '';




        return $instance;
    }
}

function myplugin_register_widgets_blink_adv() {
    register_widget( 'blink_adv' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_blink_adv' );