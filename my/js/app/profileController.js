app.controller('profileController', function($scope, $http, $location) {
	var userApi = localStorage.getItem("userApiKey");
	$scope.profile = {};
	var profileScope = $scope.profile;
	profileScope.objectId = userApi;
	$scope.imagePath = UPLOAD_PATH;

	$scope.open = function($link) {
		$location.path('/' + $link);
	};

	$scope.getProfile = function() {
		var fetchCategoryUrl = APIUrl + "/getGenericContentsById/users/"
				+ userApi;
		$http.get(fetchCategoryUrl).then(function(response) {
			console.log(response.data);
			$scope.profile = (response.data);
		});
	};

	$scope.getUniqueNameStatus = function() {
		var url = APIUrl + '/find/users/uniqueName/' + $("#uniqueName").val();
		$http.get(url).then(function(response) {
			return ("User info===>" + (response.data)[0]['objectId']);
		});
	};

	$scope.updateProfile = function() {
		if ($("#uniqueName").val() != '') {
			var url = APIUrl + '/find/users/uniqueName/'
					+ $("#uniqueName").val();
			$http.get(url).then(function(response) {
				if (typeof response.data[0] === "undefined")
					uniqueNameId = localStorage.getItem("userApiKey");
				else
					uniqueNameId = response.data[0]['objectId'];
				if (uniqueNameId == localStorage.getItem("userApiKey"))
					$scope.updateUserInfo();
				else
					alert("Please select another unique name");
			});
		} else
			alert("Unique name can not be empty");

	};

	$scope.updateUserInfo = function() {
		var url = APIUrl + '/updateItem/users';
		console.log(url);
		profileScope = $scope.profile;
		profileScope.profilePic = $("#img_profilePic").val();
		$http.post(url, $scope.profile).success(function(data, status) {
			localStorage.setItem("currentUser", JSON.stringify(data));
			alert("Profile updated successfully");
			$location.path('');
		}).error(function(err) {
			console.log("Error" + err);
		});
	};

	$scope.resetPassword = function() {
		if ($("#newPassword").val() != $("#confirmPassword").val())
			alert("New password & Confirm password not matched");
		else {
			if ($("#newPassword").val() != "") {
				var loginUrl = APIUrl + "/login/" + $scope.profile.email + "/"
						+ $scope.profile.oldPassword;
				$http.get(loginUrl).then(function(response) {
					if (response.data == "failed")
						alert("Current password not correct");
					else {
						$scope.changePassword();
					}
				});
			} else {
				alert("Password can not be empty");
			}
		}
	};

	$scope.changePassword = function() {
		var url = APIUrl + '/changePassword';
		profileScope = $scope.profile;
		$http.post(url, $scope.profile).success(function(data, status) {
			if ((data) == "1") {
				alert("Password changed successfully");
				$location.path('');
			} else {
				alert("Can not reset password");
			}
		}).error(function(err) {
			console.log("Error" + err);
		});
	}

	$scope.getProfile();
});
