<div class="medium-6 columns gridItem">
    <div class="singleComment ">
        <div class="image"><?php echo get_avatar($comment, $size = '50'); ?></div>
        <div class="username"><?php echo get_comment_author_link(); ?></div>
        <div class="rank user">Postado <?php printf(get_comment_date(), get_comment_time()); ?>  
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <div class="thisIsSpoiler">
                Seu comentário aguarda moderação
            </div>
            <div class="comment superClose">
            <?php endif; ?>
            <div class="comment">
                <?php comment_text(); ?>
            </div>
        </div>
    </div>