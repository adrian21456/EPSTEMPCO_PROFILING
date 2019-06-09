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
	<div class="main-w3layouts wrapper" style="margin-top: 70px">
		<div class="main-agileinfo" style="width: 80% !important">
			<div class="agileits-top">
				<h1 style="font-family: Arial !important; margin-bottom: 40px;">Open Account</h1>
				<form action="javascript:void(0)" method="post" onsubmit="authenticate()">
					<input class="text" type="text" name="username" placeholder="Username" required="" style="margin-left: 16%">
					<input class="text" type="Password" name="password" placeholder="Password" required="">
					<input type="submit" value="SIGN-IN" style=" margin-bottom: 0px !important; margin-top: 20px !important; ">
				</form>
				<div class="wthree-text" style="margin-bottom: 20px !important; margin-top: 30px; text-align: center;">
					<label class="anim">
						<span>Don't have an account yet? <a href="register.php" style="color:#FFF; text-decoration: underline;">Register</a></span>
					</label>
				</div>
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
	function createCookie(name, value, days) {
		var expires;

		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}
	function authenticate(){
		$.ajax({
			type: 'POST',
			url: '../authenticate.php',
			data: $('form').serialize(),
			success: function(datas){
				console.log(datas);
				var data = JSON.parse(datas);
				if(data[0] == "true"){
					createCookie("user_id", data[2], 10);
					createCookie("name", data[3], 10);
					createCookie("access_level", data[1], 10);
					if(data[1] == "1"){
						document.location.replace("../profile.php?id=" + data[2]);
					}else{
						document.location.replace("../dashboard.php");
					}
				}else{
					alert("Invalid credentials.\nPlease try again.");
				}
			}
		});
		return false;
	}
</script>
</html>
