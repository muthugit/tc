app.service('cmsService', function() {
	this.checkUser = function($scope) {
		console.log("Checking");
		if (localStorage.getItem("userApiKey") == null) {
			console.log("Failed");
			$(".generalFooter").show();
			$(".userButtons").hide();
			return false;
		} else {
			var userObj = JSON.parse(localStorage.getItem("currentUser"));
			$scope.profile = userObj;
			console.log("=========>" + userObj.email);
			$(".generalFooter").hide();
			$(".userButtons").show();
			return true;

		}
	};

	this.setTitle = function(title) {
		console.log("TTTTTTT=>"+title);
		$document[0].title = title;
	};
});

app.filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	};
});
app.filter('cut', function() {
	return function(value, wordwise, max, tail) {
		if (!value)
			return '';

		max = parseInt(max, 10);
		if (!max)
			return value;
		if (value.length <= max)
			return value;

		value = value.substr(0, max);
		if (wordwise) {
			var lastspace = value.lastIndexOf(' ');
			if (lastspace != -1) {
				value = value.substr(0, lastspace);
			}
		}

		return value + (tail || ' …');
	};
});