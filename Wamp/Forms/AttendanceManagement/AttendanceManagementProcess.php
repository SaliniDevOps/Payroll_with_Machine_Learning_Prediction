<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");

	$DepartmentID='';
	if(isset($_POST['Load_Department'])){
		$DepartmentID=$_POST['Load_Department'];
?>
	<table class="table table-bordered" >
		<thead>
			<tr>
				<th  style="  text-align:center;">Employee Code</th>
				<th  style="  text-align:center;">Employee Name</th>
				<th  style="  text-align:center;">Date</th>
				<th  style="  text-align:center;">InTime</th>
				<th  style="  text-align:center;">OutTime</th>
				<th  style="  text-align:center;">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$queryA = "SELECT `employee`.`FirstName`, `employee`.`EmployeeCode`,`empattendance`.`EMPDate`,`empattendance`.`EmpTime`,
				  `empattendance`.`InOut`,`empattendance`.`ID` FROM `empattendance` 
				  INNER JOIN employee ON `empattendance`.`EMPCode` = `employee`.`EmployeeCode` 
				  WHERE (EmpAttendance.Status = 0) AND `employee`.`DepartmentID`='$DepartmentID'
				  ORDER BY EmpAttendance.EMPCode, EmpAttendance.EMPDate, EmpAttendance.InOut DESC";
		$resultA = $db_handle->runQuery($queryA); 
		$i=0;
		if(!empty($resultA)){
			$a = 1;
			foreach ($resultA as $r) {
				$IDdb=$r['ID'];
				$InOut=$r['InOut'];
				$EMPDate=$r['EMPDate'];
				$EMPCode=$r['EmployeeCode'];
				$EmpTime=$r['EmpTime'];
				
				$InDateTime=$r['EmpTime'];
				$OutDateTime=$r['EmpTime'];
		
				$InDateTimex=date('d/m/Y h:i:sa',strtotime($InDateTime));
				$OutDateTimex=date('d/m/Y h:i:sa',strtotime($OutDateTime));
				
				$InDateTimex;
																					
				// $query="Select `ID` from empattendance Order by ID";
				// $result3 = $db_handle->runQuery($query) ; 
				// $i=0;
				// if(!empty($result3)){	  
					// foreach($result3 as $k=>$v) {
						// $ID=$result3[$k]['ID'];
					// }
				// }
				if($i%2==0)
				$classname="evenRow";
				else
				$classname="oddRow";
			
				$query1="SELECT Count(`ID`) as `RecCount` ,ID FROM `empattendance` 
							WHERE `EMPCode`='$EMPCode' and `EMPDate`='$EMPDate'";
				$result2 = $db_handle->runQuery($query1);
					
				if(!empty($result2)) {
					foreach ($result2 as $r1) {
						$RecCount=$r1['RecCount'];
						//$ID=$r1['ID'];
						$RecCountaa=$RecCount%2;
					}
				}
				
			?>
			<tr  id="show" class="<?php if(isset($classname)) echo $classname;?>">
			<?php
			
				if($RecCountaa==0){
					?>
					<td hidden><?php echo $r['ID'];  ?></td>
					<td> <a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php  echo $r['EmployeeCode'];  ?></a></td>
					<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo $r['FirstName']; ?></td>
					<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo date("d/m/Y",strtotime($EMPDate));?></td>
					<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='1'){	
					echo $InDateTimex;	
					} ?></td>
					<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='0'){
					echo $OutDateTimex;	
					} ?></td>
					<td style="width:150px;"><div class="btn-group project-list-action"><button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $IDdb; ?>"><i class="fa fa-pencil"></i> Edit</button></div>
					<!--div class="btn-group project-list-action"><button class="btn btn-white btn-xs Delete" id="<?php echo $ID; ?>"><i class="fa fa-trash"></i></i> Del</button></div></td-->
					<?php
				}else{
					?>
					<td bgcolor="#ffc266" hidden><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo $r['ID'];  ?></td>
					<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php  echo $r['EmployeeCode'];  ?></a></td>
					<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo $r['FirstName']; ?></td>
					<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo date("d/m/Y",strtotime($EMPDate));?></td>
					<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='1'){	
					echo $InDateTimex;	
					} ?></td>
					<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='0'){
					echo $OutDateTimex;	
					} ?></td>
					<td bgcolor="ffc266" style="width:150px;"><div class="btn-group project-list-action"><button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $IDdb; ?>"><i class="fa fa-pencil"></i> Edit</button></div>
					<?php
				}
				?>
			</tr>
				<?php
				$i++;
				$a++;
			}
		}	
		?>
		</tbody>
	</table>
	<?php } ?>






