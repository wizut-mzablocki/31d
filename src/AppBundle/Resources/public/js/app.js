'use strict';
	
/* Modules */
	
var app = angular.module('mobilePost', [	
	'mobilepostControllers',
	'mobilepostServices',
	'mobilepostDirectives',
	'ngRoute'
	]);
    
app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.
        when('/postmen',{templateUrl: '/bundles/app/partials/postman-list.html',controller: 'PostmanListCtrl'}).
        when('/postmen/new', {templateUrl: '/bundles/app/partials/parcel-form.html', controller: 'CreatePostmanFormCtrl'}).
        when('/postmen/:parcelId', {templateUrl: '/bundles/app/partials/parcel-form.html', controller: 'UpdatePostmanlFormCtrl'}).
        when('/parcelorder/get', {templateUrl: '/bundles/app/partials/parcelorder-list.html',controller: 'ParcelOrderListCtrl'}).
        when('/parcelorder/new', {templateUrl: '/bundles/app/partials/parcelorder-form.html', controller: 'CreateParcelorderFormCtrl'}).
        when('/parcelorder/edit/:parcelorderId', {templateUrl: '/bundles/app/partials/parcelorder-form.html',controller: 'UpdateParcelorderFormCtrl'}).
        when('/parcelorders', {'templateUrl': '/bundles/app/partials/parcelorders.html','controller': 'ParcelordersCtrl'}).
        otherwise({'templateUrl': '/bundles/app/partials/parcelorder-list.html','controller': 'ParcelOrderListCtrl'});
  }]);
  



