<?php

define("QEYMAT_CHAP_AGHAHI" , 496000);

function qeymat_chap_aghahi(){
    $qeyyyy = 496000;
    echo $qeyyyy;
}
function show_qeymat_chap_aghahi(){
    $qeyyyy = "4,960,000";
    echo $qeyyyy;
}





function negit_breadcrumbs() {

    /* === OPTIONS === */
    $text['home']     = 'خانه'; // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page
    $text['search']   = '%s'; // text for a search results page
    $text['tag']      = '%s'; // text for a tag page
    $text['author']   = 'تمامی نوشته های %s'; // text for an author page
    $text['404']      = 'خطا 404'; // text for the 404 page
    $text['page']     = 'صفحه %s'; // text 'Page N'
    $text['cpage']    = 'صفحه کامنت ها %s'; // text 'Comment Page N'

    $wrap_before    = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // the opening wrapper tag
    $wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
    $sep            = '<span class="breadcrumbs__separator"> › </span>'; // separator between crumbs
    $before         = '<span class="breadcrumbs__current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb

    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
    $show_current   = 1; // 1 - show current page title, 0 - don't show
    $show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show
    /* === END OF OPTIONS === */

    global $post;
    $home_url       = home_url('/');
    $link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
    $link          .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
    $link          .= '<meta itemprop="position" content="%3$s" />';
    $link          .= '</span>';
    $parent_id      = ( $post ) ? $post->post_parent : '';
    $home_link      = sprintf( $link, $home_url, $text['home'], 1 );

    if ( is_home() || is_front_page() ) {

        if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

    } else {

        $position = 0;

        echo $wrap_before;

        if ( $show_home_link ) {
            $position += 1;
            echo $home_link;
        }

        if ( is_category() ) {
            $parents = get_ancestors( get_query_var('cat'), 'category' );
            foreach ( array_reverse( $parents ) as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $cat = get_query_var('cat');
                echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_search() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $show_home_link ) echo $sep;
                echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_current ) {
                    if ( $position >= 1 ) echo $sep;
                    echo $before . sprintf( $text['search'], get_search_query() ) . $after;
                } elseif ( $show_last_sep ) echo $sep;
            }

        } elseif ( is_year() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_time('Y') . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_month() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_day() ) {
            if ( $show_home_link ) echo $sep;
            $position += 1;
            echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
            $position += 1;
            echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
            if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_single() && ! is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $position += 1;
                $post_type = get_post_type_object( get_post_type() );
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
                if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                elseif ( $show_last_sep ) echo $sep;
            } else {
                $cat = get_the_category(); $catID = $cat[0]->cat_ID;
                $parents = get_ancestors( $catID, 'category' );
                $parents = array_reverse( $parents );
                $parents[] = $catID;
                foreach ( $parents as $cat ) {
                    $position += 1;
                    if ( $position > 1 ) echo $sep;
                    echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
                }
                if ( get_query_var( 'cpage' ) ) {
                    $position += 1;
                    echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
                    echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
                } else {
                    if ( $show_current ) echo $sep . $before . get_the_title() . $after;
                    elseif ( $show_last_sep ) echo $sep;
                }
            }

        } elseif ( is_post_type_archive() ) {
            $post_type = get_post_type_object( get_post_type() );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . $post_type->label . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_attachment() ) {
            $parent = get_post( $parent_id );
            $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
            $parents = get_ancestors( $catID, 'category' );
            $parents = array_reverse( $parents );
            $parents[] = $catID;
            foreach ( $parents as $cat ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
            }
            $position += 1;
            echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_page() && ! $parent_id ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . get_the_title() . $after;
            elseif ( $show_home_link && $show_last_sep ) echo $sep;

        } elseif ( is_page() && $parent_id ) {
            $parents = get_post_ancestors( get_the_ID() );
            foreach ( array_reverse( $parents ) as $pageID ) {
                $position += 1;
                if ( $position > 1 ) echo $sep;
                echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
            }
            if ( $show_current ) echo $sep . $before . get_the_title() . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( is_tag() ) {
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                $tagID = get_query_var( 'tag_id' );
                echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_author() ) {
            $author = get_userdata( get_query_var( 'author' ) );
            if ( get_query_var( 'paged' ) ) {
                $position += 1;
                echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
                echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
            } else {
                if ( $show_home_link && $show_current ) echo $sep;
                if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
                elseif ( $show_home_link && $show_last_sep ) echo $sep;
            }

        } elseif ( is_404() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            if ( $show_current ) echo $before . $text['404'] . $after;
            elseif ( $show_last_sep ) echo $sep;

        } elseif ( has_post_format() && ! is_singular() ) {
            if ( $show_home_link && $show_current ) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()

function wpdir($link){
    echo get_template_directory_uri()."/".$link;
}
function noimg(){
    echo wpdir("assets/img/no-image.jpg");
}
include "assets/inc/components/sidebars.php";

add_theme_support( 'post-thumbnails' );

the_post_thumbnail('thumbnail');
the_post_thumbnail('medium');
the_post_thumbnail('medium_large');
the_post_thumbnail('large');
the_post_thumbnail('full');
the_post_thumbnail( array(100,100) );

include "assets/inc/components/widgets/ads_widget.php";
include "assets/inc/components/widgets/video_widget.php";
include "assets/inc/components/widgets/veiw_widget.php";
include "assets/inc/components/widgets/endp_widget.php";
include "assets/inc/components/widgets/endpd_widget.php";
include "assets/inc/components/widgets/code_widget.php";
include "assets/inc/components/widgets/social_widget.php";
include "assets/inc/components/widgets/signup_widget.php";
include "assets/inc/components/widgets/backlink.php";
include "assets/inc/components/widgets/namabal.php";
include "in/setting/sliders.php";



require_once('wp_bootstrap_navwalker.php');
include "assets/inc/theme_Panel/index.php";
include "in/setting/config.php";


function my_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'متو اصلی' ),
            'footer-menu' => __( 'متو فوتر' )
        )
    );
}
add_action( 'init', 'my_menus' );

