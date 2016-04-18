app.service('cmsService', function($http) {

	this.fetchArticles = function($scope, area, category, page, from, max,
			userApi) {
		var fetchArticleUrl = APIUrl + "/getSiteContents/" + category + "/"
				+ page + "/" + from + "/" + max + "/" + userApi;
		if ($scope[area] == null)
			$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				console.log(response.data);
				$scope[area].push(l);
			});
		});
	};

	this.fetchUsers = function($scope, area, category, page, from, max) {
		var fetchArticleUrl = APIUrl + "/getSiteUsers/" + category + "/" + page
				+ "/" + from + "/" + max;
		$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				$scope[area].push(l);
			});
		});
	};

	this.authorInfo = function($scope, authorId, area) {
		var fetchArticleUrl = APIUrl + "/getUserInfo/" + authorId;
		console.log(fetchArticleUrl);
		$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$scope[area].push(response.data);
		});
	};

	this.showContent = function($scope, postId, area) {
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

	this.showContentList = function($scope, categoryId, area) {
		var fetchArticleUrl = APIUrl + "/fetchContentList/" + categoryId;
		console.log(fetchArticleUrl);
		$scope[area] = [];
		$http.get(fetchArticleUrl).then(function(response) {
			$.each(response.data, function(i, l) {
				$scope[area].push(l);
				console.log(response.data);
				jQuery("time.timeago").timeago();
			});
		});
	};

});

app.filter('unsafe', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	};
});
app.filter('cut', function() {
	return function(value, wordwise, max, tail) {
		if (!value)
			return '';

		max = parseInt(max, 10);
		if (!max)
			return value;
		if (value.length <= max)
			return value;

		value = value.substr(0, max);
		if (wordwise) {
			var lastspace = value.lastIndexOf(' ');
			if (lastspace != -1) {
				value = value.substr(0, lastspace);
			}
		}

		return value + (tail || ' …');
	};
});