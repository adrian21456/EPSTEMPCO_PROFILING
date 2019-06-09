<?php
require('global.php');
if(mysqli_query($conn, "Update applicants Set profile_picture='" . $_POST['image'] . "' Where user_id='" . $_COOKIE['user_id'] . "'")){
	echo "true";
}else{
	echo "Update applicants Set profile_picture='" . $_POST['image'] . "' Where user_id='" . $_COOKIE['user_id'] . "'";
}
?>