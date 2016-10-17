<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package AAT_Reavel
 */

get_header(); ?>
<main id="main">
    <div class="inner-top">
        <div class="container">
            <h1 class="inner-main-heading"><?php _e('Search Results','aat-reavel')  ?></h1>
        </div>
    </div>
    <div class="gallery-content">
    <div class="filter-tab-wrapper">
        <div class="filter-tab">
            <ul>
                <li><a href="#">Trekking</a></li>
                <li><a href="#">Tours</a></li>
                <li><a href="#">Rafting</a></li>
            </ul>
        </div>
    </div>
    <section class="trip-gallery">
        <div class="content-holder list-view">
            <?php
                if(have_posts()):
                    while(have_posts()): the_post();
                        get_template_part('template-parts/content');
                    endwhile; wp_reset_postdata();
                endif;
            ?>
        </div>
    </section>
    <div class="filters">
        <form class="filter-options">
            <div class="sidebar-holder">
                <div class="accordion">
                    <div class="accordion-group">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" href="#filter1" aria-expanded="true" aria-controls="collapse1">SELECT COUNTRY</a>
                            </h4>
                        </div>
                        <div id="filter1" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <ul class="side-list">
                                    <?php 
                                        $terms = get_terms(array('taxonomy'=>'country')); 
                                        //print_r($terms);
                                        $i = 1;
                                        foreach ($terms as $term) : 
                                    ?>
                                    <li>
                                        <input class="filter" type="checkbox" id="<?= 'country'.$i; ?>" name="filterBy[country]" value="<?= $term->term_id; ?>">
                                        <label for="<?= 'country'.$i; ?>"><span></span><?= $term->name; ?></label>
                                    </li>
                                <?php $i++; endforeach; ?>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" href="#filter2" aria-expanded="true" aria-controls="filter2" class="">Activity type</a>
                            </h4>
                        </div>
                        <div id="filter2" class="panel-collapse collapse in" role="tabpanel" aria-expanded="true">
                            <div class="panel-body">
                                <ul class="side-list activity-type">
                                    <li>
                                        <input id="activity1" type="checkbox" name="filterBy[activity]" value="6">
                                        <label for="activity1"><span></span>Trekking</label>
                                    </li>
                                    <li>
                                        <input id="activity2" type="checkbox" name="filterBy[activity]" value="6">
                                        <label for="activity2"><span></span>Tours</label>
                                    </li>
                                    <li>
                                        <input id="activity3" type="checkbox" name="filterBy[activity]" value="6">
                                        <label for="activity3"><span></span>Peak Climbing</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" href="#filter3" aria-expanded="true" aria-controls="filter3" class="">Activity level</a>
                            </h4>
                        </div>
                        <div id="filter3" class="panel-collapse collapse in" role="tabpanel" aria-expanded="true">
                            <div class="panel-body">
                                <ul class="side-list activity-level">
                                    <li>
                                        <input id="activity-level-1" type="checkbox" name="filterBy[activity]" value="6">
                                        <label for="activity-level-1"><span class="icon-level1"></span>easy</label>
                                    </li>
                                    <li>
                                        <input id="activity-level-2" type="checkbox" name="filterBy[activity]" value="6">
                                        <label for="activity-level-2"><span class="icon-level4"></span>moderate</label>
                                    </li>
                                    <li>
                                        <input id="activity-level-3" type="checkbox" name="filterBy[activity]" value="6">
                                        <label for="activity-level-3"><span class="icon-level8"></span>hard</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" href="#filter4" aria-expanded="true" aria-controls="filter4">Price range</a>
                            </h4>
                        </div>
                        <div id="filter4" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 13.3333%; width: 52.3667%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 13.3333%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 65.7%;"></span></div>
                                <input type="text" id="amount" readonly="" class="price-input">
                                <div id="ammount" class="price-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <a href="#" class="close"><i class="icon-cross"></i></a>
    </div>
    <a href="#" class="filters-trigger"><i class="fa fa-sliders"></i>Filters</a>
    </div>
</main>
<!-- end of new layout -->
<?php
get_footer();
