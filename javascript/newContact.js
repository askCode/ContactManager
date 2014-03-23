// This script creates the new contact form and then saves the data submitted into the database table Contacts

var newContactRequest = new XMLHttpRequest();
var saveContactRequest = new XMLHttpRequest();

function newContact() { 
	hideContactsAndDetails();
    var url = "./php/newContact.php";
    newContactRequest.onreadystatechange = newContactForm;
    newContactRequest.open("GET", url, true);
    newContactRequest.send("");
}


function newContactForm() {
  if (newContactRequest.readyState == 4) {
    if (newContactRequest.status == 200) {
      var response = newContactRequest.responseText;
      var form = document.getElementById("newContact");
      form.innerHTML = response;
    } else {
      alert("Error processing request: " + newContactRequest.statusText);
    }
  }
}

function hideContactsAndDetails(){
	var topPanel = document.getElementById("topPanel");
	var bottomPanel = document.getElementById("bottomPanel");
	if (topPanel.style.display == "" &&  bottomPanel.style.display == ""){
		topPanel.className = "hide";
		bottomPanel.className = "hide";
	}
	
	var newContactPanel = document.getElementById("newContactPanel");
	newContactPanel.className = "show";
}

function saveNewContact(){
	var firstName = document.getElementById("firstName").value;
	var lastName = document.getElementById("lastName").value;
	var email = document.getElementById("email").value;
	var phone = document.getElementById("phone").value;
	var address = document.getElementById("address").value;
	
	var groupCat = document.getElementById("groupCategory");
	var groupCategory = groupCat.options[groupCat.selectedIndex].value;
	
	var url = "./php/saveContact.php";
	saveContactRequest.onreadystatechange = saveContact;
    saveContactRequest.open("POST", url, true);
    saveContactRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	saveContactRequest.send("first_name="+firstName+"&last_name="+lastName+"&email="+email+"&phone="+phone+"&address="+address+"&group_type="+groupCategory);
	
	
}

function saveContact() {
  
  if (saveContactRequest.readyState == 4) {
    
    if (saveContactRequest.status == 200) {
      var response = saveContactRequest.responseText;
      showGroupList('all');
      } else {
      alert("Error processing request: " + saveContactRequest.statusText);
    }
  }
}

function isFormBlank(){
	var firstName = document.getElementById("firstName").value;
	var lastName = document.getElementById("lastName").value;
	var phone = document.getElementById("phone").value;
	
	var flag = true;
	if (firstName == "" && lastName == "" && phone == ""){
		flag = false;
	}
	return flag;
}

function formValid(){
	if (!isFormBlank()){
		alert("Please enter First Name, Last Name and Phone");
	}
}
