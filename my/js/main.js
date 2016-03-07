/**
 * AngularJS Tutorial 1
 * @author Nick Kaye <nick.c.kaye@gmail.com>
 */

/**
 * Main AngularJS Web Application
 */
var app = angular.module('littleBitAdminApp', [ 'ngRoute', 'ngStorage',
		'firebase' ]);

/**
 * Configure the Routes
 */
app.config([ '$routeProvider', function($routeProvider) {
	$routeProvider
	// Home
	.when("/", {
		templateUrl : "core/home/index.html",
		controller : "PageCtrl"
	})
	// Pages
	.when("/about", {
		templateUrl : "core/about.html",
		controller : "PageCtrl"
	}).when("/media", {
		templateUrl : "core/media.html",
		controller : "PageCtrl"
	}).when("/contents", {
		templateUrl : "core/contents.html",
		controller : "PageCtrl"
	}).when("/products", {
		templateUrl : "core/products.html",
		controller : "PageCtrl"
	}).when("/contact", {
		templateUrl : "core/contact.html",
		controller : "PageCtrl"
	})
	// Blog
	.when("/blog", {
		templateUrl : "core/blog.html",
		controller : "BlogCtrl"
	}).when("/p/:postId/", {
		templateUrl : "core/blog.html",
		controller : "postCtrl"
	}).when("/blog/post", {
		templateUrl : "core/blog_item.html",
		controller : "BlogCtrl"
	})

	.when("/c/:categoryId/", {
		templateUrl : "core/categoryList.html",
		controller : "TestCtrl"
	})
	// else 404
	.otherwise("/404", {
		templateUrl : "core/404.html",
		controller : "PageCtrl"
	});
} ]);


