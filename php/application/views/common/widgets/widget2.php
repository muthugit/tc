<div class="col-sm-12 well" style="background-color: <?php echo $backgroundColor;?> ">
	<div class="col-sm-2" style="padding: 0px;">
	<?php
	if (isset ( $widgetCategoryTitle ) && isset ( $widgetArticlesList ) && $widgetCategoryTitle != "") {
		?>
		<h4 style="color: <?php echo $titleColor;?>">
			<b><?php echo $widgetCategoryTitle;?></b>
		</h4>
		<a  style="color: <?php echo $titleColor;?>" href="<?php echo SITE_PATH.$categoryUrl;?>">Read more</a>

	</div>
	<?php
		foreach ( $widgetArticlesList as $article ) {
			$title = str_replace ( ',', '-', $article ['title'] );
			$title = $title;
			?>
	<div class="col-sm-2">
		<div class="col-sm-12" style="padding: 0px;">
			<img src="<?php echo IMAGE_PATH.$article['featureImageURL'];?>">
		</div>
		<div class="col-sm-12" style="padding: 0px;">
			<h4>
				<a style="color: <?php echo $titleColor;?>" class="head3"
					href="<?php echo SITE_PATH;?>post/show/<?php echo $article ['objectId'];?>/<?php echo urlencode ( $title );?>">
			<?php echo $article ['title'];?></a>
			</h4>
		</div>
	</div>
	<?php }?>
	<?php }?>
</div>

