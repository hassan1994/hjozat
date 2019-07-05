 


<div class="container-fluid col-md-12" ng-app="MyApp" ng-controller="Ctrl as ctr">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">الأقسام</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="c ard-header py-3">
              <div class="col-md-6" style="padding-right:1.25rem;padding-top: 0.5rem">
              <h6 class="m-0 font-weight-bold text-primary">أقسام المنشأة</h6>
              </div>
              <div class="col-md-6" style="text-align:left;padding-left:1.25rem" >
              <button class="btn btn-primary" data-toggle="modal" data-target="#AddModal">إضافة قسم</button>
              </div>
             
             
            </div>
            <div class="card-body" style="padding-top:0">

              <div class="table-responsive" >
                <table  datatable="ng" dt-options="vm.dtOptions" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>الرقم</th>
                      <th>الوصف</th>
                       <th></th>
                     
                    </tr>
                  </thead>
                  
                  <tbody>
                  <tr ng-repeat="model in ctr.depList"  ng-cloak>
                    <td data-toggle="modal" href="#EditModal" ng-click ="ctr.editModel = model" style="    cursor: pointer;"> {{model.id}}</td>
                    <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.name}}</td>
                    <td style="text-align: center"><a data-toggle="modal" href="#DeleteModal" href="" ng-click="ctr.deletedModel = model"><i class="far fa-trash-alt" style="color:#ff000094"></i></a></td>
                  </tr>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>


<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">إضافة قسم جديد</h5>
       
        </div>
        <div class="modal-body">
        <div class="col-md-12" >
        <div class="col-md-2" style="margin-top: 0.2rem">
          الاسم*
      </div> 
      <div class="col-md-8" >
          <input class="form-control" ng-model="ctr.addModel.name"/>
      </div> 
    </div>  
        </div>
        <div class="modal-footer" style="display:block">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
          <a class="btn btn-primary" style="color: white;" ng-click="ctr.add()">حفظ</a>
        </div>
      </div>
    </div>
  </div>


   <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">تعديل قسم</h5>
       
        </div>
        <div class="modal-body">
        <div class="col-md-12" >
        <div class="col-md-2" style="margin-top: 0.2rem">
         لاسم*
      </div> 
      <div class="col-md-8" >
          <input class="form-control" ng-model="ctr.editModel.name"/>
      </div> 
    </div>  
        </div>
        <div class="modal-footer" style="display:block">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
          <a class="btn btn-primary" style="color: white;" ng-click="ctr.edit()">حفظ</a>
        </div>
      </div>
    </div>
  </div>



  <div class="modal" id="DeleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">حذف قسم</h5>
       
      </div>
      <div class="modal-body">
        <p>هل أنت متأكد من عملية الحذف؟</p>
      </div>
      <div class="modal-footer" style="display:block">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary"  ng-click=ctr.deleteModel()>نعم</button>
      </div>
    </div>
  </div>
</div>
</div>
        <!-- /.container-fluid -->

      <script src="<?php echo base_url(); ?>assets/Scripts/Department.js"></script>    