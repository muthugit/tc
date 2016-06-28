app.controller('postController', function($scope, $routeParams, $http,
		$location) {
	var userApi = localStorage.getItem("userApiKey");
	$scope.post = {};
	$scope.category = {};
	var postScope = $scope.post;
	postScope.userApi = userApi;
	$scope.imagePath = UPLOAD_PATH;

	var postId = $routeParams.postId;

	var userType = JSON.parse(localStorage.getItem("currentUser")).userType;

	$scope.open = function($link) {
		$location.path('/' + $link);
	};

	$scope.savePost = function() {
		$('input[type="submit"]').prop('disabled', true);
		if ($("#postTitle").val() == "") {
			alert("Please enter post title.");
			return;
		}
		if ($("#postDescription").val() == "") {
			alert("Please enter post description.");
			return;
		}
		if ($("#postCategory").val() == "") {
			alert("Please select the post category.");
			return;
		}
		$("#btnPublish").hide();

		var textareaValue = $('#summernote').summernote('code');
		postScope.content = textareaValue;
		// postScope.postDetail = $.trim(textareaValue);
		// postScope.featureImageURL = $("#img_uploadFeatureImage").val();

		$scope.post['content'] = $.trim(textareaValue);
		$scope.post['postDetail'] = $.trim(textareaValue);
		$scope.post['featureImageURL'] = $("#img_uploadFeatureImage").val();

		var url = APIUrl + '/newPost';
		$http.post(url, $scope.post).success(function(data, status) {
			console.log("Post insert data ==> " + data);
			alert("Your content has been created/updated successfully.");
			$location.path('/');
		}).error(function(err) {
			console.log("Error" + err);
		});

		console.log("Saving post");
		console.log($scope.post);
	};

	$scope.categoryInDropDown = function() {
		if (userType == "admin")
			fetchCategoryUrl = APIUrl + "/getGenericContents/category";
		else
			fetchCategoryUrl = APIUrl + "/getCategoryList/false";

		$http.get(fetchCategoryUrl).then(function(response) {
			console.log(response.data);
			$scope.categories = (response.data);
		});
	};

	$scope.updateCategory = function() {
		var categoryScope = $scope.category;
		categoryScope.userApi = userApi;
		categoryScope.repository = "category";
		var url = APIUrl + '/newAdminGenericContent';
		$http.post(url, $scope.category).success(function(data, status) {
			console.log("Category insert data ==> " + data);
		}).error(function(err) {
			console.log("Error" + err);
		});

	};

	$scope.showSinglePost = function() {
		if (postId != undefined) {
			area = 'singleContent';
			var fetchArticleUrl = APIUrl + "/fetchSingleContent/" + postId;
			console.log("Area: " + postId);
			console.log(fetchArticleUrl);
			$scope[area] = [];
			$http.get(fetchArticleUrl).then(function(response) {
				$scope[area].push(response.data);
				showFeatureImage();
			});
		}
	};

	$scope.editPost = function() {
		if (postId != undefined) {
			var fetchArticleUrl = APIUrl + "/fetchSingleContent/" + postId;
			console.log("Area: " + postId);
			console.log(fetchArticleUrl);
			$scope.post = [];
			$http.get(fetchArticleUrl).then(function(response) {
				$scope.post = (response.data);
				$("#img_uploadFeatureImage_src").attr('src', UPLOAD_PATH + $scope.post['featureImageURL']);
				console.log($scope.post.postDetail);
				$('#summernote').summernote('code', $scope.post.postDetail);
			});
		}
	};

	$scope.editPost();
	$scope.showSinglePost();
	$scope.categoryInDropDown();
});
