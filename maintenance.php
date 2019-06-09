<?php 
require("header.php");
require("global.php");
?>

<!--content -->
<div class="content row1">
	<div class="container-fluid">
		<h5><b>List of applicants</b></h5>
		<div class="col-sm-9" style="margin-left: -10px;">
			<table class="table">
				<thead>
					<th width="40%">Name</th>
					<th>Date Applied</th>
					<th width="30%"><span class="text-center">Actions</span></th>
				</thead>
				<?php
				$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 and approved = 0 and denied = 0 order by name");
				$count = mysqli_num_rows($sql);
				if($count > 0){
					while($row = mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><h6><?php echo $row["name"]; ?></h6></td>
							<td><h6><?php echo date("F d, Y", strtotime($row["timestamp"])); ?></h6></td>
							<td><h6 style="margin-left: 0px !important;">&nbsp;&nbsp;&nbsp;<a href="profile.php?id=<?php echo $row['user_id']; ?>" class="text-primary" style="font-size: 14px; font-family: Arial; font-weight: bold; margin-top: -5px;">VIEW</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="approve('<?php echo $row['user_id']; ?>')" class="text-success" style="font-size: 14px; font-family: Arial; font-weight: bold; margin-top: -5px;">APPROVE</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deny('<?php echo $row['user_id']; ?>')" class="text-danger" style="font-size: 14px; font-family: Arial; font-weight: bold; margin-top: -5px;">DENY</a></h6></td>
						</tr>
						<?php
					}
				}else{

				}
				?>
			</table>
		</div>
		

		<!--------------- PART TWO ------------>
	
		<h5><b>List of denied applicants</b></h5>
		<div class="col-sm-9" style="margin-left: -10px;">
			<table class="table">
				<thead>
					<th width="40%">Name</th>
					<th>Date Applied</th>
					<th width="30%"><span class="text-center">Actions</span></th>
				</thead>
				<?php
				$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 and approved = 0 and denied = 1 order by name");
				$count = mysqli_num_rows($sql);
				if($count > 0){
					while($row = mysqli_fetch_array($sql)){
						?>
						<tr>
							<td><h6><?php echo $row["name"]; ?></h6></td>
							<td><h6><?php echo date("F d, Y", strtotime($row["timestamp"])); ?></h6></td>
							<td><h6 style="margin-left: 0px !important;">&nbsp;&nbsp;&nbsp;<a href="profile.php?id=<?php echo $row['user_id']; ?>" class="text-primary" style="font-size: 14px; font-family: Arial; font-weight: bold; margin-top: -5px;">VIEW</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="approve('<?php echo $row['user_id']; ?>')" class="text-warning" style="font-size: 14px; font-family: Arial; font-weight: bold; margin-top: -5px;">RE-APPLY</a></h6></td>
						</tr>
						<?php
					}
				}else{

				}
				?>
			</table>
		</div>
		



</div>

<script>
	function approve(x){
		if(confirm('Do you re-apply this applicant?')){
			document.location.replace("reapply.php?id=" + x);
		}
	}
</script>


<?php
require("footer.php");
?>  