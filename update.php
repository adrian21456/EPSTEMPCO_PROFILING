<?php
require("global.php");

$name = $_POST["name"];
$civil_status = $_POST["civil_status"];
$birth_place = $_POST["birthplace"];
$birthday = $_POST["birthday"];
$address = $_POST["address"];
$occupation = $_POST["occupation"];
$salary = $_POST["salary"];
$religion = $_POST["religion"];
$office_address = $_POST["office_address"];
$father = $_POST["father"];
$mother = $_POST["mother"];
$spouse = $_POST["spouse"];
$spouse_occupation = $_POST["spouse_occupation"];
$beneficiaries = '';
$ben = array();
$username = $_POST["username"];
$password = $_POST["password"];


if($_POST["ben1"] != ""){
	array_push($ben, $_POST["ben1"]);
}
if($_POST["ben2"] != ""){
	array_push($ben, $_POST["ben2"]);
}
if($_POST["ben3"] != ""){
	array_push($ben, $_POST["ben3"]);
}

$beneficiaries = json_encode($ben);

if(mysqli_query($conn, "UPDATE `applicants` SET 
	`name`='$name',
	`civil_status`='$civil_status',
	`birth_place`='$birth_place',
	`birthday`='$birthday',
	`address`='$address',
	`occupation`='$occupation',
	`salary`='$salary',
	`religion`='$religion',
	`office_address`='$office_address',
	`father`='$father',
	`mother`='$mother',
	`spouse`='$spouse',
	`spouse_occupation`='$spouse_occupation',
	`beneficiaries`='$beneficiaries',
	`username`='$username',
	`password`='$password'
	WHERE user_id= " . $_POST['id'])){
	echo "true";
}else{
	echo "UPDATE `applicants` SET 
	`name`='$name',
	`civil_status`='$civil_status',
	`birth_place`='$birth_place',
	`birthday`='$birthday',
	`address`='$address',
	`occupation`='$occupation',
	`salary`='$salary',
	`religion`='$religion',
	`office_address`='$office_address',
	`father`='$father',
	`mother`='$mother',
	`spouse`='$spouse',
	`spouse_occupation`='$spouse_occupation',
	`beneficiaries`='$beneficiaries',
	`username`='$username',
	`password`='$password'
	WHERE user_id= " . $_POST['id'];
}