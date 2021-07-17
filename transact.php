<?php 

	session_start();
	include 'config.php';

	if(isset($_GET['Name'])){
		$Name=$_GET['Name'];
	}

	$q="SELECT * From customers WHERE Name='$Name'";
	$result=mysqli_query($con,$q);
	$row_count=mysqli_num_rows($result);
	$_SESSION['senderName']=$Name;
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>Transaction</title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">The Sparks Bank</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="customer.php">View Customers</a>
                        <a class="nav-link active" href="transfermoney.php">Transfer Money</a>
                        <a class="nav-link" href="transactionhistory.php">View Transaction History</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <h1 style="color:white;">Account Details</h1>
    <body style="background-color:#1B3F8B;">

    <br>
    <div>
        <table class="table table-success table-striped table-hover">
        <thead>
                <th>CUSTOMER ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
            </thead>
            <tbody>
            <tr text-align = center>		
                <?php  while($row=mysqli_fetch_array($result)){ ?>		
                    <td><?php echo  $row["C_ID"]; ?></td>
                    <td><?php echo  $row["Name"]; ?></td>
                    <td><?php echo  $row["Email"]; ?></td>
                    <td><?php echo  $row["Balance"]; ?></td>
            </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

           
    <br><br>
	<h1 style="color:white">Select Reciever</h1>
	<?php echo "<form method='post' action='transaction.php?Name=$Name'>"?>

	

    <table class="table table-success table-striped table-hover">
    <tr>
		<td>Transfer To:</td>
		<td><select class="form-select" name="user" aria-label="Default select example">
			<option>--Select--</option>
   
			<?php  
				$q1="select * from customers";
				$result1=mysqli_query($con,$q1);
				while($row=mysqli_fetch_array($result1)){
			?>

			<option value="<?php echo $row['Name']; ?>"> <?php echo $row["Name"]; ?></option>

			<?php }
			?>
			
            </select></td></tr> 
			<tr><td>Amount:</td><td><input type="text" class="form-control"  name="Amount"></td></tr>
			<tr><td></td><td><button type="submit" name="submit" value="Submit" class="btn btn-primary mb-3">Submit</button></td></tr>
		
    </table>


</form>

    


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>