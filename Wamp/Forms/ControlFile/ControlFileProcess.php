<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");

	$DepartmentID='';
	if (isset($_POST["Insert_Year"])) {
		// Get variables
		$Year = $_POST["Insert_Year"];
		$Month = $_POST["Month"];
		$Payroll_Process = $_POST["Payroll_Process"];
		$Monthend_Process = $_POST["Monthend_Process"];

		
		$query = "UPDATE ContolFile SET PayYear = '".$Year."', PayMonth = '".$Month."',
		          PayProcess = '".$Payroll_Process."', MonthEndProcess = '".$Monthend_Process."'";
		$result = $db_handle->updateQuery($query);
	}