app
		.controller(
				'userController',
				function($scope, $http, $location, cmsService) {

					$scope.imagePath = UPLOAD_PATH;

					$scope.reset = function() {
						$scope.user = "";
					};

					$scope.saveUser = function() {
						captchaResponse = (grecaptcha.getResponse());
						if (captchaResponse != '') {
							if (!($("#email"))) {
								alert("Invalid email id");
								return;
							}
							if ($("#email") != $("#Confirmemail")) {
								alert("Invalid confirm email address");
								return;
							}

							var url = APIUrl + '/newUser';
							$http
									.post(url, $scope.user)
									.success(
											function(data, status) {
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
						} else {
							alert("Invalid CAPTCHA");
						}
					};

					$scope.loginUser = function() {
						console.log($scope.login.email);
						var loginUrl = APIUrl + "/login/" + $scope.login.email
								+ "/" + $scope.login.password;
						$http
								.get(loginUrl)
								.then(
										function(response) {
											if (response.data == "failed")
												alert("User name password not matched");
											else {
												console
														.log("User Data keys========> "
																+ Object
																		.keys(response.data));
												localStorage.setItem(
														"userApiKey",
														response.data.objectId);
												localStorage
														.setItem(
																"currentUser",
																JSON
																		.stringify(response.data));
												$location.path('/');
												$scope.checkUser();
											}
										});
					};

					$scope.resetPassword = function() {
						var loginUrl = APIUrl + "/resetPassword/"
								+ $scope.resetPassword.email;
						$http.get(loginUrl).then(function(response) {
							if (response.data == "404")
								alert("User name not exist");
							else {
								alert("Request has been sent to your mail");
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
						var fetchArticleUrl = APIUrl
								+ "/getMyContents/any/1/1/100/" + userApi;
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

					$scope.showLogin = function() {
						$(".loginBox").hide();
						$("#loginSection").show();
					};
					$scope.showRegister = function() {
						$(".loginBox").hide();
						$("#registerSection").show();
					};
					$scope.showForgotPassword = function() {
						$(".loginBox").hide();
						$("#resetPasswordSection").show();
					};

					$scope.checkUser = function() {
						var isUserLoggedIn = cmsService.checkUser($scope);
						if (isUserLoggedIn == false) {
							if ($scope.resetPwd == true)
								console
										.log("IS RRRRRRRRR = "
												+ $scope.resetPwd);
							$location.path('/login');
						} else {
							$scope.fetchUserArticles();
						}
					};
					$scope.checkUser();
				});
