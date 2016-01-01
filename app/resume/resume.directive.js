(function () {
    'use strict';

    angular.module('app')
        .directive('resume', resume)
    ;

    function resume() {
        return {
            scope: {},
            templateUrl: "/static/templates/resume/resume.html",
            controller: resumeController,
            controllerAs: 'vm'
        }
    }

    function resumeController(apiService) {
        var vm = this;
        vm.resume = [];
        vm.getResume = getServices;
        activate();

        function activate() {
            vm.getResume();
        }

        function getServices() {
            return apiService.getResume().then(function (services) {
                vm.resume = resume;
            });
        }
    }
})();
