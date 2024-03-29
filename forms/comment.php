<?php
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

global $post, $user_identity;
$commenter = wp_get_current_commenter();
extract($commenter);
$req = get_option('require_name_email');

// if post is open to new comments
if (comments_open()) {
	// if you need to be regestered to post comments..
	if ( get_option('comment_registration') && !is_user_logged_in() ) { ?>

<p class="login-notifiaction">
	<?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'carrington-jam'), get_bloginfo('wpurl').'/wp-login.php?redirect_to='.urlencode(get_permalink())); ?>
</p>

<?php } else { ?>

<section id="respond">
    <form class="comment-form"
    	  action="<?php echo trailingslashit(get_bloginfo('wpurl')); ?>wp-comments-post.php" 
          method="post">
        
        <label class="comment-form-title">
			<?php comment_form_title(__('Post a comment', 'carrington-jam'), __('Reply to %s', 'carrington-jam')); ?>
        </label>
        <span class="cancel-reply-link">
			<?php cancel_comment_reply_link(); ?>
        </span>
        <p class="html-allowed">
        	<abbr title="<?php printf(__('You can use: %s', 'carrington-jam'), allowed_tags()); ?>">
				<?php _e('Some HTML is OK', 'carrington-jam'); ?>
        	</abbr>
        </p>
        <textarea name="comment" id="comment" rows="8" cols="40" tabindex="1"></textarea>
	
        <?php if (is_user_logged_in()) { ?>
        <p class="logged-in-as"><?php
                printf(__('Logged in as <a href="%s">%s</a>. ', 'carrington-jam'), get_bloginfo('wpurl').'/wp-admin/profile.php', $user_identity);
                wp_loginout();
            ?>
        </p>
		<?php } else { ?>
        <p class="author-name-input">
            <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="2" />
            <label for="author"><?php _e('Name', 'carrington-jam'); if ($req) { echo ' <em>' , _e('(required)', 'carrington-jam'), '</em>'; } ?></label>
        </p>
        <p class="author-email-input">
            <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="3" />
            <label for="email"><?php _e('Email', 'carrington-jam');
                $req ? $email_note = __('(required, but never shared)', 'carrington-jam') : $email_note = __('(never shared)', 'carrington-jam');
                echo ' <em>'.$email_note.'</em>';
            ?></label>
        </p>
        <p class="author-website-input">
            <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="4" />
            <label title="<?php _e('Your website address', 'carrington-jam'); ?>" for="url"><?php _e('Web', 'carrington-jam'); ?></label>
        </p>
    	<?php } //end if-else ?>
        <p class="submit-link">
            <input name="submit" type="submit" id="submit" value="<?php _e('Post comment', 'carrington-jam'); ?>" tabindex="5" />
            <?php printf(__('or, reply to this post via <a rel="trackback" href="%s">trackback</a>.', 'carrington-jam'), get_trackback_url()); ?>
        </p>
		<?php
            comment_id_fields();
            do_action('comment_form', $post->ID);
        ?>
    </form>
</section>

<?php 
	} // If registration required and not logged in 
} // If you delete this the sky will fall on your head
?>