
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BMS</title>

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
    <!-- <div id="wrapper"> -->
        <!-- <div id="page-wrapper"> -->
            <div class="container-fluid">
                <div class="row">
                    <div class=".col-lg-12">
                        <h1 class="page-header">Blood Collection</h1>
                

                <!-- <div class="row"> -->
                <div class=".col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Total Records of available bloods
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <?php
                                        include "../pages/dbconnect.php";

                                        $qry = "SELECT * FROM donor";
                                        $result = mysqli_query($conn, $qry);

                                        echo "
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Gender</th>
                                                <th>D.O.B</th>
                                                <th>Blood Group</th>
                                                <th>Email</th>
                                                <th>Disease</th>
                                                <th>Address</th>
                                                <th>Contact</th>
                                                <th>Collection Date</th>
                                                <th>availabele</ th>
                                                <th>Request Blood</th>
                                              
                                            </tr>
                                        </thead>";

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                            <tbody>
                                                <tr class='gradeA'>
                                                    <td>" . $row['username'] . "</td>
                                                    <td>" . $row['gender'] . "</td>
                                                    <td>" . $row['dob'] . "</td>
                                                    <td>".$row['bloodgroup']."</td>
                                                    <td>".$row['email']."</td>
                                                    <td>".$row['disease']."</td>
                                                    <td>" . $row['address'] . "</td>
                                                    <td>" . $row['contact'] . "</td>
                                                    <td>" . $row['collection'] . "</td>
                                                    <td>" .$row['available']."</td>
                                                    <td><button><a href='requestblood.php?id=" . $row['id'] . "'>Request blood</a></button></td>
                                                </tr>
                                            <tbody>";
                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    


</body>

<footer>
        <p>&copy; <?php echo date("Y"); ?>: Developed by Bibash,Sangita,Sindhu,Aman</p>
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