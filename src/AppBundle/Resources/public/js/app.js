'use strict';
	
/* Modules */
	
var app = angular.module('mobilePost', [	
	'mobilepostControllers',
	'mobilepostServices',
	'mobilepostDirectives',
	'ngRoute'
	]);
/*	
app.config(['$httpProvider', 
	function($httpProvider) {
		$httpProvider.defaults.useXDomain = true;
		$httpProvider.defaults.headers.post['Accept'] = 'application/json, text/javascript';
		$httpProvider.defaults.headers.post['Content-Type'] = 'application/json';
		delete $httpProvider.defaults.headers.common['X-Request-With'];
}]);
*/


app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.
		when('postmen/new', {
			templateUrl: '/bundles/app/partials/parcel-form.html', 
			controller: 'CreatePostmanFormCtrl'
		}).
		when('postmen/:parcelId', {
			templateUrl: '/bundles/app/partials/parcel-form.html', 
			controller: 'UpdatePostmanlFormCtrl'
		}).
    	otherwise({
			templateUrl: '/bundles/app/partials/postman-list.html',
			controller: 'PostmenListCtrl'
		});
  }]);
