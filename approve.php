<?php
require("global.php");
if(mysqli_query($conn, "Update applicants set approved = 1, action_date = NOW() Where user_id='" . $_GET['id'] . "'")){
	header("location: applicants.php");
}else{
	echo "Update applicants set approved = 1, action_date = NOW() Where user_id='" . $_GET['id'] . "'";
}
?>