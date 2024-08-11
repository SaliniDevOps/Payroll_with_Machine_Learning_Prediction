<?php
require_once("../../Connection/dbconnecting.php");

if (isset($_POST["employeeID"]) && isset($_POST["deductionTypeID"]) && isset($_POST["amount"])) {
    $employeeID = $_POST["employeeID"];
    $deductionTypeID = $_POST["deductionTypeID"];
    $amount = $_POST["amount"];

    // Check for duplicate records
    $resultA = $db_handle->runQuery("SELECT * FROM `variencededuction` WHERE `EmployeeID`='$employeeID' AND `DeductionTypeID`='$deductionTypeID'");
    if ($resultA instanceof mysqli_result && $resultA->num_rows > 0) {
        echo '<script>
            $(".alertWarning").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Duplicate Record!");
            $(".alertWarning").fadeIn().delay(2000).fadeOut();
        </script>';
    } else {
        // Insert new record
        $result = $db_handle->insertQuery("INSERT INTO `variencededuction` (`EmployeeID`, `DeductionTypeID`, `Amount`) VALUES ('$employeeID', '$deductionTypeID', '$amount')");
        if ($result) {
            echo '<script>
                $(".alertSave").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Variance Deduction added successfully!");
                $(".alertSave").fadeIn().delay(2000).fadeOut();
            </script>';
        }
    }

    // Fetch updated list of variance deductions
    $queryA = "SELECT vd.*, e.FirstName, e.LastName, vdt.DeductionDescription FROM `variencededuction` vd 
               JOIN `employee` e ON vd.EmployeeID = e.EmployeeID
               JOIN `variancedeductiontype` vdt ON vd.DeductionTypeID = vdt.ID
               ORDER BY vd.AEID ASC";
    $resultA = $db_handle->runQuery($queryA);
    if (!empty($resultA)) {
        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">AEID</th>
                    <th style="text-align:center;">Employee ID</th>
                    <th style="text-align:center;">Employee Name</th>
                    <th style="text-align:center;">Deduction Type</th>
                    <th style="text-align:center;">Amount</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($resultA as $r) {
            $ID = $r['AEID'];
            echo '<tr id="show">
                <td style="text-align:left;" id="AEID-' . $ID . '">' . $r['AEID'] . '</td>
                <td style="text-align:left;" id="EmployeeID-' . $ID . '">' . $r['EmployeeID'] . '</td>
                <td style="text-align:left;" id="EmployeeName-' . $ID . '">' . $r['FirstName'] . ' ' . $r['LastName'] . '</td>
                <td style="text-align:left;" id="DeductionTypeID-' . $ID . '">' . $r['DeductionDescription'] . '</td>
                <td style="text-align:left;" id="Amount-' . $ID . '">' . $r['Amount'] . '</td>
                <td style="width:150px;">
                    <div class="btn-group varianceDeductions-list-action">
                        <button class="btn btn-white btn-xs Update btn-hover-edit" id="' . $ID . '"><i class="fa fa-pencil"></i> Edit</button>
                    </div>
                    <div class="btn-group varianceDeductions-list-action">
                        <button class="btn btn-white btn-xs Delete" id="' . $ID . '"><i class="fa fa-trash"></i> Del</button>
                    </div>
                </td>
            </tr>';
        }
        echo '</tbody></table>';
    }
}
?>
