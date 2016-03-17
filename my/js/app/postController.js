app.controller('postController', function($scope, $http, $location) {
	var userApi = localStorage.getItem("userApiKey");
	$scope.post = {};
	var postScope = $scope.post;
	postScope.userApi = userApi;

	$scope.open = function($link) {
		console.log("Test");
		$location.path('/' + $link);
	};

	$scope.savePost = function() {
		var textareaValue = $('#summernote').summernote('code');
		postScope.postDetail = textareaValue;

		console.log("Saving post");
		console.log($scope.post);
	};
});