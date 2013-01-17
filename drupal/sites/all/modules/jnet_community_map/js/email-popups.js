  // function pageDarken() {
  //   document.getElementById('pageDarken').style['width'] = window.innerWidth;
  //   document.getElementById('pageDarken').style['height'] = window.innerHeight;
  //   document.getElementById('pageDarken').style['display'] = 'block';
  // }
  function joinGroup(leaderEmail, groupID, groupName, groupType, kidFriendly, meetingDays, churchName) {
    //pageDarken();
    //document.getElementById('joinRequestPopup').style['display'] = 'block';

    jQuery("#joinRequestPopup").reveal();

    jQuery(".field-leader-email").val(leaderEmail);
    jQuery(".field-group-id").val(groupID);
    jQuery(".field-group-name").val(groupName);
    jQuery(".field-group-kids").val(kidFriendly);
    jQuery(".field-group-days").val(meetingDays);
    jQuery(".field-group-church").val(churchName);

    var type = 'request';

    jQuery('.field-type').val(type);


    // // Set action - GET variables
    // var phpScript = "send_email.php";
    // var action =
    //   //change websupport@thejourney.org to leaderEmail
    //   phpScript + "?to=" + "websupport@thejourney.org" + "&id=" + groupID + "&title=" +
    //   groupName + "&type=" + groupType + "&kidFriendly=" + kidFriendly + "&days=" + meetingDays + "&subject=Request to Join";

    // document.getElementById('joinRequestForm').action = action;

  }

  function reportError(leaderEmail, groupID, groupName, groupType, kidFriendly, meetingDays) {
    // pageDarken();
    // document.getElementById('reportErrorPopup').style['display'] = 'block';

    jQuery("#reportErrorPopup").reveal();

    jQuery(".field-leader-email").val(leaderEmail);
    jQuery(".field-group-id").val(groupID);
    jQuery(".field-group-name").val(groupName);
    jQuery(".field-group-kids").val(kidFriendly);
    jQuery(".field-group-days").val(meetingDays);
    jQuery(".field-group-church").val(churchName);

    var type = 'report';

    jQuery('.field-type').val(type);

    // // Set action - GET variables
    // var phpScript = "send_email.php";
    // var action =
    //   //change websupport@thejourney.org to leaderEmail
    //   phpScript + "?to=" + "websupport@thejourney.org" + "&id=" + groupID + "&title=" +
    //   groupName + "&type=" + groupType + "&kidFriendly=" + kidFriendly + "&days=" + meetingDays + "&subject=Request to Join";

    // document.getElementById('reportErrorForm').action = action;
  }

// (function ($) {
//   $(document).ready(function() {

//     // Position email popups
//     //document.getElementById('joinRequestPopup').style['marginLeft'] = (window.innerWidth / 2) - 250;
//     //document.getElementById('reportErrorPopup').style['marginLeft'] = (window.innerWidth / 2) - 250;

//     $('.close').click(function() {
//       this.parentNode.style['display'] = 'none';
//       document.getElementById('pageDarken').style['display'] = 'none';
//     });
//   });

//})(jQuery);
