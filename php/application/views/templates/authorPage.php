<style>
.white-text {
	color: white;
}
</style>
<div class="col-sm-12 well" style="background-color: #FAFAFA">
	<div class="col-sm-9">
		<div class="col-sm-5">
			<center>
				<span class=" circleImage col-sm-12  col-xs-12" style="text-align:center;height:300px;width:300px;background-size: cover; background-image:
				url('<?php echo IMAGE_PATH.$author['profilePic'];?>')"></span>
			</center>
		</div>
		<div class="col-sm-7">
			<h3><?php echo $author['name'];?></h3>
			<hr>
			<p class="grey-text">Email: <?php echo $author['email'];?></p>
		<?php if(isset($author['uniqueName'])){?>
			<p class="grey-text">Unique Name: <?php echo $author['uniqueName'];?></p>
		<?php }?>
		
		<?php
		$s = $author ['createdAt'];
		$dt = new DateTime ( $s );
		
		$date = $dt->format ( 'm/d/Y' );
		?>
		
		<p class="grey-text">Member since: <?php echo $date;?></p>
		</div>
	</div>
	<div class="col-sm-3 pull-right"
		style="background-color: <?php echo $widget1['backgroundColor'];?>; overflow: auto; padding-left: 3px; padding-right: 2px;">
		<div style="height: 447px;">
		<?php $this->load->view ( 'common/widgets/widget1',$widget1 );?>
		</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="col-sm-12">
		<center>
			<h4>Articles by <?php echo $author['name'];?></h4>
			<hr>
		</center>
	</div>
	<div class="col-sm-2 well"></div>
	<div class="col-sm-8 well">
		<div id="articleList">
			<?php $this->load->view ( 'templates/articleList',$articleList);?>
		</div>
	</div>
	<div class="col-sm-2 well"></div>
</div>

<?php $this->load->view ( 'common/footer');?>
<script>
var currentPage=1;
function loadMore(){
	console.log("Loading more: page=> "+currentPage+"<?php echo $currentCategory;?>");
	currentPage=currentPage+1;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#articleList").append(xmlhttp.responseText);
        }
    };
    console.log("<?php echo SITE_PATH;?>/post/page/" + currentPage+"/<?php echo $currentCategory;?>/<?php echo $currentAuthor;?>");
    xmlhttp.open("GET", "<?php echo SITE_PATH;?>/post/page/" + currentPage+"/<?php echo $currentCategory;?>/<?php echo $currentAuthor;?>", true);
    xmlhttp.send();
    $("abbr.timeago").timeago();
}

$(document).scroll(function(e){

    // grab the scroll amount and the window height
    var scrollAmount = $(window).scrollTop();
    var documentHeight = $(document).height();

    // calculate the percentage the user has scrolled down the page
    var scrollPercent = (scrollAmount / documentHeight) * 100;

    if(scrollPercent > 50) {
       loadMore();
    }

    function doSomething() { 
    }

});
</script>
