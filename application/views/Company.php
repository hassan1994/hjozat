<style>
  .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 50%;
    min-height: 50%;
    font-size: 100px;
    text-align: left;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 50%;
}

</style>
 <script src="<?php echo base_url(); ?>assets/Scripts/Company.js"></script>
<div ng-app="MyApp" ng-controller="Ctrl as ctr" class="container-fluid col-md-12">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-md-6">  <h1 class="h3 mb-2 text-gray-800">المنشأة </h1></div>
            <div class="col-md-6" >
             
            </div>
          </div>
        

          <div class="card shadow" style="padding-top: 1.5rem">
            <div class="col-md-12" style="padding-bottom: 1.2rem" ng-form="companyFrom">
              <div class="col-md-6">
                <div class="row" style="margin-bottom: 2%;margin-top: 1%">
                  <div class="col-md-4"><label>الاسم *</label></div>
                 <div class="col-md-8">
                   <input type="text" class="form-control" name="" ng-model="ctr.comp.name" required>
                 </div>
                </div>
                
                 <div class="row" style="margin-bottom: 2%">
                  <div class="col-md-4"><label>مسجل في الضريبة *</label></div>
                 <div class="col-md-8">
                 <select class="form-control" id="sel1" ng-model="ctr.comp.taxFlag" ng-init="ctr.comp.taxFlag=0 " ng-change="ctr.comp.taxFlag == 0 ? ctr.comp.taxNumber = null : '' ;ctr.comp.taxFlag == 0 ? ctr.comp.taxDesc = null : '';ctr.comp.taxFlag == 0 ? ctr.comp.taxRatio = null : '' " required>

                      <option value="1">نعم</option>
                      <option value="0">لا</option>
                      
                    </select>
                 </div>
                </div>
                 <div class="row" style="margin-bottom: 2%">
                  <div class="col-md-4"><label>الرقم الضريبي</label></div>
                 <div class="col-md-8">
                   <input type="text" class="form-control" name="" ng-model="ctr.comp.taxNumber" ng-disabled="ctr.comp.taxFlag == 0">
                 </div>
                </div>
                <div class="row" style="margin-bottom: 2%">
                  <div class="col-md-4"><label>وصف الضريبة</label></div>
                 <div class="col-md-8">
                   <input type="text" class="form-control" name=""  ng-model="ctr.comp.taxDesc" ng-disabled="ctr.comp.taxFlag == 0">
                 </div>
                </div>
                <div class="row" style="margin-bottom: 2%">
                  <div class="col-md-4"><label>نسبة الضريبة<label></div>
                 <div class="col-md-7">
                   <input type="number" class="form-control" name="" ng-model="ctr.comp.taxRatio" ng-disabled="ctr.comp.taxFlag == 0">
                 </div>
                  <div class="col-md-1" style="margin-top:1%;padding:0">
                <label>%</label>
                 </div>
                </div>
              </div>
              <div class="col-md-6">
                        <div class="form-group">
                 
                  <div class="input-group">
                    
                      <span class="input-group-btn">

                          <span class="btn btn-default btn-file">
                              <label>
                                <input type="file" id="imgInp" ng-model="ctr.comp.logo">
                                <div class="row">
                                  <img  src="<?php echo base_url(); ?>assets/img/upload-icon-3.png" id='img-upload' style="height: 180px;background:white;margin-right: 25%" />
                                </div>
                                <div class="row" style="margin-right: 40%">تحميل الشعار</div>
                                
                                </label>
                          </span>
                          
                      </span>
                   
                  </div>
                 
                    
    </div>
              </div>

            </div>
             <div class="col-md-12" style="padding-top: 1.2rem;padding-bottom: 1.2rem;border-top: 1px solid #8080801f;">
                     <button class="btn btn-primary" ng-click="ctr.save()">حفظ</button>
                  </div>
          </div>
          

           
         </div>

          <!-- DataTales Example -->
         


    <script>
      $(document).ready( function() {
      $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) ;
        }
      
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });   
  });
    </script>   