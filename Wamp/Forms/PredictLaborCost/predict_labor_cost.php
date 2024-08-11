<?php
/*

	// Using Date Diffeence

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $projectDuration = $_POST['projectDuration'];
    $holidays = $_POST['holidays'];
    $hourlyRate = $_POST['hourlyRate'];
    $numWorkers = $_POST['numWorkers'];

    // Prepare the data to send to the Flask API
    $data = [
        'ProjectDuration' => (int)$projectDuration,
        'Holidays' => (int)$holidays,
        'HourlyRate' => (float)$hourlyRate,
        'NumWorkers' => (int)$numWorkers
    ];

    // Convert the data to JSON
    $data_json = json_encode($data);

    // Send the data to the Flask API using cURL
    $ch = curl_init('http://192.168.0.168:5000/predict');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    // Get the response from the Flask API
    $response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response
    $response_data = json_decode($response, true);

    // Display the prediction
    if (isset($response_data['predicted_labor_cost'])) {
        $predicted_labor_cost = $response_data['predicted_labor_cost'];
        echo "<div class='alert alert-success'>Predicted Labor Cost: $predicted_labor_cost</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: Unable to predict labor cost.</div>";
    }
}
*/


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $projectStartDate = $_POST['projectStartDate'];
    $projectEndDate = $_POST['projectEndDate'];
    $holidays = $_POST['holidays'];
    $hourlyRate = $_POST['hourlyRate'];
    $numWorkers = $_POST['numWorkers'];

    // Calculate project duration
    $startDate = new DateTime($projectStartDate);
    $endDate = new DateTime($projectEndDate);
    $interval = $startDate->diff($endDate);
    $projectDuration = $interval->days;

    // Prepare the data to send to the Flask API
    $data = [
        'ProjectDuration' => (int)$projectDuration,
        'Holidays' => (int)$holidays,
        'HourlyRate' => (float)$hourlyRate,
        'NumWorkers' => (int)$numWorkers
    ];

    // Convert the data to JSON
    $data_json = json_encode($data);

    // Send the data to the Flask API using cURL
    $ch = curl_init('http://192.168.0.168:5000/predict');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

    // Get the response from the Flask API
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        echo "<div class='alert alert-danger'>cURL Error: $error_msg</div>";
    } else {
        // Decode the JSON response
        $response_data = json_decode($response, true);

        // Check for API errors
        if (isset($response_data['predicted_labor_cost'])) {
            $predicted_labor_cost = $response_data['predicted_labor_cost'];
            echo "<div class='alert alert-success'>Predicted Labor Cost: $predicted_labor_cost</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . json_encode($response_data) . "</div>";
        }
    }

    curl_close($ch);
}






?>
