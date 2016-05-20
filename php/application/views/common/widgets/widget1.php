<div class="col-sm-12" style="background-color: #F4FA58">
	<?php
	if (isset ( $widget1CategoryTitle ) && isset ( $widget1ArticlesList )) {
		echo "<h4 class=''>" . $widget1CategoryTitle . '</h4>';
		?>
		</div>
<?php
		foreach ( $widget1ArticlesList as $article ) {
			$title = str_replace ( ',', '-', $article ['title'] );
			$title = $title;
			?>
<table style="border-bottom: 1px black solid;">
	<tr style="width: 100%">
		<td style="valign: top;" width="100px"><img style="max-width: 100px;"
			src="<?php echo IMAGE_PATH.$article['featureImageURL'];?>"></td>
		<td style="valign: top; padding-left: 10px;"><a class="head3"
			href="<?php echo SITE_PATH;?>post/show/<?php echo $article ['objectId'];?>/<?php echo urlencode ( $title );?>">
			<?php echo $article ['title'];?></a><br>
			<?php echo $article['description'];?>
			</td>
	</tr>
</table>
<?php
		}
	}
	?>
<a class="white-text" href="#">Read more...</a>