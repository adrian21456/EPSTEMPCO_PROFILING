<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/animate.css">

</head>
<body>
	<div class="main-w3layouts wrapper" style="margin-top: -20px">
		<div class="main-agileinfo" style="width: 80% !important">
			<div class="agileits-top">
				<h1 style="font-family: Arial !important; margin-bottom: 40px;">Update Profile</h1>
				<form action="javascript:void(0)" method="post" onsubmit="register();">

					<div class="wthree-text" style="margin-bottom: 20px !important">
						<label class="anim">
							<span>Personal Information</span>
						</label>
					</div>

					<?php
					$conn = mysqli_connect('localhost', 'root', '', 'profiling');
					$sql = mysqli_query($conn, "Select * from applicants Where user_id='" . $_GET['id'] . "'");
					if($row = mysqli_fetch_assoc($sql)){
						?>

						<input class="text" type="text" name="name" placeholder="Name" required="" value="<?php echo $row['name']; ?>">
						<input class="text" type="text" name="civil_status" placeholder="Civil Status" required="" value="<?php echo $row['civil_status']; ?>">
						<input class="text" type="text" name="birthplace" placeholder="Birthplace" required="" value="<?php echo $row['birth_place']; ?>">
						<input class="text" type="date" name="birthday" placeholder="Date of Birth" required="" value="<?php echo $row['birthday']; ?>">
						<input class="text" type="text" name="address" placeholder="Present Address" required="" value="<?php echo $row['address']; ?>">
						<input class="text" type="text" name="occupation" placeholder="Occupation" required="" value="<?php echo $row['occupation']; ?>">
						<input class="text" type="text" name="salary" placeholder="Salary (Monthly) Php" required="" value="<?php echo $row['salary']; ?>">
						<input class="text" type="text" name="religion" placeholder="Program/Religion" required="" value="<?php echo $row['religion']; ?>">
						<input class="text" type="text" name="office_address" placeholder="Office Address" required="" value="<?php echo $row['office_address']; ?>">
						<input class="text" type="text" name="father" placeholder="Father's Name" required="" value="<?php echo $row['father']; ?>">
						<input class="text" type="text" name="mother" placeholder="Mother's Name" required="" value="<?php echo $row['mother']; ?>">
						<input class="text" type="text" name="spouse" placeholder="Spouse (If married)" id="rem" value="<?php echo $row['spouse']; ?>">
						<input class="text" type="text" name="spouse_occupation" placeholder="Spouse Occupation" id="rem" value="<?php echo $row['spouse_occupation']; ?>">

						<div class="wthree-text" style="margin-bottom: 20px !important">
							<label class="anim">
								<span>Beneficiaries</span>
							</label>
						</div>

						<input class="text" type="text" name="ben1" placeholder="" id="rem">
						<input class="text" type="text" name="ben2" placeholder="" id="rem">
						<input class="text" type="text" name="ben3" placeholder="" id="rem">

						<div class="wthree-text" style="margin-bottom: 20px !important">
							<label class="anim">
								<span>Authentication</span>
							</label>
						</div>

						<input class="text" type="text" name="username" placeholder="Username" required="" value="<?php echo $row['username']; ?>">
						<input class="text" type="Password" name="password" placeholder="Password" required="" value="<?php echo $row['password']; ?>">

						<?php 
					}
					?>

	
					<input type="submit" value="UPDATE" style=" margin-bottom: 0px !important; margin-top: 20px !important; ">
					<input type="submit" value="CANCEL" onclick="document.location.replace('../index.php')" style=" margin-bottom: 0px !important; margin-top: 20px !important; ">
				</form>
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function register(){
		var id = '<?php echo $_GET['id']; ?>';
		$.ajax({
			type: 'POST',
			url: '../update.php',
			data: $('form').serialize(),
			success: function(data){
				console.log(data);
				if(data == "true"){
					alert("Your profile has been updated");
					document.location.replace("../profile.php?id=" + id);
				}else{
					alert("An error has occured");
				}
			}
		});
		return false;
	}
</script>
</html>
