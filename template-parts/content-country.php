<?php 

//getting taxonomy term of current archive
$tax_term = $wp_query->get_queried_object()->slug;

//creating page slug to retrive page content
$page_path = $tax_term . '-info';

//getting page content if page exist
$page = get_page_by_path($page_path);
$page_id = $page->ID;

?>
<div class="content-intro">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9 text-holder">
				<?php echo $page->post_content; ?>
			</div>
			<div class="col-sm-4 col-md-3 map-col">
				<div class="holder">
					<div class="map-holder">
						<?php echo get_the_post_thumbnail($page_id); ?>
					</div>
					<div class="info">
						<div class="slot">
							<strong>Best Season:</strong>
							<span class="sub">Jan-Feb, Mar-Jun, Oct-Dec</span>
						</div>
						<div class="slot">
							<strong>Popular Location:</strong>
							<span class="sub">Phuket, Bangkok, Ching Mai</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>