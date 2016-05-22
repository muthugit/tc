<?php $this->load->view ( 'common/htmlBlocksSet2' );?>
<hr>
<div class="col-sm-12">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">

		<h4><?php echo $article['title']?></h4>
		<div class="" style="padding-bottom: 30px">
			<div class="circleImage col-sm-3"
				style="background-size: cover; background-image: url(
				<?php echo IMAGE_PATH.$article['userItem']['profilePic'];?>
				)"></div>
			<div style="padding-top: 10px" class="col-sm-9">
				<a href=""><?php echo $article['userItem']['name'];?></a> <abbr class="timeago" title="<?php echo $article['createdAt'];?>"></abbr> 
				<?php if(isset($article['categoryItemData']['title'])) echo ' in '.$article['categoryItemData']['title'];?><br>
				<hr>
				<?php if(isset($article['featureImageURL'])){?>
					<img src="<?php echo IMAGE_PATH.$article['featureImageURL'];?>"
					style="max-height: 300px">
				<?php }?>
				
				<p><?php echo $article['postDetail'];?></p>
			</div>
		</div>
	</div>
	<div class="col-sm-2">
	<?php $this->load->view('common/rightPanel');?>
	</div>
</div>
<?php $this->load->view ( 'common/footer' );?>
