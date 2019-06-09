<?php
require("header.php");
require("global.php");
$applicants	= 0;
$members = 0;
$denied = 0;


$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 and approved = 0 and denied = 1 order by name");
$count = mysqli_num_rows($sql);
$denied	= $count;

?>

<!--content -->
<div class="content row1">
	<div class="container-fluid">
		<h5 class="text-center dashboard"><b>DASHBOARD</b></h5>
		<div class="row contents">
			<div class="col-sm-3 card1">
				<div class="card-content">
					<div class="cont">
						<h5 class="text-center"><?php
						$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 and approved = 0 and denied = 0 order by name");
						$count = mysqli_num_rows($sql);
						$applicants = $count;
						echo $count;
						?></h5>
						<h6 class="text-center">New 
							<?php if($count != 1){
								?>
								Applicants
								<?php
							}
							else{
								echo "Applicant";
							}
							?></h5>
						</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-3 card2">
				<div class="card-content">
					<div class="cont">
						<h5 class="text-center"><?php
						$sql = mysqli_query($conn, "Select * from applicants Where access_level = 1 and approved = 1 and denied = 0 order by name");
						$count = mysqli_num_rows($sql);
						$members = $count;
						echo $count;
						?></h5>
						<h6 class="text-center">REGISTERED 
							<?php if($count != 1){
								?>
								MEMBERS
								<?php
							}
							else{
								echo "MEMBER";
							}
							?>
						</h6>
					</div>
				</div>
			</div>
			<div class="col-sm-3 card3">
				<div class="card-content">
					<div class="cont">
						<h6 class="text-center">Members and Applicants Summary</h5>
						</h6>
					</div>
				</div>
			</div>

			<div id="canvas-holder" class="col-sm-8 col-sm-offset2" style="margin-top: 40px; margin-left:60px;">
				<canvas id="chart-area"></canvas>
			</div>
		</div>
	</div>
</div>


<script>
	'use strict';

	window.chartColors = {
		red: 'rgb(255, 99, 132)',
		orange: 'rgb(255, 159, 64)',
		yellow: 'rgb(255, 205, 86)',
		green: 'rgb(75, 192, 192)',
		blue: 'rgb(54, 162, 235)',
		purple: 'rgb(153, 102, 255)',
		grey: 'rgb(201, 203, 207)'
	};

	(function(global) {
		var MONTHS = [
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
		];

		var COLORS = [
		'#4dc9f6',
		'#f67019',
		'#f53794',
		'#537bc4',
		'#acc236',
		'#166a8f',
		'#00a950',
		'#58595b',
		'#8549ba'
		];

		var Samples = global.Samples || (global.Samples = {});
		var Color = global.Color;

		Samples.utils = {
		// Adapted from http://indiegamr.com/generate-repeatable-random-numbers-in-js/
		srand: function(seed) {
			this._seed = seed;
		},

		rand: function(min, max) {
			var seed = this._seed;
			min = min === undefined ? 0 : min;
			max = max === undefined ? 1 : max;
			this._seed = (seed * 9301 + 49297) % 233280;
			return min + (this._seed / 233280) * (max - min);
		},

		numbers: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 1;
			var from = cfg.from || [];
			var count = cfg.count || 8;
			var decimals = cfg.decimals || 8;
			var continuity = cfg.continuity || 1;
			var dfactor = Math.pow(10, decimals) || 0;
			var data = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = (from[i] || 0) + this.rand(min, max);
				if (this.rand() <= continuity) {
					data.push(Math.round(dfactor * value) / dfactor);
				} else {
					data.push(null);
				}
			}

			return data;
		},

		labels: function(config) {
			var cfg = config || {};
			var min = cfg.min || 0;
			var max = cfg.max || 100;
			var count = cfg.count || 8;
			var step = (max - min) / count;
			var decimals = cfg.decimals || 8;
			var dfactor = Math.pow(10, decimals) || 0;
			var prefix = cfg.prefix || '';
			var values = [];
			var i;

			for (i = min; i < max; i += step) {
				values.push(prefix + Math.round(dfactor * i) / dfactor);
			}

			return values;
		},

		months: function(config) {
			var cfg = config || {};
			var count = cfg.count || 12;
			var section = cfg.section;
			var values = [];
			var i, value;

			for (i = 0; i < count; ++i) {
				value = MONTHS[Math.ceil(i) % 12];
				values.push(value.substring(0, section));
			}

			return values;
		},

		color: function(index) {
			return COLORS[index % COLORS.length];
		},

		transparentize: function(color, opacity) {
			var alpha = opacity === undefined ? 0.5 : 1 - opacity;
			return Color(color).alpha(alpha).rgbString();
		}
	};

	// DEPRECATED
	window.randomScalingFactor = function() {
		return Math.round(Samples.utils.rand(-100, 100));
	};

	// INITIALIZATION

	Samples.utils.srand(Date.now());

	// Google Analytics
	/* eslint-disable */
	if (document.location.hostname.match(/^(www\.)?chartjs\.org$/)) {
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-28909194-3', 'auto');
		ga('send', 'pageview');
	}
	/* eslint-enable */

}(this));
</script>
<?php
require("footer.php");
?>  