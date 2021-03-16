
$('#seaexportFCLModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end()
      .find('select')
      .prop('disabled',false)  
      .end()
      .find('#notif')
      .addClass('d-none')
      .end();
         
  });
  
  
  var myModalEl = document.getElementById('seaexportFCLModal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("pol").focus();
  });
  


  
$(".edit").click(function () {
  var columnHeadings = $("thead th").map(function () {
 
      return $(this).text();
  }).get();
  columnHeadings.pop();

  var columnValues = $(this).parent().siblings().map(function () {

      return $(this).text();
  }).get();

  var myModal = $('#seaexportFCLModal');

  $('#groupname', myModal).val(columnValues[1].trim());
  $('#charge_id', myModal).val(columnValues[1].trim());
  $('#rateid', myModal).val(columnValues[2].trim());
  $('#pol', myModal).val(columnValues[3].trim());
  $('#pod', myModal).val(columnValues[4].trim());
  $('#charges', myModal).val(columnValues[5].trim());
  $('#currency', myModal).val(columnValues[6].trim());
  $('#twenty', myModal).val(columnValues[7].trim());
  $('#forty', myModal).val(columnValues[8].trim());
  $('#fortyhq', myModal).val(columnValues[9].trim());
  $('#notif').removeClass('d-none');
  $('#groupname').prop('disabled',true);

  myModal.modal('toggle');
  return false;
});





$('#chargegroup').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input")
       .val('')
       .end();
       
})
