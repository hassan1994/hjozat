<style>
  .bg {
  height: 100%;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  flex-direction: column;
}
.row{
    margin-left: 0;
    margin-right: 0
  }
.span_pseudo, .chiller_cb span:before, .chiller_cb span:after {
  content: "";
  display: inline-block;
  background: #fff;
  width: 0;
  height: 0.2rem;
  position: absolute;
  transform-origin: 0% 0%;
}

.chiller_cb {
  position: relative;
  height: 2rem;
  display: flex;
  align-items: center;
}
.chiller_cb input {
  display: none;
}
.chiller_cb input:checked ~ span {
  background: #fd2727;
  border-color: #fd2727;
}
.chiller_cb input:checked ~ span:before {
  width: 1rem;
  height: 0.15rem;
  transition: width 0.1s;
  transition-delay: 0.3s;
}
.chiller_cb input:checked ~ span:after {
  width: 0.4rem;
  height: 0.15rem;
  transition: width 0.1s;
  transition-delay: 0.2s;
}
.chiller_cb input:disabled ~ span {
  background: #ececec;
  border-color: #dcdcdc;
}
.chiller_cb input:disabled ~ label {
  color: #dcdcdc;
}
.chiller_cb input:disabled ~ label:hover {
  cursor: default;
}
.chiller_cb label {
  padding-left: 2rem;
  position: relative;
  z-index: 2;
  cursor: pointer;
  margin-bottom:0;
}
.chiller_cb span {
  display: inline-block;
  width: 1.2rem;
  height: 1.2rem;
  border: 2px solid #ccc;
  position: absolute;
  left: 0;
  transition: all 0.2s;
  z-index: 1;
  box-sizing: content-box;
}
.chiller_cb span:before {
  transform: rotate(-55deg);
  top: 1rem;
  left: 0.37rem;
}
.chiller_cb span:after {
  transform: rotate(35deg);
  bottom: 0.35rem;
  left: 0.2rem;
}
</style>

<div class="container-fluid col-md-12" ng-app="myApp" ng-controller="Ctrl as ctr"  ng-clock>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">بحث عن حجز</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body" style="padding:0">
            <div class="row" style="margin-top: 1%">
      <div class="col-md-12">
          <label style="font-weight: bold;">معلومات الحجز</label>
      </div>
    </div>
    <div class="row">

        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%">القسم*</div>
          <div class="col-md-8" style="padding: 0">
          <div class="input-group" style="display: block !important;">
                <ui-select allow-clear  ng-model="ctr.contract.depart" theme="selectize">
                  <ui-select-match placeholder="
                  ">{{$select.selected.name}}</ui-select-match>
                  <ui-select-choices repeat="item in ctr.departmentList| filter: $select.search">
                    <span ng-bind-html="item.name | highlight: $select.search"></span>
                  </ui-select-choices>
                </ui-select>
              </div>
          </div>
        </div>
        <div class="col-md-4 bg">
          <div class="chiller_cb">
             <label for="myCheckbox">كل الأقسام</label>
            <input id="myCheckbox" type="checkbox" checked>
           
            <span></span>
          </div>
    </div>
        </div>
        
    

    <div class="row" style="margin-top: 1%;padding-bottom: 1%;border-bottom: 1px solid #8080802e">
      <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 1%">من تاريخ</div>
          <div class="col-md-8" style="padding: 0">
              <input readonly datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.contract.date" class="form-control"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 1%">إلى تاريخ</div>
          <div class="col-md-8  input-group" style="padding: 0">
            <span class="alertSpan">
             <i class="far fa-calendar-alt"></i>
            </span>
              <input style=" padding-left: 25px;
  " readonly datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.contract.date" class="form-control"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 1%">قبل وبعد</div>
          <div class="col-md-8" style="padding: 0">
              <input readonly datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.contract.date" class="form-control"/>
          </div>
        </div>
       </div>
            <div class="row" style="margin-top:1%" >
              
            
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
  </div></div>
</div>


  <script src="<?php echo base_url(); ?>assets/Scripts/Contract.js"></script>     