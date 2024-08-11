<?php
require_once("../../Connection/dbconnecting.php");

if(isset($_POST["employeeID"])) {
    $employeeID = $_POST["employeeID"];
    $trainingName = $_POST["trainingName"];
    $trainingProvider = $_POST["trainingProvider"];
    $completionDate = $_POST["completionDate"];
    $expirationDate = $_POST["expirationDate"];

    // Insert new record
    $result = $db_handle->insertQuery("INSERT INTO `training_certificates` (`EmployeeID`, `TrainingName`, `TrainingProvider`, `CompletionDate`, `ExpirationDate`) 
    VALUES('$employeeID', '$trainingName', '$trainingProvider', '$completionDate', '$expirationDate')");

    // Fetch updated list of training certificates
    $queryA = "SELECT tc.*, e.FirstName, e.LastName 
               FROM `training_certificates` tc
               JOIN `employee` e ON tc.EmployeeID = e.EmployeeID
               ORDER BY `ExpirationDate` DESC";
    $resultA = $db_handle->runQuery($queryA);
    if(!empty($resultA)) {
        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">Employee</th>
                    <th style="text-align:center;">Training Name</th>
                    <th style="text-align:center;">Training Provider</th>
                    <th style="text-align:center;">Completion Date</th>
                    <th style="text-align:center;">Expiration Date</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($resultA as $r) {
            echo '<tr>
                <td style="text-align:center;">' . $r['FirstName'] . ' ' . $r['LastName'] . '</td>
                <td style="text-align:center;">' . $r['TrainingName'] . '</td>
                <td style="text-align:center;">' . $r['TrainingProvider'] . '</td>
                <td style="text-align:center;">' . $r['CompletionDate'] . '</td>
                <td style="text-align:center;">' . $r['ExpirationDate'] . '</td>
            </tr>';
        }
        echo '</tbody></table>';
    }
}
?>
