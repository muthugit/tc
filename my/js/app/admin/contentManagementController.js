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

	$scope.approveIt = function(contentId, toStatus) {
		var userApi = localStorage.getItem("userApiKey");
		var approveUrl = APIUrl + "/approveContent/" + userApi + "/"
				+ contentId + "/" + toStatus;
		$http.get(approveUrl).then(function(response) {
			angular.element("#status_" + contentId).html(response.data);
			console.log("#status_" + contentId + "===>" + response.data);
		});
	};

	$scope.listContents();
});