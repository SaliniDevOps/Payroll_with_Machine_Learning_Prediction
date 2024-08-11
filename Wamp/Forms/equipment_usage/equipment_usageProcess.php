<?php
require_once("../../Connection/dbconnecting.php");

if(isset($_POST["equipmentID"])) {
    $equipmentID = $_POST["equipmentID"];
    $projectID = $_POST["projectID"];
    $usageHours = $_POST["usageHours"];
    $fuelType = $_POST["fuelType"];
    $usageDate = $_POST["usageDate"];
    $emissions = $_POST["emissions"];

    // Insert new record
    $result = $db_handle->insertQuery("INSERT INTO `equipment_usage` (`EquipmentID`, `ProjectID`, `UsageHours`, `FuelType`, `UsageDate`, `Emissions`) 
    VALUES('$equipmentID', '$projectID', '$usageHours', '$fuelType', '$usageDate', '$emissions')");

    // Fetch updated list of equipment usage
    $queryA = "SELECT * FROM `equipment_usage` ORDER BY `UsageDate` DESC";
    $resultA = $db_handle->runQuery($queryA);
    if(!empty($resultA)) {
        echo '<table class="table table-bordered">
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
            <tbody>';
        foreach ($resultA as $r) {
            echo '<tr>
                <td style="text-align:center;">' . $r['EquipmentID'] . '</td>
                <td style="text-align:center;">' . $r['ProjectID'] . '</td>
                <td style="text-align:center;">' . $r['UsageHours'] . '</td>
                <td style="text-align:center;">' . $r['FuelType'] . '</td>
                <td style="text-align:center;">' . $r['UsageDate'] . '</td>
                <td style="text-align:center;">' . $r['Emissions'] . '</td>
            </tr>';
        }
        echo '</tbody></table>';
    }
}
?>
