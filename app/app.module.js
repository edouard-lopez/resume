(function () {
    'use strict';

    angular.module('app', [
            'api',
            'logging',
        ])
        .config(routeConfig)
    ;

    function routeConfig($routeProvider) {
        $routeProvider
            .when('/', {
                template: '<resume></resume>'
            })
            .otherwise({
                redirectTo: '/'
            });
    }
})();
