


<div class="container-fluid col-md-12" ng-app="MyApp" ng-controller="Ctrl as ctr">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">العقود</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="c ard-header py-3">
              <div class="col-md-6" style="padding-right:1.25rem;padding-top: 0.5rem">
              <h6 class="m-0 font-weight-bold text-primary">العقود</h6>
              </div>
              <div class="col-md-6" style="text-align:left;padding-left:1.25rem" >
              <a class="btn btn-primary" href="AddContract" style="color:white;">إضافة عقد</a>
              </div>
             
             
            </div>
            <div class="card-body" style="padding-top:0">

              <div class="table-responsive" >
                <table  datatable="ng" dt-options="vm.dtOptions" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>اليوم</th>
                      <th>التاريخ</th>
                       <th>العميل</th>
                      <th>القسم</th>
                      <th>الفترة</th>
                       <th></th>
                     
                    </tr>
                  </thead>
                  
                  <tbody>
                  <tr ng-repeat="model in ctr.contractList"  ng-cloak>
                    <td data-toggle="modal" href="#EditModal" ng-click ="ctr.editModel = model" style="    cursor: pointer;"> {{ctr.getDay(model.date)}}</td>
                   
                     <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.date}}</td>
                        <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.clientId.name}}</td>
                        <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.depId.name}}</td>
                        <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.perId.name}}</td>
                    
                        

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
          <h5 class="modal-title" id="exampleModalLabel">إضافة سند قبض</h5>
       
        </div>
        <div class="modal-body">
        <div class="col-md-12" >
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
          التاريخ*
      </div> 
     <div class="col-md-8 input-group" >
        <input datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.addModel.date" class="form-control"/>
         
      </div> 
    </div> 
    <div class="col-md-12 class="form-group"" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
        العميل *
      </div> 
      <div class="col-md-8">
          <div class="input-group" style="display: block !important;">

            <ui-select allow-clear  ng-model="ctr.addModel.client" theme="selectize">
              <ui-select-match placeholder="
              ">{{$select.selected.name}}</ui-select-match>
              <ui-select-choices repeat="item in ctr.clientsList | filter: $select.search">
                <span ng-bind-html="item.name | highlight: $select.search"></span>
                <small ng-bind-html="item.phone1 | highlight: $select.search"></small>
              </ui-select-choices>
            </ui-select>

           

          </div>
        </div>
    </div>
     <div class="col-md-12 class="form-group"" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
        طريقة الدفع *
      </div> 
      <div class="col-md-8">
          <div class="input-group" style="display: block !important;">

            <ui-select allow-clear  ng-model="ctr.addModel.payMethod" theme="selectize">
              <ui-select-match placeholder="
              ">{{$select.selected.desc}}</ui-select-match>
              <ui-select-choices repeat="item in ctr.payMethodList | filter: $select.search">
           
                <small ng-bind-html="item.desc | highlight: $select.search"></small>
              </ui-select-choices>
            </ui-select>

           

          </div>
        </div>
    </div>
     <div class="col-md-12" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
       القيمة *
      </div> 
      <div class="col-md-8" >
          <input type="number" class="form-control" ng-model="ctr.addModel.payValue"/>
      </div> 
    </div> 
     <div class="col-md-12" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
      ملاحظة
      </div> 
      <div class="col-md-8" >
          <input type="text" class="form-control" ng-model="ctr.addModel.note" />
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
          <h5 class="modal-title" id="exampleModalLabel"> تعديل سند قبض</h5>
       
        </div>
        <div class="modal-body">
        <div class="col-md-12" >
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
          التاريخ*
      </div> 
     <div class="col-md-8 input-group" >
        <input datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.editModel.date" class="form-control"/>
         
      </div> 
    </div> 
    <div class="col-md-12 class="form-group"" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
        العميل *
      </div> 
      <div class="col-md-8">
          <div class="input-group" style="display: block !important;">

            <ui-select allow-clear  ng-model="ctr.editModel.client" theme="selectize">
              <ui-select-match placeholder="
              ">{{$select.selected.name}}</ui-select-match>
              <ui-select-choices repeat="item in ctr.clientsList | filter: $select.search">
                <span ng-bind-html="item.name | highlight: $select.search"></span>
                <small ng-bind-html="item.phone1 | highlight: $select.search"></small>
              </ui-select-choices>
            </ui-select>

           

          </div>
        </div>
    </div>
     <div class="col-md-12 class="form-group"" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
        طريقة الدفع *
      </div> 
      <div class="col-md-8">
          <div class="input-group" style="display: block !important;">

            <ui-select allow-clear  ng-model="ctr.editModel.payMethod" theme="selectize">
              <ui-select-match placeholder="
              ">{{$select.selected.desc}}</ui-select-match>
              <ui-select-choices repeat="item in ctr.payMethodList | filter: $select.search">
            
                <small ng-bind-html="item.desc | highlight: $select.search"></small>
              </ui-select-choices>
            </ui-select>

           

          </div>
        </div>
    </div>
     <div class="col-md-12" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
       القيمة *
      </div> 
      <div class="col-md-8" >
          <input type="number" class="form-control" ng-model="ctr.editModel.payValue"/>
      </div> 
    </div> 
     <div class="col-md-12" style="margin-top: 1%">
        <div class="col-md-3" style="margin-top: 0.2rem;padding: 0">
      ملاحظة
      </div> 
      <div class="col-md-8" >
          <input type="text" class="form-control" ng-model="ctr.editModel.note" />
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
        <h5 class="modal-title">حذف عقد  </h5>
       
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

<script src="<?php echo base_url(); ?>assets/Scripts/Contract.js"></script>    