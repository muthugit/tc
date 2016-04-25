app.controller('commonController', function($scope, $routeParams, $http,
		$location, cmsService, $rootScope) {

	
	var categoryId = $routeParams.categoryId;

	$scope.fetchArticles = function(area, category, page, from, max, userApi) {
		cmsService.fetchArticles($scope, area, category, page, from, max,false,
				userApi);
	};

	$scope.fetchUsers = function(area, category, page, from, max) {
		cmsService.fetchUsers($scope, area, category, page, from, max);
	};

	$scope.showContent = function(postId, area) {
		cmsService.showContent($scope, postId, area);
	};

	$scope.showContentList = function(categoryId, area) {
		cmsService.showContentList($scope, categoryId, area);
	};

	

	if (categoryId != undefined) {
		console.log("Showing category: " + categoryId);
		$scope.fetchArticles("contentList", categoryId, 1, 1, 300, "all");
		$rootScope.pageTitle = "Category List";
		// cmsService.setTitle("Category");
	}

	$scope.fetchUsers("authors", "any", 1, 1, 20);

	

	
});
