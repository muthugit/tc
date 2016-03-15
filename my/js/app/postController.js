app.controller('postController', function($scope, $http, $location) {
	$scope.open = function($link) {
		console.log("Test");
		$location.path('/' + $link);
	};
});