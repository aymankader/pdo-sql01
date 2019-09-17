

<?php 

$conn = new PDO("mysql:host=localhost;dbname=users", "root", "");

if (isset($_POST['submit'])) {
	
}



$del_id = $_GET['id'];
//get data

//update data in database
	$data_get_sql = "SELECT * FROM ctg256 WHERE id='$del_id'";
	$get_statement = $conn->prepare($data_get_sql);
	$get_statement->execute();
	$result = $get_statement->fetchALL(); 


?>


<!DOCTYPE html>
<html>
<head>
	<title>
		

	</title>
</head>
<body>

<?php 
foreach ($result as $value) {
	


 ?>


<form action="" method="post" class="form-control">
	<table border="1px" class="update-table">
		<tr>
			<td>Name:</td><td><input type="name" name="name" required placeholder="Name" value="<?php $value['name'] ?>"></td><br>

		</tr>
		<!-- <tr>
			<td>Password:</td><td><input type="Password" name="pass" required placeholder="Password"></td><br>

		</tr>
		<tr>
			<td>Confirm Password:</td><td><input type="Password" name="conf_pass" required placeholder="Confirm Password"></td><br>

		</tr> -->
		<tr>
			<td>Email:</td><td><input type="email" name="email" required placeholder="Email" value="<?php $value['email'] ?>  "></td><br>

		</tr>
		<tr><td colspan="3" align="center" class="form-submit"><input type="submit" name="submit" value="update"></td></tr>
	</table>
</form>	
<?php 
}

 ?>
<style>
	
.update-table{
	margin-left: 40%;
	margin-top: 20%;
}


</style>

</body>
</html>