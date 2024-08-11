<?php
// Database connection
require_once("../../Connection/dbconnecting.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fixed Allowances</title>
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
									
									
                                        <div class="menu-container">
                                    <a href="../FixedAllowances/FixedAllowanceUI.php" class="btn btn-primary">Fixed Allowance Management</a>
                                </div>
                                <div class="menu-container">
                                    <a href="../FixedAllowanceType/FixedAllowanceTypeUI.php" class="btn btn-primary">Fixed Allowance Type</a>
                                </div>
                               
								
								
											
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                            <li><span class="bread-blod">Fixed Allowances</span></li>
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
                                        <h1>Fixed Allowances</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <form id="fixedAllowancesForm" name="fixedAllowancesForm" method="post" autocomplete="off" action="">
                                        <div class="container">
                                            <div class="form-group">
                                                <label for="employeeID">Employee ID</label>
                                                <select class="form-control" id="employeeID" name="employeeID">
                                                    <option value="">Select Employee ID</option>
                                                    <?php 
                                                    $query = "SELECT * FROM `employee` ORDER BY EmployeeID";
                                                    $result = $db_handle->runQuery($query);
                                                    foreach ($result as $row) {
                                                        echo '<option value="'.$row["EmployeeID"].'">'.$row["EmployeeCode"].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="employeeName">Employee Name</label>
                                                <select class="form-control" id="employeeName" name="employeeName">
                                                    <option value="">Select Employee Name</option>
                                                    <?php 
                                                    foreach ($result as $row) {
                                                        echo '<option value="'.$row["EmployeeID"].'">'.$row["FirstName"].' '.$row["LastName"].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="allowancesTypeID">Allowance Type</label>
                                                <select class="form-control" id="allowancesTypeID" name="allowancesTypeID">
                                                    <option value="">Select Allowance Type</option>
                                                    <?php 
                                                    $query = "SELECT * FROM `fixedallowancetype` ORDER BY ID";
                                                    $result = $db_handle->runQuery($query);
                                                    foreach ($result as $row) {
                                                        echo '<option value="'.$row["ID"].'">'.$row["AllowancesDescription"].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <input type="text" class="form-control" id="amount" name="amount" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addFixedAllowance">Add</button>
                                            </div>
                                        </div>
                                        <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
                                        <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
                                    </form>
                                    <br>
                                    <div id="fixedAllowancesList">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">Employee Code</th>
                                                    <th style="text-align:center;">Employee Name</th>
                                                    <th style="text-align:center;">Allowance Type</th>
                                                    <th style="text-align:center;">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $queryA = "SELECT fa.*, e.FirstName, e.LastName,e.EmployeeCode, fat.AllowancesDescription ,e.DepartmentID
														FROM `fixedallowances` fa 
                                                       JOIN `employee` e ON fa.EmployeeID = e.EmployeeID
													   
                                                       JOIN `fixedallowancetype` fat ON fa.AllowancesTypeID = fat.ID
                                                       ORDER BY fa.AEID ASC";
                                            $resultA = $db_handle->runQuery($queryA); 
                                            if (!empty($resultA)) {
                                                foreach ($resultA as $r) {
                                                    $ID = $r['AEID'];
                                                    ?>
                                                    <tr id="show">
                                                        <td style="text-align:left;" id="EmployeeID-<?php echo $ID; ?>"><?php echo $r['EmployeeCode']; ?></td>
                                                        <td style="text-align:left;" id="EmployeeName-<?php echo $ID; ?>"><?php echo $r['FirstName'].' '.$r['LastName']; ?></td>
                                                        <td style="text-align:left;" id="AllowancesTypeID-<?php echo $ID; ?>"><?php echo $r['AllowancesDescription']; ?></td>
                                                        <td style="text-align:right;" id="Amount-<?php echo $ID; ?>"><?php echo number_format($r['Amount'],2); ?></td>
                                                        <td style="width:150px;">
                                                            <div class="btn-group fixedAllowances-list-action">
                                                                <button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $ID; ?>"><i class="fa fa-pencil"></i> Edit</button>
                                                            </div>
                                                            <div class="btn-group fixedAllowances-list-action">
                                                                <button class="btn btn-white btn-xs Delete" id="<?php echo $ID; ?>"><i class="fa fa-trash"></i> Del</button>
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
    <?php include('../../Include/footer.php'); ?>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    $(function() {
        $("#addFixedAllowance").click(function() {
            var employeeID = $("#employeeID").val();
            var allowancesTypeID = $("#allowancesTypeID").val();
            var amount = $("#amount").val();
            var dataString = 'employeeID=' + employeeID + '&allowancesTypeID=' + allowancesTypeID + '&amount=' + amount;

            if (employeeID == '' || allowancesTypeID == '' || amount == '') {
                $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';\"></span>All fields are required!');
                $(".alertWarning").fadeIn().delay(2000).fadeOut();
            } else {
                $.ajax({
                    type: "POST",
                    url: "FixedAllowancesProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $("#fixedAllowancesList").html(html);
                        $("#fixedAllowancesForm")[0].reset();
                        $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';\"></span>Fixed Allowance added successfully!');
                        $(".alertSave").fadeIn().delay(2000).fadeOut();
                    }
                });
            }
            return false;
        });

        $("#employeeID").change(function() {
            var employeeID = $(this).val();
            $("#employeeName").val(employeeID);
        });

        $("#employeeName").change(function() {
            var employeeName = $(this).val();
            $("#employeeID").val(employeeName);
        });
    });
</script>