function excerpt($length) {
    return 25;
}
add_filter('excerpt_length', 'excerpt');

function more($more) {
    return '...';
}
add_filter('excerpt_more', 'more');






/**
 * Subtitle class
 */
class Subtitle
{
    /**
     *
     * Constructor
     *
     * @access public
     * @author Ralf Hortt
     **/
    public function __construct()
    {
        add_action( 'edit_form_after_title', array( $this, 'edit_form_after_title' ) );
        add_action( 'save_post', array( $this, 'save_post' ) );
        add_post_type_support( 'post', 'subtitle' );
        add_post_type_support( 'page', 'subtitle' );
        load_plugin_textdomain( 'hc-subtitle', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }
    /**
     * Add subtitle field
     *
     * @access public
     * @author Ralf Hortt
     **/
    public function edit_form_after_title()
    {
        global $post;
        if ( isset( $_GET['post_type'] ) )
            $post_type = sanitize_text_field( $_GET['post_type'] );
        elseif ( isset( $post->post_type ) )
            $post_type = $post->post_type;
        else
            $post_type = 'post';
        if ( post_type_supports( $post_type, 'subtitle' ) )
            $this->subtitle_field( $post );
    }
    /**
     * Enqueue Styles
     *
     * @access public
     * @author Ralf Hortt
     **/
    public function enqueue_styles()
    {
        wp_enqueue_style( 'hc-subtitle', plugins_url( 'css/hc-subtitle.css', __FILE__ ) );
    }
    /**
     * Get Subtitle
     *
     * @static
     * @access public
     * @param int $post_id Post ID
     * @return str Subtitle
     * @author Ralf Hortt
     **/
    public static function get_subtitle( $post_id = FALSE )
    {
        $post_id = ( FALSE !== $post_id ) ? $post_id : get_the_ID();
        return esc_html( apply_filters( 'the_subtitle', get_post_meta( $post_id, '_subtitle', TRUE ) ) );
    }
    /**
     *
     * Save subtitle
     *
     * @access public
     * @return void
     * @author Ralf Hortt
     */
    public function save_post( $post_id ) {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return;
        if ( !isset( $_POST['save-subtitle'] ) || !wp_verify_nonce( $_POST['save-subtitle'], plugin_basename( __FILE__ ) ) )
            return;
        if ( '' != $_POST['hc-subtitle'] ) :
            update_post_meta( $post_id, '_subtitle', sanitize_text_field( $_POST['hc-subtitle'] ) );
        else :
            delete_post_meta( $post_id, '_subtitle' );
        endif;
    }
    /**
     * Metabox content
     *
     * @access public
     * @author Ralf Hortt
     */


    public function subtitle_field( $post )
    {
        $subtitle = $this->get_subtitle( $post->ID );
        ?>
        <input type="text" autocomplete="off" id="hc-subtitle" value="<?php echo esc_attr( $subtitle ) ?>" name="hc-subtitle" placeholder="<?php _e( 'رو تیتر خود را وارد کنید', 'hc-subtitle' ); ?>" style="padding: 3px 8px;font-size: 1.7em;line-height: 100%;height: 1.7em;width: 100%;margin-top:10px;">
        <?php
        wp_nonce_field( plugin_basename( __FILE__ ), 'save-subtitle' );
    }
    /**
     * Display Subtitle
     *
     * @static
     * @access public
     * @param str $before Before the subtitle
     * @param str $after After the subtitle
     * @author Ralf Hortt
     */
    public static function the_subtitle( $before = '', $after = '' )
    {
        $subtitle = get_subtitle( get_the_ID() );
        if ( '' != $subtitle )
            echo $before . $subtitle . $after;
    }
}
new Subtitle();
/**
 * Getter: Subtitle
 *
 * @param int $post_id Post ID
 * @return str Subtitle
 * @author Ralf Hortt
 **/
function get_subtitle( $post_id = FALSE )
{
    return Subtitle::get_subtitle( $post_id );
}
/**
 * Conditional Tag: Subtitle
 *
 * @param int $post_id Post ID
 * @return bool
 * @author Ralf Hortt
 **/
function has_subtitle( $post_id = FALSE )
{
    if ( '' !== Subtitle::get_subtitle( $post_id ) )
        return TRUE;
    else
        return FALSE;
}
/**
 * Template Tag: Display Subtitle
 *
 * @param str $before Before the subtitle
 * @param str $after After the subtitle
 * @author Ralf Hortt
 */
function the_subtitle( $before = '', $after = '' )
{
    echo Subtitle::get_subtitle( $before, $after );
}

add_filter('comment_form_default_fields', 'unset_url_field');
function unset_url_field($fields){
    if(isset($fields['url']))
        unset($fields['url']);
    return $fields;
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'سال',
        'm' => 'ماه',
        'w' => 'هفته',
        'd' => 'روز',
        'h' => 'ساعت',
        'i' => 'دقیقه',
        's' => 'ثانیه',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' ' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' پیش' : 'چند لحظه پیش';
}




function register_custom_menu_page() {

    add_menu_page('آگهی ها', 'مدیریت آگهی ها', 'add_users', 'ad-admin', '_custom_ad_admin', null, 6);
}
add_action('admin_menu', 'register_custom_menu_page');

function _custom_ad_admin(){
    $ad_admin_n = get_site_url().'/ad-admin';
    echo "چند لحظه صبر کنید!";
    echo("<script>location.href = '$ad_admin_n';</script>");

}




// تبدیل تاریخ

function gregorian_to_jalali($gy, $gm, $gd, $mod='') {
    $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
    $gy2 = ($gm > 2)? ($gy + 1) : $gy;
    $days = 355666 + (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) + $gd + $g_d_m[$gm - 1];
    $jy = -1595 + (33 * ((int)($days / 12053)));
    $days %= 12053;
    $jy += 4 * ((int)($days / 1461));
    $days %= 1461;
    if ($days > 365) {
        $jy += (int)(($days - 1) / 365);
        $days = ($days - 1) % 365;
    }
    if ($days < 186) {
        $jm = 1 + (int)($days / 31);
        $jd = 1 + ($days % 31);
    } else{
        $jm = 7 + (int)(($days - 186) / 30);
        $jd = 1 + (($days - 186) % 30);
    }
    return ($mod == '')? array($jy, $jm, $jd) : $jy.$mod.$jm.$mod.$jd;
}


function jdate($format, $timestamp = '', $none = '', $time_zone = 'Asia/Tehran', $tr_num = 'fa') {

    $T_sec = 0;/* <= رفع خطاي زمان سرور ، با اعداد '+' و '-' بر حسب ثانيه */

    if ($time_zone != 'local') date_default_timezone_set(($time_zone === '') ? 'Asia/Tehran' : $time_zone);
    $ts = $T_sec + (($timestamp === '') ? time() : tr_num($timestamp));
    $date = explode('_', date('H_i_j_n_O_P_s_w_Y', $ts));
    list($j_y, $j_m, $j_d) = gregorian_to_jalali($date[8], $date[3], $date[2]);
    $doy = ($j_m < 7) ? (($j_m - 1) * 31) + $j_d - 1 : (($j_m - 7) * 30) + $j_d + 185;
    $kab = (((($j_y + 12) % 33) % 4) == 1) ? 1 : 0;
    $sl = strlen($format);
    $out = '';
    for ($i = 0; $i < $sl; $i++) {
        $sub = substr($format, $i, 1);
        if ($sub == '\\') {
            $out .= substr($format, ++$i, 1);
            continue;
        }
        switch ($sub) {

            case 'E':
            case 'R':
            case 'x':
            case 'X':
                $out .= 'http://jdf.scr.ir';
                break;

            case 'B':
            case 'e':
            case 'g':
            case 'G':
            case 'h':
            case 'I':
            case 'T':
            case 'u':
            case 'Z':
                $out .= date($sub, $ts);
                break;

            case 'a':
                $out .= ($date[0] < 12) ? 'ق.ظ' : 'ب.ظ';
                break;

            case 'A':
                $out .= ($date[0] < 12) ? 'قبل از ظهر' : 'بعد از ظهر';
                break;

            case 'b':
                $out .= (int) ($j_m / 3.1) + 1;
                break;

            case 'c':
                $out .= $j_y . '/' . $j_m . '/' . $j_d . ' ،' . $date[0] . ':' . $date[1] . ':' . $date[6] . ' ' . $date[5];
                break;

            case 'C':
                $out .= (int) (($j_y + 99) / 100);
                break;

            case 'd':
                $out .= ($j_d < 10) ? '0' . $j_d : $j_d;
                break;

            case 'D':
                $out .= jdate_words(array('kh' => $date[7]), ' ');
                break;

            case 'f':
                $out .= jdate_words(array('ff' => $j_m), ' ');
                break;

            case 'F':
                $out .= jdate_words(array('mm' => $j_m), ' ');
                break;

            case 'H':
                $out .= $date[0];
                break;

            case 'i':
                $out .= $date[1];
                break;

            case 'j':
                $out .= $j_d;
                break;

            case 'J':
                $out .= jdate_words(array('rr' => $j_d), ' ');
                break;

            case 'k';
                $out .= tr_num(100 - (int) ($doy / ($kab + 365.24) * 1000) / 10, $tr_num);
                break;

            case 'K':
                $out .= tr_num((int) ($doy / ($kab + 365.24) * 1000) / 10, $tr_num);
                break;

            case 'l':
                $out .= jdate_words(array('rh' => $date[7]), ' ');
                break;

            case 'L':
                $out .= $kab;
                break;

            case 'm':
                $out .= ($j_m > 9) ? $j_m : '0' . $j_m;
                break;

            case 'M':
                $out .= jdate_words(array('km' => $j_m), ' ');
                break;

            case 'n':
                $out .= $j_m;
                break;

            case 'N':
                $out .= $date[7] + 1;
                break;

            case 'o':
                $jdw = ($date[7] == 6) ? 0 : $date[7] + 1;
                $dny = 364 + $kab - $doy;
                $out .= ($jdw > ($doy + 3) and $doy < 3) ? $j_y - 1 : (((3 - $dny) > $jdw and $dny < 3) ? $j_y + 1 : $j_y);
                break;

            case 'O':
                $out .= $date[4];
                break;

            case 'p':
                $out .= jdate_words(array('mb' => $j_m), ' ');
                break;

            case 'P':
                $out .= $date[5];
                break;

            case 'q':
                $out .= jdate_words(array('sh' => $j_y), ' ');
                break;

            case 'Q':
                $out .= $kab + 364 - $doy;
                break;

            case 'r':
                $key = jdate_words(array('rh' => $date[7], 'mm' => $j_m));
                $out .= $date[0] . ':' . $date[1] . ':' . $date[6] . ' ' . $date[4] . ' ' . $key['rh'] . '، ' . $j_d . ' ' . $key['mm'] . ' ' . $j_y;
                break;

            case 's':
                $out .= $date[6];
                break;

            case 'S':
                $out .= 'ام';
                break;

            case 't':
                $out .= ($j_m != 12) ? (31 - (int) ($j_m / 6.5)) : ($kab + 29);
                break;

            case 'U':
                $out .= $ts;
                break;

            case 'v':
                $out .= jdate_words(array('ss' => ($j_y % 100)), ' ');
                break;

            case 'V':
                $out .= jdate_words(array('ss' => $j_y), ' ');
                break;

            case 'w':
                $out .= ($date[7] == 6) ? 0 : $date[7] + 1;
                break;

            case 'W':
                $avs = (($date[7] == 6) ? 0 : $date[7] + 1) - ($doy % 7);
                if ($avs < 0) $avs += 7;
                $num = (int) (($doy + $avs) / 7);
                if ($avs < 4) {
                    $num++;
                } elseif ($num < 1) {
                    $num = ($avs == 4 or $avs == ((((($j_y % 33) % 4) - 2) == ((int) (($j_y % 33) * 0.05))) ? 5 : 4)) ? 53 : 52;
                }
                $aks = $avs + $kab;
                if ($aks == 7) $aks = 0;
                $out .= (($kab + 363 - $doy) < $aks and $aks < 3) ? '01' : (($num < 10) ? '0' . $num : $num);
                break;

            case 'y':
                $out .= substr($j_y, 2, 2);
                break;

            case 'Y':
                $out .= $j_y;
                break;

            case 'z':
                $out .= $doy;
                break;

            default:
                $out .= $sub;
        }
    }
    return ($tr_num != 'en') ? tr_num($out, 'fa', '.') : $out;
}

function tr_num($str, $mod = 'en', $mf = '٫') {
    $num_a = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.');
    $key_a = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', $mf);
    return ($mod == 'fa') ? str_replace($num_a, $key_a, $str) : str_replace($key_a, $num_a, $str);
}


// تنظیم منطقه زمانی برای وردپرس به تهران
date_default_timezone_set('Asia/Tehran');



// افزودن متاباکس به صفحه ویرایش برگه‌ها
function add_custom_metabox() {
    add_meta_box(
        'EXad_textarea_metabox', // شناسه متاباکس
        'متن پیشفرض برای این نوع آگهی', // عنوان متاباکس
        'EXad_metabox_callback', // تابع برای نمایش محتویات متاباکس
        'page', // نوع پست (در اینجا صفحه‌ها)
        'normal', // مکان قرارگیری متاباکس (در قسمت معمولی ویرایش)
        'high' // اولویت نمایش متاباکس
    );
}
add_action('add_meta_boxes', 'add_custom_metabox');

// تابع برای نمایش فیلدهای متاباکس
function EXad_metabox_callback($post) {
    // افزودن nonce برای امنیت
    wp_nonce_field(basename(__FILE__), 'custom_metabox_nonce');

    // دریافت مقدار قبلی اگر موجود باشد
    $custom_content = get_post_meta($post->ID, '_EXad_textarea', true);

    // نمایش فیلد textarea
    echo '<textarea name="custom_textarea" style="width:100%; height: 150px;">' . esc_textarea($custom_content) . '</textarea>';
}

// ذخیره محتوای وارد شده در متاباکس
function save_custom_metabox_data($post_id) {
    // بررسی nonce برای امنیت
    if (!isset($_POST['custom_metabox_nonce']) || !wp_verify_nonce($_POST['custom_metabox_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // جلوگیری از ذخیره در حالت خودکار ذخیره (auto-save)
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // جلوگیری از ذخیره در صورت عدم داشتن دسترسی
    if ('page' != $_POST['post_type']) {
        return $post_id;
    }

    // ذخیره محتوای وارد شده در فیلد
    if (isset($_POST['custom_textarea'])) {
        update_post_meta($post_id, '_EXad_textarea', sanitize_textarea_field($_POST['custom_textarea']));
    }
}
add_action('save_post', 'save_custom_metabox_data');
