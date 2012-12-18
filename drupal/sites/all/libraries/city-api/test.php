<?php

if (!defined('DRUPAL_ROOT')) {
  define('DRUPAL_ROOT', $_SERVER['DOCUMENT_ROOT']);
}
$base_url = "http://" . $_SERVER['HTTP_HOST'];
require_once DRUPAL_ROOT . "/includes/bootstrap.inc";
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// Get this every X minutes.
$last_timestamp = param_get('city_api_map_timestamp');
if ($last_timestamp < strtotime("-60 minutes") || isset($_GET['reload']) ) {
	param_set('city_api_map_timestamp', time());


		// NEEDS / QUESTIONS:
		// 		Day it meets -- where is this set?  In tags?
		//		Leader email address?
		//		How to differentiate based on tags?
		//		Lat/Long too specific to have on site?
		//		Get campus from group_index or from tags?  Manual in tags but seems to be set in group_index automatically
		// 		Do we ever have more than 1 address?
		// 		Do we ever have no address, what do we do?

    	require_once(dirname(__FILE__) . '/lib/ca-main.php');

    	// To store our data in
    	$group_data_array = array();
    	$group_data_map_json = array();

    	$ca = new CityApi();
    	// $ca->debug = true;
			$ca->json = true;

		// BASIC INFORMATION
		// Get name, nickname, campus_name, unlisted
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

		    	// TAGS
		    	// Get day, type of group
		    	$groups_tags_results = $ca->groups_tags_index($group->id);
		    	$tags_object = json_decode($groups_tags_results);

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

		    	// Compile information ...
		    	$group_name = $group->name;
				$group_nickname = $group->nickname;
				$group_campus = $group->campus_name;
				$group_unlisted_status = $group->unlisted;
				$group_address_count = $addresses_object->total_entries;
				$group_street = $addresses_object->addresses[0]->street;
				$group_zip_code = $addresses_object->addresses[0]->zipcode;
				$group_latitude = $addresses_object->addresses[0]->latitude;
				$group_longitude = $addresses_object->addresses[0]->longitude;

				$group_tags = array();
				$group_leaders = array();

		    	foreach($tags_object->tags as $tag) {
		    		array_push($group_tags, $tag->name);
		    	}

		    	foreach($roles_object->roles as $leader) {
		    		$group_leader_results = $ca->users_show($leader->user_id);
		    		$leader_object = json_decode($group_leader_results);

		    		array_push($group_leaders, $leader_object->email);
		    		/* {
					    "last": "Crow",
					    "type": "User",
					    "last_engaged": "11/20/2012 02:44 AM (GMT)",
					    "primary_campus_id": 2093,
					    "email": "lisacrow22@gmail.com",
					    "gender": "Female",
					    "primary_phone": "3145800022",
					    "external_id_1": null,
					    "admin_url": "http://journeyon.onthecity.org/admin/users/203051",
					    "primary_campus_name": "Tower Grove",
					    "birthdate": "1987-10-14",
					    "head_of_household": false,
					    "external_id_2": null,
					    "last_logged_in": "11/20/2012 02:44 AM (GMT)",
					    "updated_at": "11/16/2012 10:10 PM (GMT)",
					    "active": true,
					    "primary_phone_type": "Mobile",
					    "external_id_3": null,
					    "External ID": null,
					    "created_at": "11/14/2010 02:59 PM (GMT)",
					    "title": null,
					    "nickname": "",
					    "internal_url": "http://journeyon.onthecity.org/users/203051",
					    "contact_updated_at": "09/27/2012 02:05 PM (GMT)",
					    "secondary_phone": "",
					    "staff": null,
					    "api_url": "https://api.onthecity.org/users/203051",
					    "first": "Lisa",
					    "secondary_phone_type": "Home",
					    "Custom Field 2": null,
					    "member_since": null,
					    "id": 203051,
					    "external_chms_id": null,
					    "Custom Field 3": null,
					    "email_bouncing": false,
					    "middle": "",
					    "checkin_info": null
					} */
		    	}

		    	// Only place if we have name, campus, 1 address, latitude, longitude, tags, and leaders
		    	if (strlen($group_name) && strlen($group_campus) && ($group_address_count > 0) && strlen($group_latitude) && strlen($group_longitude) && (sizeof($group_tags) > 0) && (sizeof($group_leaders) > 0)) {
		    		$group_data_array[] = array("name" => $group_name,
											"nickname" => $group_nickname,
											"campus" => $group_campus,
											"unlisted" => $group_unlisted_status,
											"address_count" => $group_address_count,
											"street" => $group_street,
											"zip_code" => $group_zip_code,
											"latitude" => $group_latitude,
											"longitude" => $group_longitude,
											"tags" => $group_tags,
											"leaders" => $group_leaders);
		    	}
			}
		}

		$marker_counter = 1;
		foreach ($group_data_array as $group) {
			$group_data_map_json[] = array("marker_id" => $marker_counter,
											"latitude" => $group['latitude'],
											"longitude" => $group['longitude'],
											"draggable" => false,
											"title" => $group['name'],
											"icon" => "http://thejourney.org/sites/all/libraries/city-api/icon.png",
											"infow" => "<div class='i-box' style='background: transparent url(http://demo-ee.com/images/coffee_top_1.jpg) left top no-repeat;'>\
				<div class='i-str'>{$group['name']}</div></div>");

			$marker_counter++;
		}

	param_set('city_api_map_json', $group_data_map_json);
} else {
	$group_data_map_json = param_get('city_api_map_json');
}
?>
<html>
<head>
	<title>Testing ...</title>
	<style type="text/css">
		.info-windows {
			width: 144px;
			height: 106px;

			color: #ffedc8;
			font: "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif;
			margin: 0px;
			max-width: none;
			padding: 0px;
		}

		.info-windows img {
			margin: 0px;
			padding: 0px;
		}

		.i-box {
			width:  144px;
			height: 106px;

			color: #333;
			max-width: none;
		}

		.i-str {
			width: 106px;
			height: 18px;
			top: 80px;
			left: 32px;

			background-color: #fff;

			margin-bottom: 1px;
			padding: 6px 2px 2px 4px;
			position: absolute;
		}

		#map_canvas { height: 300px }

		#map_canvas img { max-width: none; } /* Google Map fix for Twitter bootstrap */
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="http://demo-ee.com/assets/js/google_maps/infobox.js"></script>
	<script type="text/javascript">
		(function($) {
			jQuery.fn.gogMap = function(markers_raw, custom_style) {
				var markers = [];
				var infowindows = [];
				var active_info = null;
				var options = {
					'zoom': 14,
					'center': new google.maps.LatLng(38.559979, -90.31311),
					'mapTypeId': google.maps.MapTypeId.ROADMAP
				};
				var map = new google.maps.Map(document.getElementById("map_canvas"), options);
				for (var m_id in markers_raw) {
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(markers_raw[m_id].latitude, markers_raw[m_id].longitude),
						id: (markers_raw[m_id].marker_id),
						map: map,
						title: markers_raw[m_id].title,
						icon: markers_raw[m_id].icon
					});
					markers.push(marker);
					var myOptions = {
						content: "<div>" + markers_raw[m_id].infow + "</div>",
						disableAutoPan: false,
						maxWidth: 0,
						alignBottom: true,
						pixelOffset: new google.maps.Size(-16, -11),
						zIndex: null,
						boxClass: "info-windows",
						closeBoxURL: "",
						pane: "floatPane",
						enableEventPropagation: false,
						infoBoxClearance: "10px",
						position: marker.position
					};
					var infowindow = new InfoBox(myOptions); // infoWindow w/ infobox.js
					infowindows[marker.id] = infowindow;
					google.maps.event.addListener(markers[markers.length - 1], 'click', function() {
						if (active_info) {
							infowindows[active_info].close();
						}
						active_info = this.id;
						infowindows[this.id].open(this.map);
						return false;
					});
				}
				map.setOptions({
					styles: [{
						featureType: "all",
						stylers: custom_style
					}]
				});
			}
		})(jQuery);
	</script>
	<script type="text/javascript">
	//<![CDATA[
		$(document).ready(function() {
			var markers_raw = <?php print json_encode($group_data_map_json); ?>;
			$().gogMap(markers_raw, [{ gamma: .25 },{ lightness: 0 },{ hue: "#000000" },{ visibility: "simplified" },{ saturation: 0 }]);
		});
	//]]>
	</script>
</head>
<body>
	<div id="map_canvas"></div>

	<textarea><?php print json_encode($group_data_map_json); ?></textarea>
</body>
</html>
