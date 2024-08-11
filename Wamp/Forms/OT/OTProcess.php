<?php
require_once("../../Connection/dbconnecting.php");

if (isset($_POST["employeeID"]) && isset($_POST["otTypeID"]) && isset($_POST["month"]) && isset($_POST["otHours"])) {
    $employeeID = $_POST["employeeID"];
    $otTypeID = $_POST["otTypeID"];
    $month = $_POST["month"];
    $otHours = $_POST["otHours"];

    // Check for duplicate records
    $resultA = $db_handle->runQuery("SELECT * FROM `ot` WHERE `EmployeeID`='$employeeID' AND `OTTypeID`='$otTypeID' AND `Month`='$month'");
    if ($resultA instanceof mysqli_result && $resultA->num_rows > 0) {
        echo '<script>
            $(".alertWarning").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Duplicate Record!");
            $(".alertWarning").fadeIn().delay(2000).fadeOut();
        </script>';
    } else {
        // Insert new record
        $result = $db_handle->insertQuery("INSERT INTO `ot` (`EmployeeID`, `OTTypeID`, `Month`, `OTHours`) VALUES ('$employeeID', '$otTypeID', '$month', '$otHours')");
        if ($result) {
            echo '<script>
                $(".alertSave").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>OT record added successfully!");
                $(".alertSave").fadeIn().delay(2000).fadeOut();
            </script>';
        }
    }

    // Fetch updated list of OT records
    $queryA = "SELECT o.*, e.FirstName, e.LastName, ot.Description FROM `ot` o 
               JOIN `employee` e ON o.EmployeeID = e.EmployeeID
               JOIN `ottype` ot ON o.OTTypeID = ot.OTTypeID
               ORDER BY o.ID ASC";
    $resultA = $db_handle->runQuery($queryA);
    if (!empty($resultA)) {
        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">ID</</th>
                    <th style="text-align:center;">Employee ID</th>
                    <th style="text-align:center;">OT Type</th>
                    <th style="text-align:center;">Month</th>
                    <th style="text-align:center;">OT Hours</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($resultA as $r) {
            $ID = $r['ID'];
            echo '<tr id="show">
                <td style="text-align:left;" id="ID-' . $ID . '">' . $r['ID'] . '</td>
                <td style="text-align:left;" id="EmployeeID-' . $ID . '">' . $r['EmployeeID'] . '</td>
                <td style="text-align:left;" id="OTTypeID-' . $ID . '">' . $r['Description'] . '</td>
                <td style="text-align:left;" id="Month-' . $ID . '">' . $r['Month'] . '</td>
                <td style="text-align:left;" id="OTHours-' . $ID . '">' . $r['OTHours'] . '</td>
                <td style="width:150px;">
                    <div class="btn-group ot-list-action">
                        <button class="btn btn-white btn-xs Update btn-hover-edit" id="' . $ID . '"><i class="fa fa-pencil"></i> Edit</button>
                    </div>
                    <div class="btn-group ot-list-action">
                        <button class="btn btn-white btn-xs Delete" id="' . $ID . '"><i class="fa fa-trash"></i> Del</button>
                    </div>
                </td>
            </tr>';
        }
        echo '</tbody></table>';
    }
}
?>
