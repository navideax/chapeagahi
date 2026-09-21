<?php
class Negit_video extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_video','ابزارک ویدیو',array('description'=>'مخصوص پخش آنلاین ویدیو') );
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
<?php if(!empty($instance['vid_url'])){ ?>

<video <?php echo 'controls'; if($instance['autoplay']=='on'){echo ' autoplay';} if($instance['preload']=='on'){echo ' preload';} if($instance['muted']=='on'){echo ' muted';} if(!empty($instance['poster'])){echo ' poster="'.$instance['poster'].'"';}?>>
    <source src="<?php echo $instance['vid_url'] ?>" type="video/mp4">
</video>


            <?php } ?>
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
            <label for="<?php echo $this->get_field_id('vid_url'); ?>">لینک ویدیو:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('vid_url'); ?>" name="<?php echo $this->get_field_name('vid_url'); ?>" type="text" value="<?php echo $instance['vid_url'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('poster'); ?>">لینک پوستر:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('poster'); ?>" name="<?php echo $this->get_field_name('poster'); ?>" type="text" value="<?php echo $instance['poster'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('autoplay'); ?>">پخش خودکار:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" type="checkbox" value="on" <?php if($instance['autoplay']=='on'){echo 'checked';} ?>>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('preload'); ?>">بارگذاری خودکار:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('preload'); ?>" name="<?php echo $this->get_field_name('preload'); ?>" type="checkbox" value="on" <?php if($instance['preload']=='on'){echo 'checked';} ?>>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('muted'); ?>">قطع صدا:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('muted'); ?>" name="<?php echo $this->get_field_name('muted'); ?>" type="checkbox" value="on" <?php if($instance['muted']=='on'){echo 'checked';} ?>>
        </p>
        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';
        $instance['vid_url'] = (!empty($new_instance['vid_url']))? $new_instance['vid_url'] : '';
        $instance['poster'] = (!empty($new_instance['poster']))? $new_instance['poster'] : '';
        $instance['autoplay'] = (!empty($new_instance['autoplay']))? $new_instance['autoplay'] : 'off';
        $instance['preload'] = (!empty($new_instance['preload']))? $new_instance['preload'] : 'off';
        $instance['muted'] = (!empty($new_instance['muted']))? $new_instance['muted'] : 'off';




        return $instance;
    }
}

function myplugin_register_widgets_video() {
    register_widget( 'Negit_video' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_video' );