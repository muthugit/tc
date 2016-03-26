app.controller('homePageController', function($scope, $http, $location,
		cmsService) {

	$scope.fetchArticles = function(area, category, page, from, max, userApi) {
		var fetchArticleUrl = APIUrl + "/getSiteContents/" + category + "/"
				+ page + "/" + from + "/" + max + "/" + userApi;
		$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				$scope[area].push(l);
			});
		});
	};

	$scope.fetchArticles("topNews", "any", 1, 1, 4, "all");
	$scope.fetchArticles("bigPic1", "any", 1, 1, 1, "all");
	$scope.fetchArticles("bigPic2", "any", 1, 1, 3, "all");
	$scope.fetchArticles("categoryList1", "any", 1, 1, 4, "all");
	$scope.fetchArticles("recentStories", "any", 1, 1, 20, "all");

});
