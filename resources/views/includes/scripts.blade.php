<script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="{{ URL::asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<script src="{{ URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('js/patient.js')}}"></script>

<script src="{{ URL::asset('plugins/timepicker/bootstrap-timepicker.js')}}"></script>


<!-- FastClick -->
<script src="{{ URL::asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('dist/js/demo.js')}}"></script>

<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js "></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> -->



<script>

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
 $.ajaxSetup({

  headers: {

    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

  }

});


 $(document).ready(function(){
  $('.select3').select2();
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    });
    $('.datepicker_month').datepicker({
      startView: "months", 
      minViewMode: "months",
      orientation: "bottom",
      autoclose: true,
      format: 'mm-yyyy'
    });
    $('.datepicker_year').datepicker({
      startView: "years", 
      minViewMode: "years",
      orientation: "bottom",
      autoclose: true,
      format: 'yyyy'
    });
  $('.datepicker_report').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
  });
  $('.datepicker_month_report').datepicker({
    startView: "months", 
    minViewMode: "months",
    orientation: "bottom",
    autoclose: true,
    format: 'yyyy-mm'
  });
  $('.datepicker_year_report').datepicker({
    startView: "years", 
    minViewMode: "years",
    orientation: "bottom",
    autoclose: true,
    format: 'yyyy'
  });

  $('.timepicker').timepicker({
    autoclose: true,
    format: 'H:i:s',
    minuteStep: 5
  });



  $('.select2').select2({

    dropdownParent:$("#modalassignpatient") 

  });

  $(document).on("click", ".open-editnursingpatient", function () {

    var id = $(this).data('userid');


    $(".modal-body #user_id").val( id );
  
    var url = '{{ route("submitnursingpatientedit", ":id") }}';
    url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #pt_name').val(data[Object.keys(data)[0]].fullname_patients);
        $('.modal-body #pt_ic').val(data[Object.keys(data)[0]].ic_patients);
        $('.modal-body #pt_phone_no').val(data[Object.keys(data)[0]].phone_number);
        $('.modal-body #pt_diagnose').val(data[Object.keys(data)[0]].doctor_diagnose);
        $('.modal-body #pt_total_hours').val(data[Object.keys(data)[0]].doctor_diagnose);
        $('.modal-body #pt_total_price').val(data[Object.keys(data)[0]].doctor_diagnose);

      }) 

    $('#editnursingpatient').modal('show');
    });

  $(document).on("click", ".open-editUser", function () {

    var id = $(this).data('userid');


    $(".modal-body #user_id").val( id );

    var url = '{{ route("edit_staff", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {

      console.log(data[Object.keys(data)[0]].role_id);

      $('.modal-body #staff_no').val(data[Object.keys(data)[0]].staff_no);
      $('.modal-body #fullname').val(data[Object.keys(data)[0]].fullname);
      $('.modal-body #lastname').val(data[Object.keys(data)[0]].lastname);
      $('.modal-body #email').val(data[Object.keys(data)[0]].email);
      $('.modal-body #role').val(data[Object.keys(data)[0]].role_id);
      $('.modal-body #department').val(data[Object.keys(data)[0]].department_id);

    }) 

    $('#editRegisterForm').modal('show');
  });

  $(document).on("click", ".open-addtransaction", function () {

    // var id = $(this).data('userid');
    // console.log($(this).data('userid'));

    // $(".modal-body #id_diagnose").val( id );

    // var url = '{{ route("get_transaction_info", ":id") }}';
    // url = url.replace(':id', id);

    // $.get(url , function (data) {

    // }) 

    $('#addpatienttransfer').modal('show');
    });
  

  $(document).on("click", ".open-ViewSummaryReport", function () {


    var id = $(this).data('userid');

    $(".modal-body #user_id").val( id );

    var url = '{{ route("ShowSummaryReport", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {

        // console.log(data[Object.keys(data)[0]].role_id);

        $('.modal-body #reportdate').val(data[Object.keys(data)[0]].report_date);
        $('.modal-body #reportdescription').val(data[Object.keys(data)[0]].report_description);

      }) 

    $('#viewsimplereport').modal('show');
  });

  $(document).on("click", ".open-ViewSummaryReportSession", function () {

    var id = $(this).data('userid');

    $(".modal-body #user_id").val( id );

    var url = '{{ route("ViewSummaryReportSession", ":id") }}';
      // var url = '{{ route("ViewSummaryReportSession", "user_id=:id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #smethod').val(data[Object.keys(data)[0]][0].s_method);
        $('.modal-body #omethod').val(data[Object.keys(data)[0]][0].o_method);
        $('.modal-body #amethod').val(data[Object.keys(data)[0]][0].a_method);
        $('.modal-body #pmethod').val(data[Object.keys(data)[0]][0].p_method);

      }) 

      $('#showsoapreport').modal('show');

      $('#showsoapreport').on('hidden.bs.modal', function (e) {
        $(this)
        .find("input,textarea,select")
        .val('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
      })
    });

  $(document).on("click", ".open-ViewSessionInfo", function () {

    var id = $(this).data('userid');
    console.log(id);


    $(".modal-body #user_id").val( id );

    var url = '{{ route("patientInfo", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {
      console.log(data);

      $('.modal-body #patient_name').val(data[Object.keys(data)[0]].fullname_patients);
      $('.modal-body #ic_patients').val(data[Object.keys(data)[0]].ic_patients);
      $('.modal-body #id_patients').val(data[Object.keys(data)[0]].id_patients);
      $('.modal-body #id_diagnose').val(data[Object.keys(data)[0]].id_diagnose);

    }) 

    $('#addsessionattendantpatient').modal('show');

    $('#addsessionattendantpatient').on('hidden.bs.modal', function (e) {
      $(this)
      .find("input,textarea,select")
      .val('')
      .end()
      .find("input[type=checkbox], input[type=radio]")
      .prop("checked", "")
      .end();
    })
  });


  $(document).on("click", ".open-assignpatient", function (event) {

    event.preventDefault();
    var id = $(this).data('userid');
      var treatmentid = $(this).data('treatmentid'); // added by razin
      $(".modal-body #user_id").val( id );
      $(".modal-body #user_treatmentid").val( treatmentid )
      var url = '{{ route("assign_patientmodal", ":id") }}';
      url = url.replace(':id', id);
      $.get(url , function (data) {
        $('.modal-body #mrn_no').val(data[Object.keys(data)[0]].mrn_no);
        $('.modal-body #patient_name').val(data[Object.keys(data)[0]].fullname_patients);

      }) 

      $('#modalassignpatient').modal('show');
    });


  $(document).on("click", ".open-UpdatePrice", function (event) {

    event.preventDefault();
    var id = $(this).data('userid');
    $(".modal-body #price_user_id").val( id );
    var url = '{{ route("get_price", ":id") }}';
    url = url.replace(':id', id);
    $.get(url , function (data) {
     $('.modal-body #att_price').val(data[Object.keys(data)[0]].treatment_amount);
   }) 

    $('#centerUpdatePrice').modal('show');
  });
    //airie
    $(document).on("click", ".open-UpdatePriceWalkin", function (event) {

      event.preventDefault();
      var paymentid = $(this).data('paymentid');
      var treatmentid = $(this).data('treatmentid');

      $(".modal-body #paymentid").val( paymentid );
      $(".modal-body #treatmentid").val( treatmentid );
      var url = '{{ route("get_price", ":id") }}';
      url = url.replace(':id', treatmentid);
      $.get(url , function (data) {
       $('.modal-body #price_walkin').val(data[Object.keys(data)[0]].treatment_amount);
       $('.modal-body #payment_mode').val(data[Object.keys(data)[0]].payment_mode);

     }) 

      $('#centerUpdatePricewalkin').modal('show');
    });


    $(document).on("click", ".open-UpdateVerified", function (event) {
      event.preventDefault();
      var paymentid = $(this).data('paymentid');

      $.ajax({

        type:'POST',

        url:'/update_verified',

        data:{paymentid:paymentid},

        success:function(data){
          swal.fire({
            title: data.success,
            button:"Ok"
          }).then(function() {
            location.reload();
          });


        }

      });
    });


    $(document).on("click", ".open-UpdateStatus", function (event) {

      event.preventDefault();
      var id = $(this).data('userid');
      $(".modal-body #status_user_id").val( id );
      var url = '{{ route("get_status", ":id") }}';
      url = url.replace(':id', id);
      $.get(url , function (data) {
       $('.modal-body #paid_status').val(data[Object.keys(data)[0]].status_paid);
     }) 

      $('#update_status_payment').modal('show');
    });

    $(document).on("click", ".open-assignstatus", function (event) {

      event.preventDefault();
      var id = $(this).data('userid');
      var name = $(this).data('username');

      $(".modal-body #user_idstat").val( id );
      $('.modal-body #patient_name_status').val(name);
      $('#modalassignstatus').modal('show');
    });


    $('.staff-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_staff", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.method-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_method", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.attendance-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_attendance", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });


    $('.report-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_report", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $(document).on("click", ".open-editrelative", function () {


      var id = $(this).data('userid');
      console.log(id);

      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_patient_relative", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        console.log(data);

        $('.modal-body #fullname-relative').val(data[Object.keys(data)[0]].fullname_relatives);
        $('.modal-body #lastname-relative').val(data[Object.keys(data)[0]].lastname_relatives);
        $('.modal-body #phonenum-relative').val(data[Object.keys(data)[0]].phone_no_relatives);

      }) 

      $('#editrelative').modal('show');
    });

    $(document).on("click", ".open-editrelativenursing", function () {


      var id = $(this).data('userid');
      console.log(id);

      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_patient_nursing_relative", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        console.log(data);

        $('.modal-body #fullname-relative').val(data[Object.keys(data)[0]].fullname_relatives);
        $('.modal-body #lastname-relative').val(data[Object.keys(data)[0]].lastname_relatives);
        $('.modal-body #phonenum-relative').val(data[Object.keys(data)[0]].phone_no_relatives);

      }) 

      $('#editrelativenursing').modal('show');
    });


    $('.relative-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_relative", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.relative_nursing-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_relative_nursing", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });



    $('.relative-remove-hq').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_relative_hq", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.joints-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_joints", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });


    $(document).on("click", ".open-editpatient", function () {


      var id = $(this).data('userid');


      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_patient", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {
        $('.modal-body #fullname').val(data[Object.keys(data)[0]].fullname_patients);
        $('.modal-body #lastname').val(data[Object.keys(data)[0]].lastname_patients);
        $('.modal-body #icnum').val(data[Object.keys(data)[0]].ic_patients);
        $('.modal-body #age').val(data[Object.keys(data)[0]].age);
        $('.modal-body #gender').val(data[Object.keys(data)[0]].gender);
        $('.modal-body #phonenum').val(data[Object.keys(data)[0]].phone_number);
        $('.modal-body #address').val(data[Object.keys(data)[0]].address_patients);
        
      }) 

      $('#editpatient').modal('show');
    });


    //edit-attendance
    
    $(document).on("click", ".attendance-edit", function () {

    var idtreatment = $(this).data('idtreatment');
    

    $(".modal-body #id_treatment").val( idtreatment );


    $('#editattendance').modal('show');
  });

  $(document).on("click", ".payment-add", function () {

    var idtreatment = $(this).data('idtreatment');


    $(".modal-body #id_treatment").val( idtreatment );


  $('#addpayment').modal('show');
  });

