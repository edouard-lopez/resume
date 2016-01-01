(function () {
    'use strict';

    angular
        .module('api')
        .factory('apiService', apiService);

    apiService.$inject = ['resumeService'];

    function apiService(resumeService) {
        return {
            getResume: resumeService.getResume,
        };
    }
}());

