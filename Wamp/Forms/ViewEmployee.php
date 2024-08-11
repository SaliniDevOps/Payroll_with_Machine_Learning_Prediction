<?php 
	//open connection
	require_once("Connection/dbconnecting.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<?php include('Include/headerlinks.php');  ?>
	
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <?php include('Include/sidebar.php'); ?>
        <!-- Header top area start-->
        <div class="content-inner-all">
            
            <?php include('Include/header.php'); ?>                
              
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-list shadow-reset">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
												<input type="text" placeholder="Search..." class="form-control">
												<a href=""><i class="fa fa-search"></i></a>
											</form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Project List</span>
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
            
			<?php include('Include/menuarea.php'); ?>
            
            <!-- stockprice, feed area end-->
            <div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>View Form</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <!-- <div id="toolbar"> -->
                                            <!-- <select class="form-control"> -->
                                                <!-- <option value="">Export Basic</option> -->
                                                <!-- <option value="all">Export All</option> -->
                                                <!-- <option value="selected">Export Selected</option> -->
                                            <!-- </select> -->
                                        <!-- </div> -->
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                                <tr>
													
                                                    <!--th data-field="state" data-checkbox="true"></th-->
                                                    <th data-field="EmployeeCode" data-editable="true">Employee Code</th>
                                                    <th data-field="FirstName" data-editable="true">First Name</th>
                                                    <th data-field="LastName" data-editable="true">Last Name</th>
                                                    <th data-field="QID" data-editable="true">QID</th>
                                                    <th data-field="Department" data-editable="true">Department</th>
                                                    <th data-field="Designation" data-editable="true">Designation</th>
                                                    <th data-field="Gender" data-editable="true">Gender</th>
                                                    <th data-field="E-Mail" data-editable="true">E-Mail</th>
                                                    <th data-field="Address" data-editable="true">Address</th>
                                                    <th data-field="MobileNumber" data-editable="true">Mobile Number</th>
                                                    <th data-field="BirthDate" data-editable="true">Birth Date</th>
                                                    <th data-field="JoinedDate" data-editable="true">Joined Date</th>
                                                    <th data-field="Status" data-editable="true">Status</th>
                                                    <th data-field="BasicSalary" data-editable="true">Basic Salary</th>
                                                    <th data-field="Action" data-editable="true">Action</th>
                                                   
													
													

                                                </tr>
                                            </thead>
                                            <tbody>
											
											<?php
												/*
												$queryA="SELECT employees.*,designations.designations, departments.Departments
												FROM `employees`
												INNER JOIN designations ON designations.ID = employees.DesignationID
												INNER JOIN departments ON departments.ID = employees.DepartmentID
												ORDER BY employees.EmployeeID";
												$resultA = $db_handle->runQuery($queryA); 
												$i=0;
												if(!empty($resultA)){
													foreach ($resultA as $r) {
														$ID=$r['EmployeeID'];
												
														if($i%2==0)
															$classname="evenRow";
														else
															$classname="oddRow";
														?>
														<tr id="show">
															
																<td><?php echo '=='.$r['EmployeeCode'];?></td>
																<td><?php echo $r['FirstName'];?></td>
																<td><?php echo $r['LastName'];?></td>
																<td><?php echo $r['LastName'];?></td>
																<td><?php echo $r['Departments'];?></td>
																<td><?php echo $r['designations'];?></td>
																
																
																
																<td><?php echo $r['Gender'];?></td>
																<td><?php echo $r['Email'];?></td>
																<td><?php echo $r['Address'];?></td>
																<td><?php echo $r['MobileNumber'];?></td>
																<td><?php echo $r['BirthDate'];?></td>
																<td><?php echo $r['JoinedDate'];?></td>
																<td><?php echo $r['Status'];?></td>
																<td><?php echo $r['BasicSalary'];?></td>
																
																<td>
																	<div class="btn-group project-list-action">
																		<button class="btn btn-white btn-action btn-xs"><i class="fa fa-folder"></i> View</button>
																		<button class="btn btn-white btn-xs"><i class="fa fa-pencil"></i> Edit</button>
																	</div>
																</td>
															
														</tr>
														<?php
													}
													
												}	
												
												
												*/
												$queryA="SELECT employees.*,designations.designations, departments.Departments
												FROM `employees`
												INNER JOIN designations ON designations.ID = employees.DesignationID
												INNER JOIN departments ON departments.ID = employees.DepartmentID
												ORDER BY employees.EmployeeID";
												$resultA = $db_handle->runQuery($queryA); 
												$i=0;
												if(!empty($resultA)){
													foreach ($resultA as $r) {
														$ID=$r['EmployeeID'];
												
											?>	
												<tr>

                                                    <td><?php echo $r['EmployeeCode'];?></td>
                                                    <td><?php echo $r['FirstName'];?></td>
                                                    <td><?php echo $r['LastName'];?></td>
													<td><?php echo $r['LastName'];?></td>
													<td><?php echo $r['Departments'];?></td>
													<td><?php echo $r['designations'];?></td>
													<td><?php echo $r['Gender'];?></td>
													<td><?php echo $r['Email'];?></td>
													<td><?php echo $r['Address'];?></td>
													<td><?php echo $r['MobileNumber'];?></td>
													<td><?php echo $r['BirthDate'];?></td>
													<td><?php echo $r['JoinedDate'];?></td>
													<td><?php echo $r['Status'];?></td>
													<td><?php echo $r['BasicSalary'];?></td>			
                                                    <td>
                                                        <div class="btn-group project-list-action">
                                                            <button class="btn btn-white btn-action btn-xs"><i class="fa fa-folder"></i> View</button>
                                                            <button class="btn btn-white btn-xs"><i class="fa fa-pencil"></i> Edit</button>
                                                        </div>
                                                    </td>
                                                </tr>
												 <?php 
												 
												 	}
													
												}	
												 
												 ?>
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
    <?php include('Include/footer.php'); ?>
</body>

</html>
