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

	$scope.changeStatus = function(index, contentId, toStatus) {
		var userApi = localStorage.getItem("userApiKey");
		var approveUrl = APIUrl + "/approveContent/" + userApi + "/"
				+ contentId + "/" + toStatus;
		$http.get(approveUrl).then(function(response) {
			id = Number(index);
			$scope.allContents[id].status = response.data;
		});
	};

	$scope.isFeatured = function(index, contentId, toStatus) {
		var userApi = localStorage.getItem("userApiKey");
		var approveUrl = APIUrl + "/isFeatured/" + userApi + "/" + contentId
				+ "/" + toStatus;
		$http.get(approveUrl).then(function(response) {
			id = Number(index);
			$scope.allContents[id].isFeatured = response.data;
		});
	};

	$scope.listContents();
});