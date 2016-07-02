app.controller('contentManagementController', function($scope, $routeParams,
		$http, $location, cmsService) {

	var postStatus = $routeParams.postStatus;
	var isFeatured = $routeParams.isFeatured;

	$scope.listContents = function(postStatus, isFeatured) {
		var userApi = localStorage.getItem("userApiKey");
		currentPostStatus = postStatus;
		if(postStatus=="all")
			currentPostStatus="All";
		if (isFeatured == 'true')
			currentPostStatus = "Featured";
		$scope.currentStatus = currentPostStatus;
		contentType = '1';
		if (isFeatured == "true")
			contentType = '2';
		var fetchContentsUrl = APIUrl + "/getMyContents/any/" + contentType
				+ "/1/100/all/" + postStatus;
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

	$scope.listContents(postStatus, isFeatured);
});