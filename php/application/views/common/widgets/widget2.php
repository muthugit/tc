<span class="col-sm-12" style="background-color: red;">
	<?php
	if (isset ( $widget2CategoryTitle ) && isset ( $widget2ArticlesList )) {
		echo "<h5 class='' style='color:white'><b>" . $widget2CategoryTitle . '</b></h5>';
		?>
		</span>
<?php
		foreach ( $widget2ArticlesList as $article ) {
			$title = str_replace ( ',', '-', $article ['title'] );
			$title = $title;
			?>
<table style="border-bottom: 1px black solid;">
	<tr class="well" style="width: 100%; background-color: white">
		<td style="vertical-align: top;" width="100px"><img style="max-width: 100px;"
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