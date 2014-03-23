// This script ungroups contact(s) selected from any group and moves them to ungrouped category by updating the database.

var unGroupRequest = new XMLHttpRequest();

function emptyRequestCheck(){
	var flag = false;
	var group_type_chkbx = document.getElementsByName('remove[]');
	for (var i = 0; i < group_type_chkbx.length; i++) {
        if (group_type_chkbx[i].checked)
            flag = true;
           }
    return flag;
}

function displayAlert(){
	if (!(emptyRequestCheck()))
	alert("No selection made. Please select at least one person");
}

function unGroupContact() {
	var group_type = document.getElementById('group_type').value;
	var group_type_chkbx = document.getElementsByName('remove[]');
	var arr = [];
	for (var i = 0; i < group_type_chkbx.length; i++) {
        if (group_type_chkbx[i].checked)
            arr.push(group_type_chkbx[i].value);
           }
	var url = "./php/unGroupContact.php";
    unGroupRequest.onreadystatechange = unGroup;
    unGroupRequest.open("POST", url, true);
    unGroupRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	unGroupRequest.send("group_type="+group_type+"&group_type_chkbx="+arr);

	//showGroupList(group_type);
}


function unGroup() {
  if (unGroupRequest.readyState == 4) {
    if (unGroupRequest.status == 200) {
      var response = unGroupRequest.responseText;
      var details = document.getElementById("contactDetails");
      details.innerHTML = response;
      
      var group_type = document.getElementById('group_type').value;
  	  showGroupList(group_type);
    } else {
      alert("Error processing request: " + groupRequest.statusText);
    }
  }
  
}
