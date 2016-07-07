var app = angular.module('cmsApp',
		[ 'ngRoute', 'ngSanitize', 'angular.filter' ]);

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
			}).when("/profile", {
				templateUrl : "core/profile.html",
				controller : ""
			}).when("/new-post", {
				templateUrl : "core/newPost.html",
				controller : "postController"
			}).when("/users", {
				templateUrl : "core/admin/users.html",
				controller : "userManagementController"
			}).when("/contents", {
				templateUrl : "core/admin/contents.html",
				controller : "contentManagementController"
			}).when("/contents/:postStatus/:isFeatured", {
				templateUrl : "core/admin/contents.html",
				controller : "contentManagementController"
			}).when("/media", {
				templateUrl : "core/media.html",
				controller : ""
			}).when("/categories", {
				templateUrl : "core/admin/categories.html",
				controller : ""
			}).when("/contact", {
				templateUrl : "core/contact.html",
				controller : ""
			}).when("/themeSettings", {
				templateUrl : "core/themeSettings/index.html",
				controller : ""
			}).when("/themeSettings/htmlBlocks/:htmlBlockId", {
				templateUrl : "core/themeSettings/htmlContents.html",
				controller : "themeController"
			}).when("/themeSettings/staticContents/:isStatic/:htmlBlockId", {
				templateUrl : "core/themeSettings/htmlContents.html",
				controller : "themeController"
			}).when("/singlePost/:postId", {
				templateUrl : "core/singlePost.html",
				controller : "postController"
			}).when("/editPost/:postId", {
				templateUrl : "core/newPost.html",
				controller : "postController"
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
			}).when("/c/:categoryId/", {
				templateUrl : "core/category.html",
				controller : ""
			}).when("/resetPassword/:userId", {
				templateUrl : "core/resetPassword.html",
				controller : "profileController",
				resetPwd : "true"
			}).when("/changePassword", {
				templateUrl : "core/changePassword.html",
				controller : "profileController",
				resetPwd : "true"
			}).when("/logout", {
				controller : "userController"
			})
			// else 404
			.otherwise("/404", {
				templateUrl : "core/404.html",
				controller : ""
			});
			$locationProvider.html5Mode(false);
		} ]);
