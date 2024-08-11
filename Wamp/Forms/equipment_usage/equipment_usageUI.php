<?php
// Database connection
require_once("../../Connection/dbconnecting.php");
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Equipment and Machinery Usage</title>
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
        <?php include('../../Include/sidebar.php'); ?>
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
                                            <li><span class="bread-blod">Equipment Usage</span></li>
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
                                        <h1>Equipment and Machinery Usage</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <form id="equipmentForm" name="equipmentForm" method="post" autocomplete="off" action="">
                                        <div class="container">
                                            <div class="form-group">
                                                <label for="equipmentID">Equipment ID</label>
                                                <input type="text" class="form-control" id="equipmentID" name="equipmentID">
                                            </div>
                                            <div class="form-group">
                                                <label for="projectID">Project ID</label>
                                                <input type="text" class="form-control" id="projectID" name="projectID">
                                            </div>
                                            <div class="form-group">
                                                <label for="usageHours">Usage Hours</label>
                                                <input type="text" class="form-control" id="usageHours" name="usageHours">
                                            </div>
                                            <div class="form-group">
                                                <label for="fuelType">Fuel Type</label>
                                                <select class="form-control" id="fuelType" name="fuelType">
                                                    <option value="diesel">Diesel</option>
                                                    <option value="gasoline">Gasoline</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="usageDate">Usage Date</label>
                                                <input type="date" class="form-control" id="usageDate" name="usageDate">
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addEquipment">Add</button>
                                            </div>
                                        </div>
                                        <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
                                        <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
                                    </form>
                                    <br>
                                    <div id="equipmentList">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">Equipment ID</th>
                                                    <th style="text-align:center;">Project ID</th>
                                                    <th style="text-align:center;">Usage Hours</th>
                                                    <th style="text-align:center;">Fuel Type</th>
                                                    <th style="text-align:center;">Usage Date</th>
                                                    <th style="text-align:center;">Emissions (kg CO2)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Populate this with data from your database -->
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

<script type="text/javascript">
    $(function() {
        $("#addEquipment").click(function() {
            var equipmentID = $("#equipmentID").val();
            var projectID = $("#projectID").val();
            var usageHours = $("#usageHours").val();
            var fuelType = $("#fuelType").val();
            var usageDate = $("#usageDate").val();

            // Calculate emissions (simple example, you might need a more complex calculation)
            var emissionFactor = fuelType === 'diesel' ? 2.68 : 2.31;
            var emissions = usageHours * emissionFactor; // Adjust this calculation as needed

            var dataString = 'equipmentID='+ equipmentID + '&projectID='+ projectID + '&usageHours='+ usageHours + '&fuelType='+ fuelType + '&usageDate='+ usageDate + '&emissions='+ emissions;

            if(equipmentID == '' || projectID == '' || usageHours == '' || fuelType == '' || usageDate == ''){
                $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';\"></span>All fields are required!');
                $(".alertWarning").fadeIn().delay(2000).fadeOut();
            }else{
                $.ajax({
                    type: "POST",
                    url: "equipment_usageProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(html){
                        $("#equipmentList").html(html);
                        $("#equipmentForm")[0].reset();
                        $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';\"></span>Equipment usage added successfully!');
                        $(".alertSave").fadeIn().delay(2000).fadeOut();
                    }
                });
            }
            return false;
        });
    });
</script>
