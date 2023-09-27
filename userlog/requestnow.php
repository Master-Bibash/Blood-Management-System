<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $donor_id = $_POST["donor_id"]; // Retrieve the donor's ID from the form
    $name = $_POST["name"];
    $address = $_POST["address"];
    $bloodgroup = $_POST["bloodgroup"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $reason = $_POST["reason"];
    // Perform additional validation or sanitization of the data if necessary

    // Create a database connection
    $conn = mysqli_connect("localhost", "root", "", "bin");

    // Check connection
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the insert query
    $sql = "INSERT INTO blood_requests (donor_id, name, address, bloodGroup, contact, email, reason) 
    VALUES ('$donor_id', '$name', '$address', '$bloodgroup', '$contact', '$email', '$reason')";

    if (mysqli_query($conn, $sql)) {
        // Data successfully inserted
        echo '<script>alert("Request has been sent!"); window.location = "requestblood.php";</script>';
        exit();
    } else {
        // Error with database insertion
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