//   $('.accordion-body').on('shown.bs.collapse', function () {
//     alert("Hello");
//   });

// $('.accordion-body').on('hidden.bs.collapse', function () {
//   alert("lala")
// });

  


    $(document).on("click", ".open-editSummaryRep", function () {


      var id = $(this).data('id');


      $(".modal-body #id").val( id );

      var url = '{{ route("edit_summary_report", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {
        console.log(data[Object.keys(data)[0]].s_method);
        $('.modal-body #datemethod').val(data[Object.keys(data)[0]].date_method);
        $('.modal-body #smethod').val(data[Object.keys(data)[0]].s_method);
        $('.modal-body #omethod').val(data[Object.keys(data)[0]].o_method);
        $('.modal-body #amethod').val(data[Object.keys(data)[0]].a_method);
        $('.modal-body #pmethod').val(data[Object.keys(data)[0]].p_method);
        
      }) 

      $('#editmethod').modal('show');
    });


    $(document).on("click", ".open-editpatient_nursing", function () {


      var id = $(this).data('userid');


      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_patient_nursing", ":id") }}';
      url = url.replace(':id', id);


      $.get(url , function (data) {
        $('.modal-body #fullname').val(data[Object.keys(data)[0]].fullname_patients);
        $('.modal-body #lastname').val(data[Object.keys(data)[0]].lastname_patients);
        $('.modal-body #icnum').val(data[Object.keys(data)[0]].ic_patients);
        $('.modal-body #age').val(data[Object.keys(data)[0]].age);
        $('.modal-body #gender').val(data[Object.keys(data)[0]].gender);
        $('.modal-body #phonenum').val(data[Object.keys(data)[0]].phone_number);
        $('.modal-body #address').val(data[Object.keys(data)[0]].address_patients);
        
      }) 

      $('#editpatient').modal('show');
    });



    $( ".modal-body #datemethod" ).datepicker( "option", "dateFormat", 'YYYY-MM-DD' );


    $('.patient-remove').click(function(){

      var postId = $(this).data('userid');
      
      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_patient", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.patientnursing-remove').click(function(){

      var postId = $(this).data('userid');
      
      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_patient_nursing", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.nursinglist-remove').click(function(){

      var postId = $(this).data('userid');
      
      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_diagnose_nursing", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $(function () {

      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });

      var table = $('#example1').DataTable( {

        //this for sort
        // rowReorder: {
        //     selector: 'td:nth-child(2)',


        // },
        
        responsive: true
      } );



      var table = $('#example-scrollself').DataTable( {

        //this for sort
        // rowReorder: {
        //     selector: 'td:nth-child(2)',


        // },
        scrollY:        '50vh',
        scrollCollapse: true,
        responsive: true
      } );

      // $('#example1').DataTable({
      //      //"scrollX": true
      //   });

      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : false
      });

      $('#table-patient').DataTable();

    });

    // =========================   SECTION NURSING

    //############ EDIT BUTTON
    $(document).on("click", ".open-editvitalsign", function () {

      var id = $(this).data('userid');

      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_vitalsign", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_vital_sign);

        $('.modal-body #vs_date').val(data[Object.keys(data)[0]].vital_date);
        $('.modal-body #vs_time').val(data[Object.keys(data)[0]].vital_time);
        $('.modal-body #bp').val(data[Object.keys(data)[0]].vital_blood_pressure);
        $('.modal-body #pulse').val(data[Object.keys(data)[0]].vital_pulse);
        $('.modal-body #resp').val(data[Object.keys(data)[0]].vital_resp);
        $('.modal-body #temp').val(data[Object.keys(data)[0]].vital_temp);
        $('.modal-body #gm').val(data[Object.keys(data)[0]].vital_gm);
        $('.modal-body #sign').val(data[Object.keys(data)[0]].vital_sign);
        
      }) 

      $('#editvitalsign').modal('show');
    });


    $(document).on("click", ".open-editintakeoutput", function () {

      var id = $(this).data('userid');

      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_intakeoutput", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_intake_output);

        $('.modal-body #io_date').val(data[Object.keys(data)[0]].io_date);
        $('.modal-body #io_time').val(data[Object.keys(data)[0]].io_time);
        $('.modal-body #io_oral_fluids').val(data[Object.keys(data)[0]].io_oral_fluids);
        $('.modal-body #io_iv_fluids').val(data[Object.keys(data)[0]].io_iv_fluids);
        $('.modal-body #io_total_intake').val(data[Object.keys(data)[0]].io_total_intake);
        $('.modal-body #io_vomitus').val(data[Object.keys(data)[0]].io_vomitus);
        $('.modal-body #io_gastric_aspiration').val(data[Object.keys(data)[0]].io_gastric_aspiration);
        $('.modal-body #io_bowel_open').val(data[Object.keys(data)[0]].io_bowel_open);
        $('.modal-body #io_urine').val(data[Object.keys(data)[0]].io_urine);
        $('.modal-body #io_remarks').val(data[Object.keys(data)[0]].io_remarks);
        $('.modal-body #io_total_output').val(data[Object.keys(data)[0]].io_total_output);
        
      }) 

      $('#editintakeoutput').modal('show');
    });


    $(document).on("click", ".open-editmedication", function () {

      var id = $(this).data('userid');
      
      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_medication", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_prescription);

        $('.modal-body #mc_date_start').val(data[Object.keys(data)[0]].mc_date_start);
        $('.modal-body #mc_prescription_name').val(data[Object.keys(data)[0]].mc_prescription_name);
        $('.modal-body #mc_dosage').val(data[Object.keys(data)[0]].mc_dosage);
        $('.modal-body #mc_duration').val(data[Object.keys(data)[0]].mc_duration);
        $('.modal-body #mc_route').val(data[Object.keys(data)[0]].mc_route);
        $('.modal-body #mc_sign').val(data[Object.keys(data)[0]].mc_sign);
        
      }) 

      $('#editmedication').modal('show');
    });

    $(document).on("click", ".open-editprogressnote", function () {

      var id = $(this).data('userid');
      
      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_progression", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_progress_note);

        $('.modal-body #pn_date').val(data[Object.keys(data)[0]].pn_date);
        $('.modal-body #pn_activity').val(data[Object.keys(data)[0]].pn_activity);
        
      }) 

      $('#editprogressnote').modal('show');
    });

    $(document).on("click", ".open-editprogression", function () {

      var id = $(this).data('userid');
      
      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_progression", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_assessment_report);
        $('.modal-body #msr_month_assessment').val(data[Object.keys(data)[0]].month);
        $('.modal-body #date_progression').val(data[Object.keys(data)[0]].date_assessment);
        $('.modal-body #progression_remarks').val(data[Object.keys(data)[0]].remarks);
        
      }) 

      $('#editprogression').modal('show');
    });


    $(document).on("click", ".open-editMonthlyReport", function () {

      var id = $(this).data('userid');
      
      $(".modal-body #user_id").val( id );

      var url = '{{ route("edit_monthlyreport", ":id") }}';
      url = url.replace(':id', id);

      $.get(url , function (data) {

        $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_monthly_report);

        $('.modal-body #msr_date_monthly_nursing').val(data[Object.keys(data)[0]].date_monthly_report);
        $('.modal-body #msr_month').val(data[Object.keys(data)[0]].month);
        $('.modal-body #msr_remarks_report').val(data[Object.keys(data)[0]].remarks);
        
      }) 

      $('#editMonthlyReport').modal('show');
    });

    $(document).on("click", ".open-editDailyReport", function () {

    var id = $(this).data('userid');

    $(".modal-body #user_id").val( id );

    var url = '{{ route("edit_dailyreport", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {

      console.log(data);

      $('.modal-body #user_id').val(data[Object.keys(data)[0]].id_daily_report);

      $('.modal-body #date_daily_report').val(data[Object.keys(data)[0]].date_daily_report);
      $('.modal-body #remarks').val(data[Object.keys(data)[0]].remarks);
      
    }) 

    $('#editdailyreport').modal('show');
    });

    $(document).on("click", ".open-editwalkin", function () {

    var id = $(this).data('userid');
    console.log(id);

    $(".modal-body #user_id").val( id );

    var url = '{{ route("edit_walkin_patient", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {

      console.log(data);

      obNew = JSON.parse(data[Object.keys(data)[0]].id_type_session);

      if(obNew != ""){
        $('.modal-body .walkinidtypesession'+ obNew ).iCheck('check');
      }

      $('.modal-body #pt_name').val(data[Object.keys(data)[0]].fullname_patients);
      $('.modal-body #ic_no').val(data[Object.keys(data)[0]].ic_patients);
      $('.modal-body #id_diagnose').val(data[Object.keys(data)[0]].id_diagnose);
      $('.modal-body #name_diagnose').val(data[Object.keys(data)[0]].doctor_diagnose);
      $('.modal-body #summary_treatment').val(data[Object.keys(data)[0]].summary_treatment);
      $('.modal-body #price_value_treatment').val(data[Object.keys(data)[0]].treatment_amount);
      $('.modal-body #payment_mode').val(data[Object.keys(data)[0]].payment_mode);
      $('.modal-body #staff_id').val(data[Object.keys(data)[0]].treatment_therapist);
      
    }) 

    $('#editwalkinpatient').modal('show');
    });

    $(document).on("click", ".open-edithousecall", function () {

    var id = $(this).data('userid');

    $(".modal-body #user_id").val( id );

    var url = '{{ route("edit_housecall_patient", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {
      var obNew = JSON.parse(data[Object.keys(data)[0]].id_type_session);

      if(obNew != ""){
        $('.modal-body .houseidtypesession'+ obNew ).iCheck('check');
      }
      
      $('.modal-body #pt_name').val(data[Object.keys(data)[0]].fullname_patients);
      $('.modal-body #ic_no').val(data[Object.keys(data)[0]].ic_patients);
      $('.modal-body #housec_name_diagnose').val(data[Object.keys(data)[0]].doctor_diagnose);
      $('.modal-body #housec_summary_treatment').val(data[Object.keys(data)[0]].summary_treatment);
      $('.modal-body #housec_price_value_treatment').val(data[Object.keys(data)[0]].treatment_amount);
      $('.modal-body #housec_payment_mode').val(data[Object.keys(data)[0]].payment_mode);
      $('.modal-body #housec_staff_id').val(data[Object.keys(data)[0]].treatment_therapist);
      $('.modal-body #attendance-timein').val(data[Object.keys(data)[0]].time_in);
      $('.modal-body #attendance-timeout').val(data[Object.keys(data)[0]].time_out);
      
    }) 

    $('#edithousecallpatient').modal('show');
    });

    $(document).on("click", ".open-editsession", function () {

    var id = $(this).data('userid');

    $(".modal-body #user_id").val( id );

    var url = '{{ route("edit_session_patient", ":id") }}';
    url = url.replace(':id', id);

    $.get(url , function (data) {

      var obNew = JSON.parse(data[Object.keys(data)[0]].id_type_session);

      if(obNew != ""){
        $('.modal-body .sessionidtypesession'+ obNew ).iCheck('check');
      }

      console.log(data);

      $('.modal-body #pt_session_name').val(data[Object.keys(data)[0]].fullname_patients);
      $('.modal-body #ic_no').val(data[Object.keys(data)[0]].ic_patients);
      $('.modal-body #name_diagnose').val(data[Object.keys(data)[0]].doctor_diagnose);
      $('.modal-body #total_session').val(data[Object.keys(data)[0]].total_session);
      $('.modal-body #price_value_treatment').val(data[Object.keys(data)[0]].price_session);
      $('.modal-body #summary_treatment').val(data[Object.keys(data)[0]].summary_treatment);
      $('.modal-body #payment_mode').val(data[Object.keys(data)[0]].payment_mode);
      $('.modal-body #staff_id').val(data[Object.keys(data)[0]].treatment_therapist);
      $('.modal-body #id_type_session').val(data[Object.keys(data)[0]].id_type_session);
      
    }) 

    $('#editsessionpatient').modal('show');
    });

    //############ DELETE BUTTON

    $('.method-remove_hq').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_method_hq", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.attendance-remove_hq').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_attendance_hq", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });


    $('.report-remove_hq').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_report_hq", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.joints-remove_hq').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_joints_hq", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });




    $('.vitalsign-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_vitalsign", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.intakeoutput-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_intakeoutput", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.medicationchart-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_medicationchart", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.medicationroutine-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_medicationroutine", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.progressnote-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_progressnote", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.progressnotedetails-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_progressnotedetail", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.progression-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_progression", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.monthlyreport-remove').click(function(){

      var postId = $(this).data('id'); 

      swal.fire({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false

      }).then(function() {
        var url = '{{ route("delete_monthlyreport", ":id") }}';
        url = url.replace(':id', postId);
        window.location.href = url;
      }, function(dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal('Cancelled', 'Delete Cancelled :)', 'error');
                }
              })
    });

    $('.dailyreport-remove').click(function(){

    var postId = $(this).data('id'); 

    swal.fire({
      title: "Are you sure want to remove this item?",
      text: "You will not be able to recover this item",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Confirm",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: false

    }).then(function() {
      var url = '{{ route("delete_dailyreport", ":id") }}';
      url = url.replace(':id', postId);
      window.location.href = url;
    }, function(dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              if (dismiss === 'cancel') {
                swal('Cancelled', 'Delete Cancelled :)', 'error');
              }
            })
    });

    $('.verifiedpayment').click(function(){
      var paymentid = $(this).data('id'); 

      swal.fire({
        title: 'Are you sure to Verify Payment?',
                    // text: "Y "+user_name + " status to "+action,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText:'Yes, verify it!'
                  }).then((result) => {
                    if (result.value) {
                     var url = '{{ route("verified_status", ":id") }}';
                     url = url.replace(':id', paymentid);

                     var redirectWindow = window.open(url, '_blank');
                     redirectWindow.location;
                   }
                 })



                });

    $( "#msr_date" ).change(function() {
      var dateattenda = $("#msr_date").val();

      var url = '{{ route("list_ofpatient", ":id") }}';
      url = url.replace(':id', dateattenda);


      var redirectWindow = window.open(url,'_self');
      redirectWindow.location;

    });


    $("#search_ic").on('change',function(){

      $value = $(this).val();

      $.ajax({
        type : 'get',
        url  : '{{ URL::to('searchPatient') }}',
        data : {'search':$value},
        success:function(data){
          if (data.success) {
            $('#detailsPa').html(data.value);
          }
          else{
            $( "#detailsPa" ).remove();

            Swal.fire
            ({
              type: 'error',
              title: 'Oops...',
              text: 'User Not Found!',
            });

          }
        }
        
      });
    });

    $("#housec_search_ic").on('change',function(){

      $value = $(this).val();

      $.ajax({
        type : 'get',
        url  : '{{ URL::to('searchPatient') }}',
        data : {'search':$value},
        success:function(data){
          if (data.success) {
            $('#housec_detailsPa').html(data.value);
          }
          else{
            $( "#detailsPa" ).remove();

            Swal.fire
            ({
              type: 'error',
              title: 'Oops...',
              text: 'User Not Found!',
            });

          }
        }
      });
    });

