<?php
		// NEEDS / QUESTIONS:
		// 		Day it meets -- where is this set?  In tags?
		//		Leader email address?
		//		How to differentiate based on tags?
		//		Lat/Long too specific to have on site?
		//		Get campus from group_index or from tags?  Manual in tags but seems to be set in group_index automatically

    	require_once(dirname(__FILE__) . '/lib/ca-main.php');

    	$ca = new CityApi();
    	// $ca->debug = true;
		$ca->json = true;

		// BASIC INFORMATION
		// Get name, nickname, campus_name, unlisted (if true, change buttons in popup)
		$groups_index_results = $ca->groups_index(array('group_types' => "CG")); 
		echo $groups_index_results;

    	// 24434 = Overflow group

		// ADDRESS -- Get lat/long out of call
		// Do we ever have more than 1 address, if so FLAG IT!
		/* {
		    "total_pages": 1,
		    "per_page": 20,
		    "current_page": 1,
		    "addresses": [
		        {
		            "location_type": "Host",
		            "city": "St. Louis",
		            "street": "7701 Maryland Ave",
		            "latitude": 38.651321,
		            "group_external_id": "",
		            "updated_at": "09/07/2012 08:29 PM (GMT)",
		            "street2": "",
		            "group_id": 24434,
		            "created_at": "09/03/2010 03:48 PM (GMT)",
		            "zipcode": "63105",
		            "longitude": -90.333914,
		            "id": 93886,
		            "state": "MO",
		            "privacy": "Private"
		        }
		    ],
		    "total_entries": 1
		} */
    	$groups_addresses_index = $ca->groups_addresses_index(24434);
    	// echo $groups_addresses_index;

    	// TAGS
    	// Get day, type of group
    	$groups_tags_results = $ca->groups_tags_index(24434);
    	// echo $groups_tags_results;

    	// LEADER INFORMATION
    	// Search for title: leader --> NOTE: Leaders, not Leader WTC?
    	// If we don't have one, flag it.
    	/* {
		    "roles": [
		    	{
		            "user_type": "User",
		            "last_engaged": "10/30/2012",
		            "user_name": "Kevin Frank",
		            "active": true,
		            "user_api_url": "https://api.onthecity.org/users/56346",
		            "created_at": "09/09/2012",
		            "title": "Leader",
		            "id": 2516013,
		            "user_id": 56346
		        }, */
    	$groups_roles_results = $ca->groups_roles_index(24434, array('title' => 'Leaders'));
    	// echo $groups_roles_results;
?>