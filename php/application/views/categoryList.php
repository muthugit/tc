<div class="col-sm-2 well">Left devision</div>
<div class="col-sm-8 well">
	<div id="articleList">
		<?php $this->load->view ( 'templates/articleList');?>
	</div>
</div>
<div class="col-sm-2 well">Right devision</div>
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
       loadMore();
    }

    function doSomething() { 
    }

});
</script>