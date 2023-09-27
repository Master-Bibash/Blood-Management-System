<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "bin");
if(!$con){
die("connection failes:".mysqli_connect_error());
}

// Check if the user is not logged in or not an admin
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if 'user_id' is not set in the session
    header("Location: ../index.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Fetch form data
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $bloodgroup = $_POST["bloodgroup"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $disease = $_POST["disease"];
    $contact = $_POST["contact"];
    $collection = $_POST["collection"];
    $available = $_POST["available"];

    // Function to check if the user is eligible to donate blood
    function isEligibleToDonateBlood($name, $contact, $email, $conn) {
        // ... (same as before) ...
    }

    // Check if the user has already donated blood in the last 30 days
    $eligible = isEligibleToDonateBlood($name, $contact, $email, $con);

    // Check if the collection date is older than 30 days
// Check if the collection date is older than 30 days
$select_sql = "SELECT collection FROM donor WHERE id = ?";
$stmt = mysqli_prepare($con, $select_sql);
mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if ($row && $collection != $row['collection'] && strtotime($row['collection']) > strtotime('-30 days')) {
    // Collection date is trying to be updated before 30 days, prevent it and display an alert
    echo "<script>alert('You can only change the collection date after 30 days from the last collection date.'); window.location.href='userdashboard.php';</script>";
    exit;
}


    // Proceed with updating the other fields
    $update_sql = "UPDATE donor SET username = ?, gender = ?, dob = ?, bloodgroup = ?, email = ?, disease = ?, address = ?, contact = ?, available = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $update_sql);
    mysqli_stmt_bind_param($stmt, "sssssssssi", $name, $gender, $dob, $bloodgroup, $email, $disease, $address, $contact, $available, $_SESSION['id']);

    // Execute the prepared statement
  // Execute the prepared statement
  if (mysqli_stmt_execute($stmt)) {
    // Data update successful, display an alert
    echo '<script>alert("Blood details have been updated successfully.");</script>';
} else {
    echo "ERROR: " . mysqli_error($con);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);



    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($con);
?>
<!-- Rest of your HTML code for useraddedblood.php goes here -->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include 'includes/nav.php'?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Blood Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please fill up the form below:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                <form role="form" action="newuser.php" method="POST">

<div class="form-group">
    <label>Enter user Name</label>
    <input class="form-control" placeholder="Harry Den" type="text" name="name" required>
</div>

<div class="form-group">
    <label>Enter Password</label>
    <input class="form-control" placeholder="Password" type="password" name="password" required>
</div>

<div class="form-group">
    <label>Enter email address</label>
    <input class="form-control" placeholder="@gmail.com" type="email" name="email" required>
</div>
<div class="form-group">
    <label>Gender [ M/F ]</label>
    <input class="form-control" placeholder="M for Male & F for Female" type="text" name="gender" required>
</div>

<div class="form-group">
    <label>Enter D.O.B</label>
    <input class="form-control" type="date" name="dob" required>
</div>

<div class="form-group">
    <label>Any disease</label>
    <input class="form-control" type="text" placeholder="disease name or no" name="disease" required>
</div>

<div class="form-group">
    <label>Enter Blood Group</label>
    <input class="form-control" type="text" placeholder="Example: B+, O-, B-" name="bloodgroup" required>
</div>

<div class="form-group">
    <label>Enter Address</label>
    <input class="form-control" type="text" placeholder="Full Address" name="address" required>
</div>

<div class="form-group">
    <label>Enter Contact Number</label>
    <input class="form-control" type="number" name="contact" required>
</div>

<!-- <div class="form-group">
        <label>Blood Quantity</label>
        <input class="form-control" type="number" name="bloodqty" required>
    </div> -->

<div class="form-group">
    <!-- <label>Collection Date</label>
        <input class="form-control" type="date" name="collection" id="collectionDate" required>
<span id="dateErrorMessage" style="color: red;"></span> -->
</div>

<div class="form-group">
    <label>Available or not</label>
    <select class="form-control" name="available">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</div>



<button type="submit" class="btn btn-success" id="submitButton">Submit</button>

</form>

                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

<footer>
        <p>&copy; <?php echo date("Y"); ?>Developed By Bibash,Sangita,Sindhu,Aman</p>
    </footer>
	
	<style>
	footer{
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
	</style>

</html>
