<div class="col-sm-12" style="background-color: white; padding: 20px;">
<?php
foreach ( $authors as $author ) {
	if (isset ( $author ['name'] )) {
		?>
		<div class="list-group col-sm-3" style="height: 150px;">
		<a href="author/<?php echo $author['objectId'];?>"
			class="list-group-item">
			<h4 class="list-group-item-heading"><?php echo $author['name']?></h4>
			<?php if(isset($author['aboutAuthor'])){?>
			<p class="list-group-item-text"><?php echo $author['aboutAuthor'];?></p>
				
				<?php }?>
		</a>
	</div>
	<?php
	}
}
?>
	</div>