// function chckICPatient(){

// }

$("#search_ic_session").on('change',function(){

  $value = $(this).val();

  
  $.ajax({
    type : 'get',
    url  : '{{ URL::to('searchPatient') }}',
    data : {'search':$value},
    success:function(data){
      if (data.success) {
        $('#detailsPatt').html(data.value);
      }
      else{
        $( "#detailsPatt" ).remove();

        Swal.fire({
          type: 'error',
          title: 'Oops...',
          text: 'User Not Found!',

        });

      }
    }
  });
});

// $(".searchdaily").on("click", function (e) {
//   e.preventDefault();
//   var dailydate =  $(this).data('dailydate'); 

//   alert(dailydate);
// });
$("#form_submit_button1").load(function(e) {
  e.preventDefault();
  var dailydate = $("#dailydate").val();
  document.getElementById("dailydatePDF").value = dailydate;
    // if(validate_form()) { //put your ajax code in the validate_form() method
    //     $("#form").submit();
    // }
    $.ajax
    ({
      type:'get',
      url:'/patientreport_daily',
      data:{dailydate:dailydate},
      success:function(response){
      //buat table boi
      //gg boi

      var len = 0;
           $('.dailydatatable tbody').empty(); // Empty <tbody>

           if(response['data'] != null){

             len = response['data'].length;
           }

           if(len > 0){
            var totalwalkin=0;
            for(var i=0; i<len; i++){



             var created_at = response['data'][i].created_at;
             var name_patient = response['data'][i].fullname_patients;
             var ic_patients = response['data'][i].ic_patients;
             var phone_number = response['data'][i].phone_number;
             var doctor_diagnose = response['data'][i].doctor_diagnose;
               //sini kena query dekat depan je nanti
               var treatment = response['data'][i].id_type_session;
               var treatment_amount = response['data'][i].treatment_amount;
               var total_payment = response['data'][i].total_payment;

               var trtamount;
               if(treatment_amount == null)
               {
                trtamount = total_payment;
              }
              else
              {
                trtamount = treatment_amount;
              }

              totalwalkin += parseInt(response['data'][i].treatment_amount);



              var tr_str = "<tr>" +
              "<td align=''>" + (i+1) + "</td>" +
              "<td align=''>" + created_at + "</td>" +
              "<td align=''>" + name_patient + "</td>" +
              "<td align=''>" + ic_patients + "</td>" +
              "<td align=''>" + phone_number + "</td>" +
              "<td align=''>" + doctor_diagnose + "</td>" +
              "<td align=''>" +  getTypeName(treatment) + "</td>" +
              "<td align=''>" + trtamount + "</td>" +
              "</tr>";

              $(".dailydatatable tbody").append(tr_str);
            }

            var tr_str = "<tr>" +
            "<td align='right' colspan='8'><b>Total Walkin : RM" + totalwalkin + "</b></td>" +
            "</tr>";
            $(".dailydatatable tbody").append(tr_str);
          }else{
            var tr_str = "<tr>" +
            "<td align='center' colspan='8'>No data available in table.</td>" +
            "</tr>";

            $(".dailydatatable tbody").append(tr_str);
          }


        },
        error: function (response) {
         /*console.log(data);*/
         console.log(response);
       }

     });

  });

