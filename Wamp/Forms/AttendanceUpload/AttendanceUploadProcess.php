<?php

    //open connection
	require_once("../../Connection/dbconnecting.php");
    
	$ID='';
	$ServiceType='';
	
	
	if(isset($_POST["Insert_cmbDepartment"]))
	{
	    //Get variable
		$cmbDepartment=$_POST["Insert_cmbDepartment"];
		$QID=$_POST["QID"];
		$email=$_POST["email"];
		$basicSalary=$_POST["basicSalary"];
		$employeeCode=$_POST["employeeCode"];
		$Gender=$_POST["Gender"];
		$designation=$_POST["designation"];
		$mobileNmber=$_POST["mobileNmber"];
		$firstName=$_POST["firstName"];
		$Status=$_POST["Status"];
		$address=$_POST["address"];
		$lastName=$_POST["lastName"];
		$HiddenID=$_POST["HiddenID"];
		$birthDate=$_POST["birthDate"];
		$joinedDate=$_POST["joinedDate"];
		
		if (empty($HiddenID)) {
			$resultA = $db_handle->runQuery("SELECT * FROM `employees` WHERE `FirstName`='$firstName' OR `EmployeeCode`='$employeeCode'"); 
			if($resultA instanceof mysqli_result && $resultA->num_rows > 0){
				?>
				<script>
					$(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					$(".alertWarning").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}else{
				
				$result = $db_handle->insertQuery("INSERT INTO `employees` ( `EmployeeCode`, `FirstName`, `LastName`, `DepartmentID`,
				`DesignationID`, `Gender`, `Email`, `Address`, `MobileNumber`, `BirthDate`, `JoinedDate`, `Status`, `BasicSalary`) 
				Values('$employeeCode','$firstName','$lastName','$cmbDepartment','$designation','$Gender','$email','$address','$mobileNmber',
				'$birthDate','$joinedDate','$Status','$basicSalary')");
				
				?>
				<script>
					$(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Save Successfully!');
					$(".alertSave").fadeIn().delay(2000).fadeOut();
					document.getElementById('txtServiceType').value='';
					document.getElementById('txtServiceType').focus();
				</script>
				<?php
			}
			
		}
	}	
		
		// else {
			// $resultD = $db_handle->runQuery("SELECT * FROM `servicetype` WHERE `servicetype`='$ServiceType' AND `ID`!='$ID'"); 
			// if($resultD instanceof mysqli_result && $resultD->num_rows > 0){
				// ?>
				<script>
					// $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Duplicate Record!');
					// $(".alertWarning").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtServiceType').value='';
					// document.getElementById('txtServiceType').focus();
				// </script>
				<?php
			// }else{
				// $resultB = $db_handle->updateQuery("Update `servicetype` Set `ServiceType`='$ServiceType', `Price`='$Price' WHERE `ID`='$ID'");
				
				// ?>
			 <script>
					// $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Update Successfully!');
					// $(".alertSave").fadeIn().delay(2000).fadeOut();
					// document.getElementById('txtServiceType').value='';
					// document.getElementById('txtServiceType').focus();
				// </script>
				 <?php
			// }
			
		// }	