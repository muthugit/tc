var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var emailExistErrorMessage = "Email already registered. \nPlease try with another email address.";
var accountSuccessMessage = "Congratulations! \nYour account has been created successfully. Please check your email and set the new password for your account.";
var loginFailedErrorMessage = "The email and password that you entered don't match.";
var welcomeMessage = "Login successful. \nWelcome to the admin portal. \nAdd your articles/posts/stories.";
app.controller('userController',
		function($scope, $http, $location, cmsService) {

			$scope.imagePath = UPLOAD_PATH;

			$scope.reset = function() {
				$scope.user = "";
			};

			$scope.saveUser = function() {
				if (!regex.test($("#email").val())) {
					alert("Please enter valid email address.");
					return;
				}

				if (!($("#email"))) {
					alert("Please enter valid email address.");
					return;
				}
				if ($("#email").val() !== $("#confirmEmail").val()) {
					alert("Confirm email address not matched.");
					return;
				}

				var url = APIUrl + '/newUser';
				$http.post(url, $scope.user).success(function(data, status) {
					if (data == "User exists") {
						alert(emailExistErrorMessage);
						$scope.reset();
					} else if (data == "User created") {
						alert(accountSuccessMessage);
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
								alert(loginFailedErrorMessage);
							else {
								localStorage.setItem("userApiKey",
										response.data.objectId);
								localStorage.setItem("currentUser", JSON
										.stringify(response.data));
								alert(welcomeMessage);
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
				alert("Thank you for your visit. Logout successfully!");
				$scope.checkUser();
			};

			$scope.fetchUserArticles = function() {
				console.log("Fetching");
				var userApi = localStorage.getItem("userApiKey");
				var fetchArticleUrl = APIUrl + "/getMyContents/any/1/1/100/"
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
						console.log("IS RRRRRRRRR = " + $scope.resetPwd);
					$location.path('/login');
				} else {
					$scope.fetchUserArticles();
				}
			};
			$scope.checkUser();
		});
