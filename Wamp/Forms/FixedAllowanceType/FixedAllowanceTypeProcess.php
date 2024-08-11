<?php
require_once("../../Connection/dbconnecting.php");

if (isset($_POST["allowanceDescription"])) {
    $allowanceDescription = $_POST["allowanceDescription"];

    // Check for duplicate records
    $resultA = $db_handle->runQuery("SELECT * FROM `fixedallowancetype` WHERE `AllowancesDescription`='$allowanceDescription'");
    if ($resultA instanceof mysqli_result && $resultA->num_rows > 0) {
        echo '<script>
            $(".alertWarning").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Duplicate Record!");
            $(".alertWarning").fadeIn().delay(2000).fadeOut();
        </script>';
    } else {
        // Insert new record
        $result = $db_handle->insertQuery("INSERT INTO `fixedallowancetype` (`AllowancesDescription`) VALUES ('$allowanceDescription')");
        if ($result) {
            echo '<script>
                $(".alertSave").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Allowance added successfully!");
                $(".alertSave").fadeIn().delay(2000).fadeOut();
            </script>';
        }
    }

    // Fetch updated list of allowances
    $queryA = "SELECT * FROM `fixedallowancetype` ORDER BY `ID` ASC";
    $resultA = $db_handle->runQuery($queryA);
    if (!empty($resultA)) {
        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;">Allowance Description</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($resultA as $r) {
            $ID = $r['ID'];
            echo '<tr id="show">
                <td style="text-align:left;" id="ID-' . $ID . '">' . $r['ID'] . '</td>
                <td style="text-align:left;" id="AllowanceDescription-' . $ID . '">' . $r['AllowancesDescription'] . '</td>
                <td style="width:150px;">
                    <div class="btn-group allowance-list-action">
                        <button class="btn btn-white btn-xs Update btn-hover-edit" id="' . $ID . '"><i class="fa fa-pencil"></i> Edit</button>
                    </div>
                    <div class="btn-group allowance-list-action">
                        <button class="btn btn-white btn-xs Delete" id="' . $ID . '"><i class="fa fa-trash"></i> Del</button>
                    </div>
                </td>
            </tr>';
        }
        echo '</tbody></table>';
    }
}
?>
