<?php $this->load->view ( 'common/htmlBlocksSet2' );?>
<hr>
<div class="col-sm-12 well">
	<div class="col-sm-9">
		<h4><?php echo $article['title']?></h4>
		<div class="" style="padding-bottom: 30px">
			<div class="circleImage col-sm-3"
				style="background-size: cover; background-image: url(
				<?php echo IMAGE_PATH.$article['userItem']['profilePic'];?>
				)"></div>
			<div style="padding-top: 10px" class="col-sm-9">
				By: <a href="<?php echo SITE_PATH.'author/'.$article['userApi'];?>"><?php echo $article['userItem']['name'];?></a>
				<abbr class="timeago" title="<?php echo $article['createdAt'];?>"></abbr>
			
				<?php if(isset($article['categoryItemData']['title'])) echo ' in <span class="well" style="background-color:orange;padding:3px;color:white;font-weight:bold">'.$article['categoryItemData']['title'];?></span><br>
			</div>
			<div style="padding-top: 10px" class="col-sm-12">
				<?php if(isset($article['featureImageURL'])){?>
					<img src="<?php echo IMAGE_PATH.$article['featureImageURL'];?>"
					style="max-height: 300px">
				<?php }?>
				
				<p><?php echo $article['postDetail'];?></p>
			</div>
		</div>
	</div>
	<div class="col-sm-3"
		style="background-color:; border: 1px solid black; padding-left: 3px; padding-right: 2px;">
		<div style="">
		<?php
		$featureArticles ['featuredArticleList'] = $allFeatureArticles;
		$this->load->view ( 'common/widgets/featuredArticlesList', $featureArticles );
		?>
		</div>
	</div>
</div>
<?php $this->load->view ( 'common/footer' );?>
