(function(angular) {
    'use strict';

    function ifLoading($http) {
        return {
            restrict: 'A',
            link: function(scope, elem) {
                scope.isLoading = isLoading;

                scope.$watch(scope.isLoading, toggleElement);
                function toggleElement(loading) {
                    if (loading) {
                        $( ".hide-while-angular-is-loading" ).hide();
                        elem.show();
                    } else {
                        $( ".hide-while-angular-is-loading" ).show();
                        elem.hide();
                    }
                }

                function isLoading() {
                    return $http.pendingRequests.length > 0;
                }
            }
        };
    }

    ifLoading.$inject = ['$http'];

    angular
        .module('blogPostRecords')
        .directive('ifLoading', ifLoading);
}(angular));
