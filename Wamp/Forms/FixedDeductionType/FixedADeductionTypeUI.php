<?php
// Database connection
require_once("../../Connection/dbconnecting.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fixed Deduction Type</title>
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
                                    <a href="../FixedDeduction/FixedADeductionUI.php" class="btn btn-primary">Fixed Deduction Management</a>
                                </div>
                                <div class="menu-container">
                                    <a href="../FixedDeductionType/FixedADeductionTypeUI.php" class="btn btn-primary">Fixed Deduction Type</a>
                                </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                            <li><span class="bread-blod">Fixed Deduction Type</span></li>
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
                                        <h1>Fixed Deduction Type</h1>
                                        <div class="sparkline8-outline-icon">
                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                            <span><i class="fa fa-wrench"></i></span>
                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="sparkline8-graph">
                                    <form id="fixedDeductionForm" name="fixedDeductionForm" method="post" autocomplete="off" action="">
                                        <div class="container">
                                            <div class="form-group">
                                                <label for="allowanceDescription">Allowance Description</label>
                                                <input type="text" class="form-control" id="allowanceDescription" name="allowanceDescription" maxlength="50" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary" id="addDeduction">Add</button>
                                            </div>
                                        </div>
                                        <div class="alertSave" id="Save_AlertCSS" style="display:none"></div>
                                        <div class="alertWarning" id="Warning_AlertCSS" style="display:none"></div>
                                    </form>
                                    <br>
                                    <div id="deductionList">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">ID</th>
                                                    <th style="text-align:center;">Allowance Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $queryA = "SELECT * FROM `fixeddeductiontype` ORDER BY `ID` ASC";
                                            $resultA = $db_handle->runQuery($queryA); 
                                            if (!empty($resultA)) {
                                                foreach ($resultA as $r) {
                                                    $ID = $r['ID'];
                                                    ?>
                                                    <tr id="show">
                                                        <td style="text-align:left;" id="ID-<?php echo $ID; ?>"><?php echo $r['ID']; ?></td>
                                                        <td style="text-align:left;" id="AllowanceDescription-<?php echo $ID; ?>"><?php echo $r['AllowancesDescription']; ?></td>
                                                        <td style="width:150px;">
                                                            <div class="btn-group deduction-list-action">
                                                                <button class="btn btn-white btn-xs Update btn-hover-edit" id="<?php echo $ID; ?>"><i class="fa fa-pencil"></i> Edit</button>
                                                            </div>
                                                            <div class="btn-group deduction-list-action">
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
        $("#addDeduction").click(function() {
            var allowanceDescription = $("#allowanceDescription").val();
            var dataString = 'allowanceDescription=' + allowanceDescription;

            if (allowanceDescription == '') {
                $(".alertWarning").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';"></span>Allowance Description is required!');
                $(".alertWarning").fadeIn().delay(2000).fadeOut();
            } else {
                $.ajax({
                    type: "POST",
                    url: "FixedDeductionTypeProcess.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        $("#deductionList").html(html);
                        $("#fixedDeductionForm")[0].reset();
                        $(".alertSave").fadeIn(100).html(' <span class="closebtn" onclick="this.parentElement.style.display=\'none\';\"></span>Allowance added successfully!');
                        $(".alertSave").fadeIn().delay(2000).fadeOut();
                    }
                });
            }
            return false;
        });
    });
</script>
