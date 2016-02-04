// avoid conflicts with blade -- using <% %>
var homeApp = angular.module('home',[], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

homeApp.factory('Student', function($http) {

    return {
        get : function() {
            return $http.get('/api/students');
        },

        // save a comment (pass in comment data)
        // save : function(commentData) {
        //     return $http({
        //         method: 'POST',
        //         url: '/api/comments',
        //         headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
        //         data: $.param(commentData)
        //     });
        // },

        destroy : function(id) {
            return $http.delete('/api/students/' + id);
        }
    }
});

homeApp.controller('consultantReelController',["$scope", "$http", "Student",
	function($scope,$http, Student) {
		$scope.students = {};
		$scope.loading = true;
		Student.get().success(function(data){
			$scope.students = data;
			$scope.loading = false;
		});
		
		
	}]
);

homeApp.directive("unimate", [
	function() {
		return {
			restrict : "E",
			templateUrl : "/widgets/unimate",
			controller : ["$scope", function($scope) {
				
			}],
			scope : {
				"username" : "@",
				"countries" : "@"
			}
		}
	}
]);


