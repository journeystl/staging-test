  var markers = [];

  // Active marker groups

  var activeChurch  = "";
  var activeDay     = "";
  var activeType    = "";

  // Different church marker groups
  var towerGroveMarkers = [];
  var hanleyRoadMarkers = [];
  var westCountyMarkers = [];
  var bellevilleMarkers = [];

  // Different meeting day marker groups

  var mondayMarkers   = [];
  var tuesdayMarkers  = [];
  var wednesdayMarkers= [];
  var thursdayMarkers = [];
  var fridayMarkers   = [];
  var saturdayMarkers = [];
  var sundayMarkers   = [];

  // Different select-type marker groups

  var mixedMarkers    = [];
  var marriedMarkers    = [];
  var singleMarkers     = [];
  var kidFriendlyMarkers  = [];

  // Array of arrays of groups

  // !Important to have these match the values in the JSON

  var churchGroups    = ["Any Church", "Tower Grove", "Hanley Road", "West County", "Metro East", "Southern Illinois"];
  var dayGroups     = ["Any Day", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
  // Removing Married/Single -- var typeGroups      = ["Any Type", "Mixed (Married & Single)", "Married", "Single"];
  var typeGroups      = ["Any Type", "Mixed (Married & Single)"];


  var displayGroups = new Array(churchGroups.length);

  for (var i = 0; i < churchGroups.length; i++) {
    displayGroups[i] = new Array(dayGroups.length);
    for (var j = 0; j < dayGroups.length; j++) {
      displayGroups[i][j] = new Array(typeGroups.length);
      for (var k = 0; k < typeGroups.length; k++) {
        displayGroups[i][j][k] = new Array();
      }
    }
  }

  (function($) {
    jQuery.fn.gogMap = function(markers_raw, custom_style) {

      var userLoc =  new google.maps.LatLng(38.559979, -90.31311);

      // If the user location is available, grab the latitude and longitude
      if(navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function(position) {
          userLoc =  new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        });
      }

      var infowindows = [];
      var active_info = null;
      var options = {
        'zoom': 14,
        'disableDefaultUI': true,
        'center': new google.maps.LatLng(38.559979, -90.31311),
        'mapTypeId': google.maps.MapTypeId.ROADMAP,
        'maxZoom' : 16,
        'minZoom' : 9,
        'zoomControl' : true
      };
      var map = new google.maps.Map(document.getElementById("map_canvas"), options);


      $(document).ready(function() {
        // Build out select menus based on group arrays
        for (var i = 0; i < churchGroups.length; i++) {
          var option = document.createElement("option");
          if (i == 0) {
            option.text = "Select your home church...";
          } else {
            option.text = churchGroups[i];
          }
          option.value = i;
          document.getElementById("select-church").appendChild(option);
        }

        for (var i = 0; i < dayGroups.length; i++) {
          var option = document.createElement("option");
          option.text = dayGroups[i];
          option.value = i;
          document.getElementById("select-day").appendChild(option);
        }

        for (var i = 0; i < typeGroups.length; i++) {
          var option = document.createElement("option");
          option.text = typeGroups[i];
          option.value = i;
          document.getElementById("select-type").appendChild(option);
        }

        $.foundation.customForms.appendCustomMarkup();

        function selectMenu() {

          if (active_info) {
            infowindows[active_info].close();
          }

          var i = document.getElementById("select-church").value;
          var j = document.getElementById("select-day").value;
          var k = document.getElementById("select-type").value;

          for (var l = 0; l < markers.length; l++) {
            markers[l].setVisible(false);
            markers[l].display = false;
          }


          for (var m = 0; m < displayGroups[i][j][k].length; m++) {
            displayGroups[i][j][k][m].setVisible(true);
            displayGroups[i][j][k][m].display = true;;
            if (document.getElementById("kidFriendly").checked && !displayGroups[i][j][k][m].kidFriendly) {
              displayGroups[i][j][k][m].setVisible(false);
            }
          }
        }

        document.getElementById("select-church").onchange = function() {selectMenu()};
        document.getElementById("select-day").onchange = function() {selectMenu()};
        document.getElementById("select-type").onchange = function() {selectMenu()};


        document.getElementById("centerMap").onclick = function() { if (userLoc) { map.setCenter(userLoc) }};


        function binaryFilter(checkBoxID) {

          infowindows[active_info].close();

          if (document.getElementById(checkBoxID).checked) {
            for (var i = 0; i < markers.length; i++) {
              if (markers[i].display && !markers[i].kidFriendly) {
                markers[i].setVisible(false);
              }
            }
          } else {
            for (var i = 0; i < markers.length; i++) {
              if (markers[i].display) {
                markers[i].setVisible(true);
              }
            }
          }
        }

        document.getElementById("kidFriendly").onclick = function() { binaryFilter("kidFriendly")};
      });

      google.maps.event.addListener(map, "click", function() {
           if (active_info) {
                infowindows[active_info].close();
           }
        });

      for (var m_id in markers_raw) {

        var plusOrMinus = Math.random() < 0.5 ? -1 : 1;

        var randomLat = markers_raw[m_id].latitude + (plusOrMinus * (Math.random()*.002) + .001); // Randomize Latitude
        var randomLng = markers_raw[m_id].longitude + (plusOrMinus * (Math.random()*.002) + .001); // Randomize Longitude

        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(randomLat, randomLng),
          id: (markers_raw[m_id].marker_id),
          map: map,
          title: "Group Name",
          icon: "http://thejourney.org/sites/all/modules/jnet_community_map/images/group-icon-002.png",
          groupId: m_id,
          churchIndex: 0,
          dayIndex: [],
          typeIndex: 0,
          display: true,
          kidFriendly: false

        });
        markers.push(marker);

        // Set churchIndex by finding campus value from the campus variable
        marker.churchIndex = churchGroups.indexOf(markers_raw[m_id].campus.replace(/^\s+|\s+$/g,''));


        // Set dayIndex by finding day value from tags
        for (var i = 0; i < markers_raw[m_id].tags.length; i++) {
          if (markers_raw[m_id].tags[i] && markers_raw[m_id].tags[i].split(" | ")[0] == "Day") {
            marker.dayIndex.push(dayGroups.indexOf(markers_raw[m_id].tags[i].split("| ")[1]));
          }
        }

        // Found no day, add to every day
        if (marker.dayIndex.length == 0) {
          marker.dayIndex.push(0);
        }

        var markerTypesString = "";

        for (var i = 3; i < markers_raw[m_id].tags.length; i++) {
          if (markers_raw[m_id].tags[i]) {
            var markerType = markers_raw[m_id].tags[i].split('| ');
            markerTypesString += markerType[1];
          }
        }

        var kidFriendlyString = "";

        // Use kidFriendly variable later for use with the checkbox
        if (markerTypesString.indexOf("Kid-Friendly") != -1) {
          marker.kidFriendly = true;
          kidFriendlyString = ", Kid-Friendly";
        }

        if (markerTypesString.indexOf("Single") != -1) {
          marker.typeIndex = 2;
        } else if (markerTypesString.indexOf("Married") != -1) {
          marker.typeIndex = 3;
        }

        if (markerTypesString.indexOf("Mixed") != -1) {
          marker.typeIndex = 1;
        }

        // Add marker to appropriate display group
        for (var i = 0; i < marker.dayIndex.length; i++) {

          displayGroups[marker.churchIndex][marker.dayIndex[i]][marker.typeIndex].push(marker);

          // Add to these groups in order to have the "any" options work.
          displayGroups[0][marker.dayIndex[i]][marker.typeIndex].push(marker);
          displayGroups[marker.churchIndex][0][marker.typeIndex].push(marker);
          displayGroups[marker.churchIndex][marker.dayIndex[i]][0].push(marker);
          displayGroups[0][0][marker.typeIndex].push(marker);
          displayGroups[marker.churchIndex][0][0].push(marker);
          displayGroups[0][marker.dayIndex][0].push(marker);

        }

        displayGroups[0][0][0].push(marker);

        function dayChecker(idx) {
          if (marker.dayIndex.indexOf(idx) != -1) {
            return "activeDay";
          }
        }

        function returnType(idx) {
          if (idx == 1) {
            return "Mixed (Married and Single)";
          }
          if (idx == 2) {
            return "Single";
          }

          if (idx == 3) {
            return "Married";
          }
          else {
            return "";
          }
        }

        var daysString = "";

        if (marker.dayIndex.indexOf(0) == -1) {
          for (var i = 0; i < marker.dayIndex.length; i++) {
            daysString += dayGroups[marker.dayIndex[i]];
            if (i != (marker.dayIndex.length-1)) {
              daysString += "|";
            }
          }
        }

        if (markers_raw[m_id].title) { marker.title = markers_raw[m_id].title; }

        var titleStatus = "active";
        var churchStatus = "active";
        var typeStatus = "active";

        if (marker.title == 'Group Name') {
          titleStatus = "inactive";
        }

        if (!markers_raw[m_id].campus) {
          churchStatus = "inactive";
        }

        if ((marker.typeIndex == 0) && (!marker.kidFriendly)) {
          typeStatus = "inactive";
        }

        var markerWindow =
        "<h1 class='" + titleStatus + "'>" + marker.title + "</h1>" +
        "<h2 class='church-label " + churchStatus + "'>" + markers_raw[m_id].campus.replace(/^\s+|\s+$/g,'') + "</h2>" +
        "<div class='dayBox label radius secondary'><span class='" + dayChecker(1) +  "'>M</span><span class='" + dayChecker(2) +  "'>T</span><span class='" + dayChecker(3) +  "'>W</span><span class='" + dayChecker(4) +  "'>R</span><span class='" + dayChecker(5) +  "'>F</span><span class='" + dayChecker(6) +  "'>S</span><span class='" + dayChecker(7) +  "'>S</span></div>"+
        "<hr>" +
        "<h2 class='" + typeStatus + "'>" + typeGroups[marker.typeIndex] + kidFriendlyString + "</h2>" +
        "<ul class='button-group radius'><li><a href='javascript:;' onclick='joinGroup(\""+
              m_id + "\",\"" + marker.title + "\",\"" + returnType(marker.typeIndex) +
              "\",\"" + marker.kidFriendly + "\",\""+ daysString +
              "\")' class='joinGroup button radius small'>Request to Join</a></li>"+
        "<li><a href='javascript:;' onclick='reportError(\""+
              m_id + "\",\"" + marker.title + "\",\"" + returnType(marker.typeIndex) +
              "\",\"" + marker.kidFriendly + "\",\""+ daysString +
              "\")' class='reportError button radius small'>Report Incorrect Info</a></li></ul>";

        var myOptions = {
          content: "<div>" + markerWindow + "</div>",
          disableAutoPan: false,
          maxWidth: 0,
          alignBottom: true,
          pixelOffset: new google.maps.Size(0, -40),
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



          // map.setCenter(markers[markers.length - 1].position);
          return false;
        });


      }
      map.setOptions({
        styles: [{
          featureType: "all",
          stylers: "default"
        }]
      });
    }
  })(jQuery);
