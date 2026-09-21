<?php
class namabal extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'namabal','ابزارک نمابال',array('description'=>'ابزارک مخصوص ستون ها') );
    }

    function widget( $args, $instance ) {
        // Widget output

        echo $args['before_widget'];


        ?>


            <div class="side-title">
                <a>
                    <h3><?php echo $instance['title']; ?></h3>
                </a>
            </div>
        <div class="sidebar-item">
            <?php $i = 0; ?>
            <div class="backlink-num">
                <?php if($instance['title_1'] && $instance['link_1']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_1'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_1'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_2'] && $instance['link_2']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_2'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_2'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_3'] && $instance['link_3']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_3'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_3'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_4'] && $instance['link_4']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_4'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_4'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_5'] && $instance['link_5']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_5'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_5'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_6'] && $instance['link_6']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_6'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_6'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_7'] && $instance['link_7']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_7'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_7'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_8'] && $instance['link_8']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_8'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_8'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_9'] && $instance['link_9']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_9'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_9'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
                <?php if($instance['title_10'] && $instance['link_10']){?>
                    <div class="item">
                        <a href="<?php echo $instance['link_10'] ?>" target="_blank">
                            <span><?php echo ++$i ?></span>
                            <?php echo $instance['title_10'] ?>
                        </a>
                    </div>
                <?php }else{echo "";} ?>
            </div>

        </div>









        <?php

