app.controller('userManagementController', function($scope, $http, $location,
		cmsService) {
	$scope.listUsers = function(from, to) {
		var userApi = localStorage.getItem("userApiKey");
		var fetchUsersUrl = APIUrl + "/fetchUsers/" + userApi;
		$scope.allUsers = [];
		$http.get(fetchUsersUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				$scope.allUsers.push(l);
			});
			console.log(response.data);
		});
	};

	$scope.follow = function(followingId, addOrRemove) {
		var userApi = localStorage.getItem("userApiKey");
		var followUrl = APIUrl + "/followUser/" + userApi + "/" + followingId
				+ "/" + addOrRemove;
		$http.get(followUrl).then(function(response) {
			alert(response.data);
			console.log(JSON.stringify(response.data));
		});
	};

	$scope.followUser = function(followingId) {
		$scope.follow(followingId, "add");
	};
	$scope.unFollowUser = function(followingId) {
		$scope.follow(followingId, "remove");
	};

	$scope.listUsers(1, 10);
});