<?php
require_once (get_template_directory()."/assets/inc/titan-framework/titan-framework-embedder.php");
add_action('tf_create_options','Negit_theme_options');
function Negit_theme_options(){
    require_once (get_template_directory()."/assets/inc/theme_Panel/parents.php");
}
