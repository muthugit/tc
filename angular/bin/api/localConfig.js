var resetPasswordUrlPrefix = "http://padaippaligalulagam.com/my/genericContents/forgotPassword.html?id=";
var adminUrl = "http://padaippaligalulagam.com/my/";

var resetPasswordUrlPrefix = "http://192.168.0.102/tc/my/genericContents/forgotPassword.html?id=";
var adminUrl = "http://192.168.0.102/tc/my/";

var parseServerLocation = "http://localhost:1337";
//var parseServerLocation = "http://cdn.littlebit.in";
var localConfig = function() {
	var self = this;
	self.getServerLocation = function() {
		return parseServerLocation;
	};
};

module.exports = localConfig;
