var homeApp = angular.module('home',[]);

homeApp.controller('reelController', function($scope) {
});

homeApp.directive("unimate", [
	function() {
		return {
			restrict : "E",
			templateUrl : "/widgets/unimate",
			controller : ["$scope", function($scope) {
				
			}]
		}
	}
]);