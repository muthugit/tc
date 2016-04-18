app.controller('commonController', function($scope, $routeParams, $http,
		$location, cmsService) {

	var postId = $routeParams.postId;
	var categoryId = $routeParams.categoryId;

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

	$scope.showContentList = function(categoryId, area) {
		cmsService.showContentList($scope, categoryId, area);
	};

	if (postId != undefined)
		$scope.showContent(postId, "singleContent");

	if (categoryId != undefined) {
		console.log("Showing category: " + categoryId);
		$scope.showContentList(categoryId, "contentList");
	}

	$scope.fetchArticles("bigPic1", "any", 1, 1, 1, "all");
	$scope.fetchArticles("topNews", "any", 1, 1, 4, "all");
	
	$scope.fetchArticles("bigPic2", "any", 1, 3, 2, "all");
	$scope.fetchArticles("categoryList1", "any", 1, 1, 4, "all");
	$scope.fetchArticles("recentStories", "any", 1, 1, 20, "all");

	$scope.fetchUsers("authors", "any", 1, 1, 20);

	var from = 1;
	var max = 3;

	$scope.loadMore = function() {
		console.log("From: " + from);
		$scope.fetchArticles("articles", "any", 1, from, max, "all");
		from = from + 3;
	};

});
