<?php
$target_dir = "/var/www/html/tc/php/uploads/";
$thumbnail_dir = "/var/www/html/tc/php/uploads/small/";

$timeStamp = $_POST ['timeStamp'];
$newFileName = $timeStamp . '-' . basename ( $_FILES ["file"] ["name"] );
$target_file = $target_dir . $newFileName;
$thumbnail_file = $thumbnail_dir . $newFileName;

$uploadOk = 1;
$imageFileType = pathinfo ( $target_file, PATHINFO_EXTENSION );
$check = getimagesize ( $_FILES ["file"] ["tmp_name"] );
if ($check !== false) {
	if (move_uploaded_file ( $_FILES ["file"] ["tmp_name"], $target_file )) {
		compress ( $target_file, $thumbnail_file, 10 );
		compress ( $target_file, $target_file, 60 );
		echo $newFileName;
	} else {
		echo "400";
	}
	$uploadOk = 1;
} else {
	echo "4001";
	$uploadOk = 0;
}
function compress($source, $destination, $quality) {
	$info = getimagesize ( $source );
	
	if ($info ['mime'] == 'image/jpeg')
		$image = imagecreatefromjpeg ( $source );
	
	elseif ($info ['mime'] == 'image/gif')
		$image = imagecreatefromgif ( $source );
	
	elseif ($info ['mime'] == 'image/png')
		$image = imagecreatefrompng ( $source );
	
	//imagejpeg ( $image, $destination, $quality );
	
	return $destination;
}
?>
