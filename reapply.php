<?php
require("global.php");
if(mysqli_query($conn, "Update applicants set approved = 0, denied = 0, action_date = NULL Where user_id='" . $_GET['id'] . "'")){
	header("location: maintenance.php");
}else{
	echo "Update applicants set approved = 1, action_date = NOW() Where user_id='" . $_GET['id'] . "'";
}
?>