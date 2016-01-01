(function () {
    'use strict';

    angular
        .module('api')
        .factory('resumeService', resumeService);

    function resumeService($http, logger) {
        return {
            getResume: getResume,
        };

        function getResume() {
            return $http.get('/api/resume/')
                .then(getResumeCompleted)
                .catch(getResumeFailed);

            function getResumeCompleted(response) {
                return response.data.results;
            }

            function getResumeFailed(error) {
                logger.error('Cannot fetch resume data');
            }
        }

    }

}());

