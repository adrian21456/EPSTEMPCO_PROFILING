<?php
$total = count($_FILES['requirements']['name']);
$repo = array();

for( $i=0 ; $i < $total ; $i++ ) {
  $tmpFilePath = $_FILES['requirements']['tmp_name'][$i];
  if ($tmpFilePath != ""){
    $raw = 'document_' . date('m-d-Y_hisa') . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . '.pdf';
    $newFilePath = "uploads/" . $raw;

    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
      array_push($repo, $raw);
      if($i == $total - 1){
        require("global.php");
        if(mysqli_query($conn, "Update applicants Set requirements='" . json_encode($repo) . "' Where user_id='" . $_POST['id'] . "'")){
          header("location: profile.php?id=" . $_POST['id']);
        }else{
          echo "Update applicants Set requirements='" . json_encode($repo) . "' Where user_id='" . $_POST['id'] . "'";
        }
      }
    }
  }
}

?>