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
    </style>
	
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Form</title>
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
	
	
	<!------ Process -------->
	<?php
	
	
	$file = '';
	$Isexist = false;
	if (isset($_POST['submit'])) {
		$file = $_FILES['csv_file']['tmp_name'];
		
		if ($file!= "" ) {
			
			set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
			include ('Classes/PHPExcel/IOFactory.php');
			//include 'PHPExcel/IOFactory.php';

			// This is the file path to be uploaded.

			$inputFileName = 'AccessControlLog.xlsx'; 

			try {
				$objPHPExcel = PHPExcel_IOFactory::load($file);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($file,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
			$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
			
			//Get Master Details
			$OK=true;
								
			if ($ok = true) {
				
				$ISCount =  0;
				//for($i=2;$i<=$arrayCount - 1;$i++){ //yapa
				for($i=2;$i<=$arrayCount;$i++){
				
					$UserID = $allDataInSheet[$i]["B"];
					$AttDate1  = $allDataInSheet[$i]["A"];
					$AttTime1 = $allDataInSheet[$i]["A"];
					$AttTime2 = $allDataInSheet[$i]["A"];
					$Name = $allDataInSheet[$i]["D"];
					
					$AttDate=date('Y-m-d',strtotime($AttDate1));
					
					$AttTime=date('h:i:sa',strtotime($AttTime1));
					
					$time_in_24_hour_format = DATE("G:i", STRTOTIME($AttTime2));
					
					$AttTimex = $AttDate." ".$time_in_24_hour_format; 
					
					if ($UserID == ""){
						$ISCount = $ISCount + 1;	
					}
					
					if ($ISCount == 0){
						$query = "INSERT INTO tempempattendance (`EMPCode`,`EMPDate`,`EmpTime`,`InOut`,`Status`,`DateType`)
								  Values('$UserID','$AttDate','$AttTimex',1,0,'$DateType')";
						$result = $db_handle->insertQuery($query);
					}
				}
				//!------------------Save to empattendance table------------------------------>
									
										
										
									?>
										<script>
											
											$(".alert_save").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Upload Successfuly.');
											$(".alert_save").fadeIn().delay(2000).fadeOut(); 
											//window.location="main.php?page=Forms/MONTHPesEmpAttendenceExcelProcess/esEmp_UI.php";
											//window.location.reload();
										</script>
									<?php		 
								}
								
								?>
								<script>
									// $(".modal").hide();
									// $("#flash").show();
									// $("#flash").fadeIn(400).html('<img src="ajax-loader.gif"align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
								</script>
								<?php
							}else{
								?>
								
								<script >
									$(".alertAmount").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display="none";"></span>Select Excel File Path');
									$(".alertAmount").fadeIn().delay(2000).fadeOut();
									document.getElementById('Description').focus();
									
									
										
								</script>
								<?php	
							}

						
						}
					  ?>
	
	
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
