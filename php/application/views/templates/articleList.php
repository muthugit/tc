<?php
foreach ( $articleList as $article ) {
	
	$title = str_replace ( ',', '-', $article ['title'] );
	$title = $title;
	
	echo '<h3><a href="' . SITE_PATH . 'post/show/' . $article ['objectId'] . '/' . urlencode ( $title ) . '">' . $article ['title'] . '</a></h3><br>';
	echo '<span class="col-sm-12  col-xs-12">';
	echo '<div class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . IMAGE_PATH . $article ['userItem'] ['profilePic'] . ')"></div>';
	echo '<div class="col-sm-9 col-xs-9" style="padding-bottom: 20px">' . ($article ['userItem'] ['name']) . '
					 @ <abbr class="timeago" title="' . $article ['createdAt'] . '"></abbr> <br>' . explode ( "@", $article ['userItem'] ['email'] )[0] . '
					</div></span>';
	if (isset ( $article ['featureImageURL'] )) {
		echo '<img src="' . IMAGE_PATH . $article ['featureImageURL'] . '">';
	}
	if (isset ( $article ['description'] )) {
		echo '<p class="well">' . $article ['description'] . '</p>';
	}
	echo '<hr>';
}
?>