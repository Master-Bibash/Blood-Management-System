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

        <?php include 'includes/nav.php'?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Blood Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Please make your changes by updating the form below:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                <?php
									include 'dbconnect.php';
									$id=$_GET['id'];
									$qry= "select * from donor where id='$id'";
									$result=mysqli_query($conn,$qry);
                                    
									while($row=mysqli_fetch_array($result)){
									?> 

                                <form role="form" action="editedblood.php?id=<?php echo $id; ?>" method="post">
                                     
                                  
                                <div class="form-group">
                                            <label>Enter Full Name</label>
                                            <input class="form-control" placeholder="Harry Den" type="text" name="name" value="<?php echo $row['username']; ?>" required>
                                        </div>

<div class="form-group">
    <label>Gender [ M/F ]</label>
    <input class="form-control" placeholder="M for Male & F for Female" type="text" name="gender" value="<?php echo $row['gender']; ?>" required>
</div>

<div class="form-group">
    <label>Enter D.O.B</label>
    <input class="form-control" type="date" name="dob" value="<?php echo $row['dob']; ?>" required>
</div>

<div class="form-group">
    <label>Enter Email</label>
    <input class="form-control" type="email" placeholder="email" name="email" value="<?php echo $row['email']; ?>" required>
</div>

<div class="form-group">
    <label>Any disease</label>
    <input class="form-control" type="text" placeholder="disease name or no" name="disease" value="<?php echo $row['disease']; ?>" required>
</div>

<div class="form-group">
    <label>Enter Blood Group</label>
    <input class="form-control" type="text" placeholder="Example: B+, O-, B-" name="bloodgroup" value="<?php echo $row['bloodgroup']; ?>" required>
</div>

<div class="form-group">
    <label>Enter Address</label>
    <input class="form-control" type="text" placeholder="Full Address" name="address" value="<?php echo $row['address']; ?>" required>
</div>

<div class="form-group">
    <label>Enter Contact Number</label>
    <input class="form-control" type="number" name="contact" value="<?php echo $row['contact']; ?>" required>
</div>

<div class="form-group">
    <label>Collection Date</label>
    <input class="form-control" type="date" name="collection" id="collectionDate" value="<?php echo $row['collection']; ?>" required>
    <span id="dateErrorMessage" style="color: red;"></span>
</div>

<div class="form-group">
    <label>Available or not</label>
    <select class="form-control" name="available">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</div>

<button type="submit" class="btn btn-success" name="submit" id="submitButton">Submit</button>

</form>
                                </div>

						<?php
						}
						?>
                                
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
        <p>&copy; <?php echo date("Y"); ?>: Developed By Sangita,Sindhu,Aman,Bibash<</p>
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
                             
