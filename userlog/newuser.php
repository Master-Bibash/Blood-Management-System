

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
</head>

<body>
    <div id="wrapper">
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
                                    <form role="form" action="index.php" method="post">
                                    <?php
// useraddedblood.php

// Include the database connection
include '../pages/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $bloodgroup = $_POST["bloodgroup"];
    $disease = $_POST["disease"]; 
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $available = $_POST["available"];

    // Insert data into the database
    $qry = "INSERT INTO donor (username, password, gender, dob, bloodgroup, disease, email, address, contact, available) 
            VALUES ('$name', '$password', '$gender', '$dob', '$bloodgroup', '$disease', '$email', '$address', '$contact', '$available')";
    
    try {
        // Execute the query
        if (mysqli_query($conn, $qry)) {
            // Data insertion successful, redirect to the login page
            echo '<script>alert("Record added successfully."); window.location.href = "userlogin.php";</script>';
            exit;
        } else {
            // Other errors
            echo "ERROR: " . mysqli_error($conn);
        }
    } catch (mysqli_sql_exception $e) {
        // Check for duplicate entry errors (error code 1062 for duplicate entry)
        if ($e->getCode() === 1062) {
            echo '<script>alert("Error: Email or Contact already exists."); window.location.href = "userlogin.php";</script>';
        } else {
            echo "ERROR: " . $e->getMessage();
        }
    }
}

// Close the database connection
mysqli_close($conn);
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

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?>: Developed by Bibash, Sangita, Sindhu, Aman</p>
    </footer>

    <style>
        footer {
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
</body>

</html>