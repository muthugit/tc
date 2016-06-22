<style>
.head3 {
	font-size: 15px;
	font-weight: bold;
	color: black;
	font-weight: bold;
}

tr>td {
	padding-bottom: 1em;
	padding-top: 1em;
}
</style>
<?php $this->load->view ( 'common/htmlBlocksSet1' );?>
<div class="col-sm-12 well">
	<div class="col-sm-3" style="padding:0px;">
		<span class="col-sm-12 col-xs-12" style="background-color: blue;"><h5 class=''
				style='color: white'>
				<b>Authors</b>
			</h5></span>
		<div id="demo1" class="scroll-text"
			style="width: 100%; height: 400px; overflow: hidden;">
			<ul class="col-sm-12"
				style="list-style-type: none; border: 1px solid #EAEAEA padding-left: 0px; padding-right: 0px;">
		<?php
		foreach ( $authors as $author ) {
			if (isset ( $author ['email'] ) && isset ( $author ['name'] ) && isset ( $author ['profilePic'] )) {
				echo '<li class="col-sm-12 well  col-xs-12 pull-left" style="border-bottom:1px solid #EAEAEA; ">';
				echo '<span class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . IMAGE_PATH . $author ['profilePic'] . ')"></span>';
				echo '<span class="col-sm-9 col-xs-9"><a href="' . SITE_PATH . 'author/' . $author ['objectId'] . '">' . ($author ['name']) . '</a>';
				if (isset($author ['uniqueName'])) {
					echo '<br>' . $author ['uniqueName'];
				}
				echo '</span></li>';
			}
		}
		?>
		</ul>
		</div>
	</div>

	<div class="col-sm-6"
		style="overflow: hidden; background-color: <?php echo $widget1['backgroundColor'];?>; padding-left: 2px; padding-right: 2px;"
		id="articleList">
		<div style="height: 447px; overflow: auto;">
		<?php $this->load->view ( 'common/widgets/widget1',$widget1 );?>
		</div>
	</div>

	<div class="col-sm-3"
		style="background-color: <?php echo $widget2['backgroundColor'];?>; overflow: auto; padding-left: 3px; padding-right: 2px;">
		<div style="height: 447px;">
		<?php $this->load->view ( 'common/widgets/widget1',$widget2 );?>
		</div>
	</div>
</div>

<?php $this->load->view ( 'common/htmlBlocksSet2' );?>
<hr>

<?php $this->load->view ( 'common/widgets/widget2',$widget3);?>
<?php $this->load->view ( 'common/widgets/widget2',$widget4);?>
<?php $this->load->view ( 'common/widgets/widget2',$widget5);?>
<?php $this->load->view ( 'common/widgets/widget2',$widget6);?>
<?php $this->load->view ( 'common/widgets/widget2',$widget7);?>
<?php $this->load->view ( 'common/widgets/widget2',$widget8);?>
<?php $this->load->view ( 'common/widgets/widget2',$widget9);?>

<?php $this->load->view ( 'common/footer' );?>
<script>
<?php if(!isset($currentCategory)) $currentCategory="any"; ?>
<?php if(!isset($currentAuthor)) $currentAuthor="all"; ?>

$('#demo1').scrollbox({
	  linear: true,
	  step: 1,
	  delay: 0,
	  speed: 80
	});




	</script>