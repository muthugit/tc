app.controller('contentManagementController', function($scope, $http,
		$location, cmsService) {
	$scope.listContents = function() {
		var userApi = localStorage.getItem("userApiKey");
		var fetchContentsUrl = APIUrl + "/fetchContents/" + userApi;
		$scope.allContents = [];
		$http.get(fetchContentsUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				var fetchUserInfoUrl = APIUrl + "/getUserInfo/" + l['userApi'];
				$http.get(fetchUserInfoUrl).then(function(userResponse) {
					var resultJSON = JSON.stringify(userResponse.data);
					var result = $.parseJSON(resultJSON);
					$.each(result, function(k, v) {
						console.log(k + ' is ' + v);
						l[k] = v;
					});
					$scope.allContents.push(l);
					
				});

			});
		});
	};
	$scope.listContents();
});