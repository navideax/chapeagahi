<?php
class Negit_ended_posts_category extends WP_Widget {

    function __construct() {
        // Instantiate the parent object
        parent::__construct( 'Negit_ended_posts_category','نمایش آخرین مطالب دسته بندی ها',array('description'=>'آخرین مطالب منتشر شده دسته ها') );
    }

    function widget( $args, $instance ) {
        // Widget output

        echo $args['before_widget'];

        ?>

        <?php $q = new WP_Query(array('posts_per_page'=>$instance['count'],'category__in' => $instance['terms_tax']));?>

        <?php
        if($q->have_posts()) :
            $cat_link = get_category_link( $instance['terms_tax']['0'] );
            if($instance['count']==''){
                $instance['count']="15";
            }
            ?>
            <?php if($instance['style']=='small_pic'){ ?>

            <div class="side-title">
                <a href="<?php echo $cat_link ?>" target="_blank">
                    <h3><?php echo $instance['title']; ?></h3>
                </a>
            </div>

                <div class="small-post-img">
                    <ul>
                        <?php while ($q->have_posts()) : $q->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink() ?>" target="_blank">
                                    <?php
                                    if (!empty(get_the_post_thumbnail())) {
                                        the_post_thumbnail(array(60, 60));
                                    } else {
                                        ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.jpg" alt="<?php the_title(); ?>" style="width: 60px;height: 60px">
                                        <?php
                                    }
                                    ?>
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php }
            elseif ($instance['style']=='big_pic'){ ?>
                <div class="side-title">
                    <a href="<?php echo $cat_link ?>" target="_blank">
                        <h3><?php echo $instance['title']; ?></h3>
                    </a>
                </div>
                <div class="big-post-img">
                    <ul>
                        <?php while ($q->have_posts()) : $q->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink() ?>" target="_blank">
                                    <?php
                                    if (!empty(get_the_post_thumbnail())) {
                                        the_post_thumbnail(array(308, 308));
                                    } else {
                                        ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/no-image.jpg" alt="<?php the_title(); ?>" style="width: 100%;height: auto">
                                        <?php
                                    }
                                    ?>
                                    <h3><?php the_title() ?></h3>
                                    <span class="clearfix"></span>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php }
            elseif ($instance['style']=='title'){ ?>
                <div class="side-title">
                    <a href="<?php echo $cat_link ?>" target="_blank">
                        <h3><?php echo $instance['title']; ?></h3>
                    </a>
                </div>
                <div class="small-post-img">
                    <ul>
                        <?php while ($q->have_posts()) : $q->the_post(); ?>
                            <li class="titlee">
                                <a href="<?php the_permalink() ?>" target="_blank">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php } ?>
        <?php endif;?>


        <?php

//        var_dump($args);
//        var_dump($instance);

        echo $args['after_widget'];

    }


    function form( $instance ) {
        $post_types= get_post_types(array('public' => true),'object');
//        var_dump($post_types);
        $taxonomy = $instance['taxonomy'];
        $terms_tax = $instance['terms_tax'];

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
            <select id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
                <option value="small_pic" <?php if(($instance['style']=='small_pic')) echo 'selected';?>>تصویر کوچک</option>
                <option value="big_pic" <?php if($instance['style']=='big_pic') echo 'selected';?>>تصویر بزرگ</option>
                <option value="title" <?php if($instance['style']=='title') echo 'selected';?>>تیتر</option>

            </select>
        </p>
        <?php

        $object_tax = get_object_taxonomies('post','names');
//        var_dump($object_tax);
        echo '<input type="hidden" value="'. $object_tax[0] .'" name="'. $this->get_field_name('taxonomy') .'">';

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('terms_tax'); ?>">دسته ها:</label><br/>
            <?php
            $terms = get_terms(
                array(
                    'taxonomy' => $object_tax[0],
                    'hide_empty' => false,
                )
            );
//            var_dump($terms);
            $count = count($terms_tax);
            foreach ($terms as $term){

                ?>
                <input class="widefat" id="<?php echo $this->get_field_id('terms_tax'); ?>" name="<?php echo $this->get_field_name('terms_tax'); ?>[]" type="checkbox" value="<?php echo intval($term->term_id); ?>" <?php for($i=0;$count>$i;$i++) if ($terms_tax[$i] == $term->term_id){echo 'checked';} ?>> <?php echo $term->name ?><br/>
                <?php

            }
            ?>
        </p>
        <?php
    }



    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance=array();

        $instance['title'] = (!empty($new_instance['title']))? $new_instance['title'] : '';
        $instance['count'] = (!empty($new_instance['count']))? $new_instance['count'] : '15';
        $instance['style'] = (!empty($new_instance['style']))? $new_instance['style'] : '';
        $instance['terms_tax'] = (!empty($new_instance['terms_tax']))? array_map('intval',$new_instance['terms_tax']) : '';
        $instance['taxonomy'] = (!empty($new_instance['taxonomy']))? $new_instance['taxonomy'] : '';




        return $instance;
    }
}

function myplugin_register_widgets_ended_posts_category() {
    register_widget( 'Negit_ended_posts_category' );
}

add_action( 'widgets_init', 'myplugin_register_widgets_ended_posts_category' );