<?php
		// NEEDS / QUESTIONS:
		// 		Day it meets -- where is this set?  In tags?
		//		Leader email address?
		//		How to differentiate based on tags?
		//		Lat/Long too specific to have on site?
		//		Get campus from group_index or from tags?  Manual in tags but seems to be set in group_index automatically

    	require_once(dirname(__FILE__) . '/lib/ca-main.php');

    	// To store our data in
    	$group_data_array = array();

    	$ca = new CityApi();
    	// $ca->debug = true;
		$ca->json = true;

		// BASIC INFORMATION
		// Get name, nickname, campus_name, unlisted (if true, change buttons in popup)
		/* {
		    "under_group_id": "2057",
		    "group_types": [
		        "CG"
		    ],
		    "search": null,
		    "total_pages": 5,
		    "per_page": 20,
		    "current_page": 1,
		    "total_entries": 90,
		    "include_inactive": false,
		    "groups": [
		        {
	            "time_zone": "",
	            "target_size": null,
	            "nearest_neighborhood_name": null,
	            "last_engaged": "11/18/2012 07:44 AM (CST)",
	            "plaza_url": "http://journeyon.onthecity.org/plaza?group_id=24434",
	            "group_type": "Community Group",
	            "admin_url": "http://journeyon.onthecity.org/admin/groups/24434",
	            "external_description": "Are you having trouble finding the group for you? Do you attend the Hanley Road Campus?\r\n\r\nYes? Please join this group. Kate Roig, your Hanley Road Administrator, and your Community Group Director, manage this group and they will be glad to talk to you and help you find a group to plug into.",
	            "started_as_seed": false,
	            "unlisted": false,
	            "updated_at": "11/15/2012 08:46 PM (GMT)",
	            "auto_approve_invites": false,
	            "created_at": "09/03/2010 03:47 PM (GMT)",
	            "nickname": "",
	            "internal_url": "http://journeyon.onthecity.org/groups/24434",
	            "external_id": "",
	            "nearest_neighborhood_id": null,
	            "api_url": "https://api.onthecity.org/groups/24434",
	            "profile_pic": "https://s3.amazonaws.com:443/thecity/accounts/29/image_attachments/191741/211876_overflowing_glass_5.jpg?Signature=cbcCvT5jnJDaqO2UTqj5U0RH%2BJQ%3D&Expires=1353709038&AWSAccessKeyId=0APJF43XSHNJKBJZXY82",
	            "inactive": false,
	            "secure": false,
	            "name": "HR | OVERFLOW Community Group",
	            "archive_scheduled": false,
	            "campus_id": null,
	            "id": 24434,
	            "parent_id": 31062,
	            "campus_name": null,
	            "default_invitation_custom_message": "Welcome to the Overflow Community Group! Thank you so much for joining. We are looking forward to what God has in store for our community this coming year. We will contact you in the coming weeks to help you find a place in a community group that is a good fit for you. Please let us know if you have any other questions!\r\n",
	            "deletion_scheduled": false
	        }, */
		$groups_index_results = $ca->groups_index(array('group_types' => "CG")); 
		$groups_object = json_decode($groups_index_results);

		for ($i=1; $i<=$groups_object->total_pages; $i++) {
			// Now that we've called it once to know total pages -- let's walk through all of them, unless we have already done so.
			if ($i != 1) {
				$groups_index_results = $ca->groups_index(array('group_types' => "CG", 'page' => $i)); 
				$groups_object = json_decode($groups_index_results);
			}

			foreach ($groups_object->groups as $group) {
				// var_dump($group->id);
				// echo "<br />ID: {$group->id}<br />";
				// 24434 = Overflow group

				// ADDRESS -- Get lat/long out of call
				// Do we ever have more than 1 address, if so FLAG IT!
				// Do we ever have no address, what do we do?
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
		    	$groups_addresses_results = $ca->groups_addresses_index($group->id);
		    	$addresses_object = json_decode($groups_addresses_results);
		    	// echo $groups_addresses_index;

		    	// TAGS
		    	// Get day, type of group
		    	$groups_tags_results = $ca->groups_tags_index($group->id);
		    	$tags_object = json_decode($groups_tags_results);
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
		    	$groups_roles_results = $ca->groups_roles_index($group->id, array('title' => 'Leaders'));
		    	$roles_object = json_decode($groups_roles_results);
		    	// echo $groups_roles_results;

		    	// Compile information ...
		    	$group_name = $group->name;
				$group_nickname = $group->nickname;
				$group_unlisted_status = $group->unlisted;
				$group_address_count = $addresses_object->total_entries;
				$group_street = $addresses_object->addresses[0]->street;
				/* $group_latitude = $addresses_object->addresses[0]->latitude;
				$group_longitude = $addresses_object->addresses[0]->longitude; */

				$group_data_array[] = array("name" => $group_name,
											"nickname" => $group_nickname,
											"unlisted" => $group_unlisted_status,
											"address_count" => $group_address_count,
											"latitude" => $group_latitude,
											"longitude" => $group_longitude
											);
			}
		}
		var_dump($group_data_array);			
	
?>