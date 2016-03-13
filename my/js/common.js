app.controller('commonCtrl', function($scope, $http) {
	$http.get(APIUrl).then(function(response) {
		console.log(response.data);
	});
});

