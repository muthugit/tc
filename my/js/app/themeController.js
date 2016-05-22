app.controller('themeController', function($scope, $routeParams, $http,
		$location) {
	var userApi = localStorage.getItem("userApiKey");
	var isStatic = $routeParams.isStatic;

	if (isStatic == 'true') {
		$scope.totalHtmlBlocks = [ 'about-us', 'header', 'top-navigation',
				'contact-us', 'social', 'widget-1', 'widget-2', 'widget-3',
				'widget-4', 'widget-5', 'widget-6', 'widget-7', 'widget-8',
				'widget-9', 'widget-10' ];
		$scope.redirectUrl = "#/themeSettings/staticContents/true/";
	} else {
		$scope.totalHtmlBlocks = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13,
				14, 15, 16, 17, 18, 19, 20 ];
		$scope.redirectUrl = "#/themeSettings/htmlBlocks/";
	}

	$scope.htmlBlock = {};
	var htmlBlockScope = $scope.htmlBlock;

	$scope.currentBlockId = $routeParams.htmlBlockId;

	$scope.saveBlock = function(blockId) {
		$("#saveBtn").hide();
		var url = APIUrl + '/saveHtmlBlocks';
		htmlBlockScope = $scope.htmlBlock;
		htmlBlockScope.userApi = userApi;
		htmlBlockScope.blockId = blockId;
		$http.post(url, $scope.htmlBlock).success(function(data, status) {
			console.log(data);
			$("#saveBtn").show();
		}).error(function(err) {
			console.log("Error" + err);
			$("#saveBtn").show();
		});
	};

	$scope.getHtmlBlock = function(blockId) {
		var getHtmlUrl = APIUrl + '/getHtmlBlocks/' + blockId;
		$http.get(getHtmlUrl).then(function(response) {
			console.log(response.data);
			$scope.htmlBlock = (response.data[0]);
		});
	};

	$scope.getHtmlBlock($scope.currentBlockId);

});
