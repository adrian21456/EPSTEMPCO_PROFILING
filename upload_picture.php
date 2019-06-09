<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$raw = 'requirement_' . date('m-d-Y_hisa') . '.jpg';
$new_filename = $target_dir . $raw;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
}

if (file_exists($target_file)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}

if ($_FILES["image"]["size"] > 50000000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}

if($imageFileType != "jpg") {
	echo "Sorry, only JPG are allowed.";
	$uploadOk = 0;
}

if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
}else {
	if (move_uploaded_file($_FILES["image"]["tmp_name"], $new_filename)) {
		require('global.php');
		if(mysqli_query($conn, "Update applicants Set profile_picture='$raw' Where user_id='" . $_COOKIE['user_id'] . "'")){
			header("location:profile.php?id=" . $_COOKIE['user_id']);
		}else{
			echo "An error has occured";
		}

	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}

?>