var app = angular.module('cmsApp', [ 'ngRoute', 'ngSanitize', 'angularMoment',
		'infinite-scroll', 'seo' ]);

/*
 * Angular Moment for showing time now
 */

app.config([
		'$routeProvider',
		'$locationProvider',
		function($routeProvider, $locationProvider) {

			$routeProvider
			// Home
			.when("/", {
				templateUrl : "core/home/index.html",
				controller : "homePageController",
			}).when("/p/:postId/:postTitle/", {
				templateUrl : "core/singlePost.html",
				controller : "postController",
			}).when("/author/:authorId/", {
				templateUrl : "core/authorHome.html",
				controller : "userController",
			}).when("/c/:categoryId/", {
				templateUrl : "core/category.html",
				controller : "commonController",
			})

			// else 404
			.otherwise("/404", {
				templateUrl : "core/404.html",
				controller : ""
			});
			$locationProvider.html5Mode(false);

			// ================== FOR SEO BEGINS
			$locationProvider.hashPrefix('!');
			// ============= END SEO

		} ]);

app.filter('rawHtml', [ '$sce', function($sce) {
	return function(val) {
		return $sce.trustAsHtml(val);
	};
} ]);

app.filter('htmlToPlaintext', function() {
	return function(text) {
		console.log(text);
		return text ? String(text).replace(/<\/?[^>]+>/gi, '') : '';
	};
});

app.filter('fromNow', function() {
	return function(date) {
		return moment(date).fromNow();
	}
});

app.run(function(amMoment) {
	amMoment.changeLocale('de');
});

app.controller('headerController', [ '$scope', function($scope) {
	$scope.siteName = siteName;
} ]);