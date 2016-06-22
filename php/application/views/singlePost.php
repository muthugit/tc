<style>
body{
background-color: #D4D4D4;
}
</style>
<?php $this->load->view ( 'common/htmlBlocksSet2' );?>
<br>
<div class="col-sm-12" style="background-color: white">
	<div class="col-sm-9">
		<h4><?php echo $article['title']?></h4>
		<div class="" style="padding-bottom: 30px">
			<div class="circleImage col-sm-3"
				style="background-size: cover; background-image: url(
				<?php echo IMAGE_PATH.$article['userItem']['profilePic'];?>
				)"></div>
			<div class="col-sm-9">
				By: <a href="<?php echo SITE_PATH.'author/'.$article['userApi'];?>"><?php echo $article['userItem']['name'];?></a>
				<abbr class="timeago" title="<?php echo $article['createdAt'];?>"></abbr>
			
				<?php if(isset($article['categoryItemData']['title'])) echo ' in <span class="well" style="background-color:orange;padding:3px;color:white;font-weight:bold">'.$article['categoryItemData']['title'];?></span><br>
				<br>
			</div>
			<div style="" class="col-sm-12">
			<hr>
				<?php if(isset ( $article ['featureImageURL'] ) && $article ['featureImageURL'] != ''){?>
					<img src="<?php echo IMAGE_PATH.$article['featureImageURL'];?>"
					style="max-height: 300px">
				<?php }?>
				
				<p><?php echo $article['postDetail'];?></p>
				<?php $currentUrl= 'http://'.$_SERVER["SERVER_NAME"].$_SERVER['PHP_SELF'];?>
				<div class="fb-comments" data-href="<?php echo $currentUrl;?>"
					data-numposts="5"></div>
			</div>
		</div>
	</div>
	<div class="col-sm-3" style="padding-left: 3px; padding-right: 2px;">
		<div style="">
		<?php
		$featureArticles ['featuredArticleList'] = $allFeatureArticles;
		$this->load->view ( 'common/widgets/featuredArticlesList', $featureArticles );
		?>
		</div>
	</div>
</div>



<?php $this->load->view ( 'common/footer' );?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=386245301517722";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>