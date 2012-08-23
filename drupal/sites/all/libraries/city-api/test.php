<?php
    	require_once(dirname(__FILE__) . '/lib/ca-main.php');

    	$ca = new CityApi();
    	// $ca->debug = true;
		$ca->json = true;

		$results = $ca->groups_index(array('group_types' => "CG")); 
    	echo $results;
?>