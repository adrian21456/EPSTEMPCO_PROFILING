<?php
require("header.php");
require("global.php");
?>

<!--content -->
<div class="content row1">
	<div class="container-fluid">
		<h5 style="margin-top:0px;"><b>List of Members and Applicants &nbsp; <a href="reg/new_member.php" style="font-weight: 600; text-decoration: underline;">New Applicant</a></b></h5>
		<div class="row">
			<div><h6 class="search">Search Applicant: </h6></div>
			<div class="col-sm-5">
				<input type="text" id="search" oninput="load()" name="search" class="form-control" placeholder="Applicant's or Member's name">
			</div>
		</div>
		<div class="col-sm-9" id="cont" style="margin-left: -10px; padding-top: 20px">
			<table class="table">
				<thead>
					<th width="60%">Name</th>
					<th>Membership Status</th>
					<th width="10%"><span class="text-center"></span></th>
				</thead>
				<?php
				$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 order by name");


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
		</div>
	</div>
</div>

<script type="text/javascript">

	function load(){
		//console.log($('#search').val());
		$('#cont').empty();
		$('#cont').load('applicant_table.php?id=' + $('#search').val());
	};
</script>


<?php
require("footer.php");
?>  