<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	 <style>
        .custom-datatable-overright {
            margin-top: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
			height:450px;
        }
	
        
        .loading-spinner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
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
	
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Upload Attendance </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<?php include('../../Include/headerlinks.php');
	include('AttendanceUploadAjax.php');

	?>
	
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
            <!-- Breadcome End-->
            
			<?php include('../../Include/menuarea.php'); ?>
			
			<?php
				require 'vendor/autoload.php';
				use PhpOffice\PhpSpreadsheet\IOFactory;
			?>
            
            <!-- stockprice, feed area end-->
            <div class="admin-dashone-data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-container mt-5">
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <form id="form1" name="form1" method="post" autocomplete="off" action="" enctype="multipart/form-data" class="border p-4 rounded bg-light shadow-sm">
                                    <h4 class="mb-3 text-center">Upload Excel File</h4>
                                    <div class="form-group">
                                        <label for="csv_file" class="font-weight-bold">Upload Excel</label>
                                        <input type="file" id="csv_file" name="csv_file" class="form-control-file" multiple="multiple" />
                                        <div class="alert alert-danger mt-3" id="AlertCSS_1_5" style="display:none"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 btn-block" id="submit" name="submit">Process</button>
                                </form>
                                <div class="loading-spinner">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
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
    </div>
	<script>
        document.getElementById('form1').addEventListener('submit', function() {
            document.querySelector('.loading-spinner').style.display = 'block';
        });
    </script>
	
	<!------ Process -------->
	<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];
    
    if ($file) {
        try {
            $spreadsheet = IOFactory::load($file);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $arrayCount = count($allDataInSheet);
            
            // Database insertion logic
            $ok = true;
            if ($ok) {
                $ISCount = 0;
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $UserID = $allDataInSheet[$i]["C"];
                    $AttDate1 = $allDataInSheet[$i]["A"];
                    $AttTime1 = $allDataInSheet[$i]["A"];
                    $AttTime2 = $allDataInSheet[$i]["A"];
                    $InOut = $allDataInSheet[$i]["B"];
                    
                    
                    $AttDate = date('Y-m-d', strtotime($AttDate1));
                    $AttTime = date('h:i:sa', strtotime($AttTime1));
                    $time_in_24_hour_format = date("G:i", strtotime($AttTime2));
                    $AttTimex = $AttDate . " " . $time_in_24_hour_format;
                    
                    if ($UserID == "") {
                        $ISCount++;
                    }
                    
                    if ($ISCount == 0) {
                        echo $query = "INSERT INTO tempempattendance (`EMPCode`, `EMPDate`, `EmpTime`, `InOut`, `Status`)
                                  VALUES ('$UserID', '$AttDate', '$AttTimex', '$InOut', 0)";
                        $result = $db_handle->insertQuery($query); // Update this with your actual database insert method
                    }
					
					
                }
				
				$EMPDate='';$EmpCode='';$EmpTime='';$InOut='';
				$query="SELECT `EMPCode`, `EMPDate`, `EmpTime`,`InOut` FROM tempempattendance ORDER BY `EMPDate`,`EMPCode`,`EmpTime`,`InOut` DESC";
				$result = $db_handle->runQuery($query); 
				if(!empty($result)){
					foreach ($result as $r) {
						$EMPDate=$r["EMPDate"]; 
						$EmpCode=$r["EMPCode"]; 
						$EmpTime=$r["EmpTime"]; 
						$InOut=$r["InOut"]; 
						
						$query = "INSERT INTO empattendance (`EMPCode`,`EMPDate`,`EmpTime`,`InOut`)
								   Values('$EmpCode','$EMPDate','$EmpTime','$InOut')";
						$result = $db_handle->insertQuery($query);
						
						
					}
				}	
				
				
				
										/*
										$query="SELECT `EMPCode`, `EMPDate` FROM tempempattendance ORDER BY `EMPDate`";
										$result = $db_handle->runQuery($query); 
										if(!empty($result)){
											foreach ($result as $r) {
												$EMPDate=$r["EMPDate"]; 
												$EmpCode=$r["EMPCode"]; 
												
												// Check Duplicate Record
												$query1="SELECT `EMPCode`, `EMPDate`,`EmpTime` FROM tempempattendance 
														 WHERE (`EMPCode` = '$EmpCode') AND (`EMPDate` = '$EMPDate') 
														 ORDER BY `EmpTime` ";
												$result1 = $db_handle->runQuery($query1); 
												if(!empty($result1)){
													foreach ($result1 as $r1) {
														$EmpTime = $r1["EmpTime"];
													}
												}
												
												//Check EmpAttendance Status
												$query2="SELECT `EMPCode`, `EMPDate`, `EmpTime`, `InOut` FROM empattendance 
														 WHERE (`EMPCode` = '$EmpCode') AND (`EMPDate` = '$EMPDate') AND (`Status` = '1') ";
												$result2 = $db_handle->runQuery($query2); 
												if(empty($result2)){
												
													//Check Duplicate In-Time
													$query4="SELECT `EMPCode`, `EMPDate`,`EmpTime`, `InOut`
															FROM empattendance WHERE (`EMPCode` = '$EmpCode') AND (`EMPDate` = '$EMPDate') AND (`EmpTime` = '$EmpTime') ";
													$result4 = $db_handle->runQuery($query4); 
													if(empty($result4)){
														//Save In Time
														if ($AttTime >12){
														
														// $query = "INSERT INTO empattendance (`EMPCode`,`EMPDate`,`EmpTime`,
																		// `InOut`,`Status`,`DateType`)Values('$EmpCode','$EMPDate','$EmpTime',
																		// 0,0,'')";
																		// $result = $db_handle->insertQuery($query);
														}else{
														
															$query = "INSERT INTO empattendance (`EMPCode`,`EMPDate`,`EmpTime`,`InOut`,`Status`,`DateType`,`Auser`,`Terminal`)
																	   Values('$EmpCode','$EMPDate','$EmpTime',0,0,'','$Auser','$Terminal')";
															$result = $db_handle->insertQuery($query);
														}	 
													}
													$query3="SELECT `EMPCode`, `EMPDate`, `EmpTime` FROM tempempattendance 
															WHERE (EMPCode = '$EmpCode') AND (`EMPDate` = '$EMPDate') 
															ORDER BY `EmpTime` DESC  ";
													$result3 = $db_handle->runQuery($query3); 
													
													if(!empty($result3)){
														foreach ($result3 as $r3) {
															$EmpTimeOut = $r3["EmpTime"];
														}
													}
													
													//Check Duplicate Out Time
													$query5="SELECT `EMPCode`, `EMPDate`, `EmpTime`, `InOut` 
															FROM empattendance 
															WHERE (`EMPCode` = '$EmpCode') AND (`EMPDate` = '$EMPDate') AND (`EmpTime` = '$EmpTimeOut') ";
													$result5 = $db_handle->runQuery($query5); 
														
													if(empty($result5)){
														
														//Save Out Time
														if ($AttTime >12){
															$query = "INSERT INTO empattendance (`EMPCode`,`EMPDate`,`EmpTime`,`InOut`,`Status`,`DateType`,`Auser`,`Terminal`)
																	  Values('$EmpCode','$EMPDate','$EmpTimeOut', 0,0,'','$Auser','$Terminal')";
															$result = $db_handle->insertQuery($query);
														}else{	
															$query = "INSERT INTO empattendance (`EMPCode`,`EMPDate`,`EmpTime`,`InOut`,`Status`,`DateType`,`Auser`,`Terminal`)
																	 Values('$EmpCode','$EMPDate','$EmpTimeOut',1,0,'','$Auser','$Terminal')";
															$result = $db_handle->insertQuery($query);
														}
													}					
												}
											} 
										}
				
										*/
				
				
				
				
				
				
				
				
				
				
            }
            
            
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
    } else {
        echo 'No file uploaded or there was an error uploading the file.';
    }
}




	?>
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
