app.controller('profileController', function($scope, $http, $location) {
	var userApi = localStorage.getItem("userApiKey");
	$scope.profile = {};
	var profileScope = $scope.profile;
	profileScope.objectId = userApi;

	$scope.open = function($link) {
		$location.path('/' + $link);
	};

	$scope.getProfile = function() {
		var fetchCategoryUrl = APIUrl + "/getGenericContentsById/users/"
				+ userApi;
		console.log(fetchCategoryUrl);
		$http.get(fetchCategoryUrl).then(function(response) {
			console.log(response.data);
			$scope.profile = (response.data);
		});
	};

	$scope.updateProfile = function() {
		var url = APIUrl + '/updateItem/users';
		console.log(url);
		profileScope = $scope.profile;
		profileScope.profilePic = $("#img_profilePic").val();
		console.log("PPPPPPPPPPP ========> +" + $("#img_profilePic").val());
		$http.post(url, $scope.profile).success(function(data, status) {
			localStorage.setItem("currentUser", JSON.stringify(data));
		}).error(function(err) {
			console.log("Error" + err);
		});
	};

	$scope.getProfile();
});
