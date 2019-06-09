<table class="table">
	<thead>
		<th width="60%">Name</th>
		<th>Membership Status</th>
		<th width="10%"><span class="text-center"></span></th>
	</thead>
	<?php
	require("global.php");
	$sql = "";
	if($_GET['id'] != "null"){
		$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 and name LIKE '%" . $_GET['id'] . "%' order by name");
	}else{
		$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 order by name");
	}

	$count = mysqli_num_rows($sql);
	if($count > 0){
		while($row = mysqli_fetch_array($sql)){
			$status = "unindentified";
			if($row["approved"] == "0" && $row["denied"] == "0"){
				$status = "PENDING";
			}elseif($row["approved"] == "1" && $row["denied"] == "0"){
				$status = "APPROVED";
			}elseif($row["approved"] == "0" && $row["denied"] == "1"){
				$status = "DENIED";
			}
			?>
			<tr>
				<td><h6><?php echo $row["name"]; ?></h6></td>
				<td><h6><?php echo $status; ?></h6></td>
				<td><h6 style="margin-left: 0px !important;">&nbsp;&nbsp;&nbsp;<a href="profile.php?id=<?php echo $row['user_id']; ?>" class="text-primary" style="font-size: 14px; font-family: Arial; font-weight: bold; margin-top: -5px;">VIEW</a></h6></td>
			</tr>
			<?php
		}
	}else{

	}
	?>
</table>