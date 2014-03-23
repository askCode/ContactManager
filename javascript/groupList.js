//This script gets the Contact list from the Contacts table for any group selected

var groupRequest = new XMLHttpRequest();

function showGroupList(groupType) {
	hideNewContactPanel();
	showContactsAndDetailsPanel();
	var url = "./php/groupList.php?groupType=" + groupType;
    groupRequest.onreadystatechange = insertGroupList;
    groupRequest.open("GET", url, true);
	groupRequest.send("");
	
}


function insertGroupList() {
  if (groupRequest.readyState == 4) {
    if (groupRequest.status == 200) {
      var response = groupRequest.responseText;
      var list = document.getElementById("groupList");
      list.innerHTML = response;
      
      var details = document.getElementById("contactDetails");
      details.innerHTML = "";
    } else {
      alert("Error processing request: " + groupRequest.statusText);
    }
  }
}

function hideNewContactPanel(){
	var newContactPanel = document.getElementById("newContactPanel");
	if (newContactPanel.style.display ==""){
		newContactPanel.className = "hide";
	}
}

function showContactsAndDetailsPanel(){
	var topPanel = document.getElementById("topPanel");
	var bottomPanel = document.getElementById("bottomPanel");
	if (topPanel.style.display == "" &&  bottomPanel.style.display == ""){
		topPanel.className = "show";
		bottomPanel.className = "show";
	}
	
	var newContactPanel = document.getElementById("newContactPanel");
	newContactPanel.className = "hide";
}
