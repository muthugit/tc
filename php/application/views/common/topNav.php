<nav class="navbar  navbar-inverse is-visible"
	style="position: inherit;">
	<div class="navbar-header">

		<button type="button" class="navbar-toggle collapsed"
			data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
			<span class="sr-only">Toggle navigation</span> <span class="icon-bar"
				style="background-color: white;"></span> <span class="icon-bar"
				style="background-color: white;"></span> <span class="icon-bar"
				style="background-color: white;"></span>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		<ul class="nav navbar-nav">
			<?php
			if (isSet ( $topNav ))
				echo $topNav ['htmlContent'];
			?>
		</ul>
		<form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#">Link</a></li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class="col-sm-12">
		<div class="col-sm-2 col-xs-6">
	<?php
	if (isSet ( $htmlContent1 ))
		echo $htmlContent1 ['htmlContent'];
	?>
	</div>
		<div class="col-sm-2 col-xs-6">
	<?php
	if (isSet ( $htmlContent2 ))
		echo $htmlContent2 ['htmlContent'];
	?>
	</div>
		<div class="col-sm-2 col-xs-6">
	<?php
	if (isSet ( $htmlContent3 ))
		echo $htmlContent3 ['htmlContent'];
	?>
	</div>
		<div class="col-sm-2 col-xs-6">
	<?php
	if (isSet ( $htmlContent4 ))
		echo $htmlContent4 ['htmlContent'];
	?>
	</div>
		<div class="col-sm-2 col-xs-6">
	<?php
	if (isSet ( $htmlContent5 ))
		echo $htmlContent5 ['htmlContent'];
	?>
	</div>
		<div class="col-sm-2">
	<?php
	if (isSet ( $htmlContent6 ))
		echo $htmlContent6 ['htmlContent'];
	?>
	</div>
	</div>
</div>
<script>
  (function() {
    var cx = '004252836609829600480:hh3zz55r4yy';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>