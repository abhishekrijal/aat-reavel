<?php get_header(); ?>
    <main id="main">

   		<div class="inner-top">
	        <div class="container">
	            <h1 class="inner-main-heading"><?php _e('Contact Us','aat-reavel')  ?></h1>
	            <nav class="breadcrumbs">
	                <ul>
	                    <li><a href="/"><span class="icon-home"></span></a></li>
	                    <li><span>About</span></li>
	                </ul>
	            </nav>
	        </div> 
	    </div>
		<?php 
            if(have_posts()) : 
                while(have_posts()): the_post();
                    the_content(); 
                endwhile;
            endif;
        ?>
    </main>
<?php

	get_footer();