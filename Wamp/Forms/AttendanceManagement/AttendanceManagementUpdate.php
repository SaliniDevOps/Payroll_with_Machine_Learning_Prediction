<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");

	$RowID='';
	$DepartmentID='';
	$EmployeeCode='';
	$FirstName='';
	$EMPDate='';
	if(isset($_POST['Row_ID_update'])){
		$RowID=$_POST['Row_ID_update'];

		echo $queryA = "SELECT `employee`.`FirstName`, `employee`.`EmployeeCode`,`empattendance`.`EMPDate`,`empattendance`.`EmpTime`,
				  `empattendance`.`InOut`,`empattendance`.`ID` ,`employee`.`EmployeeID`,`employee`.`EmployeeID` ,`employee`.`DepartmentID`
				  FROM `empattendance` 
				  INNER JOIN employee ON `empattendance`.`EMPCode` = `employee`.`EmployeeCode` 
				  WHERE `empattendance`.`ID` ='$RowID'";
		$resultA = $db_handle->runQuery($queryA); //(EmpAttendance.Status = 0) AND          ORDER BY EmpAttendance.EMPCode, EmpAttendance.EMPDate, EmpAttendance.InOut DESC 
				 
		$i=0;
		if(!empty($resultA)){
			$a = 1;
			foreach ($resultA as $r) {
				echo '====='.$DepartmentID=$r['DepartmentID'];
				$EmployeeCode=$r['EmployeeCode'];
				$FirstName=$r['FirstName'];
				$EMPDate=$r['EMPDate'];
				$InOut=$r['InOut'];
				
			}
		}
		?>	
		<input type="text"   id="T_DepartmentID" name="T_DepartmentID" value="<?php echo $DepartmentID;?>" class="field-divided20"  />
		<input type="text" hidden  id="T_EmployeeCode" name="T_EmployeeCode" value="<?php echo $EmployeeCode;?>" class="field-divided20"  />
		<input type="text" hidden  id="T_FirstName" name="T_FirstName" value="<?php echo $FirstName;?>" class="field-divided20"  />
		<input type="text" hidden  id="T_EMPDate" name="T_EMPDate" value="<?php echo $EMPDate;?>" class="field-divided20"  />
		<input type="text" hidden  id="T_InOut" name="T_InOut" value="<?php echo $InOut;?>" class="field-divided20"  />
		<?php
	} 