<?php    

	if(isset($_POST['Insert_NewRecord'])){
		$employeeCode=$_POST['Insert_NewRecord'];
		$Time=$_POST['Time'];
		$HiddenEMPDate=$_POST['HiddenEMPDate'];
		$INOUTTYPE=$_POST['INOUTTYPE'];
		$HiddenEMPDate=$_POST['HiddenEMPDate'];
		
		$emptimeupdate=$HiddenEMPDate.$Time;
		$result = $db_handle->insertQuery("INSERT INTO `empattendance` (`EMPCode`,`EmpTime`,`InOut`,`EMPDate`) Values('$employeeCode','$emptimeupdate','$INOUTTYPE','$HiddenEMPDate')");
				
		?>
		<div class="col-lg-9">
							<div class="breadcome-list shadow-reset">
								
								<div id="DepartmentWise_Loading">
								
		<table class="table table-bordered" >
			<thead>
				<tr>
					<th  style="  text-align:center;">Employee Code=</th>
					<th  style="  text-align:center;">Employee Name</th>
					<th  style="  text-align:center;">Date</th>
					<th  style="  text-align:center;">InTime</th>
					<th  style="  text-align:center;">OutTime</th>
					<th  style="  text-align:center;">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$queryA = "SELECT `employee`.`FirstName`, `employee`.`EmployeeCode`,`empattendance`.`EMPDate`,`empattendance`.`EmpTime`,
					  `empattendance`.`InOut`,`empattendance`.`ID` ,`employee`.`EmployeeID` 
					  FROM `empattendance` 
					  INNER JOIN employee ON `empattendance`.`EMPCode` = `employee`.`EmployeeCode` 
					  WHERE (EmpAttendance.Status = 0) AND `employee`.`EmployeeCode` = '$employeeCode'
					  ORDER BY EmpAttendance.EMPCode, EmpAttendance.EMPDate, EmpAttendance.InOut DESC";
			$resultA = $db_handle->runQuery($queryA); 
			$i=0;
			if(!empty($resultA)){
				$a = 1;
				foreach ($resultA as $r) {
					$IDdb=$r['ID'];
					$InOut=$r['InOut'];
					$EMPDate=$r['EMPDate'];
					$EMPCode=$r['EmployeeCode'];
					$EmpTime=$r['EmpTime'];
					$EmployeeID=$r['EmployeeID'];
					
					$InDateTime=$r['EmpTime'];
					$OutDateTime=$r['EmpTime'];
			
					$InDateTimex=date('d/m/Y h:i:sa',strtotime($InDateTime));
					$OutDateTimex=date('d/m/Y h:i:sa',strtotime($OutDateTime));
					
					$dateIN = new DateTime($InDateTime);
					$timeIn = $dateIN->format('h:i:s A');
					
					$dateOut = new DateTime($OutDateTime);
					$timeOut = $dateOut->format('h:i:s A');

									
					// $query="Select `ID` from empattendance Order by ID";
					// $result3 = $db_handle->runQuery($query) ; 
					// $i=0;
					// if(!empty($result3)){	  
						// foreach($result3 as $k=>$v) {
							// $ID=$result3[$k]['ID'];
						// }
					// }
					if($i%2==0)
					$classname="evenRow";
					else
					$classname="oddRow";
				
					$query1="SELECT Count(`ID`) as `RecCount` ,ID FROM `empattendance` 
								WHERE `EMPCode`='$EMPCode' and `EMPDate`='$EMPDate'";
					$result2 = $db_handle->runQuery($query1);
						
					if(!empty($result2)) {
						foreach ($result2 as $r1) {
							$RecCount=$r1['RecCount'];
							//$ID=$r1['ID'];
							$RecCountaa=$RecCount%2;
						}
					}
					
				?>
				<tr  id="show" class="<?php if(isset($classname)) echo $classname;?>">
				<?php
				
					if($RecCountaa==0){
						?>
						<td hidden><?php echo $r['ID'];  ?></td>
						<td> <a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php  echo $r['EmployeeCode'];  ?></a></td>
						<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo $r['FirstName']; ?></td>
						<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo date("d/m/Y",strtotime($EMPDate));?></td>
						<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='1'){	
						echo $timeIn;	
						} ?></td>
						<td><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='0'){
						echo $timeOut;	
						} ?></td>
						<!--td style="width:150px;"><div class="btn-group project-list-action"><button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $EmployeeID; ?>"><i class="fa fa-pencil"></i> Edit</button></div-->
						<!--div class="btn-group project-list-action"><button class="btn btn-white btn-xs Delete" id="<?php echo $ID; ?>"><i class="fa fa-trash"></i></i> Del</button></div></td-->
						<?php
					}else{
						?>
						<td bgcolor="#ffc266" hidden><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo $r['ID'];  ?></td>
						<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php  echo $r['EmployeeCode'];  ?></a></td>
						<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo $r['FirstName']; ?></td>
						<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php echo date("d/m/Y",strtotime($EMPDate));?></td>
						<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='1'){	
						echo $timeIn;	
						} ?></td>
						<td bgcolor="ffc266"><a href="#"  class="atendance" id="<?php //echo $ID; ?>"><?php if ($InOut=='0'){
						echo $timeOut;	
						} ?></td>
						<td bgcolor="ffc266" style="width:150px;"><div class="btn-group project-list-action"><button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $IDdb; ?>"><i class="fa fa-pencil"></i> Add In/Out</button></div>
						<?php
					}
					?>
				</tr>
					<?php
					$i++;
					$a++;
				}
			}	
			?>
			</tbody>
		</table>
		
								</div>
								   
							</div>
						</div>
		<?php
		
		
		
		
		
	}		






?>