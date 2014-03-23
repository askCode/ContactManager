<?php
	//This script retreives the contact details from the database and passes it to contactDetails.js
	require_once("db.php");
	
	$contact_id = $_GET['contactId'];
	
	$contacts_query = "SELECT * FROM `contacts` WHERE `contact_id` = '$contact_id'";
    $contacts_result = mysql_query($contacts_query);
	$contacts_row = mysql_fetch_assoc($contacts_result);
	$contact_id = $contacts_row['contact_id'];
	$first_name = $contacts_row['first_name'];
	$last_name = $contacts_row['last_name'];
	$email = $contacts_row['email'];
	$address = $contacts_row['address'];
	$phone = $contacts_row['phone'];

	echo '<table>';
		echo '<tr> <td>Name: </td><td>' . $first_name . " " . $last_name . '</td></tr>';
		echo '<tr> <td>Address: </td><td>' . $address . '</td></tr>';
		echo '<tr> <td>Phone: </td><td>' . $phone . '</td></tr>';
		echo '<tr> <td>Email: </td><td>' . $email . '</td></tr>';
	echo '</table>';
	
	mysql_close();
?>