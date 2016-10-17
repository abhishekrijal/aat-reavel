	<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AAT_Reavel
 */

get_header(); ?>
<?php get_template_part('template-parts/banner-section/content','post'); ?>

	<main id="main">
		<div class="content-with-sidebar common-spacing content-left gray-bg">
			<div class="container">
				<div id="two-columns" class="row">
					<div id="content" class="col-md-9 col-sm-8">
						<div class="blog-holder no-pagination">
							<?php
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'page' );
								//the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</div>
					</div>
					<?php get_sidebar('blog');?>
				</div>
			</div>
		</div>
	</main>
<?php
get_footer();