$("#form_submit_button").click(function(e) {
  e.preventDefault();
  var dailydate = $("#dailydate").val();
  document.getElementById("dailydatePDF").value = dailydate;
    // if(validate_form()) { //put your ajax code in the validate_form() method
    //     $("#form").submit();
    // }
    $.ajax
    ({
      type:'get',
      url:'/patientreport_daily',
      data:{dailydate:dailydate},
      success:function(response){
      //buat table boi
      //gg boi

      var len = 0;
           $('.dailydatatable tbody').empty(); // Empty <tbody>

           if(response['data'] != null){

             len = response['data'].length;
           }

           if(len > 0){
            var totalwalkin=0;
            for(var i=0; i<len; i++){



             var created_at = response['data'][i].created_at;
             var name_patient = response['data'][i].fullname_patients;
             var ic_patients = response['data'][i].ic_patients;
             var phone_number = response['data'][i].phone_number;
             var doctor_diagnose = response['data'][i].doctor_diagnose;
               //sini kena query dekat depan je nanti
               var treatment = response['data'][i].id_type_session;
               var treatment_amount = response['data'][i].treatment_amount;
               var total_payment = response['data'][i].total_payment;

               var trtamount;
               if(treatment_amount == null)
               {
                trtamount = total_payment;
              }
              else
              {
                trtamount = treatment_amount;
              }

              totalwalkin += parseInt(response['data'][i].treatment_amount);



              var tr_str = "<tr>" +
              "<td align=''>" + (i+1) + "</td>" +
              "<td align=''>" + created_at + "</td>" +
              "<td align=''>" + name_patient + "</td>" +
              "<td align=''>" + ic_patients + "</td>" +
              "<td align=''>" + phone_number + "</td>" +
              "<td align=''>" + doctor_diagnose + "</td>" +
              "<td align=''>" +  getTypeName(treatment) + "</td>" +
              "<td align=''>" + trtamount + "</td>" +
              "</tr>";

              $(".dailydatatable tbody").append(tr_str);
            }

            var tr_str = "<tr>" +
            "<td align='right' colspan='8'><b>Total Walkin : RM" + totalwalkin + "</b></td>" +
            "</tr>";
            $(".dailydatatable tbody").append(tr_str);
          }else{
            var tr_str = "<tr>" +
            "<td align='center' colspan='8'>No data available in table.</td>" +
            "</tr>";

            $(".dailydatatable tbody").append(tr_str);
          }


        },
        error: function (response) {
         /*console.log(data);*/
         console.log(response);
       }

     });

  });


