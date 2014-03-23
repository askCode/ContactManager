//This script gets the details (First Name, Last Name, Phone, Email, Address) for any individual Contact selected from the Contacts table.\

var contactRequest = new XMLHttpRequest();

function showContactDetails(contactId) {
	
	var url = "./php/contactDetails.php?contactId=" + contactId;
    contactRequest.onreadystatechange = insertContactDetails;
    contactRequest.open("GET", url, true);
	contactRequest.send("");
}


function insertContactDetails() {
  if (contactRequest.readyState == 4) {
    if (contactRequest.status == 200) {
      var response = contactRequest.responseText;
      var details = document.getElementById("contactDetails");
      details.innerHTML = response;
    } else {
      alert("Error processing request: " + contactRequest.statusText);
    }
  }
}
