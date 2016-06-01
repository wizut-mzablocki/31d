'use strict';
	
/* Modules */
	
var app = angular.module('mobilePost', [	
	'mobilepostControllers',
	'mobilepostServices',
	'mobilepostDirectives',
	'ngRoute'
	]);
    
var app = angular.module('postmanPanel', ['taskControllers', 'taskServices', 'ngRoute']);
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
        when('postmen',{templateUrl: '/bundles/app/partials/postman-list.html',controller: 'PostmenListCtrl'}).
        when('postmen/new', {templateUrl: '/bundles/app/partials/parcel-form.html', controller: 'CreatePostmanFormCtrl'}).
        when('postmen/:parcelId', {templateUrl: '/bundles/app/partials/parcel-form.html', controller: 'UpdatePostmanlFormCtrl'}).
        when('parcelorder/', {templateUrl: '/bundles/app/partials/parcelorder-list.html',controller: 'ParcelOrderListCtrl'}).
        when('parcelorder/new', {templateUrl: '/bundles/app/partials/parcelorder-form.html', controller: 'CreateParcelorderFormCtrl'}).
        when('parcelorder/edit/:parcelorderId', {templateUrl: '/bundles/app/partials/parcelorder-form.html',controller: 'UpdateParcelorderFormCtrl'}).
        when('/parcelorders', {'templateUrl': '/bundles/app/partials/parcelorders.html','controller': 'ParcelordersCtrl'})
        otherwise({'templateUrl': '/bundles/app/partials/task-list.html','controller': 'TaskListCtrl'});
  }]);
  



