    var app = angular.module('MyApp', ['ngProgress','datatables','ui.utils.masks','angularjs-datetime-picker','ngSanitize', 'ui.select']);
    app.controller('Ctrl', function (DataService, $timeout) {
        var vm = this;
      debugger
        vm.init = init;
        vm.contract = {};
        vm.contract.services=[];
        vm.reservTypeList = [{id :"يوم" ,desc : "يوم"} , {id :"ساعي" ,desc : "ساعي"}]
        vm.payMethodList = [{id: "بنك" ,desc  : "بنك"},{id: "نقدي" ,desc  : "نقدي"}];
        vm.contract.contractDate = moment().format("YYYY-MM-DD")
        vm.contract.contractDay=getDay(vm.contract.contractDate)
        initClient();
        vm.clientsList=[];
        function initClient() {
            //table info

            DataService.initClient().then(function (response) {
            console.log(response);
            vm.clientsList = response.data;
            initDep();
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
         function initDep() {
            //table info

            DataService.initDep().then(function (response) {
            console.log(response);
            vm.departmentList = response.data;
            initPeriod();
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
         function initPeriod() {
            //table info

            DataService.initPeriod().then(function (response) {
            console.log(response);
            vm.periodList = response.data;
            init();
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
        initService();
        function initService() {
            //table info

            DataService.initService().then(function (response) {
            console.log(response);
            vm.serviceList = response.data;
            for (var j = vm.serviceList.length - 1; j >= 0; j--) {
                vm.serviceList[j].value = parseInt(vm.serviceList[j].value)
            }
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
        initCompany();
        function initCompany() {
            //table info

            DataService.initCompany().then(function (response) {
            console.log(response);
            vm.comp = response.data;
            if(vm.comp.taxRatio)
            vm.comp.taxRatio = parseInt(response.data.taxRatio)
            else
            vm.comp.taxRatio = 0;
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
       function init() {
            //table info

            DataService.init().then(function (response) {
            console.log(response);
            vm.contractList = response.data;
            debugger
            for (var i = vm.contractList.length - 1; i >= 0; i--) {
              
                for (var j = vm.clientsList.length - 1; j >= 0; j--) {
                    if (vm.contractList[i].clientId ==  vm.clientsList[j].id) {
                            vm.contractList[i].clientId =   vm.clientsList[j]
                    }
                }
                for (var k = vm.departmentList.length - 1; k >= 0; k--) {
                    if (vm.contractList[i].depId ==  vm.departmentList[k].id) {
                            vm.contractList[i].depId =   vm.departmentList[k]
                    }
                }
                for (var f = vm.periodList.length - 1; f >= 0; f--) {
                    if (vm.contractList[i].perId ==  vm.periodList[f].id) {
                            vm.contractList[i].perId =   vm.periodList[f]
                    }
                }

               
            }
          
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
        vm.getDay = getDay;
       function getDay(date) {
            var LANG = "AR"
            var day = moment(date, 'YYYY-MM-DD').format('ddd');
            switch (day) {
                case "Thu": return LANG == "EN" ? day : "الخميس";
                case "Fri": return LANG == "EN" ? day : "الجمعة";
                case "Sat": return LANG == "EN" ? day : "السبت";
                case "Sun": return LANG == "EN" ? day : "الأحد";
                case "Mon": return LANG == "EN" ? day : "الاثنين";
                case "Tue": return LANG == "EN" ? day : "الثلاثاء";
                case "Wed": return LANG == "EN" ? day : "الأربعاء";
            }
            return day;
        }

     
         
        vm.deletedModel={};
          vm.deleteModel = deleteModel;
         function deleteModel() {
            //table info
            

            DataService.deleteModel(vm.deletedModel).then(function (response) {
                console.log(response);
            init();
              SuccessAlert("تم الحذف بنجاح")
               $("#DeleteModal").modal("hide")
            }).catch(function (error) {
                 init();
                   $("#DeleteModal").modal("hide")
                ErrorAlert("فشل عملية الحذف")
                                console.log(error);
            })





        }
     
       
    });

    app.service('DataService', function ($http) {
        return {
            initClient: function () {
                return $http.post('/hjozat/Clients/Data');
            },
            initDep: function () {
                return $http.post('/hjozat/Department/Data');
            },
            initPeriod: function () {
                return $http.post('/hjozat/Period/Data');
            },
            initService: function () {
                return $http.post('/hjozat/Services/Data');
            },
            initCompany: function () {
                return $http.post('/hjozat/Company/Data');
            },
            init: function () {
                return $http.post('/hjozat/Contract/Data');
            },
            deleteModel  : function (model) {
                return $http.post('/hjozat/Contract/delete',model);
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
