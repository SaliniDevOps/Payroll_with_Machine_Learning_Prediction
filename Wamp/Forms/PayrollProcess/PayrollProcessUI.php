<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payroll Process</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<?php include('../../Include/headerlinks.php');  
	include('PayrollProcessAjax.php');
	?>
	
	<style>
	#Save_AlertCSS {
		position: absolute;
		z-index: 10;
		padding: 10px 15px;
		background-color: #00cc99;
		color: #721c24;
		font-size: 16px;
		width: 250px;
		margin-top: 10px;
		margin-left: 110px;
		border-radius: 8px;
		border: 1px solid #f5c6cb;

		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	#Warning_AlertCSS {
		position: absolute;
		z-index: 10;
		padding: 10px 15px;
		background-color: #ff4d4d;
		color: white;
		font-size: 16px;
		width: 250px;
		margin-top: 10px;
		margin-left: 110px;
		border-radius: 8px;
		border: 1px solid #f5c6cb;

		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		-moz-box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}
	
	 
    .btn-hover-edit {
        background-color: white; /* Original background color */
       
    }
    .btn-hover-edit:hover {
        background-color: black; /* Desired hover background color */
        color: white; /* Desired hover text color */
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
              
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-12">
                                       <!-- 004080 -->
										<div class="menu-container">
											<a href="../AttendanceUpload/AttendanceUpload.php" class="btn " style="background-color:#0099cc; color:white;">1 - Upload Attendance</a>
										</div>
										
										<div class="menu-container">
											<a href="../AttendanceManagement/AttendanceManagement.php" class="btn " style="background-color:#0099cc; color:white;">2 - Manage Attendance </a>
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
                                            <li><span class="bread-blod">PayrollProcess</span>
                                            </li>
                                        </ul>
                                    </div-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            
			<?php include('../../Include/menuarea.php'); ?>
           <div id ="PayrollProcess_Details" ></div> 
            <!-- stockprice, feed area end-->
            <div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd" style="background-color:#f2f2f2;">
                                    <div class="main-sparkline8-hd">
                                        <h1>Payroll Processing</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div id="PayrollPaySlip_Details" ></div>
								<div class="form-group" style="text-align: left; display: block;"><br>
									<button type="button" class="PayrollBTN btn btn-primary" id="PayrollBTN" style="background-color:#802000;"> Run Payroll</button>
									<button type="button" class="PaySlipGenerate btn btn-primary" id="PaySlipGenerate" style="background-color:#802000;"> Generate Pay Slip</button>
								</div>
								
                                <div id="calculateAttendanceProcess"></div>
                                <div class="sparkline8-graph">
									<form id="form1" name="form1" method="post" autocomplete="off" action="">
										<div class="row">
											<div class="col-md-3">
												<div class="form-group">
													<label for="txtDepartment" style="text-align: left; display: block;" >Select Department</label>
													<select class="form-control" id="cmbDepartment" 	>
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
													<!--input type="hidden" class="form-control" id="HiddenID" hidden-->
													<div class="textalert1 " style="color:red; display:none;"><span ></span></div>
													<input type="text" id="HiddenValue" value="1" hidden />
												</div>
											</div>
											<div class="form-group" style="text-align: left; display: block;"><br>
												<button type="button" class="PayrollProcess btn btn-primary" id="PayrollProcess">Show</button>
											</div>
											<div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
											<div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
										</div>
									</form>
									<br>
									
								
										<div id="Row_ID_update" ></div>
										<div id="displaydelete" ></div>
										<div id="Insert_Department" >
											<table class="table table-bordered" >
												<thead>
													<tr>
														<th  style="  text-align:center;">Departments</th>
														<th  style="  text-align:center;">Employee Code</th>
														<th  style="  text-align:center;">Employee Name</th>
														<th  style="  text-align:center;">Working Days</th>
														<th  style="  text-align:center;">Basic Salary</th>
														
														<th  style="  text-align:center;"> Fixed Allowances</th>
														<th  style="  text-align:center;"> Variance Allowances</th>
														<th  style="  text-align:center;"> Fixed Deductions</th>
														<th  style="  text-align:center;"> Variance Deductions</th>
														<th  style="  text-align:center;">OT Amount</th>
													
														<th  style="  text-align:center;">Gross Salary</th>
														<th  style="  text-align:center;">Net Salary</th>
														
													</tr>
												</thead>
												<tbody>
												<?php
												
												  $queryA = "SELECT `payroll`.*,`employee`.`FirstName`,`employee`.`LastName`,`employee`.`EmployeeCode`,`departments`.`Departments`
															   FROM `payroll`
															   INNER JOIN employee ON employee.EmployeeID = payroll.EmployeeID
															   INNER JOIN departments ON departments.ID = employee.DepartmentID
															   ORDER BY employee.EmployeeID";
												$resultA = $db_handle->runQuery($queryA); 
												$i=0;
												if(!empty($resultA)){
													foreach ($resultA as $r) {
														$ID=$r['ID'];
												
														
														?>
														<tr id="show">
															<td style ="text-align:left;" id="Departments-<?php echo $ID; ?>"><?php echo $r['Departments']; ?></td>
															<td style ="text-align:left;" id="Departments-<?php echo $ID; ?>"><?php echo $r['EmployeeCode']; ?></td>
															<td style ="text-align:left;" id="Departments-<?php echo $ID; ?>"><?php echo $r['FirstName'].' '.$r['LastName']; ?></td>
															<td style ="text-align:left;" id="Departments-<?php echo $ID; ?>"><?php echo $r['WorkingDays']; ?></td>
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['BasicSalary'],2); ?></td>
															
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['FixedAllowance'],2) ; ?></td>
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['VarianceAllowance'],2); ?></td>
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['FixedDeduction'],2)  ?></td>
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['VarianceDeduction'],2)  ?></td>
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['OTAmount'],2)  ?></td>
															
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['GrossSalary'],2) ; ?></td>
															<td style ="text-align:right;" id="Departments-<?php echo $ID; ?>"><?php echo number_format($r['NetSalary'],2) ; ?></td>
															
															
														</tr>
														<?php
													}
													
												}	?>	
												</tbody>
											</table>
										</div>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
