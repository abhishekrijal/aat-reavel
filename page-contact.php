<?php 
/* Template Name: Contact Page */
 ?>

<?php get_header(); ?>
<main id="main">
    <div class="inner-top">
        <div class="container">
            <h1 class="inner-main-heading"><?php _e('Contact Us','aat-reavel')  ?></h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="/"><span class="icon-home"></span></a></li>
                    <li><span><?php _e('Contact', 'aat-reavel') ?></span></li>
                </ul>
            </nav>
        </div> 
    </div>
    <div class="content-block bg-white">
        <div class="container">
			<div class="row mt-70">
                <div class="col-md-6 wow fadeInLeft">
                	<?php 
                        if(have_posts()) : 
                            while(have_posts()): the_post();
                                the_content(); 
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>

        </div>
    </div>
</main>
<?php

	get_footer();