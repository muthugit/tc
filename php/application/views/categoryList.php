<div class="well" style="background-color: red;">
	<center>
		<h4 style="color: white"><?php echo $title;?></h4>
	</center>
</div>
<div class="col-sm-12 well">
	<div class="col-sm-2"
		style="padding-left: 3px; padding-right: 2px;">
		<div style="">
		<?php $this->load->view ( 'common/widgets/featuredArticlesList',$featuredArticleList  );?>
		</div>
	</div>
	<div class="col-sm-7">
		<div id="articleList">
			<?php $this->load->view ( 'templates/articleList',$articleList);?>
		</div>
	</div>
	<div class="col-sm-3"
		style="background-color: <?php echo $widget2['backgroundColor'];?>; overflow: auto; padding-left: 3px; padding-right: 2px;">
		<div style="height: 447px;">
		<?php $this->load->view ( 'common/widgets/widget1',$widget2 );?>
		</div>
	</div>
	<hr>

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