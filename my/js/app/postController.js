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
		postScope.postDetail = $.trim(textareaValue);

		var url = APIUrl + '/newPost';
		$http.post(url, $scope.post).success(function(data, status) {
			console.log("Post insert data ==> " + data);
		}).error(function(err) {
			console.log("Error" + err);
		});

		console.log("Saving post");
		console.log($scope.post);
	};
});