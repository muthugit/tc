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
	<div class="col-sm-3" style="background-color: ;">
		<span class="col-sm-12" style="background-color: blue;"><h5 class=''
				style='color: white'>
				<b>Authors</b>
			</h5></span>
		<div id="demo1" class="scroll-text"
			style="width: 100%; height: 400px; overflow: hidden;">
			<ul class="col-sm-12"
				style="background-color: grey; list-style-type: none; padding-left: 0px; padding-right: 0px;">
		<?php
		foreach ( $authors as $author ) {
			if (isset ( $author ['email'] ) && isset ( $author ['name'] ) && isset ( $author ['profilePic'] )) {
				echo '<li class="col-sm-12 well  col-xs-12 pull-left">';
				echo '<span class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . IMAGE_PATH . $author ['profilePic'] . ')"></span>';
				echo '<span class="col-sm-9 col-xs-9">' . ($author ['name']) . '
					<br>' . explode ( "@", $author ['email'] )[0] . '
					</span></li>';
			}
		}
		
		?>
		</ul>
		</div>
	</div>
	<div class="col-sm-6"
		style="overflow: hidden; background-color: #F4FA58; padding-left: 2px; padding-right: 2px;"
		id="articleList">
		<div style="height: 447px; overflow: auto;">
		<?php $this->load->view ( 'common/widgets/widget1' );?>
		</div>
	</div>
	<div class="col-sm-3"
		style="background-color: red; overflow: auto; padding-left: 3px; padding-right: 2px;">
		<div style="height: 447px;">
		<?php $this->load->view ( 'common/widgets/widget2' );?>
		</div>
	</div>
</div>

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