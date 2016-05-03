<?php
$this->load->view ( 'common/header' );
?>

<div class="col-xl-12 well">
	<div class="col-xs-3 well" style="background-color: red">
		<legend>Authors</legend>
		<marquee style="height: 120px;" scrollamount="2" scrolldelay="5"
			direction="up" onmouseover="this.stop()" onmouseout="this.start()">
		<?php
		foreach ( $authors as $author ) {
			if (isset ( $author ['email'] ) && isset ( $author ['name'] ))
				echo $author ['email'] . '<hr>';
		}
		
		?>
		</marquee>
	</div>
	<div class="col-xs-6">
		<legend>Latest Articles</legend>
	<?php
	foreach ( $latestArticles as $article ) {
		echo ($article ['userItem'] ['email']);
		if (isset ( $article ['featureImageURL'] )) {
			echo '<img src="' . $article ['featureImageURL'] . '">';
		}
		echo $article ['title'] . '<br>';
		if (isset ( $article ['description'] )) {
			echo $article ['description'];
		}
		echo '<hr>';
	}
	?>
	</div>
	<div class="col-xs-3 well" style="background-color: red">
		<legend>Categories</legend>
	<?php
	foreach ( $categories as $category ) {
		echo $category ['title'] . "<br>";
	}
	?>
	</div>
</div>

<?php $this->load->view ( 'common/footer' );?>
