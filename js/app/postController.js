app.controller('postController', [ '$scope', '$routeParams',
		function($scope, $routeParams,$location, cmsService) {
			var userApi = localStorage.getItem("userApiKey");
			$scope.post = {};
			var postScope = $scope.post;
			postScope.userApi = userApi;
			var postId = $routeParams.postId;

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

			
		} ]);
