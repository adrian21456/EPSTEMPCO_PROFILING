<?php
require("header.php");
require("global.php");
?>

<!--content -->
<div class="content row1">
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-sm-4" style="">
				<h5><b>Replace Existing Requirements</b></h5>
				<form method="POST" enctype="multipart/form-data" action="upload_requirement.php">

				<input type="file" name="requirements[]" multiple="multiple" id="req" accept=".pdf" class="form-control">

				<input type="submit" name="sub" value="Update Requirements" class="form-control">

				</form>
			</div>
		</div>
	</div>
</div>
</div>

<?php
require("footer.php");
?>  