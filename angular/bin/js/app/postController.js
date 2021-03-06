app.controller('postController', function($scope, $routeParams, $http,
		$location, cmsService, $rootScope) {
	var userApi = localStorage.getItem("userApiKey");
	$scope.post = {};
	var postScope = $scope.post;
	postScope.userApi = userApi;

	var postId = $routeParams.postId;
	var postTitle = $routeParams.postTitle;

	if (postId != undefined) {
		$rootScope.pageTitle = postTitle;
		cmsService.showContent($scope, postId, "singleContent");
		$rootScope.htmlReady();
	}

	$scope.open = function($link) {
		$location.path('/' + $link);
	};

	$scope.savePost = function() {
		var textareaValue = $('#summernote').summernote('code');
		postScope.postDetail = $.trim(textareaValue);
		postScope.featureImageURL = $("#img_uploadFeatureImage").val();

		var url = APIUrl + '/newPost';
		$http.post(url, $scope.post).success(function(data, status) {
			console.log("Post insert data ==> " + data);
		}).error(function(err) {
			console.log("Error" + err);
		});

		console.log("Saving post");
		console.log($scope.post);
	};

	$scope.showCategory = function() {

		var fetchCategoryUrl = APIUrl + "/getGenericContents/category";
		$http.get(fetchCategoryUrl).then(function(response) {

			console.log(response.data);
			$scope.categories = (response.data);

		});
	};

	$scope.showCategory();
});
