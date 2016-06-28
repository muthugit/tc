<div class="col-sm-12">
	<h4>Featured articles</h4>
</div>
<div class="col-sm-12">
	<div class="list-group">
               
<?php
foreach ( $featuredArticleList as $article ) {
	$title = str_replace ( ',', '-', $article ['title'] );
	$title = $title;
	?>
	<?php if(isset($article ['featureImageURL'])){?>
	<a
			href="<?php echo SITE_PATH;?>post/show/<?php echo $article ['objectId'];?>/<?php echo urlencode ( $title );?>"
			class="list-group-item">
			<h4 class="list-group-item-heading">
				<img
					src="<?php echo SMALL_IMAGE_PATH.$article ['featureImageURL'] ;?>">
			</h4>
			<p class=""><?php echo $title?></p>
		</a>
		<div class="col-sm-12"
			style='display: none; border-bottom: 1px solid grey; padding-top: 10px;'>
			<div class="col-sm-12">
				<img
					src="<?php echo SMALL_IMAGE_PATH.$article ['featureImageURL'] ;?>">
			</div>
	<?php }?>
	<div class="col-sm-12 well">
				<p>
					<a
						href="<?php echo SITE_PATH;?>post/show/<?php echo $article ['objectId'];?>/<?php echo urlencode ( $title );?>"><?php echo $article ['title'] ;?></a>
				</p>
			</div>
		</div>
	<?php }?>
	</div>
</div>