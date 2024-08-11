<?php 
	//open connection
	require_once("../../Connection/dbconnecting.php");


if (isset($_POST['Row_ID']) && isset($_POST['updates'])) {
    $id = $_POST['Row_ID'];
    $updates = $_POST['updates'];
    
    $updateQueries = [];
    foreach ($updates as $column => $value) {
        $updateQueries[] = "$column = '$value'";
    }
    $updateString = implode(", ", $updateQueries);

    echo $query = "UPDATE employees SET $updateString WHERE EmployeeID = '$id'";

    // Log the query to the error log
    error_log("Update Query: $query");

    $result = $db_handle->updateQuery($query);

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        // Capture the error message
        $error_message = $db_handle->error;
        error_log("Update Query Error: " . $error_message);
        echo json_encode(['success' => false, 'error' => $error_message]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request parameters.']);
}
?>







