<?php
    	require_once(dirname(__FILE__) . '/lib/ca-main.php');

    	$ca = new CityApi();
    	// $ca->debug = true;
		$ca->json = true;

		// Get name, nickname, campus_name, unlisted (if true, change buttons in popup)
		$groups_index_results = $ca->groups_index(array('group_types' => "CG")); 
		// echo $groups_index_results;

		// groups_show (For dates?)
		// groups_addresses_show (For geocoding -- to zip code or?)
		// groups_tags_index (For type)
		// groups_roles_index (For leader last name / email address?)

    	// 24434 = Overflow group

    	// Don't think I get anything here I don't get with groups_index
    	// $groups_show_results = $ca->groups_show(24434);
    	// echo $groups_show_results;

    	$groups_addresses_index = $ca->groups_addresses_index(24434);
    	echo $groups_addresses_index;

    	$groups_tags_results = $ca->groups_tags_index(24434);
    	echo $groups_tags_results;

    	$groups_roles_results = $ca->groups_roles_index(24434);
    	echo $groups_roles_results;


?>