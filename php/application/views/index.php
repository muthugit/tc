<?php $this->load->view ( 'common/htmlBlocksSet1' );?>
<div class="col-sm-12 well">
	<div class="col-sm-3 well" style="background-color: #F2F2F2">
		<legend>Authors</legend>
		<div id="demo1" class="scroll-text"
			style="width: 100%; height: 200px; overflow: hidden;">
			<ul style="list-style-type: none;">
		<?php
		foreach ( $authors as $author ) {
			if (isset ( $author ['email'] ) && isset ( $author ['name'] ) && isset ( $author ['profilePic'] )) {
				echo '<li class="col-sm-12  col-xs-12 pull-left">';
				echo '<span class="circleImage col-sm-3  col-xs-3" style="background-size: cover; background-image:
				url(' . $author ['profilePic'] . ')"></span>';
				echo '<span class="col-sm-9 col-xs-9">' . ($author ['name']) . '
					<br>' . explode ( "@", $author ['email'] )[0] . '<hr>
					</span></li>';
			}
		}
		
		?>
		</ul>
		</div>
	</div>
	<div class="col-sm-6 well" style="background-color: blue"
		id="articleList">
	
	<?php
	if (isset ( $widget1CategoryTitle) && isset($widget1ArticlesList )) {
		echo "<h3 class='white-text'>" . $widget1CategoryTitle . '</h3>';
	
	foreach ( $widget1ArticlesList as $article ) {
		$title = str_replace ( ',', '-', $article ['title'] );
		$title = $title;
		echo '<h4><a class="white-text" href="' . SITE_PATH . 'post/show/' . $article ['objectId'] . '/' . urlencode ( $title ) . '">' . $article ['title'] . '</a></h4>';
	}
	}
	?>
	<a class="white-text" href="#">Read more...</a>
	</div>
	<div class="col-sm-3 well">
		<?php $this->load->view ( 'common/rightPanel' );?>
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

var currentPage=1;
function loadMore(){
	console.log("Loading more");
	currentPage=currentPage+1;
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            $("#articleList").append(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "<?php echo SITE_PATH;?>/post/page/" + currentPage+"/<?php echo $currentCategory;?>/<?php echo $currentAuthor;?>", true);
    xmlhttp.send();
}

$(document).scroll(function(e){

    // grab the scroll amount and the window height
    var scrollAmount = $(window).scrollTop();
    var documentHeight = $(document).height();

    // calculate the percentage the user has scrolled down the page
    var scrollPercent = (scrollAmount / documentHeight) * 100;

    if(scrollPercent > 50) {
        // run a function called doSomething
       loadMore();
    }

    function doSomething() { 

        // do something when a user gets 50% of the way down my page

    }

});


	</script>
