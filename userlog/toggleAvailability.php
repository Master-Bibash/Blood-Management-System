<?php
// Include the database connection
include '../pages/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Fetch the data from the AJAX request
    $id = $_POST["id"];
    $available = $_POST["available"];

    // Toggle the "available" value (i.e., change 'yes' to 'no' and 'no' to 'yes')
    $newAvailable = ($available === 'yes') ? 'no' : 'yes';

    // Update the "available" value in the "blood" table
    $update_sql = "UPDATE blood SET available = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($stmt, "si", $newAvailable, $id);

    $response = array();
    if (mysqli_stmt_execute($stmt)) {
        // Set the success flag to true
        $response["success"] = true;
    } else {
        // Set the success flag to false
        $response["success"] = false;
        $response["error"] = "Failed to update availability.";
    }

    // Send the JSON response back to the AJAX request
    echo json_encode($response);
}
?>
