app.controller('userController',
		function($scope, $http, $location, cmsService) {

			$scope.reset = function() {
				$scope.user = "";
			};

			$scope.saveUser = function() {
				var url = APIUrl + '/newUser';
				$http.post(url, $scope.user).success(function(data, status) {
					if (data == "User exists") {
						alert("User exists! Please try with another");
						$scope.reset();
					} else if (data == "User created") {
						alert("Account created successfully");
						$location.path('');
					}
					console.log(data);
				}).error(function(err) {
					console.log("Error" + err);
				});
			};

			$scope.loginUser = function() {
				console.log($scope.login.email);
				var loginUrl = APIUrl + "/login/" + $scope.login.email + "/"
						+ $scope.login.password;
				$http.get(loginUrl).then(
						function(response) {
							if (response.data == "failed")
								alert("User name password not matched");
							else {
								console.log("User Data keys========> "
										+ Object.keys(response.data));
								localStorage.setItem("userApiKey",
										response.data.objectId);
								localStorage.setItem("currentUser", JSON
										.stringify(response.data));
								$location.path('/');
								$scope.checkUser();
							}
						});
			};

			$scope.logout = function() {
				localStorage.removeItem("userApiKey");
				alert("Logout successfully!");
				$scope.checkUser();
			};

			$scope.fetchUserArticles = function() {
				console.log("Fetching");
				var userApi = localStorage.getItem("userApiKey");
				var fetchArticleUrl = APIUrl + "/getSiteContents/any/1/1/100/"
						+ userApi;
				console.log(fetchArticleUrl);
				$scope.myArticles = [];
				$http.get(fetchArticleUrl).then(function(response) {
					$.each(response.data, function(i, l) {
						$scope.myArticles.push(l);
					});
				});
			};

			$scope.showAction = function(obj) {
				$(".action-items").hide();
				$("#action-" + obj.objectId).show();
			};

			$scope.hideAction = function() {
				$(".action-items").hide();
			};

			$scope.checkUser = function() {
				var isUserLoggedIn = cmsService.checkUser($scope);
				console.log(isUserLoggedIn);
				if (isUserLoggedIn == false) {
					console.log("Not logged in");
					$location.path('/login');
				} else {
					$scope.fetchUserArticles();
				}
			};
			$scope.checkUser();
		});
