app.controller('homePageController', function($scope, $routeParams, $http,
		$location, cmsService) {

	var postId = $routeParams.postId;

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

	$scope.fetchUsers = function(area, category, page, from, max) {
		var fetchArticleUrl = APIUrl + "/getSiteUsers/" + category + "/" + page
				+ "/" + from + "/" + max;
		$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				$scope[area].push(l);
			});
		});
	};

	$scope.showContent = function(postId, area) {
		var fetchArticleUrl = APIUrl + "/fetchSingleContent/" + postId;
		console.log("Area: " + postId);
		console.log(fetchArticleUrl);
		$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$scope[area].push(response.data);
			console.log(response.data);
			jQuery("time.timeago").timeago();
		});
	};

	if (postId != undefined)
		$scope.showContent(postId, "singleContent");

	jQuery("time.timeago").timeago();

	$scope.fetchArticles("topNews", "any", 1, 1, 4, "all");
	$scope.fetchArticles("bigPic1", "any", 1, 1, 1, "all");
	$scope.fetchArticles("bigPic2", "any", 1, 1, 3, "all");
	$scope.fetchArticles("categoryList1", "any", 1, 1, 4, "all");
	$scope.fetchArticles("recentStories", "any", 1, 1, 20, "all");

	$scope.fetchUsers("authors", "any", 1, 1, 20);

});

jQuery(document).ready(function() {
	jQuery("time.timeago").timeago();
});
