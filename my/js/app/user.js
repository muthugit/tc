app.controller('userController', function($scope, $http, $location) {
	$scope.checkUser = function() {
		if (localStorage.getItem("userApiKey") != null)
			$location.path('/login');
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
				$location.path('/c/1');
			}
			console.log(data);
		}).error(function(err) {
			console.log("Error" + err);
		});
	};
	$scope.checkUser();
});