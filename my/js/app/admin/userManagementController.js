app.controller('userManagementController', function($scope, $rootScope, $http,
		$location, cmsService) {
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

	$scope.follow = function(followingId, addOrRemove, name) {
		var userApi = localStorage.getItem("userApiKey");
		var followUrl = APIUrl + "/followUser/" + userApi + "/" + followingId
				+ "/" + addOrRemove;
		$http.get(followUrl).then(
				function(response) {
					localStorage.setItem("followingList", JSON
							.stringify(response.data));
					$scope.allUsers.followingProfiles = JSON.parse(localStorage
							.getItem("followingList"));

					if (addOrRemove == "add") {
						addOrRemove = "Following";
						notificationType = "success";
						$("#followBtn_" + followingId).hide();
						$("#unFollowBtn_" + followingId).show();
					} else {
						addOrRemove = "Un following";
						notificationType = "danger";
						$("#followBtn_" + followingId).show();
						$("#unFollowBtn_" + followingId).hide();
					}

					cmsService
							.notification(notificationType, addOrRemove, name);

					console.log(JSON.stringify(response.data));
				});
	};

	$scope.showFollowBtn = function() {
		var obj = JSON.parse(localStorage.getItem("followingList"));
		$.each(obj, function(index, value) {
			$("#followBtn_" + value['objectId']).hide();
			$("#unFollowBtn_" + value['objectId']).show();
		});
	};

	$scope.followUser = function(followingId, name) {
		$scope.follow(followingId, "add", name);
	};
	$scope.unFollowUser = function(followingId, name) {
		$scope.follow(followingId, "remove", name);
	};

	$scope.listUsers(1, 10);
	$scope.allUsers.followingProfiles = JSON.parse(localStorage
			.getItem("followingList"));
});