    var app = angular.module('MyApp', ['ngProgress']);
    app.controller('Ctrl', function (DataService, $timeout) {
        var vm = this;
      
        vm.init = init;
     
       
        init();
    
        function init() {
            //table info

            DataService.init().then(function (response) {
                console.log(response);
                vm.comp.name = response.data.name;
                vm.comp.taxFlag = response.data.taxFlag;
                vm.comp.taxDesc  =response.data.taxDesc;
                vm.comp.taxNumber = response.data.taxNumber
                vm.comp.taxRatio = parseInt(response.data.taxRatio)
                vm.comp.logo = response.data.logo
              
                $timeout(function () {
                    $('#all_content').css('display', 'block');
                    $('#loader-id').css('display', 'none');
                }, 1000);
            }).catch(function (error) {
                vm.ready = true;
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
        vm.save = save;
     function save() {
            //table info
debugger
console.log($("#imgInp"));
            DataService.save(vm.comp).then(function (response) {
                console.log(response);
            init();
              SuccessAlert("تم الحفظ بنجاح")
               
            }).catch(function (error) {
               
                ErrorAlert("فشل عملية الحفظ")
                                console.log(error);
            })





        }
     
       
    });

    app.service('DataService', function ($http) {
        return {
            init: function () {
                return $http.post('/hjozat/Company/Data');
            },
            save: function (data) {
                return $http.post('/hjozat/Company/edit',data);
            },
         
           

        };
    });

    app.factory('interceptorNgProgress', ['ngProgressFactory', '$timeout', function (ngProgressFactory, $timeout) {
        var complete_progress, getNgProgress, ng_progress, working;
        ng_progress = null;
        working = false;

        getNgProgress = function () {
            ng_progress = ng_progress || ngProgressFactory.createInstance();
            ng_progress.setColor("yellow");
            return ng_progress;
        };

        complete_progress = function () {
            var ngProgress;
            if (working) {
                ngProgress = getNgProgress();
                ngProgress.complete();
                return working = false;
            }
        };

        return {
            request: function (request) {
                var ngProgress;
                ngProgress = getNgProgress();
                if (request.url.indexOf('.html') > 0) {
                    return request;
                }
                if (!working) {
                    ngProgress.reset();
                    ngProgress.start();
                    working = true;
                }
                return request;
            },
            requestError: function (request) {
                complete_progress();
                throw request;
            },
            response: function (response) {
                complete_progress();
                return response;
            },
            responseError: function (response) {
                complete_progress();
                throw response;
            }
        }
    }]);

    app.config(function ($httpProvider) {
        $httpProvider.interceptors.push('interceptorNgProgress');
    });
