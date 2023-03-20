$(function () {

  $('#table-patient').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : false,
    'autoWidth'   : false
  });

  $(document).on("click", ".open-addrelative", function () {
    var id = $(this).data('userid');
    $(".modal-body #user_id").val( id );
    $('#addrelative').modal('show');
  });


  //$(document).on("click", ".open-editrelative", function () {
  //  var id = $(this).data('userid');
  //  $(".modal-body #user_id").val( id );
  //  $('#editrelative').modal('show');
  //});

});
