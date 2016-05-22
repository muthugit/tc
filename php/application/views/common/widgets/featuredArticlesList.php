<div class="col-sm-12">
	<h4>Featured articles</h4>
</div>
<div class="col-sm-12">

<?php
foreach ( $featuredArticleList as $article ) {
	$title = str_replace ( ',', '-', $article ['title'] );
	$title = $title;
	?>
	<?php if(isset($article ['featureImageURL'])){?>
	<div class="col-sm-12">
		<img src="<?php echo IMAGE_PATH.$article ['featureImageURL'] ;?>">
	</div>
	<?php }?>
	<div class="col-sm-12 well">
		<p>
			<a
				href="<?php echo SITE_PATH;?>post/show/<?php echo $article ['objectId'];?>/<?php echo urlencode ( $title );?>"><?php echo $article ['title'] ;?></a>
		</p>
	</div>
	<?php }?>
</div>