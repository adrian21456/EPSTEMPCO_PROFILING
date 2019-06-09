<?php
require("global.php");

$sql = mysqli_query($conn, "Select * from applicants where username='" . $_POST['username'] . "' and password='" . $_POST["password"] . "'");

$results = array();

if(mysqli_num_rows($sql) > 0)
{
	array_push($results, "true");
	while($row = mysqli_fetch_assoc($sql)){
		array_push($results, $row["access_level"]);
		array_push($results, $row["user_id"]);
		array_push($results, $row["name"]);
	}
}else{
	array_push($results, "false");
}

echo json_encode($results);

?>