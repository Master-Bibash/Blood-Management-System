<?php
  $servername="localhost";
  $uname="root";
  $pass="";
  $db="secyear";
  
  $conn=mysqli_connect($servername,$uname,$pass,$db);
  
  if(!$conn){
      die("Connection Failed");
  }else{
      echo "done";
  }
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['name'])) {
    $name = $_POST["name"];
    $bloodgroup = $_POST["bloodgroup"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $amount= $_POST["amount"];
    $reason = $_POST["reason"];

  

    // Insert the donation request into the request_doner table
    $insertQuery = "INSERT INTO emergency (name, bloodgroup,address, contact,amount, reason)
                    VALUES ('$name', '$bloodgroup', '$address','$contact','$amount', '$reason')";
    $result = mysqli_query($conn, $insertQuery);

    if (!$result) {
        echo "ERROR";
    } else {
        // Check if the requested blood is available and has sufficient weight
       echo "dooo";
}
}

?>


<!-- Rest of the HTML code remains the same -->


<!-- Rest of the HTML code remains the same -->



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
        <div id="snackbar"></div>

        <div id="page-wrapper">
            <div class="row">
                <div class=".col-lg-12">
                    <h1 class="page-header">Request Blood Now</h1>
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
                                    <form role="form" action="#" method="POST">

                                        <div class="form-group">
                                            <label>Enter username</label>
                                            <input class="form-control" placeholder="Harry Den" type="text" name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Blood Group you want</label>
                                            <input class="form-control" type="text" placeholder="Example: B+, O-, B-" name="bloodgroup" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Address</label>
                                            <input class="form-control" type="text" placeholder="Full Address" name="address" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Contact Number</label>
                                            <input class="form-control " type="number" name="contact" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter the weight of blood</label>
                                            <input class="form-control" type="int" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter your reason to take the blood</label>
                                            <input class="form-control" type="text" name="reason" required>
                                        </div>


                                        <button type="submit" class="btn btn-success">Request Now</button>

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
    <p>&copy; <?php echo date("Y"); ?>: Developed By Bibash, Sangita, Sindhu, Aman</p>
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