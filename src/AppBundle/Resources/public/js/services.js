'use strict';

/* Services */

var parcelServices = angular.module('mobilepostServices', ['ngResource']);


parcelServices.factory('Postman', ['$resource', 
	function($resource){
    		return $resource('http://localhost:8000/postmen/:parcelId.json', {}, {
      			query: {method:'GET', isArray:true, headers: {'Accept': 'application/json'}},
      			get: {method:'GET', isArray:false, headers: {'Accept': 'application/json'}},
      			save: {method:'POST', headers: {'Accept': 'application/json'}},
      			update: {method:'PUT', headers: {'Accept': 'application/json'}},
      			delete: {method:'DELETE', headers: {'Accept': 'application/json'}},
      			options: {method:'DELETE', headers: {'Accept': 'application/json'}}
		});		
	}]);
