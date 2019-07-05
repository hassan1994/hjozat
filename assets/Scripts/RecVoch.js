    var app = angular.module('MyApp', ['ngProgress','datatables','ui.utils.masks','angularjs-datetime-picker','ngSanitize', 'ui.select']);
    app.controller('Ctrl', function (DataService, $timeout) {
        var vm = this;
      debugger
        vm.init = init;
     
       vm.payMethodList = [{id: "بنك" ,desc  : "بنك"},{id: "نقدي" ,desc  : "نقدي"}]
        initClient();
        vm.clientsList=[];
        function initClient() {
            //table info

            DataService.initClient().then(function (response) {
            console.log(response);
            vm.clientsList = response.data;
            init();
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
         
       function init() {
            //table info

            DataService.init().then(function (response) {
            console.log(response);
            vm.vochList = response.data;
            for (var i = vm.vochList.length - 1; i >= 0; i--) {
                vm.vochList[i].payValue = parseInt(vm.vochList[i].payValue)
                  
                for (var j = vm.clientsList.length - 1; j >= 0; j--) {
                    if (vm.vochList[i].client ==  vm.clientsList[j].id) {
                            vm.vochList[i].client =   vm.clientsList[j]

                            
                    }
                }

               
            }
            for (var i = vm.vochList.length - 1; i >= 0; i--) {
                for (var j = vm.payMethodList.length - 1; j >= 0; j--) {
                    if (vm.vochList[i].payMethod ==  vm.payMethodList[j].id) {
                            vm.vochList[i].payMethod =   vm.payMethodList[j]
                             
                            
                    }
                }

               
            }
            }).catch(function (error) {
               
                ErrorAlert("مشكلة في تحميل البيانات");
                console.log(error);
            })





        }
       
        vm.add = add;
         function add() {
            //table info
            var obj = angular.copy(vm.addModel)
         
            obj.client =obj.client.id; 
            obj.payMethod = obj.payMethod.id;
            debugger
            DataService.add(obj).then(function (response) {
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
         
           var obj = angular.copy(vm.editModel)

          
            obj.client =obj.client.id; 
            obj.payMethod = obj.payMethod.id;
            DataService.edit(obj).then(function (response) {
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
            initClient: function () {
                return $http.post('/hjozat/Clients/Data');
            },
            init: function () {
                return $http.post('/hjozat/RecVoch/Data');
            },
            add: function (data) {
                return $http.post('/hjozat/RecVoch/add',data);
           
            }, 
            edit: function (data) {
                return $http.post('/hjozat/RecVoch/edit',data);
            }, 
            deleteModel  : function (model) {
                return $http.post('/hjozat/RecVoch/delete',model);
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
