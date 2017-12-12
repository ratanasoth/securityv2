var app = angular.module('StarterApp', ['ngMaterial']);

app.controller('AppCtrl', ['$scope', '$mdSidenav', function($scope, $mdSidenav,$location){
  	$scope.toggleSidenav = function(menuId) {
    	$mdSidenav(menuId).toggle();
  	};
 
 	$scope.go = function(path){
 		$location.url(path);
 	};
}]);