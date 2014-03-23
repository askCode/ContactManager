<?php
	// This script creates the new contact form and passes it to newContact.js
	
	echo '<form id="addContactForm" action="JavaScript:saveNewContact();" onsubmit ="return isFormBlank();">';
		echo '<h1> Add New Contact </h1>';
		
		echo '<label>First Name: </label>';
		echo '<input class="required" type="text" id="firstName"> <br>';
		echo '<label>Last Name: </label>';
		echo '<input type="text" id="lastName"> <br>';
		echo '<label>Email: </label>';
		echo '<input type="text" id="email"> <br>';
		echo '<label>Phone: </label>';
		echo '<input type="text" id="phone"> <br>';
		echo '<div class="addressTextArea">';
			echo '<label>Address: <label>';
			echo '<textarea id="address" rows="3"></textarea> <br>';
		echo '</div>';
		echo '<div class="groupSelect">';
			echo '<label>Group: </label>';
			echo '<select id="groupCategory"> <option value="family">Family</option>';
			echo 	      '<option value="friends">Friend</option>';
			echo	      '<option value="colleagues">Colleague</option>';
			echo	      '<option value="ungrouped">Ungrouped</option>';
			echo '</select>';
		echo '</div>';
		
		echo '<br> <br> <div id="saveFormBtn"><input type="submit" id="savenewContact" value="SAVE CONTACT" onclick = "JavaScript:formValid();"></div>';
	echo '</form>';

?>