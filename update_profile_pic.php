<?php
require("header.php");
require("global.php");
$image = "";
?>

<div class="content row1">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-sm-3">
				<div class="second_row">
					<div id="camera"></div>
					<div id="camera_info"></div>
				</div>
				<h6><a id="take_snapshots" class="text-primary" href="javascript:void(0)" onclick="$('#save').attr('hidden', false);">Take Snapshot</a></h6>
				<h6><a id="save" class="text-success" href="javascript:void(0)" onclick="upload_pic()" hidden>Set as Profile Pic</a></h6>
			</div>
			<div class="col-sm-1 or">
				<h6 class="text-left">OR</h6>
			</div>
			<div class="col-sm-3">
				<form method="POST" id="upload" action="upload_picture.php" enctype="multipart/form-data">

					<input type="file" name="image" accept=".jpg" class="form-control btn-primary">
					<input type="submit" name="sub" value="Upload Photo" class="form-control btn-success text-primary">

				</form>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	function upload_pic(){
		$.ajax({
			type: 'POST',
			url: 'upload_picture2.php',
			data: 'image=' + imageName,
			success: function(data){
				console.log(data);
				if(data == 'true'){
					document.location.replace("profile.php?id=" + readCookie("user_id"));
				}else{
					alert("An error has occured");
				}
			}
		});
		return false;
	}
</script>

<?php
require("footer.php");
?>  