//        var_dump($args);
//        var_dump($instance);

        echo $args['after_widget'];

    }


    function form( $instance ) {
        // Output admin widget options form
//        var_dump($instance);
        ?>

        <style>
            .box-1{
                background: rgba(252, 171, 16, 0.19);
                padding: 15px;
            }
        </style>




        <label for="<?php echo $this->get_field_id('title'); ?>">نام سایدبار:</label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title'] ?>">



        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک اول<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_1'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_1'); ?>" name="<?php echo $this->get_field_name('title_1'); ?>" type="text" value="<?php echo $instance['title_1'] ?>">
                    <label for="<?php echo $this->get_field_id('link_1'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_1'); ?>" name="<?php echo $this->get_field_name('link_1'); ?>" type="text" value="<?php echo $instance['link_1'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک دوم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_2'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" type="text" value="<?php echo $instance['title_2'] ?>">
                    <label for="<?php echo $this->get_field_id('link_2'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_2'); ?>" name="<?php echo $this->get_field_name('link_2'); ?>" type="text" value="<?php echo $instance['link_2'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک سوم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_3'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_3'); ?>" name="<?php echo $this->get_field_name('title_3'); ?>" type="text" value="<?php echo $instance['title_3'] ?>">
                    <label for="<?php echo $this->get_field_id('link_3'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_3'); ?>" name="<?php echo $this->get_field_name('link_3'); ?>" type="text" value="<?php echo $instance['link_3'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک چهارم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_4'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_4'); ?>" name="<?php echo $this->get_field_name('title_4'); ?>" type="text" value="<?php echo $instance['title_4'] ?>">
                    <label for="<?php echo $this->get_field_id('link_4'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_4'); ?>" name="<?php echo $this->get_field_name('link_4'); ?>" type="text" value="<?php echo $instance['link_4'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک پنجم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_5'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_5'); ?>" name="<?php echo $this->get_field_name('title_5'); ?>" type="text" value="<?php echo $instance['title_5'] ?>">
                    <label for="<?php echo $this->get_field_id('link_5'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_5'); ?>" name="<?php echo $this->get_field_name('link_5'); ?>" type="text" value="<?php echo $instance['link_5'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک ششم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_6'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_6'); ?>" name="<?php echo $this->get_field_name('title_6'); ?>" type="text" value="<?php echo $instance['title_6'] ?>">
                    <label for="<?php echo $this->get_field_id('link_6'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_6'); ?>" name="<?php echo $this->get_field_name('link_6'); ?>" type="text" value="<?php echo $instance['link_6'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک هفتم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_7'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_7'); ?>" name="<?php echo $this->get_field_name('title_7'); ?>" type="text" value="<?php echo $instance['title_7'] ?>">
                    <label for="<?php echo $this->get_field_id('link_7'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_7'); ?>" name="<?php echo $this->get_field_name('link_7'); ?>" type="text" value="<?php echo $instance['link_7'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک هشتم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_8'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_8'); ?>" name="<?php echo $this->get_field_name('title_8'); ?>" type="text" value="<?php echo $instance['title_8'] ?>">
                    <label for="<?php echo $this->get_field_id('link_9'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_9'); ?>" name="<?php echo $this->get_field_name('link_9'); ?>" type="text" value="<?php echo $instance['link_9'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک نهم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_9'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_9'); ?>" name="<?php echo $this->get_field_name('title_9'); ?>" type="text" value="<?php echo $instance['title_9'] ?>">
                    <label for="<?php echo $this->get_field_id('link_9'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_9'); ?>" name="<?php echo $this->get_field_name('link_9'); ?>" type="text" value="<?php echo $instance['link_9'] ?>">
                </p>
            </div>
        </div>

        <div id="widget-35_namabal-2" class="widget">
            <div class="widget-top" style="margin-top: 10px;">
                <div class="widget-title-action">
                    <button type="button" class="widget-action hide-if-no-js" aria-expanded="true">
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="widget-title ui-sortable-handle"><h3>لینک دهم<span class="in-widget-title"></span></h3></div>
            </div>
            <div class="widget-inside box-1">
                <p class="">
                    <label for="<?php echo $this->get_field_id('title_10'); ?>">تیتر:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title_10'); ?>" name="<?php echo $this->get_field_name('title_10'); ?>" type="text" value="<?php echo $instance['title_10'] ?>">
                    <label for="<?php echo $this->get_field_id('link_10'); ?>">لینک:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('link_10'); ?>" name="<?php echo $this->get_field_name('link_10'); ?>" type="text" value="<?php echo $instance['link_10'] ?>">
                </p>
            </div>
        </div>

        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';

        $instance['title_1'] = (!empty($new_instance['title_1']))? $new_instance['title_1'] : '';
        $instance['link_1'] = (!empty($new_instance['link_1']))? $new_instance['link_1'] : '';


        $instance['title_2'] = (!empty($new_instance['title_2']))? $new_instance['title_2'] : '';
        $instance['link_2'] = (!empty($new_instance['link_2']))? $new_instance['link_2'] : '';


        $instance['title_3'] = (!empty($new_instance['title_3']))? $new_instance['title_3'] : '';
        $instance['link_3'] = (!empty($new_instance['link_3']))? $new_instance['link_3'] : '';


        $instance['title_4'] = (!empty($new_instance['title_4']))? $new_instance['title_4'] : '';
        $instance['link_4'] = (!empty($new_instance['link_4']))? $new_instance['link_4'] : '';


        $instance['title_5'] = (!empty($new_instance['title_5']))? $new_instance['title_5'] : '';
        $instance['link_5'] = (!empty($new_instance['link_5']))? $new_instance['link_5'] : '';


        $instance['title_6'] = (!empty($new_instance['title_6']))? $new_instance['title_6'] : '';
        $instance['link_6'] = (!empty($new_instance['link_6']))? $new_instance['link_6'] : '';


        $instance['title_7'] = (!empty($new_instance['title_7']))? $new_instance['title_7'] : '';
        $instance['link_7'] = (!empty($new_instance['link_7']))? $new_instance['link_7'] : '';


        $instance['title_8'] = (!empty($new_instance['title_8']))? $new_instance['title_8'] : '';
        $instance['link_8'] = (!empty($new_instance['link_8']))? $new_instance['link_8'] : '';


        $instance['title_9'] = (!empty($new_instance['title_9']))? $new_instance['title_9'] : '';
        $instance['link_9'] = (!empty($new_instance['link_9']))? $new_instance['link_9'] : '';


        $instance['title_10'] = (!empty($new_instance['title_10']))? $new_instance['title_10'] : '';
        $instance['link_10'] = (!empty($new_instance['link_10']))? $new_instance['link_10'] : '';




        return $instance;
    }
}

function myplugin_register_widgets_namabal() {
    register_widget( 'namabal' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_namabal' );