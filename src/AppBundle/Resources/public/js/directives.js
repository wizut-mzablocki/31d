'use strict';
	
/* Directives */

var directives = angular.module('mobilepostDirectives', []);


directives.directive('ngRedirectTo',['$window', function($window) {
	return {
		restrict: 'A',
		link: function(scope, element, attributes) {
			element.on('click', function() {
				$window.location.href = attributes.ngRedirectTo;
			});
		}
	}
}]);
