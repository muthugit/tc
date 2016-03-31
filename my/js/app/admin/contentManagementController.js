app.controller('contentManagementController', function($scope, $http,
		$location, cmsService) {
	$scope.listContents = function() {
		var userApi = localStorage.getItem("userApiKey");
		var fetchContentsUrl = APIUrl + "/fetchContents/" + userApi;
		$scope.allContents = [];
		$http.get(fetchContentsUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				$scope.allContents.push(l);
			});
		});
	};
	$scope.listContents();
});