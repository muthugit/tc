app.controller('userController', function($scope, $http, $location) {
	$scope.checkUser = function() {
		if (localStorage.getItem("userApiKey") == null)
			$location.path('/login');
		else
			$location.path('/');
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
		$http.get(loginUrl).then(function(response) {
			if (response.data == "failed")
				alert("User name password not matched");
			else {
				localStorage.setItem("userApiKey", response.data);
				$scope.checkUser();
			}
		});
	};
	$scope.checkUser();
});