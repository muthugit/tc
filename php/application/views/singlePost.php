<div class="col-xs-12">
	<div class="col-xs-2"></div>
	<div class="col-xs-8">
	<?php //print_r($article);?>
		<h3><?php echo $article['title']?></h3>
		<div class="" style="padding-bottom: 30px">
			<div class="circleImage col-sm-3"
				style="background-size: cover; background-image: url(
				<?php echo $article['userItem']['profilePic'];?>
				)"></div>
			<div style="padding-top: 10px" class="col-sm-9">
				<a href=""><?php echo $article['userItem']['name'];?></a> <span>Time</span> 
				<?php if(isset($article['categoryItemData']['title'])) echo ' in '.$article['categoryItemData']['title'];?><br>
				<hr>
				<?php if(isset($article['featureImageURL'])){?>
					<img src="<?php echo $article['featureImageURL'];?>"
					style="max-height: 300px">
				<?php }?>
				
				<p><?php echo $article['postDetail'];?></p>
			</div>
		</div>
	</div>
	<div class="col-xs-2">
	<?php $this->load->view('common/rightPanel');?>
	</div>
</div>
<?php $this->load->view ( 'common/footer' );?>