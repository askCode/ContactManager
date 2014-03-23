<?php
	
	//This script moves a contact to the ungrouped category in the database, referenced in unGroupContact.js
	require_once("db.php");
	$group_type = $_POST['group_type'];
	$group_type_chkbx = $_POST['group_type_chkbx'];
	$group_type_chkbx = explode(',', $group_type_chkbx);
	
	foreach ($group_type_chkbx as $value){
		$contacts_query = "UPDATE `contacts` SET `group_id`= 4 WHERE `contact_id` = '$value'";
		$contacts_result = mysql_query($contacts_query);
	}
?>