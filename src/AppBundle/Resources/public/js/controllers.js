'use strict';
	
/* Controllers */

var parcelControllers = angular.module('mobilepostControllers', []);

parcelControllers.controller('PostmanListCtrl', ['$scope', 'Postman',
 function($scope, Postman) {
	$scope.postmen = Postman.query();
 }]);


parcelControllers.controller('CreatePostmanFormCtrl', ['$scope', '$window', 'Parcel',
 function($scope, $window, Parcel) {
	 $scope.submit = function() {
		Parcel.save($scope.parcel, function() {
			$window.location.href = "#";
		});		
	 };
 }]);

parcelControllers.controller('UpdatePostmanFormCtrl', ['$scope', '$routeParams', 'Parcel', '$window',
 function($scope, $routeParams, Parcel, $window) {
	 $scope.parcel = Parcel.get({parcelId: $routeParams.parcelId});
	 
	 $scope.submit = function() {
		Parcel.update($scope.parcel, function() {
			$window.location.href = "#";
		});		
	 }
	 
	 $scope.delete = function() {
		 var answer = confirm("Are you sure you want to delete this parcel?");
		 if (answer) {
			Parcel.delete({parcelId: $routeParams.parcelId}, function() {
				$window.location.href = "#";
			});		
		 }
	 }
 }]);
