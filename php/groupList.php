<?php
	//This script retreives the contacts from the database and passes it to groupList.js
	 
	require_once("db.php");
	$group_type = $_GET['groupType'];
	
	
	if($group_type == 'all')
		$contacts_query = "SELECT `contact_id`,	 `first_name`, `last_name`, `email` FROM `contacts` ORDER BY `first_name`, `last_name`";
	else {
		$group_query = "SELECT `group_id` FROM `group` WHERE `group_type` = '$group_type'";
		$group_result = mysql_query($group_query);
		$group_row = mysql_fetch_assoc($group_result);
		
		$group_id = $group_row['group_id'];
		
		$contacts_query = "SELECT `contact_id`,	 `first_name`, `last_name`, `email` FROM `contacts` WHERE `group_id` = '$group_id' ORDER BY `first_name`, `last_name`";
	}
	
	$contacts_result = mysql_query($contacts_query);
	$num_rows = mysql_num_rows($contacts_result);
	
	if ($group_type <> 'all' && $group_type <> 'ungrouped' && $num_rows > 0)
		$flag = true;
	else 
		$flag = false;
	
	echo '<h2>Contact Info for '. ucfirst($group_type) .'</h2>';
	if ($num_rows > 0){
		echo '<form action="JavaScript:unGroupContact();" onsubmit ="return emptyRequestCheck();">';
			if ($flag) 
				echo '<p><input type="submit" id="removeContacts" value="REMOVE CONTACT(s)" onClick = "JavaScript: displayAlert();"></p>';
				echo '<input type="hidden" id="group_type" value="'.$group_type.'">';
				
			echo '<table>';
				echo '<tr> <th></th>';
				echo '<th>First name</th>';
				echo '<th>Last name</th>';
				echo '<th>Email</th> </tr>';
				while($contacts_row = mysql_fetch_assoc($contacts_result)) {
					$contact_id = $contacts_row['contact_id'];
					$first_name = $contacts_row['first_name'];
					$last_name = $contacts_row['last_name'];
					$email = $contacts_row['email'];
					echo '<tr onclick="Javascript:showContactDetails('.$contact_id. ');">';
						if ($flag) 
							echo '<td> <input type="checkbox" name="remove[]" value=' . $contact_id . '>';
						else {
							echo '<td></td>';
						}
						echo '<td >' . $first_name . '</td>';
						echo '<td>' . $last_name . '</td>';
						echo '<td>' . $email . '</td>';
					echo '</tr>';
				}
			echo '</table>';
		echo '</form>';
	}
	else {
		echo '---No Contacts Found---';
	}
	
?>