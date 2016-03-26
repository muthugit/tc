var app = angular.module('cmsApp', [ 'ngRoute' ]);

app.config([ '$routeProvider', '$locationProvider',
		function($routeProvider, $locationProvider) {
			$routeProvider
			// Home
			.when("/", {
				templateUrl : "core/home/index.html",
				controller : "userController"
			})

			// else 404
			.otherwise("/404", {
				templateUrl : "core/404.html",
				controller : ""
			});
			$locationProvider.html5Mode(false);
		} ]);
