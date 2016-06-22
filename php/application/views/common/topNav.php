<style>
cse .gsc-control-cse,.gsc-control-cse {
	padding: 40px;
	padding-bottom: 0px;
	padding-top: 0px;
}
</style>
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
		<form style="display: none" class="navbar-form navbar-left"
			role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</nav>

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

