<?php

class Negit_ended_posts extends WP_Widget
{
    function __construct()
    {
        parent::__construct('Negit_ended_posts', 'نمایش آخرین مطالب', array('description' => 'آخرین مطالب منتشر شده در سایت.'));
    }

    function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        } else {
            echo "";
        }
        ?>
        <?php $q = new WP_Query(array('posts_per_page' => $instance['count'])); ?>
        <?php if ($q->have_posts()) :
        if ($instance['count'] == '') {
            $instance['count'] = "5";
        }
        ?>
        <?php
        if ($instance['style'] == 'small_pic'){
            ?>
            <div class="small-post-img">
                <ul>
                    <?php while ($q->have_posts()) : $q->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink() ?>">
                                <?php
                                if (!empty(get_the_post_thumbnail())) {
                                    the_post_thumbnail(array(60, 60));

                                } else {
                                    ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image.jpg"
                                         alt="<?php the_title() ?>" style="width: 60px;height: 60px">
                                    <?php
                                }
                                ?>
                                <h3><?php the_title() ?></h3>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php } elseif ($instance['style'] == 'big_pic') { ?>
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
                                         alt="<?php the_title() ?>" style="width: 100%;height: auto">
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
    <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    function form($instance)
    {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">نام ستون:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo $instance['title'] ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>">تعداد نمایش:</label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>"
                   name="<?php echo $this->get_field_name('count'); ?>" type="number" step="1" min="1"
                   value="<?php if (empty($instance['count'])) {
                       echo "15";
                   } else {
                       echo $instance['count'];
                   } ?>" size="3">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('style'); ?>">استایل:</label>
            <select id="<?php echo $this->get_field_id('style'); ?>"
                    name="<?php echo $this->get_field_name('style'); ?>">
                <option value="small_pic" <?php if ($instance['style'] == 'small_pic') echo 'selected'; ?>>تصویر کوچک
                </option>
                <option value="big_pic" <?php if ($instance['style'] == 'big_pic') echo 'selected'; ?>>تصویر بزرگ
                </option>
            </select>
        </p>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? $new_instance['title'] : '';
        $instance['count'] = (!empty($new_instance['count'])) ? $new_instance['count'] : '5';
        $instance['style'] = (!empty($new_instance['style'])) ? $new_instance['style'] : '';
        return $instance;
    }
}

function myplugin_register_widgets_ended_posts()
{
    register_widget('Negit_ended_posts');
}

add_action('widgets_init', 'myplugin_register_widgets_ended_posts');