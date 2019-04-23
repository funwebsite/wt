<?php 
$mysqli = mysqli_connect("localhost","root","","ass6");
$id=$_POST["id"];
$name=$_POST["name"];
$age=$_POST["age"];
$city=$_POST["city"];
$type=$_POST["type"];

if ($type=="create") {
	$result = mysqli_query($mysqli,"INSERT INTO student (name,age,city) VALUES('$name','$age','$city')");
	echo "<h1>".$result." Row affected</h1> <p>Data Inserted Successfully</p>";
}
elseif ($type=="search") {
	$result = mysqli_query($mysqli,"SELECT * FROM student WHERE id='$id'");

	if(mysqli_num_rows($result) > 0){

		while($row = mysqli_fetch_assoc($result)){
		echo "ID is:".$row["id"]."<br> Name is:".$row["name"]."<br>Age is:".$row["age"]."<br>City is:".$row["city"];
		}
	}
	else{

		echo "<h4> NO Data Available for Selected ID <h4>";
	}

}
elseif ($type=="update") {
	$result = mysqli_query($mysqli,"SELECT * FROM student WHERE id='$id'");
	if(mysqli_num_rows($result)>0){
		$result = mysqli_query($mysqli,"UPDATE student SET name='$name',age='$age',city='$city' WHERE id='$id'");
		echo "<br>Updated Rows count is :".$result."<p>Updated ID ".$id." Successfully</p>";
	}
	else
	{
		echo "<br><p>No data with ID ".$id." Found</p>";
	}

}
elseif ($type=="delete") {
	$result = mysqli_query($mysqli,"DELETE FROM student where id='$id'");
	echo "<br>Rows affected".$result."<p>ID ".$id." Deleted Successfully</p>";
}
elseif ($type=="all") {

	$result = mysqli_query($mysqli,"SELECT * FROM student");

	echo "<h1>Showing all contents of Database</h1>";

	if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
          echo "<br><br><hr>ID is:".$row["id"]."<br> Name is:".$row["name"]."<br>Age is:".$row["age"]."<br>City is:".$row["city"]."<hr>";
            }
         } else {
            echo "0 results, Empty Database";
         }

}

?>
