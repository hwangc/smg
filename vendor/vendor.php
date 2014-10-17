<?php
/*
 * smg posted on
 */
function smg_posted_on($author_id = 0) {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	// if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
	// 	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	// }

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
		// esc_attr( get_the_modified_date( 'c' ) ),
		// esc_html( get_the_modified_date() )
	);

	$archive_year  = get_the_time('Y'); 
	$archive_month = get_the_time('m'); 
	$archive_day   = get_the_time('d'); 
	if(!$author_id) {
		$author_id = get_the_author_meta( 'ID' );
	}

	$posted_on = sprintf(
		_x( '%s', 'post date', 'hwangc' ),
		'<a href="' . esc_url( get_day_link( $archive_year, $archive_month, $archive_day) ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( ' by %s', 'post author', 'hwangc' ),
		'<span class="author vcard"><a class="url fn n userpro-tip" original-title="'. get_the_author() .'" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . get_avatar( $author_id, 32 ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}

/*
 * smg excerpt
 */

// function smg_excerpt($length) {
// 	return 40;
// }

// add_filter( 'excerpt_length', 'smg_excerpt', 999 );

// function smg_excerpt_more($more) {
//     global $post;
// 	return '<span style="color:red;font-weight:bolder;">...</span>';
// }
//add_filter('excerpt_more', 'smg_excerpt_more');


/*
 * remove admin bump
 */
add_action('get_header', 'smg_filter_head');

function smg_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

/*
 * smg comment form
 */
function smg_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<header class="comment-header">
		<div class="comment-author vcard">
		<?php 
			// $home_url = get_home_url();
			// $comment_id = get_comment_ID();
			// $user_id = $comment_id->user_id;
			// $avatar_img = get_avatar($comment, $args['avatar_size'] );

			if ( $args['avatar_size'] != 0 ) echo '<a href="' . get_home_url( ) . '/profile/' . $comment->user_id . '">'.get_avatar( $comment, $args['avatar_size'] ).'</a>'; ?>
		<?php printf( __( '<cite class="fn"><i class="fa fa-user"></i> %s <span class="says">says:</span></cite> ' ), get_comment_author_link() ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata">
			<i class="fa fa-clock-o"></i><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>
	</header>
	<div class="comment-content">
		<?php comment_text(); ?>
	</div>

	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/*
 * excerpt html
 */
function smg_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<strong>'; 
    }

if ( ! function_exists( 'smg_custom_wp_trim_excerpt' ) ) : 

    function smg_custom_wp_trim_excerpt($smg_excerpt) {
    global $post;
    $raw_excerpt = $smg_excerpt;
        if ( '' == $smg_excerpt ) {

            $smg_excerpt = get_the_content('');
            $smg_excerpt = strip_shortcodes( $smg_excerpt );
            $smg_excerpt = apply_filters('the_content', $smg_excerpt);
            $smg_excerpt = str_replace(']]>', ']]&gt;', $smg_excerpt);
            $smg_excerpt = strip_tags($smg_excerpt, smg_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 40;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $smg_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_word_count && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) { 
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $smg_excerpt = trim(force_balance_tags($excerptOutput));

                // $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'smg' ), get_the_title()) . '</a>'; 
                // $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($smg_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$smg_excerpt = substr_replace($smg_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                // $smg_excerpt .= $excerpt_end; /*Add read more in new paragraph */

            return $smg_excerpt;   

        }
        return apply_filters('smg_custom_wp_trim_excerpt', $smg_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'smg_custom_wp_trim_excerpt');


/*
 * Modify the footer credits for JetPack Inifite Scroll
 */
add_filter('infinite_scroll_credit','smg_infinite_scroll_credit');

function smg_infinite_scroll_credit(){
	$content = '<a href="http://newharvestsarang.org/" title="Proudly powered by NHM">Proudly powered by NHM</a>';
	return $content;
}
/** End JetPack **/