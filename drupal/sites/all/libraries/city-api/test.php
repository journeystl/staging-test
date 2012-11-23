<?php
    	require_once(dirname(__FILE__) . '/lib/ca-main.php');

    	$ca = new CityApi();
    	// $ca->debug = true;
		$ca->json = true;

		// Get campus_name
		$groups_index_results = $ca->groups_index(array('group_types' => "CG")); 

		// groups_show (For dates?)
		// groups_addresses_show (For geocoding -- to zip code or?)
		// groups_tags_index (For type)
		// groups_roles_index (For leader last name / email address?)
    	echo $groups_index_results;

    	echo "---<br />---<br />";

    	// 24434 = Overflow group
    	$groups_show_results = $ca->groups_show(24434);
    	echo $groups_show_results;

?>