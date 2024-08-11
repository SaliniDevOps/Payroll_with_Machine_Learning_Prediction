<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Employee Details</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<?php include('../../Include/headerlinks.php');  
	include('ViewEmployeeAjax.php');
	?>
	
	
	   <style>
        .employee-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            display: flex;
            align-items: flex-start;
        }
        .employee-photo {
            width: 150px;
            height: 150px;
            margin-right: 20px;
        }
        .employee-details {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .employee-details .column {
            flex: 1;
            text-align: left;
            padding-right: 20px;
        }
        .employee-details .column p {
            margin: 0; /* Remove default margin for paragraphs */
            padding: 5px 0;
        }
        .employee-actions {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 20px;
        }
        .employee-actions button {
            margin-bottom: 5px;
        }
        .search-box {
            margin-bottom: 20px;
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
            
			<?php include('../../Include/menuarea.php'); ?>
			 <div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd">
                                    <div class="main-sparkline8-hd">
                                        <h1>View Employee Details</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
			
							   <div class="sparkline8-graph">
                                <!-- Search Box -->
                                <div class="search-box">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search for employee names...">
                                </div>
                                <!-- Employee Cards -->
                                <div id="employeeCards">
                                    <?php
                                    $queryA = "SELECT employee.*, designations.designations, departments.Departments
                                               FROM `employee`
                                               INNER JOIN designations ON designations.ID = employee.DesignationID
                                               INNER JOIN departments ON departments.ID = employee.DepartmentID
                                               ORDER BY employee.EmployeeID";
                                    $resultA = $db_handle->runQuery($queryA);
                                    if (!empty($resultA)) {
                                        foreach ($resultA as $r) {
                                            $ID = $r['EmployeeID'];
                                            $photoPath = "http://localhost/BADRconstruction/Forms/EmployeeRegister/" . $r['PhotoPath'];
                                    ?>
                                    <div class="employee-card">
                                        <img src="<?php echo $photoPath; ?>" alt="Employee Photo" class="employee-photo">
                                        <div class="employee-details">
                                            <div class="column">
                                                <p style="text-align: left; display: block;"><strong>Employee Code:</strong> <?php echo htmlspecialchars($r['EmployeeCode']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>First Name:</strong> <?php echo htmlspecialchars($r['FirstName']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Last Name:</strong> <?php echo htmlspecialchars($r['LastName']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>QID:</strong> <?php echo htmlspecialchars($r['QID']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Department:</strong> <?php echo htmlspecialchars($r['Departments']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Designation:</strong> <?php echo htmlspecialchars($r['designations']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Gender:</strong> <?php echo htmlspecialchars($r['Gender']); ?></p>
                                            </div>
                                            <div class="column">
                                                <p style="text-align: left; display: block;"><strong>Email:</strong> <?php echo htmlspecialchars($r['Email']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Address:</strong> <?php echo htmlspecialchars($r['Address']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Mobile Number:</strong> <?php echo htmlspecialchars($r['MobileNumber']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Birth Date:</strong> <?php echo htmlspecialchars($r['BirthDate']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Joined Date:</strong> <?php echo htmlspecialchars($r['JoinedDate']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Status:</strong> <?php echo htmlspecialchars($r['Status']); ?></p>
                                                <p style="text-align: left; display: block;"><strong>Basic Salary:</strong> <?php echo htmlspecialchars($r['BasicSalary']); ?></p>
                                            </div>
                                        </div>
                                        <div class="employee-actions">
                                            <!--button class="btn btn-primary btn-sm">Approve</button-->
                                            <!--button class="btn btn-danger btn-sm">Reject</button-->
                                            <button class="btn btn-danger btn-sm">Edit</button>
                                            <!--button class="btn btn-info btn-sm">Documents</button-->
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
			
							</div>
                        </div>
                    </div>
                </div>
            </div>
          <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var filter = this.value.toUpperCase();
            var employeeCards = document.getElementById('employeeCards');
            var cards = employeeCards.getElementsByClassName('employee-card');

            for (var i = 0; i < cards.length; i++) {
                var firstName = cards[i].querySelector('.column p:nth-child(2)').textContent.toUpperCase();
                var lastName = cards[i].querySelector('.column p:nth-child(3)').textContent.toUpperCase();
                if (firstName.indexOf(filter) > -1 || lastName.indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        });
    </script>
            <!-- stockprice, feed area end-->
			
			<?php /* ?>
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
                                        
                                       <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
											<thead>
												<tr>
													<th data-field="EmployeeCode" data-editable="true">Employee Code</th>
													<th data-field="FirstName" data-editable="true">First Name</th>
													<th data-field="LastName" data-editable="true">Last Name</th>
													<th data-field="QID" data-editable="true">QID</th>
													<th data-field="DepartmentID" data-editable="true">Department</th>
													<th data-field="DesignationID" data-editable="true">Designation</th>
													<th data-field="Gender" data-editable="true">Gender</th>
													<th data-field="Email" data-editable="true">E-Mail</th>
													<th data-field="Address" data-editable="true">Address</th>
													<th data-field="MobileNumber" data-editable="true">Mobile Number</th>
													<th data-field="BirthDate" data-editable="true">Birth Date</th>
													<th data-field="JoinedDate" data-editable="true">Joined Date</th>
													<th data-field="Status" data-editable="true">Status</th>
													<th data-field="BasicSalary" data-editable="true">Basic Salary</th>
													<th data-field="Photo" data-editable="true">Photo</th>
													<th data-field="Action">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$queryA = "SELECT employee.*, designations.designations, departments.Departments
														   FROM `employee`
														   INNER JOIN designations ON designations.ID = employee.DesignationID
														   INNER JOIN departments ON departments.ID = employee.DepartmentID
														   ORDER BY employee.EmployeeID DESC";
												$resultA = $db_handle->runQuery($queryA);
												if (!empty($resultA)) {
													foreach ($resultA as $r) {
														$ID = $r['EmployeeID'];
												?>
												<tr id="row-<?php echo $ID; ?>">
													<td id="Photo-<?php echo $ID; ?>"><img src="<?php echo $r['PhotoPath']; ?>" alt="Employee Photo" style="width: 50px; height: 50px;"></td>
													<td id="EmployeeCode-<?php echo $ID; ?>"><?php echo $r['EmployeeCode']; ?></td>
													<td id="FirstName-<?php echo $ID; ?>"><?php echo $r['FirstName']; ?></td>
													<td id="LastName-<?php echo $ID; ?>"><?php echo $r['LastName']; ?></td>
													<td id="QID-<?php echo $ID; ?>"><?php echo $r['QID']; ?></td>
													<td id="DepartmentID-<?php echo $ID; ?>"><?php echo $r['DepartmentID']; ?></td>
													<td id="DesignationID-<?php echo $ID; ?>"><?php echo $r['designations']; ?></td>
													<td id="Gender-<?php echo $ID; ?>"><?php echo $r['Gender']; ?></td>
													<td id="Email-<?php echo $ID; ?>"><?php echo $r['Email']; ?></td>
													<td id="Address-<?php echo $ID; ?>"><?php echo $r['Address']; ?></td>
													<td id="MobileNumber-<?php echo $ID; ?>"><?php echo $r['MobileNumber']; ?></td>
													<td id="BirthDate-<?php echo $ID; ?>"><?php echo $r['BirthDate']; ?></td>
													<td id="JoinedDate-<?php echo $ID; ?>"><?php echo $r['JoinedDate']; ?></td>
													<td id="Status-<?php echo $ID; ?>"><?php echo $r['Status']; ?></td>
													<td id="BasicSalary-<?php echo $ID; ?>"><?php echo $r['BasicSalary']; ?></td>
													
													<td>
														<div class="btn-group project-list-action">
															<button class="btn btn-white btn-xs Update" id="<?php echo $ID; ?>"><i class="fa fa-pencil"></i> Edit</button>
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
			
			<?php */ ?>
			
			
        </div>
    </div>
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
