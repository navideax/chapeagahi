<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            دیدگاه ها
        </h2>
        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
                'avatar_size'=> 60,
                'date'=>false,
                'reply_text' => 'پاسخ',
            ) );
            ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <div class="nav-previous"><?php previous_comments_link( "قبل تر" ); ?></div>
                <div class="nav-next"><?php next_comments_link( "بعد تر" ); ?></div>
            </nav>
        <?php endif;?>
        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments">نظرات برای این مطلب بسته هستند...</p>
        <?php endif; ?>
    <?php endif;?>
    <?php comment_form(); ?>
</div>