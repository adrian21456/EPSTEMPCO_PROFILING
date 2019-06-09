<?php

if(!(isset($_COOKIE["user_id"]))){
	header("location: reg/login.php");
}else{
	if($_COOKIE["access_level"] == 0){
		header("location: dashboard.php");
	}else{
		header("location: profile.php?id=" . $_COOKIE["user_id"]);
	}
}
?>