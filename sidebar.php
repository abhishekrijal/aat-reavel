<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AAT_Reavel
 */
?>

<?php 
	if(is_search()):
?>
<aside id="sidebar" class="sidebar">
    <div class="sidebar-holder">
		<header class="heading">
            <h3><?php _e('Search By','aat-reavel') ?></h3>
        </header>
        <div class="accordion" data-collapse>
            <?php 
                if(is_active_sidebar('search-sidebar-widget-1')){
                    dynamic_sidebar('search-sidebar-widget-1'); 
                }
            ?>
        </div>
    </div>
</aside>
<?php
	elseif('packages' === get_post_type() && is_archive()):
?>
	<aside id="sidebar" class="col-md-4 col-lg-3 sidebar sidebar-list">
        <div class="sidebar-holder">
            <header class="heading">
                <h3>FILTER</h3>
            </header>
            <div class="accordion">
                <div class="accordion-group">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">SELECT COUNTRY</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body">
                            <ul class="side-list region-list hovered-list">
                                <li>
                                    <a href="#">
                                        <span class="text">Nepal</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Bhutan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Tibet</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">Select Activity type</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body">
                            <ul class="side-list hovered-list">
                                <li>
                                    <a href="#">
                                        <span class="text">Trekkings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Tours</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Peak Climbing</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Rafting</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4">Activity level</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body">
                            <ul class="side-list horizontal-list hovered-list">
                                <li>
                                    <a href="#">
                                        <span class="icon-level1"></span>
                                        <span class="popup">
                                            Easy
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon-level4"></span>
                                        <span class="popup">
                                            Medium
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon-level8"></span>
                                        <span class="popup">
                                            Hard
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse5" aria-expanded="true" aria-controls="collapse5">Price range</a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" readonly class="price-input">
                            <div id="ammount" class="price-input">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-group">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" href="#collapse6" aria-expanded="true" aria-controls="collapse6">community poll</a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse in" role="tabpanel">
                        <div class="panel-body">
                            <strong class="title">What shoes do your prefer on hiking trips?</strong>
                            <ul class="side-list check-list">
                                <li>
                                    <label for="check1" class="custom-checkbox">
                                        <input id="check1" type="checkbox">
                                        <span class="check-input"></span>
                                        <span class="check-label">Hiking Boots</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="check2" class="custom-checkbox">
                                        <input id="check2" type="checkbox">
                                        <span class="check-input"></span>
                                        <span class="check-label">Hiking Boots</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="check3" class="custom-checkbox">
                                        <input id="check3" type="checkbox">
                                        <span class="check-input"></span>
                                        <span class="check-label">Hiking Boots</span>
                                    </label>
                                </li>
                                <li>
                                    <label for="check4" class="custom-checkbox">
                                        <input id="check4" type="checkbox">
                                        <span class="check-input"></span>
                                        <span class="check-label">Hiking Boots</span>
                                    </label>
                                </li>
                            </ul>
                            <strong class="sub-link"><a href="#">CAST YOUR VOTE</a></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
<?php
	else :
?>
<aside id="sidebar" class="sidebar">
    <div class="sidebar-holder">
        <div class="accordion" id="sidebar-accordion">
            <?php 
                if(is_active_sidebar('blog-sidebar-widget-1')){
                    dynamic_sidebar('blog-sidebar-widget-1'); 
                }   
            ?>
        </div>
    </div>
</aside>
<?php
	endif;

