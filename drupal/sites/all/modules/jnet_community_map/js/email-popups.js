  function pageDarken() {
    document.getElementById('pageDarken').style['width'] = window.innerWidth;
    document.getElementById('pageDarken').style['height'] = window.innerHeight;
    document.getElementById('pageDarken').style['display'] = 'block';
  }
  function joinGroup(leaderEmail, groupID, groupName, groupType, kidFriendly, meetingDays) {
    pageDarken();
    document.getElementById('joinRequestPopup').style['display'] = 'block';

    // Set action - GET variables
    var phpScript = "send_email.php";
    var action =
      phpScript + "?to=" + leaderEmail + "&id=" + groupID + "&title=" +
      groupName + "&type=" + groupType + "&kidFriendly=" + kidFriendly + "&days=" + meetingDays + "&subject=Request to Join";

    document.getElementById('joinRequestForm').action = action;

  }

  function reportError(leaderEmail, groupID, groupName, groupType, kidFriendly, meetingDays) {
    pageDarken();
    document.getElementById('reportErrorPopup').style['display'] = 'block';

    // Set action - GET variables
    var phpScript = "send_email.php";
    var action =
      phpScript + "?to=" + leaderEmail + "&id=" + groupID + "&title=" +
      groupName + "&type=" + groupType + "&kidFriendly=" + kidFriendly + "&days=" + meetingDays + "&subject=Request to Join";

    document.getElementById('reportErrorForm').action = action;
  }

  $(document).ready(function() {

    // Position email popups
    document.getElementById('joinRequestPopup').style['marginLeft'] = (window.innerWidth / 2) - 250;
    document.getElementById('reportErrorPopup').style['marginLeft'] = (window.innerWidth / 2) - 250;

    $('.close').click(function() {
      this.parentNode.style['display'] = 'none';
      document.getElementById('pageDarken').style['display'] = 'none';
    });


  })(jQuery);
