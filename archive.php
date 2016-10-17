<?php 

	global $wp_query;

	$total_results = $wp_query->found_posts;
	$is_country = is_tax('country') ? 1 : 0;
	get_header(); 
	aat_reavel_get_archive_banner();

?> 

<main id="main">

	<?php 
		if($is_country):
			get_template_part('template-parts/content', 'country');
		endif; 
	?>


	<!-- filter-options -->
	<div class="archive content-block content-sub">
		<div class="filter-option">
			<div class="container">
			<?php 

				$term = get_query_var('term');
				if(is_tax('country')) :
					printf(__('<strong class="result-info"> %s Trips are available in %s </strong>'),$total_results, $term);
				elseif(is_category()):
					printf('<strong class="result-info"> %s Trips are available in %s </strong>',$total_results, single_cat_title( '', false ));
			 	endif; 
			?>
				<div class="layout-holder">
					<div class="select-holder">
						<a href="#" class="btn btn-primary btn-filter"><i class="fa fa-sliders"></i> Filter</a>
						<div class="filter-slide">
							<div class="select-col">
								<select class="filter-select" name="activity">
									<option>Activity Type</option>
									<option value="all">All</option>
									<option value="trekking">Trekking</option>
									<option value="tour">Tours</option>
									<option value="peak-climbing">Peak Climbing</option>
									<option value="expedition">Expedition</option>
									<option value="adventure-sport">Adventure Sports</option>
								</select>
							</div>
							<div class="select-col">
								<select class="filter-select" name="duration">
									<option>Duration</option>
									<option value="all">All</option>
									<option value="1">1-5 Days</option>
									<option value="2">5-10 Days</option>
									<option value="3">10-15 Days</option>
									<option value="4">15+ Days</option>
								</select>
							</div>
							<div class="select-col">
								<select class="filter-select" name="difficulty">
									<option>Difficulty</option>
									<option value="all">All</option>
									<option value="1">Easy</option>
									<option value="2">Moderate</option>
									<option value="3">Difficult</option>
								</select>
							</div>
							<div class="select-col">
								<select class="filter-select" name="price-range">
									<option>Price Range</option>
									<option value="all">all</option>
									<option value="1">$100 - $499</option>
									<option value="2">$500 - $999</option>
									<option value="3">$1000 - $1499</option>
									<option value="4">$1500 - $2999</option>
									<option value="5">$3000+</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Section to display results/posts -->
		<div class="container">
			<div class="content-holder list-view">
				<?php
					if(have_posts()):
						while(have_posts()): the_post();
							get_template_part('template-parts/content'); 
						endwhile; wp_reset_postdata();
					endif;
				?>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>