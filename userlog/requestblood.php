


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
                    <h1 class="page-header">Donate Blood Section</h1>
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
                                <form role="form" action="requestnow.php" method="POST">

                                <div class="form-group">
    <label>Enter user Name</label>
    <input class="form-control" placeholder="Harry Den" type="text" name="name" required>
</div>
<div class="form-group">
    <label>Enter Address</label>
    <input class="form-control" type="text" placeholder="Full Address" name="address" required>
</div>
<div class="form-group">
    <label>Requested Blood</label>
    <?php
    // Check if the 'id' query parameter is set in the URL
    if (isset($_GET['id'])) {
        // Retrieve the 'id' from the query parameter
        $id = $_GET['id'];

        // Include your database connection script
        $con = mysqli_connect("localhost", "root", "", "bin");

        // Query the database to retrieve donor information based on the ID
        $qry = "SELECT * FROM donor WHERE id = $id";
        $result = mysqli_query($con, $qry);
        if ($row = mysqli_fetch_assoc($result)) {
            // Display the donor information
            $bloodgroup = $row['bloodgroup']; // Store the blood group in a variable
            echo '
            <input class="form-control" type="text" placeholder="' . $bloodgroup . '" name="bloodgroup" required>
            ';
        }
    }

?>        





</div>
<div class="form-group">
    <label>Enter Contact Number</label>
    <input class="form-control" type="number" name="contact" required>
</div>
<div class="form-group">
    <label>Enter email</label>
    <input class="form-control" type="email" placeholder="gmail.com" name="email" required>
</div>

<div class="form-group">
    <label>Enter reason</label>
    <input class="form-control" type="text" name="reason" required>
</div>
<input type="hidden" name="donor_id" value="<?php echo $id; ?>">


<button type="submit" class="btn btn-success" id="submitButton">Submit</button>

</form>
</div>
</div> <!-- Close the 'row' and 'panel-body' divs -->
</div> <!-- Close the 'panel' div -->
</div> <!-- Close the 'col-lg-12' div -->
</div> <!-- Close the 'row' div -->
</div> <!-- Close the 'page-wrapper' div -->
</div> <!-- Close the 'wrapper' div -->

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

</html>
