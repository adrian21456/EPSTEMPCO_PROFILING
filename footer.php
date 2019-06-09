</div>
</div>

</body>
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<script src="assets/js/plugins/chartist.min.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<script src="assets/js/demo.js"></script>
<script	src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</html>
<style>
	#camera {
		width: 150px;
		height: 150px;
	}

</style>
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

	function createCookie2(name, value, days) {
		var expires;

		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/assessment";
	}

	function readCookie(name) {
		var nameEQ = encodeURIComponent(name) + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ')
				c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) === 0)
				return decodeURIComponent(c.substring(nameEQ.length, c.length));
		}
		return null;
	}

	function eraseCookie(name) {
		createCookie(name, "", -1);
	}

	function eraseCookie2(name) {
		createCookie2(name, "", -1);
	}

	function confirm_signout(){
		if(confirm("Are you sure you want to end your session?")){
			eraseCookie("user_id");
			eraseCookie("access_level");
			eraseCookie("name");
			document.location.replace("reg/login.php");
		}
	}

	setInterval(function(){
		if(readCookie("user_id") == null || readCookie("user_id") == "" || readCookie("user_id") == undefined){
			document.location.replace("index.php");
		}
	}, 1000);
</script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
	var imageName = "";
	var options = {
		shutter_ogg_url: "jpeg_camera/shutter.ogg",
		shutter_mp3_url: "jpeg_camera/shutter.mp3",
		swf_url: "jpeg_camera/jpeg_camera.swf",
	};
	var camera = new JpegCamera("#camera", options);

	$('#take_snapshots').click(function(){
		var snapshot = camera.capture();
		snapshot.show();

		snapshot.upload({api_url: "action.php"}).done(function(response) {
			console.log(response);
			imageName = response;
			createCookie("image", response, 10);
		}).fail(function(response) {
			alert("Upload failed with status " + response);
		});
	})

	function done(){
		$('#snapshots').html("uploaded");
	}
</script>
<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var denied = <?php echo $denied; ?>;
		var members	= <?php echo $members; ?>;
		var approved = <?php echo $applicants; ?>;

		var config = {
			type: 'bar',
			data: {
				datasets: [{
					data: [
						denied,
						approved,
						members,
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Members and Applicants Summary'
				}],
				labels: [
					'Denied Request',
					'Pending Request',
					'Approved Request',
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>