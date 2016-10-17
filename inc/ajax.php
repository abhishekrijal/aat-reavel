<?php

	function find_trips_by_param(){
		$search_params = $_POST['search_params'];
		$country = $search_params['destination'];
		$activity = $search_params['activity'];

		$args = array(
			'post_type' => 'packages',
			'tax_query' => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'country',
					'field' => 'slug',
					'terms' => array($country)
				) ,
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => array($activity)
				)
			),
			'posts_per_page' => 50
		);

		$q = new WP_Query($args);
		if($q->have_posts()) : 
			$result = '<table class="result">
				<thead>
					<tr>
						<th>Trip Name</th>
						<th>Price</th>
						<th>Duration</th>
						<th>Max. Altitude</th>
					</tr>
				</thead>';
			$result .= '<tbody>';
			while($q->have_posts()) :
				$q->the_post();
					$result .= '<tr>';
					$result .= '<td><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></td>';
					$result .= '<td>' . CFS()->get('package_price') . '</td>';
					$result .= '<td>' . CFS()->get('days') . '</td>';
					$result .= '<td>' . CFS()->get('max_altitude') . '</td>';
					$result .= '</tr>';
			endwhile; wp_reset_postdata(); 
			$result .= '</tbody>';
			$result .= 	'</table>';
		else : 
			$result = '';
		endif;

		echo $result;
		die();
	}

	add_action('wp_ajax_find_trips_by_param','find_trips_by_param');
	add_action('wp_ajax_nopriv_find_trips_by_param','find_trips_by_param');

	function aat_reavel_get_a_package(){
		$c_id = $_POST['p_id'];
		$q = new WP_Query(array('p' => $c_id,'post_type'=>'packages'));

		$package_data = array();
		if($q->have_posts()):
			while($q->have_posts()): $q->the_post();
				$package_data['shortDesc'] = CFS()->get('short_description');
				$package_data['costInc'] = CFS()->get( 'cost_includes' );
				$package_data['costExc'] = CFS()->get( 'cost_excludes' );
				$itinerary = CFS()->get('itinerary');
				$itinerary_string = '';
				foreach($itinerary as $k => $v):
					$itinerary_string .= "<span>{$v['day']}</span><span>{$v['outline_itinerary']}</span>";
				endforeach;
				$trip_facts = array();
				if(!empty(CFS()->get('days'))){
					$trip_facts['duration'] = CFS()->get('days');
				}
				if(!empty(CFS()->get('package_price'))){
					$trip_facts['price'] = '$' . CFS()->get('package_price');
				}
				if(!empty(CFS()->get('best_season'))){
					$trip_facts['bestSeason'] = CFS()->get('best_season');
				}
				if(!empty(CFS()->get('grade'))){
					$grade = CFS()->get('grade');
					foreach($grade as $v){
						$trip_facts['grade'] = $v;
					}
				}
				if(!empty(CFS()->get('max_altitude'))){
					$trip_facts['maxAltitude'] = CFS()->get('max_altitude');
				}
				if(!empty(CFS()->get('activities'))){
					$trip_facts['activities'] = CFS()->get('activities');
				}
				$package_data['tripFacts'] = $trip_facts;
				$package_data['itinerary'] = $itinerary_string;
				endwhile;
		endif;
		header('Content-Type: application/json');
		$package_data = json_encode($package_data);
		echo $package_data;
		wp_reset_postdata();
		die();
		
	}

	add_action('wp_ajax_aat_reavel_get_a_package','aat_reavel_get_a_package');
	add_action('wp_ajax_nopriv_aat_reavel_get_a_package','aat_reavel_get_a_package');