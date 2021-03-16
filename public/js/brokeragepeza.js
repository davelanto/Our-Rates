
$('#BrokeragePezaModal').on('hidden.bs.modal', function (e) {
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
  
  
  var myModalEl = document.getElementById('BrokeragePezaModal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("charges").focus();
  });
  


  
$(".edit").click(function () {
  var columnHeadings = $("thead th").map(function () {
 
      return $(this).text();
  }).get();
  columnHeadings.pop();

  var columnValues = $(this).parent().siblings().map(function () {

      return $(this).text();
  }).get();

  var myModal = $('#BrokeragePezaModal');

  $('#groupname', myModal).val(columnValues[2].trim());
  $('#charge_id', myModal).val(columnValues[2].trim());
  $('#rateid', myModal).val(columnValues[1].trim());
  $('#charges', myModal).val(columnValues[3].trim());
  $('#currency', myModal).val(columnValues[4].trim());
  $('#amount', myModal).val(columnValues[5].trim());
  $('#remarks', myModal).val(columnValues[6].trim());
  $('#groupname').prop('disabled',true);
  $('#notif').removeClass('d-none');

  myModal.modal('toggle');
  return false;
});





$('#chargegroup').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input")
       .val('')
       .end();
       
})
