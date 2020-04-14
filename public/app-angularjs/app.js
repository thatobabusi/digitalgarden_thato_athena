/*var app = angular.module('blogPostRecords', [])
    .constant('API_URL', 'http://digitalgardenthatoatlas.test/api/v1/');*/

var app = angular.module('blogPostRecords',  ['ngRoute','ngAnimate'])
    .constant('API_URL', 'http://digitalgardenthatoatlas.test/api/v1/')
    .config(function($interpolateProvider) {
        //To prevent the conflict of `{{` and `}}` symbols between Blade template engine and AngularJS templating we need to use different symbols for AngularJS.
        $interpolateProvider.startSymbol('<%=');
        $interpolateProvider.endSymbol('%>');
    });
