<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
	<?php
	foreach ( $categories as $category ) {
		echo '<li><a href="' . SITE_PATH . 'category/lists/' . $category ['objectId'] . '/'.$category ['title'].'"><b>' . $category ['title'] . "</b></a></li>";
	}
	?>
	</ul>
	<form class="navbar-form navbar-left" role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="../my">Login</a></li>
	</ul>
</div>