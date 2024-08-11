<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manage Attendance</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<?php include('../../Include/headerlinks.php');  
	include('AttendanceManagementAjax.php');
	?>
	
	
	<style>
	.suggestionsBox1 {
	position: absolute;
	left: 40px;
	top:170px;
	background-color: #fff;
	width: 250px;
	border: 1px solid #2d8f9b;
}
#suggesstions1 ul li {
	list-style:none;
	margin: 1px;
	padding: 1px;
	border-bottom:1px dotted #666;
	cursor: pointer;
	
}
#suggesstions1 ul li:hover {
	background-color: #c1c2cb;
	color:#000;
	
}

ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	color:#FFF;
	padding:4px;
	margin:4px;
}
.menu-container {
    display: inline-block;
    margin-right: 10px;
}

.menu-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
    font-size: 16px;
    text-align: center;
}

.menu-btn:hover {
    background-color: #0056b3;
}

.breadcome-area {
    padding: 20px 0;
}

.breadcome-list {
    padding: 10px;
}
.menu-container {
    display: inline-block;
    margin-right: 10px;
}

.menu-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
    font-size: 16px;
    text-align: center;
}

.menu-btn:hover {
    background-color: #0056b3;
}

.breadcome-area {
    padding: 20px 0;
}

.breadcome-list {
    padding: 10px;
}
	
	</style>
	
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <?php include('../../Include/sidebar.php'); ?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            
            <?php include('../../Include/header.php'); ?>                
            <script>
				$(document).click(function(e){
					$("#suggesstions1").hide();
				});		
			</script>  
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="menu-container">
											<a href="../AttendanceUpload/AttendanceUpload.php" class="btn " style="background-color:#0099cc; color:white;">1 - Upload Attendance</a>
										</div>
										
										<div class="menu-container">
											<a  href="../AttendanceManagement/AttendanceManagement.php"  class="btn " style="background-color:#0099cc; color:white;">2 - Manage Attendance </a>
										</div>
										
										<div class="menu-container">
											<a href="../AttendanceCalculations/AttendanceCalculations.php" class="btn " style="background-color:#0099cc; color:white;">3 - Calculate Attendance </a>
										</div>
										
										<div class="menu-container">
											<a href="../PayrollProcess/PayrollProcessUI.php" class="btn " style="background-color:#0099cc; color:white;">4 - Payroll Processing </a>
										</div>
                                    </div>
                                    <!--div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Project List</span>
                                            </li>
                                        </ul>
                                    </div-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			<div id="Row_ID_update"></div>
			
			<div class="breadcome-area mg-b-30 small-dn">
				<div class="container-fluid">
					<div class="row">
					
						<!--div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>Attendance Management</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div-->
					
					
						<!-- Left Side Card -->
						<div id="Insert_NewOne">
						<div class="col-lg-9">
							<div class="breadcome-list shadow-reset">
								
								<div id="DepartmentWise_Loading">
								
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
											  `empattendance`.`InOut`,`empattendance`.`ID` ,`employee`.`EmployeeID` 
											  FROM `empattendance` 
											  INNER JOIN employee ON `empattendance`.`EMPCode` = `employee`.`EmployeeID` 
											  WHERE (EmpAttendance.Status = 0) 
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
						</div>
						<!-- Right Side Card -->
						<div class="col-lg-3">
						
							<div class="breadcome-list shadow-reset" >
								<div class="form-group">
									<label for="cmbDepartment" style="text-align: left; display: block;">Select Option</label>
									<select class="form-control" id="cmbDepartment">
										<option value="">Select Departmennts</option>
										<?php 
										$query = "SELECT * FROM `departments` ORDER BY ID";
										$result = $db_handle->runQuery($query);
										foreach ($result as $rowDep1) {
											?>
											<option value="<?php echo $rowDep1["ID"];?>"><?php echo $rowDep1["Departments"];?></option>
											<?php		
										}
										?>
									</select>
									<div class="textalert1" style="color:red; display:none;"><span ></span></div>
								</div>
								<div class="form-group">
									<label for="employeeCode" style="text-align: left; display: block;">Employee Code</label>
									<input type="text" class="form-control" id="employeeCode"> 
									<div class="textalert2" style="color:red; display:none;"><span ></span></div>
									<div class="suggestionsBox1" style="display: none;"  id="suggesstions1" ></div>
								</div>
								<div class="form-group">
									<label for="employeeName" style="text-align: left; display: block;">Employee Name</label>
									<input type="text" class="form-control" id="employeeName" disabled> 
									<div class="textalert2" style="color:red; display:none;"><span ></span></div>
								</div>
								<div class="form-group">
									<label style="text-align: left; display: block;">Status</label>
									<div class="radio-buttons">
										<label class="radio-inline"><input type="radio" name="status" id="In" value="In"> In</label>
										<label class="radio-inline"><input type="radio" name="status" id="Out" value="Out"> Out</label>
									</div>
									<div class="textalert2" style="color:red; display:none;"><span></span></div>
								</div>
								<div class="form-group">
									<label for="txtTime" style="text-align: left; display: block;">Time</label>
									<input type="time" class="form-control" id="txtTime"> 
									<input type="Date"   id="HiddenEMPDate" hidden> 
									<div class="textalert2" style="color:red; display:none;"><span ></span></div>
								</div>
								<div class="form-group">
									<div class="form-group" style="text-align: right; display: block;"><br>
										<button type="button" class="Clear_Button btn btn-primary" id="Clear_Button">Clear</button>
										<button type="button" class="Add_Button btn btn-primary" id="Add_Button">Add</button>
									</div>
								</div>
							</div>
						</div>
						
						
						
						</div>
					</div>
				</div>
			</div>

            <!-- Breadcome End-->
            
			<?php include('../../Include/menuarea.php'); ?>
            
     

			
			
			
        </div>
    </div>
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
