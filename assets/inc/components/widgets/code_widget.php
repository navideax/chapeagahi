<?php
class Negit_code extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_code','ابزارک کد',array('description'=>'ابزارک مخصوص ستون ها') );
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

        <?php echo $instance['htmlcode'] ?>

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
            <label for="<?php echo $this->get_field_id('htmlcode'); ?>">کد مورد نظر:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('htmlcode'); ?>" name="<?php echo $this->get_field_name('htmlcode'); ?>" type="text" value="<?php echo $instance['htmlcode'] ?>">
        </p>







        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';
        $instance['htmlcode'] = (!empty($new_instance['htmlcode']))? $new_instance['htmlcode'] : '';

        return $instance;
    }
}

function myplugin_register_widgets_code() {
    register_widget( 'Negit_code' );
}
add_action( 'widgets_init', 'myplugin_register_widgets_code' );