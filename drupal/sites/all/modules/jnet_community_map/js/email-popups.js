function joinGroup(groupID, groupName, groupType, kidFriendly, meetingDays) {
  jQuery("#joinRequestPopup").reveal();
  jQuery("#edit-group-id").val(groupID);
  jQuery("#edit-group-name").val(groupName);
  jQuery("#edit-group-kids").val(kidFriendly);
  jQuery("#edit-group-days").val(meetingDays);
}

function reportError(groupID, groupName, groupType, kidFriendly, meetingDays) {
  jQuery("#reportErrorPopup").reveal();
  jQuery("#edit-group-id--2").val(groupID);
  jQuery("#edit-group-name--2").val(groupName);
  jQuery("#edit-group-kids--2").val(kidFriendly);
  jQuery("#edit-group-days--2").val(meetingDays);
}
