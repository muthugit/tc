app.controller('postController', function($scope, $http, $location) {
	var userApi = localStorage.getItem("userApiKey");
	$scope.post = {};
	var postScope = $scope.post;
	postScope.userApi = userApi;

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
			alert("Your content has been created successfully.");
			$location.path('/');
		}).error(function(err) {
			console.log("Error" + err);
		});

		console.log("Saving post");
		console.log($scope.post);
	};

	$scope.categoryInDropDown = function() {
		$scope.data = {
			availableOptions : [ {
				id : '1',
				name : 'Option A'
			}, {
				id : '2',
				name : 'Option B'
			}, {
				id : '3',
				name : 'Option C'
			} ],
			selectedOption : {
				id : '3',
				name : 'Option C'
			}
		// This sets the default value of the select in the ui
		};
	}

	$scope.updateCategory = function() {
		$scope.category = {};
		var categoryScope = $scope.category;
		categoryScope.userApi = userApi;
		categoryScope.repository = "category";

		console.log("Started creating category");
		var url = APIUrl + '/newAdminGenericContent';
		$http.post(url, $scope.category).success(function(data, status) {
			console.log("Category insert data ==> " + data);
		}).error(function(err) {
			console.log("Error" + err);
		});
	};
	$scope.categoryInDropDown();
});
