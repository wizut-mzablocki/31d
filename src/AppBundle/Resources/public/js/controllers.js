'use strict';
	
/* Controllers */

var parcelControllers = angular.module('mobilepostControllers', []);
var taskControllers = angular.module('taskControllers', []);

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
 
 
parcelControllers.controller('ParcelOrderListCtrl', ['$scope', 'Parcelorder',
 function($scope, Parcelorder) {
$scope.parcelorders = Parcelorder.query();
}]);
parcelControllers.controller('CreateParcelorderFormCtrl', ['$scope', '$window',
	'Parcelorder', function($scope, $window, Parcelorder) {
		$scope.submit = function() {
			Parcelorder.save($scope.parcelorder, function() {
				$window.location.href = '#';
			});
		};
}]);
parcelControllers.controller('UpdateParcelorderFormCtrl', ['$scope', '$routeParams',
	'$window', 'Parcelorder', function($scope, $routeParams, $window, Parcelorder) {
		$scope.parcelorders = Parcelorder.get({parcelorderId: $routeParams.parcelorderId});
		$scope.submit = function() {
			Parcelorder.update({parcelorderId: $routeParams.parcelorderId}, $scope.parcelorders,
			function() {$window.location.href = '#';}); } 
			
		$scope.delete = function() {
			var answer = confirm("Are you sure you want to delete this order?");
			if (answer) {
				Parcelorder.delete({parcelorderId: $routeParams.parcelorderId}, function() {
					$window.location.href = "#";
				});
			
			}
		}
}]);

taskControllers.controller('TaskListCtrl', ['$scope', 'Task',
    function($scope, Task){
       $scope.tasks = Task.query();
    }]);
