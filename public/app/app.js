var app = angular.module('eventsApp', [], function($interpolateProvider) {
   $interpolateProvider.startSymbol('[[');
   $interpolateProvider.endSymbol(']]');
})
.constant('ENVIRONMENT', 'development')
.constant('baseurl', 'http://localhost/eventbooking/')
