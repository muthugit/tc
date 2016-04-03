app.controller('userController',
		function($scope, $http, $routeParams, $location, cmsService) {

			var userId = $routeParams.authorId;
			console.log("USer IDDDDDDD => " + userId);

			$scope.fetchUserArticles = function(userApi, area) {
				cmsService.fetchArticles($scope, area, "any", "1", "1", "100",
						userApi);
			};

			$scope.authorInfo = function(authorId, area) {
				cmsService.authorInfo($scope, authorId, area);
			};

			$scope.fetchUserArticles(userId, "myArticles");
			$scope.authorInfo(userId, "author");

			$scope.showAction = function(obj) {
				$(".action-items").hide();
				$("#action-" + obj.objectId).show();
			};

			$scope.hideAction = function() {
				$(".action-items").hide();
			};
		});
