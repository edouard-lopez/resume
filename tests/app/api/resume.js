var assert = chai.assert;

describe('resume directive', function () {
    var apiService;
    var httpBackend;

    beforeEach(module('api'));

    beforeEach(inject(function (_apiService_, $httpBackend) {
        apiService = _apiService_;
        httpBackend = $httpBackend;
    }));

    it('Should get resume', function (done) {
        httpBackend.expectGET('/api/resume/').respond(200, mockData.getResume());
    });

    afterEach(function () {
        httpBackend.verifyNoOutstandingExpectation();
        httpBackend.verifyNoOutstandingRequest();
    });
});
