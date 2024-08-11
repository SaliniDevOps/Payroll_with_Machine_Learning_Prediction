<?php
// Database connection
require_once("../../Connection/dbconnecting.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vehicle Registration</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include('../../Include/headerlinks.php'); ?>
    <style>
        .form-control {
            margin-bottom: 10px;
        }
        .alertSave, .alertWarning {
            position: absolute;
            z-index: 10;
            padding: 10px 15px;
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
        .alertSave {
            background-color: #00cc99;
            color: #721c24;
        }
        .alertWarning {
            background-color: #ff4d4d;
            color: white;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .container > div {
            flex: 1;
            min-width: 250px;
            padding: 10px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .form-group label {
            flex: 1;
            text-align: right;
            margin-right: 10px;
        }
        .form-group input, .form-group select {
            flex: 2;
        }
        .form-group button {
            flex: 1;
            margin-left: 10px;
        }
    </style>
</head>

<body class="materialdesign">
    <div class="wrapper-pro">
        <?php include('../../Include/sidebar.php'); 
		include('VehicleRegistrationAjax.php'); 
		?>
        <div class="content-inner-all">
            <?php include('../../Include/header.php'); ?>
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
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                            <li><span class="bread-blod">Vehicle Registration</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('../../Include/menuarea.php'); ?>

            <div class="admin-dashone-data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline8-list shadow-reset">
                                <div class="sparkline8-hd" style="background-color:#f2f2f2;">
                                    <div class="main-sparkline8-hd">
                                        <h1>Vehicle Registration</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <form id="vehicleForm" name="vehicleForm" method="post" autocomplete="off" action="">
                                        <div class="container">
                                            <div class="form-group">
                                                <label for="vehicleID">Vehicle ID</label>
                                                <input type="text" class="form-control" id="vehicleID" name="vehicleID">
                                            </div>
                                            <div class="form-group">
                                                <label for="vehicleType">Vehicle Type</label>
                                                
                                               <input type="text" class="form-control" id="vehicleType" name="vehicleType">
                                            </div>
                                            <div class="form-group">
                                                <label for="fuelType">Fuel Type</label>
                                                <select class="form-control" id="fuelType" name="fuelType">
                                                    <option value="">Select Fuel Type</option>
													<?php 
													$query = "SELECT * FROM `fueltype` ORDER BY ID";
													$result = $db_handle->runQuery($query);
													foreach ($result as $rowDep1) {
														?>
														<option value="<?php echo $rowDep1["ID"];?>"><?php echo $rowDep1["FuelType"];?></option>
														<?php		
													}
													?>
												</select>
                                               
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addVehicle">Add</button>
                                            </div>
                                        </div>
                                        <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
                                        <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
                                    </form>
                                    <br>
                                    <div id="vehicleList">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">Vehicle ID</th>
                                                    <th style="text-align:center;">Vehicle Type</th>
                                                    <th style="text-align:center;">Fuel Type</th>
                                                </tr>
                                            </thead>
                                           <tbody>
											<?php
											
											 $queryA = "SELECT * FROM `projectregistration` ORDER BY `projectID` ASC";
											$resultA = $db_handle->runQuery($queryA); 
											$i=0;
											if(!empty($resultA)){
												foreach ($resultA as $r) {
													$ID=$r['ID'];
											
													
													?>
													<tr id="show">
														<td style ="text-align:left;" id="ProjectID-<?php echo $ID; ?>"><?php echo $r['ProjectID']; ?></td>
														<td style ="text-align:left;" id="ProjectName-<?php echo $ID; ?>"><?php echo $r['ProjectName']; ?></td>
														<td style ="text-align:left;" id="ProjectManager-<?php echo $ID; ?>"><?php echo $r['ProjectManager']; ?></td>
														<td style ="text-align:left;" id="Distance-<?php echo $ID; ?>"><?php echo $r['Distance']; ?></td>
														<td style ="text-align:left;" id="workers-<?php echo $ID; ?>"><?php echo $r['workers']; ?></td>
														<td style="width:150px;"><div class="btn-group project-list-action"><button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $ID; ?>"><i class="fa fa-pencil"></i> Edit</button></div>
														<div class="btn-group project-list-action"><button class="btn btn-white btn-xs Delete" id="<?php echo $ID; ?>"><i class="fa fa-trash"></i></i> Del</button></div></td>
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
    <?php include('../../Include/footer.php'); ?>
</body>

</html>

