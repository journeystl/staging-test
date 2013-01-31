function groupAction(groupID, groupName, groupType, kidFriendly, meetingDays, actionType) {
  jQuery("#joinRequestPopup").reveal();
  jQuery(".form-group-id").val(groupID);
  jQuery(".form-group-name").val(groupName);
  jQuery(".form-group-kids").val(kidFriendly);
  jQuery(".form-group-days").val(meetingDays);
  jQuery(".form-type").val(actionType);
  jQuery(".group-name-header").val(groupName);
}
