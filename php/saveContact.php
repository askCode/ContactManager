<?php
	//This script saves the submitted new contact data to the database, referenced in newContact.js
	require_once("db.php");
	$group_type = $_POST['group_type'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	$group_query ="SELECT `group_id` FROM `group` WHERE group_type = '$group_type'";
	$group_result = mysql_query($group_query);
	$group_row = mysql_fetch_assoc($group_result);
	$group_id = $group_row['group_id'];
	
	$insert_contacts_query = "INSERT INTO `contacts`(`first_name`, `last_name`, `email`, `phone`, `address`, `group_id`) VALUES ('$first_name','$last_name','$email','$phone','$address','$group_id')";
	$contacts_result = mysql_query($insert_contacts_query);
?>