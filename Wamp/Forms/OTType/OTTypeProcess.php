<?php
require_once("../../Connection/dbconnecting.php");

if (isset($_POST["description"])) {
    $description = $_POST["description"];

    // Check for duplicate records
    $resultA = $db_handle->runQuery("SELECT * FROM `ottype` WHERE `Description`='$description'");
    if ($resultA instanceof mysqli_result && $resultA->num_rows > 0) {
        echo '<script>
            $(".alertWarning").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>Duplicate Record!");
            $(".alertWarning").fadeIn().delay(2000).fadeOut();
        </script>';
    } else {
        // Insert new record
        $result = $db_handle->insertQuery("INSERT INTO `ottype` (`Description`) VALUES ('$description')");
        if ($result) {
            echo '<script>
                $(".alertSave").fadeIn(100).html(" <span class=\"closebtn\" onclick=\"this.parentElement.style.display=\'none\';\"></span>OT Type added successfully!");
                $(".alertSave").fadeIn().delay(2000).fadeOut();
            </script>';
        }
    }

    // Fetch updated list of OT types
    $queryA = "SELECT * FROM `ottype` ORDER BY `OTTypeID` ASC";
    $resultA = $db_handle->runQuery($queryA);
    if (!empty($resultA)) {
        echo '<table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">OTTypeID</th>
                    <th style="text-align:center;">Description</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($resultA as $r) {
            $ID = $r['OTTypeID'];
            echo '<tr id="show">
                <td style="text-align:left;" id="OTTypeID-' . $ID . '">' . $r['OTTypeID'] . '</td>
                <td style="text-align:left;" id="Description-' . $ID . '">' . $r['Description'] . '</td>
                <td style="width:150px;">
                    <div class="btn-group otType-list-action">
                        <button class="btn btn-white btn-xs Update btn-hover-edit" id="' . $ID . '"><i class="fa fa-pencil"></i> Edit</button>
                    </div>
                    <div class="btn-group otType-list-action">
                        <button class="btn btn-white btn-xs Delete" id="' . $ID . '"><i class="fa fa-trash"></i> Del</button>
                    </div>
                </td>
            </tr>';
        }
        echo '</tbody></table>';
    }
}
?>
