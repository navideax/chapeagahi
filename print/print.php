<?php
/*
template name: Print
*/
if(isset($_GET['id'])) {
$id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php bloginfo('name');?></title>
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory');?>/print/print.css">
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/fonts/irsans/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<div class="page">
<div align="center">
	<img src="https://etebarenovin.ir/wp-content/uploads/2021/10/qwer.jpg"><br>
</div>
	<div class="post">
	<br><br>
	<?php
	$p = "p=".$id;
	$the_query = new WP_Query( $p );;
	if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();?>
	<h2 class="title-print">
        <p class="rotitr">
            <?php echo get_post_meta($post->ID, $key = '_subtitle', true); ?>
        </p>
	<?php the_title();?></h2>
	<span class="savalankhabar">w   w   w   .   e t e b a r e n o v i n   .   i   r</span>
	<div class="entry">	<?php the_content();?>
</div>
        <br>
	<div class="data text-left"></a> شماره خبر : <?php the_ID();?> - <?php the_date('l j F Y');?> ساعت <?php the_time('H:i:s');?>
	<hr>
	</div>
<div class="data text-left" dir="ltr"> <?php echo "1400";?> copyright.
	</div>
<?php
	}
}
wp_reset_postdata();	?>

	</div>

</div>
<script>
$(document).ready(function() {
print();
});
</script>
</body>

</html>
