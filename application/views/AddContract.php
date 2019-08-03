 <style>
  .row{
    margin-left: 0;
    margin-right: 0
  }
</style>


<div class="container-fluid col-md-12" ng-app="MyApp" ng-controller="Ctrl as ctr" ng-clock>

          <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">العقود</h1>
  

  <!-- DataTales Example -->
  <div class="card shadow mb-4" id="printid">
  <div class="c ard-header py-3" style="" >
    <div class="col-md-6" style="padding-right:1.25rem;padding-top: 0.5rem">
           <h4 class="m-0 font-weight-bold text-primary">إدخال عقد جديد</h4>
    </div>

  </div>
  
  <div class="card-body" style="padding-top:0;padding: 0">
    <div class="row">
      <div class="col-md-12">
          <label style="font-weight: bold;">معلومات الحجز</label>
      </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%">تاريخ العقد</div>
          <div class="col-md-8 input-group" style="padding: 0">
          <span class="alertSpan">
             <i class="far fa-calendar-alt"></i>
            </span>
              <input readonly datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.contract.contractDate"  ng-change="ctr.contract.contractDay = ctr.getDay(ctr.contract.contractDate)" class="form-control"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%">يوم العقد</div>
          <div class="col-md-8" style="padding: 0">
              <input disabled  ng-model="ctr.contract.contractDay"  class="form-control"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 1%">تاريخ الحجز*</div>
          <div class="col-md-8 input-group" style="padding: 0">
          <span class="alertSpan">
             <i class="far fa-calendar-alt"></i>
            </span>
              <input readonly datetime-picker date-format="yyyy-MM-dd" readonly date-only ng-model="ctr.contract.date" class="form-control"/>
          </div>
        </div>
    </div>
    <div class="row" style="margin-top: 1%">
      <div class="col-md-4">
        <div class="col-md-4" style="margin-top: 2%">نوع الحجز*</div>
        <div class="col-md-8" style="padding: 0">
          <div class="input-group" style="display: block !important;">
              <ui-select allow-clear  ng-model="ctr.contract.type" theme="selectize"
                ng-change = "ctr.contract.type.id == 'ساعي' ? ctr.contract.dayCount = null : ctr.contract.dayCount = 1 ;ctr.contract.type.id == 'يوم' ? ctr.contract.period = null : '';ctr.contract.type.id == 'يوم' ? ctr.contract.value = null : ''">
                <ui-select-match placeholder="
                ">{{$select.selected.desc}}</ui-select-match>
                <ui-select-choices repeat="item in ctr.reservTypeList | filter: $select.search">
                  <span ng-bind-html="item.desc | highlight: $select.search"></span>
                </ui-select-choices>
              </ui-select>
          </div>
        </div>
      </div>
      <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%">عدد الأيام *</div>
          <div class="col-md-8" style="padding: 0">
              <input type="number" ng-model="ctr.contract.dayCount" ng-disabled="ctr.contract.type.id == 'ساعي'" class="form-control"/>
          </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-4" style="margin-top: 2%">الفترة*</div>
        <div class="col-md-8" style="padding: 0">
        <div class="input-group" style="display: block !important;">
              <ui-select allow-clear  ng-model="ctr.contract.period" theme="selectize" ng-disabled="ctr.contract.type.id == 'يوم'"  ng-change="ctr.setValue($select.selected.value)">
                <ui-select-match placeholder="
                ">{{$select.selected.name}}</ui-select-match>
                <ui-select-choices repeat="item in ctr.periodList | filter: $select.search">
                  <span ng-bind-html="item.name | highlight: $select.search"></span>
                </ui-select-choices>
              </ui-select>
            </div>
        </div>
      </div>
    </div>	
    <div class="row" style="margin-top: 1%;padding-bottom: 1%;border-bottom: 1px solid #8080802e">
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
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%">مبلغ الحجز*</div>
          <div class="col-md-8" style="padding: 0">
              <input ng-model="ctr.contract.value" ng-model-options='{ debounce: 1000 }' ng-change="ctr.sumTotalValue()" type="number" class="form-control"/>
          </div>
        </div>
    </div>
            			
    <div class="row" style="margin-top: 1%">
          <div class="col-md-6">
              <label style="font-weight: bold;">معلومات العميل</label>
              &nbsp;&nbsp;&nbsp;
              <label style="border-bottom: 1px solid "> أو</label>
              &nbsp;&nbsp;&nbsp;
              <label>  <a class="" href="" >إضافة عميل جديد</a></label>
          </div>

    </div>
    <div class="row">
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%;padding-left: 0">العميل</div>
          <div class="col-md-8" style="padding: 0">
          <div class="input-group" style="display: block !important;">
                <ui-select allow-clear  ng-model="ctr.contract.client" theme="selectize">
                  <ui-select-match placeholder="بحث من خلال الاسم أو الرقم..
                  ">{{$select.selected.name}}</ui-select-match>
                  <ui-select-choices repeat="item in ctr.clientsList | filter: $select.search">
                    <span ng-bind-html="item.name | highlight: $select.search"></span>
                    <small ng-bind-html="item.phone1 | highlight: $select.search"></small>
                  </ui-select-choices>
                </ui-select>
              </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%;padding-left: 0">الهاتف الأول*</div>
          <div class="col-md-8" style="padding: 0">
              <input disabled ui-br-phone-number-mask style="direction: ltr;text-align: right;" ng-model="ctr.contract.client.phone1" class="form-control"/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%;padding-left: 0"> الهاتف الثاني* </div>
          <div class="col-md-8" style="padding: 0">
              <input disabled ui-br-phone-number-mask ng-model="ctr.contract.client.phone2" class="form-control" style="direction: ltr;   text-align: right;"/>
          </div>
        </div>
    </div>
              
    <div class="row" style="margin-top: 1%;padding-bottom: 1%;border-bottom: 1px solid #8080802e">
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%;padding-left: 0">الهاتف الثالث</div>
          <div class="col-md-8" style="padding: 0">
          <input disabled ui-br-phone-number-mask  ng-model="ctr.contract.client.phone3" class="form-control" style="direction: ltr;text-align: right;"/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="col-md-4" style="margin-top: 2%;padding-left: 0">البريد الالكتروني</div>
        <div class="col-md-8" style="padding: 0">
        <input disabled type="text" ng-model="ctr.contract.client.email" class="form-control"/>
        
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 1%">
        <div class="col-md-12">
            <label style="font-weight: bold;">الخدمات</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <div class="col-md-4" style="margin-top: 2%">الخدمة</div>
          <div class="col-md-8" style="padding: 0">
              <div class="input-group" style="display: block !important;">
                    <ui-select allow-clear  ng-model="ctr.service" theme="selectize">
                      <ui-select-match placeholder="
                      ">{{$select.selected.name}}</ui-select-match>
                      <ui-select-choices repeat="item in ctr.serviceList | filter: $select.search">
                        <span ng-bind-html="item.name | highlight: $select.search"></span>
                    
                      </ui-select-choices>
                    </ui-select>
              </div>
          </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-4" style="margin-top: 2%">التكلفة</div>
            <div class="col-md-8" style="padding: 0">
            <input  type="number" ng-model="ctr.service.value" class="form-control"/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="col-md-4" style="margin-top: 2%">العدد</div>
            <div class="col-md-4" style="padding: 0">
            <input  type="number" ng-init="ctr.serviceCount=1" ng-model="ctr.serviceCount" class="form-control"/>
            </div> 
        </div>
        <div class="col-md-2" style="padding-left:1.25rem;margin-top: 5px" >
              <a class="" href=""  style="" ng-click="ctr.AddService()">إضافة للقائمة  <i class="far fa-plus-square"></i></a>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12">
            <div class="table-responsive" >
                <table   class="table table-bordered"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>الخدمة  </th>
                      <th>الكلفة الإجمالية  </th>
                        <th>العدد  </th>

                        <th></th>
                     
                     
                    </tr>
                  </thead>
                  
                  <tbody>
                  <tr ng-if=" ctr.contract.services.length > 0" ng-repeat="model in ctr.contract.services"  ng-cloak>
                    

                    <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.serviceName}}</td>
                      <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.serviceValue}}</td>
                      <td data-toggle="modal" href="#EditModal"  ng-click ="ctr.editModel = model"  style="    cursor: pointer;">{{model.serviceCount}}</td>

                    <td style="text-align: center"><a  href="" ng-click="ctr.DeleteService($index)"><i class="far fa-trash-alt" style="color:#ff000094"></i></a></td>
                  </tr>
                  <tr ng-if=" ctr.contract.services.length > 0">
                    <td  style="font-weight: bold">مجموع الخدمات</td>
                    <td colspan="3">{{ctr.totalServiceValue}}</td>

                  </tr>
                  <tr ng-if=" ctr.contract.services.length == 0" style="text-align: center">
                    <td colspan="4">لم يتم إضافة أي خدمة إلى هذا الحجز </td>
                  </tr>
                  
                  </tbody>
                </table>
              </div>
                  </div>
    </div>
    <div class="row"  style="margin-top: 1%;padding-bottom: 1%;border-bottom: 1px solid #8080802e">
                    <div class="col-md-12">
                    <div class="col-md-1" style="margin-top: 1%"> ملاحظات   </div>
                    <div class="col-md-11" style="padding: 0">
                       <input readonly ui-br-phone-number-mask  date-only ng-model="ctr.addModel.date" class="form-control"/>
                  </div>
                  </div>
    </div>
    <div class="row" style="margin-top: 1%">
        <div class="col-md-12">
            <label style="font-weight: bold;">معلومات الدفع</label>
        </div>
  
    </div>
    <div class="row"  style="text-align:left;padding-left:1.25rem;padding-bottom: 1%;border-bottom: 1px solid #8080802e">
      <div class="col-md-7" style=";border-left: 1px solid #8080802e">
                    <div class="row" style="margin-top: 1%">
                        <div class="col-md-4" style="margin-top: 1%">الإجمالي قبل الضريبة</div>
                        <div class="col-md-8" style="padding: 0">
                         <input disabled type="number"    ng-model="ctr.contract.totalValue" class="form-control"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1%">
                        <div class="col-md-4" style="margin-top: 1%">القيمة المضافة </div>
                        <div class="col-md-8" style="padding: 0">
                           <input disabled   ng-model="ctr.contract.vat" class="form-control"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1%">
                          <div class="col-md-4" style="margin-top: 1%">الإجمالي بعد الضريبة</div>
                          <div class="col-md-8" style="padding: 0">
                             <input disabled ng-model="ctr.contract.netValue" class="form-control"/>
                          </div>
                    </div>
                    <div class="row" style="margin-top: 1%">
                         <div class="col-md-4" style="margin-top: 1%">الدفعة الأولى</div>
                         <div class="col-md-8" style="padding: 0">
                           <div class="input-group" style="display: block !important;">
                              <ui-select allow-clear  ng-model="ctr.contract.payType" theme="selectize">
                                <ui-select-match placeholder="
                                ">{{$select.selected.desc}}</ui-select-match>
                                <ui-select-choices repeat="item in ctr.payMethodList | filter: $select.search">
                                  <span ng-bind-html="item.desc | highlight: $select.search"></span>
                                 
                                </ui-select-choices>
                              </ui-select>
                           </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1%">
                      <div class="col-md-4" style="margin-top: 1%"> القيمة </div>
                      <div class="col-md-8" style="padding: 0">
                       <input type="number" ng-model="ctr.contract.payValue" class="form-control"/>
                     </div>
                    </div>
                    <div class="row" style="margin-top: 1%">
                      <div class="col-md-4" style="margin-top: 1%"> الباقي   </div>
                     <div class="col-md-8" style="padding: 0">
                       <input disabled type="number" ng-model="ctr.contract.payRest" class="form-control"/>
                     </div>
                    </div>
      </div>
      <div class="col-md-5">
        <div class="row" style="margin-top: 1%">
                        <div class="col-md-12" style="margin-top: 2%;color: #808080bf;    font-size: 12px;">الإجمالي قبل الضريبة = مبلغ الحجز + مجموع الخدمات</div>
                      
                    </div>
                    <div class="row" style="margin-top: 1%">
                        <div class="col-md-12" style="margin-top: 2%;color: #808080bf;    font-size: 12px;">القيمة المضافة = (الإجمالي قبل الضريبة *نسبة الضريبة )/100 </div>
                        
                    </div>
                    <div class="row" style="margin-top: 1%">
                          <div class="col-md-12" style="margin-top: 1%;color: #808080bf;    font-size: 12px;">الإجمالي بعد الضريبة= الإجمالي قبل الضريبة + القيمة المضافة</div>
                         
                    </div>
                    <div class="row" style="margin-top: 1%" ng-clock>
                          <div ng-clock class="col-md-12" style="margin-top: 1%;color: #808080bf;    font-size: 12px;">وصف الضريبة : {{ctr.comp.taxDesc}}</div>
                         
                    </div>
                    <div class="row" style="margin-top: 1%" ng-clock>
                          <div ng-clock class="col-md-12" style="margin-top: 1%;color: #808080bf;    font-size: 12px;">نسبة الضريبة = {{ctr.comp.taxRatio}} %</div>
                         
                    </div>
      </div>
    </div>
                  
                  
  </div>
               
                  <div class="row" style="margin-top: 1%">
                    <div class="col-md-12" style="text-align:left;padding-left:1.25rem;padding-bottom: 1%">
                    
                       <a class="btn btn-primary" ng-click="ctr.saveNew()" style="color:white;">حفظ</a>
              
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