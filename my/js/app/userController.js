app.filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	};
});

app.controller('userController', function($scope, $http, $location) {
	$scope.checkUser = function() {
		console.log("Checking");
		if (localStorage.getItem("userApiKey") == null) {
			console.log("Failed");
			$location.path('/login');
			$(".generalFooter").show();
			$(".userButtons").hide();
		} else {
			// $location.path('/');
			var userObj = JSON.parse(localStorage.getItem("currentUser"));
			$scope.userName = userObj.name;
			console.log("=========>" + userObj.email);
			$(".generalFooter").hide();
			$(".userButtons").show();
			$scope.fetchUserArticles();
		}
	};
	$scope.reset = function() {
		$scope.user = "";
	};

	$scope.saveUser = function() {
		var url = APIUrl + '/newUser';
		$http.post(url, $scope.user).success(function(data, status) {
			if (data == "User exists") {
				alert("User exists! Please try with another");
				$scope.reset();
			} else if (data == "User created") {
				alert("Account created successfully");
				$location.path('');
			}
			console.log(data);
		}).error(function(err) {
			console.log("Error" + err);
		});
	};

	$scope.loginUser = function() {
		console.log($scope.login.email);
		var loginUrl = APIUrl + "/login/" + $scope.login.email + "/"
				+ $scope.login.password;
		$http.get(loginUrl).then(
				function(response) {
					if (response.data == "failed")
						alert("User name password not matched");
					else {
						console.log("User Data keys========> "
								+ Object.keys(response.data));
						localStorage.setItem("userApiKey",
								response.data.objectId);
						localStorage.setItem("currentUser", JSON
								.stringify(response.data));
						$location.path('/');
						$scope.checkUser();
					}
				});
	};

	$scope.logout = function() {
		localStorage.removeItem("userApiKey");
		alert("Loggout");
		$scope.checkUser();
	};

	$scope.fetchUserArticles = function() {
		console.log("Fetching");
		var userApi = localStorage.getItem("userApiKey");
		var fetchArticleUrl = APIUrl + "/fetch/" + userApi;
		$scope.myArticles = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				console.log("Object===> " + l);
				// $scope.myArticles.push({
				// "title" : "22"
				// });
				$scope.myArticles.push(l);
			});
			// $scope.myArticles=response.data[2];
			console.log(response.data);
		});
	}

	$scope.checkUser();

});