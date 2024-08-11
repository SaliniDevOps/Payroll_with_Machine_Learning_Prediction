<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");
	
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>View Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<?php include('../../Include/headerlinks.php');  
	include('ControlFileAjax.php');
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
                                            <li><span class="bread-blod">Departments</span>
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
			
			<?PHP 
			$query="SELECT * FROM `contolfile` ";
			$result = $db_handle->runQuery($query);
			
			if (!empty($result)) {
				foreach ($result as $r1) {
					$PayYear = $r1['PayYear'];
					$PayMonth = $r1['PayMonth'];
					$PayProcess = $r1['PayProcess'];
					$MonthEndProcess = $r1['MonthEndProcess'];
				}
			} else {
				// Set default values if no result is found
				$PayYear = '';
				$PayMonth = '';
				$PayProcess = '';
				$MonthEndProcess = '';
			}
			
			
			?>
            
            <!-- stockprice, feed area end-->
            <div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd" style="background-color:#cc3300;">
                                    <div class="main-sparkline8-hd">
                                        <h1>Control File</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
								
								<div id="UpdateControlFile" ></div>
								
                                <div class="sparkline8-graph">
									<form id="form1" name="form1" method="post" autocomplete="off" action="">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="txtYear">Year</label>
												<!--input type="number" class="form-control" id="txtYear" name="Insert_Year" placeholder="Enter Year"-->
												<select class="form-control" id="txtYear" name="txtYear">
													<option value="" style="font-weight:bold;">Select Year</option>
													<?php
													$query02 = "SELECT Year FROM `esyear`";
													$result02 = $db_handle->runQuery($query02);
													if (!empty($result02)) {
														foreach ($result02 as $row02) {
															$selected = ($row02["Year"] == $PayYear) ? 'selected' : '';
															?>
															<option value="<?php echo $row02["Year"]; ?>" <?php echo $selected; ?>>
																<?php echo $row02["Year"]; ?>
															</option>
															<?php
														}
													}
													?>
												</select>
												<div class="textalert textalert1" style="display:none;">Please enter a valid year.</div>
											</div>
											<div class="form-group">
												<label for="txtMonth">Month</label>
												<!--input type="number" class="form-control" id="txtMonth" name="Month" placeholder="Enter Month"-->
												<select class="form-control" id="txtMonth" name="txtMonth">
													<option value="">Select Month</option>
													<?php
													$query = "SELECT * FROM `months` ORDER BY ID";
													$result = $db_handle->runQuery($query);
													if (!empty($result)) {
														foreach ($result as $rowDep1) {
															$selected = ($rowDep1["ID"] == $PayMonth) ? 'selected' : '';
															?>
															<option value="<?php echo $rowDep1["ID"]; ?>" <?php echo $selected; ?>>
																<?php echo $rowDep1["Month"]; ?>
															</option>
															<?php
														}
													}
													?>
												</select>
												<div class="textalert textalert2" style="display:none;">Please enter a valid month.</div>
											</div>
										</div><br>
										<div class="col-md-6">
											<div class="form-group form-check">
												<input type="checkbox" class="form-check-input" id="txtpayroll" name="Payroll_Process" <?php echo ($PayProcess == 1) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="txtpayroll">Payroll Process</label>
											</div>
											<div class="form-group form-check">
												<input type="checkbox" class="form-check-input" id="txtmonthend" name="Monthend_Process" <?php echo ($MonthEndProcess == 1) ? 'checked' : ''; ?>>
												<label class="form-check-label" for="txtmonthend">Monthend Process</label>
											</div>
											<button type="button" class="btn btn-primary" id="Add_Apply">Apply</button>
										</div>
									</div>
									<div id="UpdateControlFile"></div>
									<div class="alertSave alert alert-success mt-3" id="Save_AlertCSS" style="display:none;">Data saved successfully!</div>
									<!--div class="alertWarning alert alert-danger mt-3" id="Warning_AlertCSS">Warning: Please check the form.</div-->
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