//monthly
$("#form_submit_button_monthly").click(function(e) {

  e.preventDefault();
  var datepicermonthstart = $("#datepicer_month_start").val();

  var datepicermonthend = $("#datepicer_month_end").val();
  
  document.getElementById("datepicermonthstartPDF").value = datepicermonthstart;
  document.getElementById("datepicermonthendPDF").value = datepicermonthend;

  var date = new Date(datepicermonthstart);
          console.log(moment(date).format('Y m'));
    // if(validate_form()) { //put your ajax code in the validate_form() method
    //     $("#form").submit();
    // }
    $.ajax
  ({
    type:'get',
    url:'/patientreport_monthly',
    data:{datepicer_month_start:datepicermonthstart , datepicer_month_end:datepicermonthend},
    success:function(response){
      
  
      var len = 0;
           $('.monthlydatatable tbody').empty(); // Empty <tbody>
      
           if(response['data'] != null){
            
             len = response['data'].length;
             
           }
        
           if(len > 0){
            var totalwalkin=0;
             for(var i=0; i<len; i++){
              
      

               var created_at = response['data'][i].created_at;
               var name_patient = response['data'][i].fullname_patients;
               var ic_patients = response['data'][i].ic_patients;
               var phone_number = response['data'][i].phone_number;
               var doctor_diagnose = response['data'][i].doctor_diagnose;
               var treatment = response['data'][i].id_type_session;
               var treatment_amount = response['data'][i].treatment_amount;
               var total_payment = response['data'][i].total_payment;
              
               var trtamount;
               if(treatment_amount == null)
               {
                trtamount = total_payment;
               }
               else
               {
                trtamount = treatment_amount;
               }

               totalwalkin += parseInt(response['data'][i].treatment_amount);
             

             
               var tr_str = "<tr>" +
                   "<td align=''>" + (i+1) + "</td>" +
                   "<td align=''>" + created_at + "</td>" +
                   "<td align=''>" + name_patient + "</td>" +
                   "<td align=''>" + ic_patients + "</td>" +
                   "<td align=''>" + phone_number + "</td>" +
                   "<td align=''>" + doctor_diagnose + "</td>" +
                   "<td align=''>" +  getTypeName(treatment) + "</td>" +
                   "<td align=''>" + trtamount + "</td>" +
               "</tr>";
            
               $(".monthlydatatable tbody").append(tr_str);
             }
             
             var tr_str = "<tr>" +
                  "<td align='right' colspan='8'><b>Total Walkin : RM" + totalwalkin + "</b></td>" +
              "</tr>";
              $(".monthlydatatable tbody").append(tr_str);
           }else{
              var tr_str = "<tr>" +
                  "<td align='center' colspan='8'>No data available in table.</td>" +
              "</tr>";

              $(".monthlydatatable tbody").append(tr_str);
           }


    },
    error: function (response) {
                         /*console.log(data);*/
                        console.log(response);
                     }

  });

});


