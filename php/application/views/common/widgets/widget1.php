<div class="col-sm-12">
	<?php
	if (isset ( $widgetCategoryTitle ) && isset ( $widgetArticlesList ) && $widgetCategoryTitle != "") {
		echo "<h5 class='' style='color:" . $titleColor . "'><b>" . $widgetCategoryTitle . '</b></h5>';
		?>
		</div>
<div class="col-sm-12"
	style="padding: 0px; height: 367px; overflow: auto">
<?php
		foreach ( $widgetArticlesList as $article ) {
			$title = str_replace ( ',', '-', $article ['title'] );
			$title = $title;
			?>
	<div class="col-sm-12 well" style="margin-bottom: 2px; padding: 10px;">
	<?php if($isImage=="yes"){?>
		<div class="col-sm-3">
			<?php
				$isImageExist = false;
				if (isset ( $article ['featureImageURL'] ) && $article ['featureImageURL'] != '')
					$isImageExist = true;
				if ($isImageExist == true) {
					?>
			<img src="<?php echo SMALL_IMAGE_PATH.$article['featureImageURL'];?>">
			<?php }else{?>
			<img src="http://www.padaippaligalulagam.com/logo.png">
			<?php }?>
		</div>
		<?php }?>
		<div class="col-sm-9">
			<a class="head3"
				href="<?php echo SITE_PATH;?>post/show/<?php echo $article ['objectId'];?>/<?php echo urlencode ( $title );?>">
			<?php echo $article ['title'];?></a>
			<p style='padding-top: 10px'>
			<?php echo $article['description'];?></p>
		</div>
	</div>
<?php
		}
		?>
		</div>
<?php
	}
	?>
<a class="white-text" href="<?php echo SITE_PATH.$categoryUrl;?>">Read
	more...</a>
