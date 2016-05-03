app.controller('userManagementController', function($scope, $http, $location,
		cmsService) {
	$scope.listUsers = function() {
		var userApi = localStorage.getItem("userApiKey");
		var fetchUsersUrl = APIUrl + "/fetchUsers/" + userApi;
		$scope.allUsers = [];
		$http.get(fetchUsersUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				console.log("Object===> " + l);
				$scope.allUsers.push(l);
			});
			console.log(response.data);
		});
	};
	$scope.listUsers();
});