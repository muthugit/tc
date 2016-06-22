<?php
foreach ( $articleList as $article ) {
	
	$title = str_replace ( ',', '-', $article ['title'] );
	$title = $title;
	
	echo '<h4><a href="' . SITE_PATH . 'post/show/' . $article ['objectId'] . '/' . urlencode ( $title ) . '">' . $article ['title'] . '</a></h4><br>';
	echo '<div class="col-sm-12  col-xs-12"  style="padding-bottom: 20px">';
	echo '<div class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . IMAGE_PATH . $article ['userItem'] ['profilePic'] . ')"></div>';
	echo '<div class="col-sm-9 col-xs-9" style="padding-bottom: 20px"><a href=' . SITE_PATH . 'author/' . $article ['userApi'] . '>' . ($article ['userItem'] ['name']) . '</a>
					 @ <abbr class="timeago" title="' . $article ['createdAt'] . '"></abbr><br>
					</div></div>';
	$isImageExist = false;
	$featureImageUrl = IMAGE_PATH . $article ['featureImageURL'];
	if (is_array ( getimagesize ( ($featureImageUrl) ) ) && isset ( $article ['featureImageURL'] ) && $article ['featureImageURL'] != '')
		$isImageExist = true;
	if ($isImageExist == true)
		echo '<img src="' . IMAGE_PATH . $article ['featureImageURL'] . '">';
	if (isset ( $article ['description'] )) {
		echo '<p class="well">' . $article ['description'] . '</p>';
	}
	echo '<hr>';
}
?>