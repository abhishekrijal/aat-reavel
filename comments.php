<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AAT_Reavel
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} 
?> 
<div id="comments" class="comments">
	<span class="title"><?php _e('COMMENTS','aat-reavel') ?></span>
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'aat-reavel' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'aat-reavel' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'aat-reavel' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
		<ul>
			<?php
				$args = array(
					'walker' => '',
					'max-depth' => '',
					'style' => 'ul',
					'avatar_size' => '64',
					'reverse_top_level' => true,
					'reverse_children' => true,
					'echo' => true
				);
				wp_list_comments($args);
			?>
		</ul>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'aat-reavel' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'aat-reavel' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'aat-reavel' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'aat-reavel' ); ?></p>
	<?php
	endif;
?>
<div class="row">
	<div class="col-md-12">
<?php
	$fields = array(
		'author' => '<div class="col-md-6"><div class="form-group name"><input placeholder="Full Name" type="text" class="form-control" name="author">
</div></div>',
		'email' => '<div class="col-md-6"><div class="form-group email"><input placeholder="Email Address" type="email" name="email" class="form-control"></div></div>',
	);
	$args = array(
		'fields' => apply_filters('comment_form_default_fields', $fields ),
		'comment_field' => '<div class="form-group"><textarea placeholder="Your Comment" class="form-control" name="comment"></textarea></div>',
		'class_submit' => 'btn btn-default'
	);
	comment_form($args);
	?>
	</div>
</div>
</div>
