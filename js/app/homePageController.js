app.controller('homePageController', function($scope, $routeParams, $http,
		$location, cmsService) {

	var postId = $routeParams.postId;

	$scope.fetchArticles = function(area, category, page, from, max, userApi) {
		cmsService.fetchArticles($scope, area, category, page, from, max,
				userApi);
	};

	$scope.fetchUsers = function(area, category, page, from, max) {
		cmsService.fetchUsers($scope, area, category, page, from, max);
	};

	$scope.showContent = function(postId, area) {
		cmsService.showContent($scope, postId, area);
	};

	if (postId != undefined)
		$scope.showContent(postId, "singleContent");

	$scope.fetchArticles("topNews", "any", 1, 1, 4, "all");
	$scope.fetchArticles("bigPic1", "any", 1, 1, 1, "all");
	$scope.fetchArticles("bigPic2", "any", 1, 1, 3, "all");
	$scope.fetchArticles("categoryList1", "any", 1, 1, 4, "all");
	$scope.fetchArticles("recentStories", "any", 1, 1, 20, "all");

	$scope.fetchUsers("authors", "any", 1, 1, 20);

});