$(document).on("click", ".editOnce", function () {
      
     var id_payment = $(this).data('idpayment');
     $(".modal-body #id_payment").val( id_payment );
});

//yearly
$("#form_submit_button_yearly").click(function(e) {

e.preventDefault();
var datepiceryearstart = $("#datepicer_year_start").val();

var datepiceryearend = $("#datepicer_year_end").val();

document.getElementById("datepiceryearstartPDF").value = datepiceryearstart;
document.getElementById("datepiceryearendPDF").value = datepiceryearend;

var date = new Date(datepiceryearstart);
        console.log(moment(date).format('Y m'));
 
  $.ajax
({
  type:'get',
  url:'/patientreport_yearly',
  data:{datepicer_year_start:datepiceryearstart , datepicer_year_end:datepiceryearend},
  success:function(response){
    

    var len = 0;
         $('.yearlydatatable tbody').empty(); // Empty <tbody>
    
         if(response['data'] != null){
          
           len = response['data'].length;
           
         }
      
         if(len > 0){
          var totalwalkin=0;
           for(var i=0; i<len; i++){
             var created_at = response['data'][i].created_at;
             var name_patient = response['data'][i].fullname_patients;
             var ic_patients = response['data'][i].ic_patients;
             var phone_number = response['data'][i].phone_number;
             var doctor_diagnose = response['data'][i].doctor_diagnose;
             var treatment = response['data'][i].id_type_session;
             var treatment_amount = response['data'][i].treatment_amount;
             var total_payment = response['data'][i].total_payment;
            
             var trtamount;
             if(treatment_amount == null)
             {
              trtamount = total_payment;
             }
             else
             {
              trtamount = treatment_amount;
             }

             totalwalkin += parseInt(response['data'][i].treatment_amount);
           

           
             var tr_str = "<tr>" +
                 "<td align=''>" + (i+1) + "</td>" +
                 "<td align=''>" + created_at + "</td>" +
                 "<td align=''>" + name_patient + "</td>" +
                 "<td align=''>" + ic_patients + "</td>" +
                 "<td align=''>" + phone_number + "</td>" +
                 "<td align=''>" + doctor_diagnose + "</td>" +
                 "<td align=''>" +  getTypeName(treatment) + "</td>" +
                 "<td align=''>" + trtamount + "</td>" +
             "</tr>";
          
             $(".yearlydatatable tbody").append(tr_str);
           }
           
           var tr_str = "<tr>" +
                "<td align='right' colspan='8'><b>Total Walkin : RM" + totalwalkin + "</b></td>" +
            "</tr>";
            $(".yearlydatatable tbody").append(tr_str);
         }else{
            var tr_str = "<tr>" +
                "<td align='center' colspan='8'>No data available in table.</td>" +
            "</tr>";

            $(".yearlydatatable tbody").append(tr_str);
         }


  },
  error: function (response) {
                       /*console.log(data);*/
                      console.log(response);
                   }

});

});


});

function getTypeName(treatment){

  var name_type_session;
  $.ajax({
    type: "GET",
    async: false,
    url: "/getdataTypeSession",
    data:{idtypesession:treatment},
    success: function (datares)
    {
      console.log(datares);
      name_type_session = datares.datatypesession;
    },

  });

  return name_type_session;
}


</script>
