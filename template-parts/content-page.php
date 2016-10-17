<?php
/**
 * Template part for displaying page content in page.php.
 * //template part for displaying a single blog post in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AAT_Reavel
 */

?>
<article id="post-<?php the_ID();?>" class="clearfix blogpost full" >
	<?php
			
		if ( is_single() ) {
				the_title( '<h1 class="content-main-heading">', '</h1>' );
			} else {
				the_title( '<h2 class="content-main-heading"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		//if ( 'post' === get_post_type() ) : 
	?>
	<div class="blogpost blogpost-body">
		<div class="side">
			<div class="post-info">
               <span class="day"><?php echo get_the_date('d'); ?></span>
                <span class="month"><?php echo get_the_date('M Y'); ?></span>
            </div>
		</div>
		<div class="blogpost-content">
			<header>By <a href="#"><?= get_the_author(); ?> </a></header>
			<?php if(has_post_thumbnail()){ ?>
			<div class="img-wrap">
					<?php the_post_thumbnail();?>
			</div>
			<?php } ?>
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'aat-reavel' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aat-reavel' ),
					'after'  => '</div>',
				) );
			?>
		</div>
		<footer class="clearfix">
			<ul class="links pull-left">
				<li><i class="fa fa-comment-o pr-5"></i> <?= wp_count_comments(get_the_ID())->total_comments; ?> comments |</li> 
				<li><i class="fa fa-tags pr-5"></i> 
				<?php 
					$tags = wp_get_post_tags($post->ID);
					$all_tags = ''; 
					foreach ($tags as $v){
						$tag_id = $v->term_id;
						$all_tags .= '<a href="'. get_tag_link($tag_id) .'">';
						$all_tags .=  $v->name;
						$all_tags .= '</a> ';
					}
					echo $all_tags;
				?> 
				</li>
			</ul>
		</footer>
	</div>
</article>