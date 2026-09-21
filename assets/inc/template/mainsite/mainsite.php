<?php
$titan = TitanFramework::getInstance('NEGIT');
$main_category = $titan->getOption('index_categories');
global $post;
get_template_part( 'assets/inc/template/mainsite/intro' );

get_template_part( 'assets/inc/template/mainsite/services' );
//get_template_part( 'assets/inc/template/mainsite/maybe' );
get_template_part( 'assets/inc/template/mainsite/hamkaran' );
get_template_part( 'assets/inc/template/mainsite/motadavel' );
get_template_part( 'assets/inc/template/mainsite/moshtarian' );

//get_template_part( 'assets/inc/template/mainsite/roozlogo' );

?>

