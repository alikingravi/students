<?php
require 'header.php';
require_once 'Database.php';

//Connect to database
$db = new Database('localhost', 'root', 'test123', 'test');

//$db->insert('students', 'Christy', 'Conner', 'christy@yahoo.com', '07983335555');

	// $db->query('SELECT * FROM `students` WHERE id=2');

// $db->query("SELECT * FROM students RIGHT JOIN student_addresses ON students.id = student_addresses.student_id");

// $db->query("SELECT SUM(sales) FROM products GROUP BY category");

$db->query("SELECT SUM(sales) FROM products WHERE category='lounge'");



if ($db->numRows()==0) {
	echo "No data available";
}
else{
	foreach ($db->rows() as $key => $value) {
		foreach ($value as $name => $info) {

			echo $name . ": ";
			echo $info . "<br/>";
		}
	}
}


?>

<!-- <section id="students">
	<div class="student-form">
		<h1>Registration</h1><br/>
		<form action="" method="post">
			<div class="form-group">
				<label>First Name</label>	
				<input type="text" name="firstname" class="form-control" autocorrect="off" placeholder="First Name">
			</div>

			<div class="form-group">
				<label>Last Name</label>	
				<input type="text" name="lastname" class="form-control" autocorrect="off" placeholder="Last Name">
			</div>

			<div class="form-group">
				<label>Email</label>	
				<input type="email" name="email" class="form-control" autocorrect="off" placeholder="Email Address">
			</div>

			<div class="form-group">
				<label>Phone Number</label>	
				<input type="text" name="phone" class="form-control" autocorrect="off" placeholder="Phone Number">
			</div>

			<input type="submit" class="btn btn-success" value="Save Details">
		</form>
	</div>
</section>

</body>
</html> -->