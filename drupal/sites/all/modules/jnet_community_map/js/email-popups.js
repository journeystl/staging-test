  // function pageDarken() {
  //   document.getElementById('pageDarken').style['width'] = window.innerWidth;
  //   document.getElementById('pageDarken').style['height'] = window.innerHeight;
  //   document.getElementById('pageDarken').style['display'] = 'block';
  // }
  function joinGroup(leaderEmail, groupID, groupName, groupType, kidFriendly, meetingDays) {
    //pageDarken();
    //document.getElementById('joinRequestPopup').style['display'] = 'block';

    jQuery("#joinRequestPopup").reveal();

    jQuery("#edit-leader-email").val(leaderEmail);
    jQuery("#edit-group-id").val(groupID);
    jQuery("#edit-group-name").val(groupName);
    jQuery("#edit-group-kids").val(kidFriendly);
    jQuery("#edit-group-days").val(meetingDays);


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

    jQuery("#edit-leader-email--2").val(leaderEmail);
    jQuery("#edit-group-id--2").val(groupID);
    jQuery("#edit-group-name--2").val(groupName);
    jQuery("#edit-group-kids--2").val(kidFriendly);
    jQuery("#edit-group-days--2").val(meetingDays);

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
