<?php
	//search form

?>
<form class="sidebar-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	  <fieldset>
	    <div class="form-group">
	        <input type="text" class="form-control" name="s" value="<?php echo get_search_query(); ?>">
	    </div>
	    <div class="form-group">
	    	<div class="radio">
          <label>
            <input type="radio" name="post_type" id="optionsRadios1" value="packages" checked="">
            Search for Packages
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="post_type" id="optionsRadios2" value="post">
            Search for Blog Posts
          </label>
        </div>
	    </div>
	    <div class="form-group">
	        <input type="submit" class="form-control" id="inputEmail" value="Search">
	    </div>
	 </fieldset>
 </form>