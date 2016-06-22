<style>
.white-text {
	color: white;
}

tr {
	height: 40px;
	font-size: 13px;
}

td {
	height: 40px;
	font-size: 14px;
}
</style>
<div class="col-sm-12 well" style="background-color: #DFDFDF">
	<div class="col-sm-9" style="border-bottom: 1px solid #EBEBEB">
		<div class="col-sm-2 col-xs-12" style="padding-top: 50px;">
			<center>
				<span class=" circleImage col-sm-12  col-xs-12" style="text-align:center;height:100px;width:100px;background-size: cover; background-image:
				url('<?php echo IMAGE_PATH.$author['profilePic'];?>')"></span>
			</center>
		</div>
		<div class="col-sm-10" style="border-left: 1px solid #EBEBEB">
			<h4><?php echo $author['name'];?></h4>
			<?php
			if (isset ( $author ['authorGroup'] )) {
				echo '<b>(' . $author ['authorGroup'] . ')</b>';
			}
			?>
			
			<?php if (isset ( $author ['aboutAuthor'] )) {?>
			<hr>
			<p style="background-color: black; color: white; padding: 20px;"> <?php echo $author ['aboutAuthor'];?></p>
			<?php }?>
			<?php
			$s = $author ['createdAt'];
			date_default_timezone_set ( 'Africa/Lagos' );
			$dt = new DateTime ( $s );
			
			$date = $dt->format ( 'd F Y' );
			?>
			<hr>
			<table>
				<tr>
					<td style="width: 40%"><b>Email</b></td>
					<td><?php echo $author['email'];?></td>
				</tr>
				<?php if(isset($author['uniqueName'])){?>
				<tr>
					<td><b>Nick Name</b></td>
					<td><?php echo $author['uniqueName'];?></td>
				<?php }?>
				
				
				
				
				
				
				
				
				
				<tr>
					<td><b>Member since</b></td>
					<td><?php echo $date;?></td>
				</tr>



			</table>

		
		</div>
	</div>
	<div class="col-sm-3"
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
