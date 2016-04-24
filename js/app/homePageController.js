app.controller('homePageController', function($scope, $routeParams, $http,
		$location, cmsService, $rootScope) {

	var from = 1;
	var max = 3;

	$rootScope.pageTitle = "Home";
	
	$rootScope.htmlReady();
	
	cmsService.fetchArticles($scope, "bigPic1", "any", 1, 1, 1, "all");
	cmsService.fetchArticles($scope, "topNews", "any", 1, 1, 4, "all");

	cmsService.fetchArticles($scope, "bigPic2", "any", 1, 3, 2, "all");
	cmsService.fetchArticles($scope, "categoryList1", "any", 1, 1, 4, "all");
	cmsService.fetchArticles($scope, "recentStories", "any", 1, 1, 20, "all");

	$scope.loadMore = function() {
		console.log("From: " + from);
		cmsService
				.fetchArticles($scope, "articles", "any", 1, from, max, "all");
		from = from + 3;
	};
});
