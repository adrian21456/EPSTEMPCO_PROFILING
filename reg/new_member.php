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
				<h1 style="font-family: Arial !important; margin-bottom: 40px;">Add new Applicant</h1>
				<form action="javascript:void(0)" method="post" onsubmit="register();">

					<div class="wthree-text" style="margin-bottom: 20px !important">
						<label class="anim">
							<span>Personal Information</span>
						</label>
					</div>

					<input class="text" type="text" name="name" placeholder="Name" required="">
					<input class="text" type="text" name="civil_status" placeholder="Civil Status" required="">
					<input class="text" type="text" name="birthplace" placeholder="Birthplace" required="">
					<input class="text" type="date" name="birthday" placeholder="Date of Birth" required="">
					<input class="text" type="text" name="address" placeholder="Present Address" required="">
					<input class="text" type="text" name="occupation" placeholder="Occupation" required="">
					<input class="text" type="text" name="salary" placeholder="Salary (Monthly) Php" required="">
					<input class="text" type="text" name="religion" placeholder="Program/Religion" required="">
					<input class="text" type="text" name="office_address" placeholder="Office Address" required="">
					<input class="text" type="text" name="father" placeholder="Father's Name" required="">
					<input class="text" type="text" name="mother" placeholder="Mother's Name" required="">
					<input class="text" type="text" name="spouse" placeholder="Spouse (If married)" id="rem">
					<input class="text" type="text" name="spouse_occupation" placeholder="Spouse Occupation" id="rem">
					
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

					<input class="text" type="text" name="username" placeholder="Username" required="">
					<input class="text" type="Password" name="password" placeholder="Password" required="">

					<input type="submit" value="REGISTER" style=" margin-bottom: 0px !important; margin-top: 20px !important; ">
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
		$.ajax({
			type: 'POST',
			url: '../register.php',
			data: $('form').serialize(),
			success: function(data){
				console.log(data);
				if(data != "false"){
					alert("Applicant has been registered.\nClick OK to view applicant's profile.");
					document.location.replace("../profile.php?id=" + data);
				}else{
					alert("An error has occured");
				}
			}
		});
		return false;
	}
</script>
</html>
