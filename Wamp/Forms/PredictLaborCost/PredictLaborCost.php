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
	//include('DesignationsAjax.php');
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
<div class="container">
    <div class="admin-dashone-data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Predict Labor Cost</h1>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <!--form id="laborCostForm" method="post">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="projectDuration" style="text-align: left; display: block;">Project Duration (days):</label>
                                            <input type="number" class="form-control" id="projectDuration" name="projectDuration" required>

                                            <label for="holidays" style="text-align: left; display: block;">Holidays (days):</label>
                                            <input type="number" class="form-control" id="holidays" name="holidays" required>

                                            <label for="hourlyRate" style="text-align: left; display: block;">Hourly Rate (units):</label>
                                            <input type="number" class="form-control" id="hourlyRate" name="hourlyRate" required>

                                            <label for="numWorkers" style="text-align: left; display: block;">Number of Workers:</label>
                                            <input type="number" class="form-control" id="numWorkers" name="numWorkers" required>

                                            <div class="form-group" style="text-align: left; display: block;"><br>
                                                <input type="submit" value="Predict Labor Cost" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form-->
							
							<form id="laborCostForm" method="post">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label for="projectStartDate" style="text-align: left; display: block;">Project Start Date:</label>
											<input type="date" class="form-control" id="projectStartDate" name="projectStartDate" required>

											<label for="projectEndDate" style="text-align: left; display: block;">Project End Date:</label>
											<input type="date" class="form-control" id="projectEndDate" name="projectEndDate" required>

											<label for="holidays" style="text-align: left; display: block;">Holidays (days):</label>
											<input type="number" class="form-control" id="holidays" name="holidays" required>

											<label for="hourlyRate" style="text-align: left; display: block;">Hourly Rate (units):</label>
											<input type="number" class="form-control" id="hourlyRate" name="hourlyRate" required>

											<label for="numWorkers" style="text-align: left; display: block;">Number of Workers:</label>
											<input type="number" class="form-control" id="numWorkers" name="numWorkers" required>

											<div class="form-group" style="text-align: left; display: block;"><br>
												<input type="submit" value="Predict Labor Cost" class="btn btn-primary">
											</div>
										</div>
									</div>
								</div>
							</form>
							
                            <div id="result" class="mt-4"></div>
                            <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
                            <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#laborCostForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting via the browser
        $.ajax({
            url: 'predict_labor_cost.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#result').html(response);
            },
            error: function(xhr, status, error) {
                $('#result').html('<div class="alert alert-danger">Error: ' + error + '</div>');
            }
        });
    });
});
</script>
        </div>
    </div>
    <?php include('../../Include/footer.php'); ?>
</body>

</html>
