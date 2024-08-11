<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register Employee</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<?php include('../../Include/headerlinks.php');
	include('RegisterEmployeeAjax.php');

	?>
	<script>
	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
	</script>
	
	
	<style>
        .textalert {
            display: none;
            color: red;
        }
        .success-message {
            display: none;
            color: green;
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
                                    <div class="col-lg-6">
                                       
                                            
											
											<div class="menu-container">
                                    <a href="../EmployeeRegister/RegisterEmployee.php" class="btn btn-primary">Register Employees</a>
                                </div>
                                <div class="menu-container">
                                    <a href="../RegisterDepartment/Departments.php" class="btn btn-primary">Departments Management</a>
                                </div>
                                <div class="menu-container">
                                    <a href="../RegisterDesignations/Designations.php" class="btn btn-primary">Designation Management</a>
                                </div>
											
											
											
											
											
											
											
											
											
											
											
											
											
                                      
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Register Employee</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
            
			<?php include('../../Include/menuarea.php'); ?>
            
            <!-- stockprice, feed area end-->
            <div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd" style="background-color:#f2f2f2;">
                                    <div class="main-sparkline8-hd" >
                                        <h1>Register Employees</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
								<div class="sparkline8-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
										<form id="form1" name="form1" method="post" enctype="multipart/form-data" autocomplete="off" action="">
											<div class="row">
												
												<div class="col-md-3">
													
													<div class="form-group">
														<label for="cmbDepartment" style="text-align: left; display: block;">Select Option</label>
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
														<div class="textalert1" style="color:red; display:none;"><span ></span></div>
													</div>
													
													<div class="form-group">
														<label for="QID" style="text-align: left; display: block;" >QID</label>
														<input type="text" class="form-control" id="QID" maxlength="11" onkeypress="return isNumberKey(event)">
														<input type="hidden" class="form-control" id="HiddenID" hidden>
														<div class="textalert5" style="color:red; display:none;"><span ></span></div>
													</div>	
													
													<div class="form-group">
														<label for="email" style="text-align: left; display: block;">E-Mail</label>
														<input type="text" class="form-control" id="email">
														<div class="textalert9" style="color:red; display:none;"><span ></span></div>
													</div>
													<div class="form-group">
														<label for="basicSalary" style="text-align: left; display: block;" >Basic Salary</label>
														<input type="text" class="form-control" id="basicSalary" onkeypress="return isNumberKey(event)">
														<div class="textalert12" style="color:red; display:none;"><span ></span></div>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<label for="employeeCode" style="text-align: left; display: block;">Employee Code</label>
														<input type="text" class="form-control" id="employeeCode"> 
														<div class="textalert2" style="color:red; display:none;"><span ></span></div>
													</div>
													
													<div class="form-group">
														<label for="Gender" style="text-align: left; display: block;">Gender</label>
														<select class="form-control" id="Gender">
															<option value="">Select an option</option>
															<option value="option1">Male</option>
															<option value="option2">Female</option>
															
														</select>
														<div class="textalert6" style="color:red; display:none;"><span ></span></div>
													</div>
													
													<div class="form-group">
														<label for="designation" style="text-align: left; display: block;">Select Designation</label>
														<select class="form-control" id="designation">
															<option value="">Select Designation</option>
															<?php 
															$query = "SELECT * FROM `designations` ORDER BY ID";
															$result = $db_handle->runQuery($query);
															foreach ($result as $rowDep1) {
																?>
																<option value="<?php echo $rowDep1["ID"];?>"><?php echo $rowDep1["designations"];?></option>
																<?php		
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label for="mobileNmber" style="text-align: left; display: block;">Mobile Number</label>
														<input type="text" class="form-control" id="mobileNmber" maxlength="10" onkeypress="return isNumberKey(event)">
														<div class="textalert13" style="color:red; display:none;"><span ></span></div>
													</div>
													<!---div class="form-group">
													  <label for="photo">Photo</label>
													  <input type="file" class="form-control" id="photo" name="photo">
													</div-->
												</div>
													
												<div id="Insert_Employee"></div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="firstName" style="text-align: left; display: block;">First Name</label>
														<input type="text" class="form-control" id="firstName">
														<div class="textalert3" style="color:red; display:none;"><span ></span></div>
													</div>
													<!--div class="form-group">
														<label for="middleName">Middle Name</label>
														<input type="text" class="form-control" id="middleName">
													</div-->
													<div class="form-group">
														<label for="Status" style="text-align: left; display: block;">Status</label>
														<select class="form-control" id="Status">
															<option value="">Select an option</option>
															<option value="option1">Active</option>
															<option value="option2">Inactive</option>
														</select>
														<div class="textalert7" style="color:red; display:none;"><span ></span></div>
													</div>
													<div class="form-group" style="text-align: left; display: block;">
														<label for="address">Address</label>
														<input type="text" class="form-control" id="address">
														<div class="textalert10" style="color:red; display:none;"><span ></span></div>
													</div>
													
													<div class="form-group" style="text-align: left; display: block;">
														<label for="photo">Photo</label>
														<input type="file" class="form-control" id="photo" name="photo">
														<div class="textalert14" style="color:red; display:none;"><span ></span></div>
													</div>
   
													
												</div>

												<div class="col-md-3">
													<div class="form-group" style="text-align: left; display: block;">
														<label for="lastName">Last Name</label>
														<input type="text" class="form-control" id="lastName">
														<div class="textalert4" style="color:red; display:none;"><span ></span></div>
													</div>
													<div class="form-group" style="text-align: left; display: block;">
														<label for="birthDate">Birth Date</label>
														<input type="date" class="form-control" id="birthDate">
														<div class="textalert8" style="color:red; display:none;"><span ></span></div>
														
													</div>
													<div class="form-group" style="text-align: left; display: block;">
														<label for="joinedDate">Joined Date</label>
														<input type="date" class="form-control" id="joinedDate">
													</div>
													<div class="textalert11" style="color:red; display:none;"><span ></span></div>
													<div class="form-group" style="text-align: left; display: block;"><br>
														<button type="button" class="Add_Button btn btn-primary" id="Add_Button">Add</button>
													</div>	
												</div>	

												


												
													<!-- Add button -->
												<div class="success-message">Employee information saved successfully!</div>	
											</div>
											</form>
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
