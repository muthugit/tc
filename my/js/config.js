var APIUrl = "http://192.168.0.102:9991";

var app = angular.module('cmsApp', [ 'ngRoute' ]);

app.config([ '$routeProvider', '$locationProvider',
		function($routeProvider, $locationProvider) {
			$routeProvider
			// Home
			.when("/", {
				templateUrl : "core/home/index.html",
				controller : "userController"
			})
			// Pages
			.when("/login", {
				templateUrl : "core/home/login.html",
				controller : ""
			}).when("/media", {
				templateUrl : "core/media.html",
				controller : ""
			}).when("/contents", {
				templateUrl : "core/contents.html",
				controller : ""
			}).when("/products", {
				templateUrl : "core/products.html",
				controller : ""
			}).when("/contact", {
				templateUrl : "core/contact.html",
				controller : ""
			})
			// Blog
			.when("/blog", {
				templateUrl : "core/blog.html",
				controller : ""
			}).when("/p/:postId/", {
				templateUrl : "core/blog.html",
				controller : ""
			}).when("/blog/post", {
				templateUrl : "core/blog_item.html",
				controller : ""
			})

			.when("/c/:categoryId/", {
				templateUrl : "core/category.html",
				controller : ""
			})
			// else 404
			.otherwise("/404", {
				templateUrl : "core/404.html",
				controller : ""
			});
			$locationProvider.html5Mode(true);
		} ]);
