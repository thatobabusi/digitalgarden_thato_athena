var app = angular.module('myApp',  [])
    .constant('API_URL', 'http://thatonew.test/api/v1/')
    .config(function($interpolateProvider) {
        // To prevent the conflict of `{{` and `}}` symbols
        // between Blade template engine and AngularJS templating we need
        // to use different symbols for AngularJS.

        $interpolateProvider.startSymbol('@{{');
        $interpolateProvider.endSymbol('}}');

        /*$interpolateProvider.startSymbol('<%=');
        $interpolateProvider.endSymbol('%>');*/
    });

