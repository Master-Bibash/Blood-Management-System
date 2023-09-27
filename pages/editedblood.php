<!DOCTYPE html>
<html lang="en">

<head>

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


</head>

<body>

    <div id="wrapper">

        <?php include 'includes/nav.php'?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">BBMS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MESSAGE BOX
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#" method="post">

                                    <?php
// editedblood.php

// Include the database connection file
include 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the 'id' parameter from the URL
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if (!$id || $id <= 0) {
        // Invalid 'id' value, redirect the user back to the original form page with an error message
        header("Location: original_form_page.php?error=1");
        exit();
    }

    // Retrieve the data from the form
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $disease = $_POST['disease'];
    $bloodgroup = $_POST['bloodgroup'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $collection = $_POST['collection'];
    $available = $_POST['available'];

    // Update the donor's information in the database
    $query = "UPDATE donor 
              SET username='$name', gender='$gender', dob='$dob', email='$email', 
                  disease='$disease', bloodgroup='$bloodgroup', address='$address', 
                  contact='$contact', collection='$collection', available='$available' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        // If the update is successful, redirect the user back to the original form page with a success message
        header("Location: original_form_page.php?success=1");
        exit();
    } else {
        // If there is an error with the update, redirect the user back to the original form page with an error message
        header("Location: original_form_page.php?error=1");
        exit();
    }
} else {
    // Redirect the user back to the original form page if accessed directly without a POST request
    header("Location: original_form_page.php");
    exit();
}
?>



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
        <p>&copy; <?php echo date("Y"); ?>: Developed By Sangita,Sindhu,Aman,Bibash</p>
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
