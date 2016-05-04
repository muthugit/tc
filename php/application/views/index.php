<?php
?>

<div class="col-sm-12 well">
	<div class="col-sm-3 well" style="background-color: #F2F2F2">
		<legend>Authors</legend>
		<marquee style="height: 320px;" scrollamount="3" scrolldelay="5"
			direction="up" onmouseover="this.stop()" onmouseout="this.start()">
		<?php
		foreach ( $authors as $author ) {
			if (isset ( $author ['email'] ) && isset ( $author ['name'] ) && isset ( $author ['profilePic'] )) {
				echo '<span class="col-sm-12  col-xs-12">';
				echo '<div class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . $author ['profilePic'] . ')"></div>';
				echo '<div class="col-sm-9 col-xs-9">' . ($author ['name']) . '
					<br>' . explode ( "@", $author ['email'] )[0] . '<hr>
					</div></span>';
			}
		}
		
		?>
		</marquee>
	</div>
	<div class="col-sm-6">
		<legend>Latest Articles</legend>
	<?php
	foreach ( $latestArticles as $article ) {
		
		$title = str_replace ( ' ', '-', $article ['title'] );
		$title = preg_replace ( '/[^A-Za-z0-9\-]/', '', $title );
		
		echo '<h3><a href="post/show/' . $article ['objectId'] . '/' . urlencode ( $title ) . '">' . $article ['title'] . '</a></h3><br>';
		echo '<span class="col-sm-12  col-xs-12">';
		echo '<div class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . $article ['userItem'] ['profilePic'] . ')"></div>';
		echo '<div class="col-sm-9 col-xs-9" style="padding-bottom: 20px">' . ($article ['userItem'] ['name']) . '
					<br>' . explode ( "@", $article ['userItem'] ['email'] )[0] . '
					</div></span>';
		if (isset ( $article ['featureImageURL'] )) {
			echo '<img src="' . $article ['featureImageURL'] . '">';
		}
		if (isset ( $article ['description'] )) {
			echo '<p class="well">' . $article ['description'] . '</p>';
		}
		echo '<hr>';
	}
	?>
	</div>
	<div class="col-sm-3 well">
		<?php $this->load->view ( 'common/rightPanel' );?>
	</div>
</div>

<?php $this->load->view ( 'common/footer' );?>
