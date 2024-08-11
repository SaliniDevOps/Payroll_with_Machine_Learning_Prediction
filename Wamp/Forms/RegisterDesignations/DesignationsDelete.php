<?php 
    //open connection
		require_once("../../Connection/dbconnecting.php");

		if($_POST['id']){
			$RowDayID='';
			$RowDayID=$_POST['id'];	
			
			$query = "DELETE FROM `designations` WHERE `ID`='$RowDayID'";
			$result = $db_handle->deleteQuery($query);
			  
		}
	
?>