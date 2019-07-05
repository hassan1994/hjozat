    var app = angular.module('MyApp', ['ngProgress','datatables']);
    app.controller('Ctrl', function (DataService, $timeout) {
        var vm = this;
      
        vm.init = init;
     
       
        init();
    vm.ready =false;
        function init() {
            //table info

            DataService.init().then(function (response) {
                console.log(response);
                
     vm.moneyOrgList = response.data;
 vm.ready =true;
             
                


                
                
               
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
       
        vm.add = add;
         function add() {
            //table info
            

            DataService.add(vm.addModel).then(function (response) {
                console.log(response);
                $("#AddModal").modal("hide")
            init();
              SuccessAlert("تم الحفظ بنجاح")
               
            }).catch(function (error) {
                 $("#AddModal").modal("hide")
                ErrorAlert("فشل عملية الحفظ")
                                console.log(error);
            })





        }
          vm.edit = edit;
         function edit() {
            //table info
            

            DataService.edit(vm.editModel).then(function (response) {
                console.log(response);
            init();
              SuccessAlert("تم الحفظ بنجاح")
                  $("#EditModal").modal("hide")
            }).catch(function (error) {
                  init();
                 $("#EditModal").modal("hide")
                ErrorAlert("فشل عملية الحفظ")
                                console.log(error);
            })





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
            init: function () {
                return $http.post('/hjozat/MoneyOrg/Data');
            },
            add: function (data) {
                return $http.post('/hjozat/MoneyOrg/add',data);
           
            }, 
            edit: function (data) {
                return $http.post('/hjozat/MoneyOrg/edit',data);
            }, 
            deleteModel  : function (model) {
                return $http.post('/hjozat/MoneyOrg/delete',model);
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
