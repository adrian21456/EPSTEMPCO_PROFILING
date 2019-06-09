<?php
require("header.php");
require("global.php");
?>

<!--content -->
<div class="content row1">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-sm-6" style="">
				<h5><b>Profile Information</b></h5>
				<?php

				$sql = mysqli_query($conn, "Select * from applicants Where user_id='" . $_GET['id'] . "'");
				if($row = mysqli_fetch_assoc($sql)){
					$beneficiaries = "";
					foreach(json_decode($row["beneficiaries"]) as $ben){
						$beneficiaries = $beneficiaries . '<li style="margin-top:5px;">' . $ben . '</li>';
					}

					$requirements = "";
					foreach(json_decode($row["requirements"]) as $ben){
						$requirements = $requirements . '<li style="margin-top:5px;"><a href="uploads/' . $ben . '">' . $ben . '</a></li>';
					}

					?>
					<h5>Name: <?php echo $row["name"]; ?></h5>
					<h5>Civil Status: <?php echo $row["civil_status"]; ?></h5>
					<h5>Birthplace: <?php echo $row["birth_place"]; ?></h5>
					<h5>Date of Birth: <?php echo $row["birthday"]; ?></h5>
					<h5>Present Address: <?php echo $row["address"]; ?></h5>
					<h5>Occupation: <?php echo $row["occupation"]; ?></h5>
					<h5>Salary: Php.  <?php echo $row["salary"]; ?></h5>
					<h5>Program/Religion: <?php echo $row["religion"]; ?></h5>
					<h5>Office Address: <?php echo $row["office_address"]; ?></h5>
					<h5>Name of Father: <?php echo $row["father"]; ?></h5>
					<h5>Name of Mother: <?php echo $row["mother"]; ?></h5>
					<h5>Spouse: <?php echo $row["spouse"]; ?></h5>
					<h5>Spouse Occupation: <?php echo $row["spouse_occupation"]; ?></h5>
					<h5>Beneficiaries: <br><ul style="margin-top: 10px"><?php echo $beneficiaries; ?></ul></h5>
					<h5>Requirements Submitted: <br><ul style="margin-top: 10px"><?php echo $requirements; ?></ul></h5>
					<?php if($_COOKIE["access_level"] != "100"){
						?>

						<h6><a href="update_requirements.php?id=<?php echo $_GET['id']; ?>">Update Requirements</a></h6>
						<h6><a href="reg/update_profile.php?id=<?php echo $_GET['id']; ?>">Update Application Profile</a></h6>
						<?php
					}
					?>
					
				</div>
				<div class="col-sm-5">
					<div class="second_row">
						<img src="uploads/<?php echo $row['profile_picture']; ?>" class="img1"><br>
					</div>
					<?php if($_COOKIE["access_level"] != "100"){
						?>
						<h6><a href="update_profile_pic.php?id=<?php echo $_GET['id']; ?>">Update Profile Picture</a></h6>
						<?php
					}
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
</div>

<?php
require("footer.php");
?>  