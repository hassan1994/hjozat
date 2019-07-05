
<script src="<?php echo base_url(); ?>assets/Scripts/Hjz.js"></script>
<div class="container-fluid col-md-12" ng-app="myApp" ng-controller="Ctrl as ctr">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">بحث عن حجز</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="row" >
                    <div class="col-md-12">
            </div>
            <div class="c ard-header py-3">
              <div class="col-md-6" style="padding-right:1.25rem;padding-top: 0.5rem">
              <h6 class="m-0 font-weight-bold text-primary">أقسام المنشأة</h6>
              </div>
              <div class="col-md-6" style="text-align:left;padding-left:1.25rem" >
              <button class="btn btn-primary" data-toggle="modal" data-target="#AddModal">إضافة قسم</button>
              </div>
             
             
            </div>
            <div class="card-body" style="padding-top:0">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>الرقم</th>
                      <th>الوصف</th>
                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>الرقم</th>
                    <th>الوصف</th>
                    </tr>
                  </tfoot>
                  <tbody>
                 
                  <tr ng-repeat = "model in ctr.table">
                    <td>{{model.id}}</td>
                      <td>{{model.desc}}</td>
                      
                     
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">إضافة قسم جديدة</h5>
       
        </div>
        <div class="modal-body">
        <div class="col-md-12" >
        <div class="col-md-2" style="margin-top: 0.2rem">
          الاسم
      </div> 
      <div class="col-md-8" >
          <input class="form-control"/>
      </div> 
    </div>  
        </div>
        <div class="modal-footer" style="display:block">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">إلغاء</button>
          <a class="btn btn-primary" style="color: white;">حفظ</a>
        </div>
      </div>
    </div>
  </div>