
<?php 

$conn = new PDO("mysql:host=localhost;dbname=users", "root", "");
//delete query
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$del_q = "DELETE FROM ctg256 WHERE id='$id'";
	$del_st = $conn->prepare($del_q);
	$del_st->execute();
	header("location:index.php");
}




//data insert into database

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	//$pass = $_POST['pass'];
	//$conf_pass =$_POST['conf_pass'];
	$email = $_POST['email'];
	$q = "INSERT INTO ctg256 (name ,email) VALUES ('$name', '$email' )";
	$statement = $conn->prepare($q);
	$statement->execute();
	

}

	//data get from database
	$data_get_sql = "SELECT * FROM ctg256";
	$get_statement = $conn->prepare($data_get_sql);
	$get_statement->execute();
	$result = $get_statement->fetchALL(); 

?>


<!DOCTYPE html>
<html>
<head>
	<title>inser data</title>
	
</head>
<body class="body">

<form action="" method="post" class="form-control">
	<table border="1px">
		<tr>
			<td>Name:</td><td><input type="name" name="name" required placeholder="Name"></td><br>

		</tr>
		<!-- <tr>
			<td>Password:</td><td><input type="Password" name="pass" required placeholder="Password"></td><br>

		</tr>
		<tr>
			<td>Confirm Password:</td><td><input type="Password" name="conf_pass" required placeholder="Confirm Password"></td><br>

		</tr> -->
		<tr>
			<td>Email:</td><td><input type="email" name="email" required placeholder="Email"></td><br>

		</tr>
		<tr><td colspan="3" align="center" class="form-submit"><input type="submit" name="submit" value="Submit"></td></tr>
	</table>
</form>	

	<table class="update-table" border="3px" style="margin-top: 40px;">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>

		<?php 
		foreach ($result as $value) {
		?>

		<tr>
			<td><?php echo $value['name'] ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><a class="btn" href="?delete=<?php echo $value['id']; ?>">Delete</a> || <a class="updated-btn" href="update.php?id=<?php echo $value['id']; ?>">Update</a></td>
		</tr>

			<?php   }   ?>
	</table>

<style>
	.body{
		position: relative;
		background-image: url(images/bg.jpg);
	}
	.form-control{
		position:absolute; 
		
		left: 20%;
		color: white;

	}
	.form-submit{
		width: 150px;
		color: white;
		height: 30px;

	}


	/*update table*/

	.update-table{
		position: absolute;
		right: 20%;
		color: white;
		
		
	}

	/*delete section*/
	.btn{
		background-color: green;
		color: white;
	}

	/*updated-btn*/
	.updated-btn{
		background-color: orange;
	}

</style>

</body>
</html>