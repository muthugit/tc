<style>
.articleSection:hover {
	background-color: #E6E6E6;
}
</style>
<?php
foreach ( $articleList as $article ) {
	$title = str_replace ( ',', '-', $article ['title'] );
	$title = $title;
	if (isset ( $article ['featureImageURL'] ) && $article ['featureImageURL'] != '')
		$featureImage = SMALL_IMAGE_PATH . $article ['featureImageURL'];
	else
		$featureImage = "http://www.padaippaligalulagam.com/logo.png";
	?>
<div class="col-sm-12 articleSection"
	style="border-bottom: 1px grey solid; padding-bottom: 15px; padding-top: 15px;">
	<div class="col-sm-4" style=" background-position: center;height: 200px;overflow: hidden;background-size: cover; background-image:
				url('<?php echo $featureImage;?>')"></div>
	<div class="col-sm-8">
		<h4>
			<a
				href="<?php echo SITE_PATH . 'post/show/' . $article ['objectId'] . '/' . urlencode ( $title );?>"><?php echo $title;?></a>
		</h4>
		<div class="circleImage col-sm-3" style="background-size: cover; background-image:
				url('<?php echo SMALL_IMAGE_PATH . $article ['userItem'] ['profilePic'];?>')"></div>
		<div class="col-sm-9">
			By: <a
				href='<?php echo SITE_PATH . 'author/' . $article ['userApi'];?>'><?php echo ($article ['userItem'] ['name']);?></a><br>
			<abbr class="timeago" title="<?php echo $article ['createdAt'];?>"></abbr><br>

		</div>
		<hr>
		<?php
	if (isset ( $article ['description'] )) {
		echo '<p class="well">' . $article ['description'] . '</p>';
	}
	?>
	</div>
</div>
<?php
}

/*
 * foreach ( $articleList as $article ) { $title = str_replace ( ',', '-', $article ['title'] ); $title = $title; echo '<div class = "col-sm-12">'; $featureImageUrl = SMALL_IMAGE_PATH . $article ['featureImageURL']; if (isset ( $article ['featureImageURL'] ) && $article ['featureImageURL'] != '') $isImageExist = true; if ($isImageExist == true){?> <div class = "col-sm-3" style="height:500px; overflow:hidden;background-size: cover;background-position: center;background-image: url('<?php echo SMALL_IMAGE_PATH . $article ['featureImageURL'];?>')"></div> <?php } echo '<div class="col-sm-9 col-xs-12" style="">'; echo '<h4><a href="' . SITE_PATH . 'post/show/' . $article ['objectId'] . '/' . urlencode ( $title ) . '">' . $article ['title'] . '</a></h4><br>'; echo '<div class="circleImage col-sm-3 col-xs-3" style="background-size: cover; background-image: url(' . SMALL_IMAGE_PATH . $article ['userItem'] ['profilePic'] . ')"></div>'; echo '<div class="col-sm-9 col-xs-9" style="padding-bottom: 20px"><a href=' . SITE_PATH . 'author/' . $article ['userApi'] . '>' . ($article ['userItem'] ['name']) . '</a> @ <abbr class="timeago" title="' . $article ['createdAt'] . '"></abbr><br> </div></div>'; $isImageExist = false; if (isset ( $article ['description'] )) { echo '<p class="well">' . $article ['description'] . '</p>'; } echo '</div><hr>'; }
 */
?>