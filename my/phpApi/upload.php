<?php
$target_dir = "/var/www/html/tc/php/uploads/";

$timeStamp = $_POST ['timeStamp'];
$newFileName = $timeStamp . '-' . basename ( $_FILES ["file"] ["name"] );
$target_file = $target_dir . $newFileName;

$uploadOk = 1;
$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
$check = getimagesize ( $_FILES ["file"] ["tmp_name"] );
if ($check !== false) {
	if (move_uploaded_file ( $_FILES ["file"] ["tmp_name"], $target_file )) {
		echo $newFileName;
	} else {
		echo "400";
	}
	$uploadOk = 1;
} else {
	echo "4001";
	$uploadOk = 0;
}
?>
