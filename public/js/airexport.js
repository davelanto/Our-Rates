


$(".edit").click(function () {
  var columnHeadings = $("thead th").map(function () {
 
      return $(this).text();
  }).get();
  columnHeadings.pop();

  var columnValues = $(this).parent().siblings().map(function () {
    console.log(  $(this).text());
      return $(this).text();
  }).get();

  var myModal = $('#ModalAirexport');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#pol', myModal).val(columnValues[2].trim());
  $('#pod', myModal).val(columnValues[3].trim());
  $('#code', myModal).val(columnValues[4].trim());
  $('#carrier', myModal).val(columnValues[5].trim());
  $('#service', myModal).val(columnValues[6].trim());
  $('#validity', myModal).val(columnValues[7].trim());
  $('#min', myModal).val(columnValues[8].trim());
  $('#nor', myModal).val(columnValues[9].trim());
  $('#fortyfive', myModal).val(columnValues[10].trim());
  $('#hundred', myModal).val(columnValues[11].trim());
  $('#twofifty', myModal).val(columnValues[12].trim());
  $('#threehundred', myModal).val(columnValues[13].trim());
  $('#fivehundred', myModal).val(columnValues[14].trim());
  $('#thousand', myModal).val(columnValues[15].trim());
  $('#fsc', myModal).val(columnValues[16].trim());
  $('#ssc', myModal).val(columnValues[17].trim());
  $('#tcc', myModal).val(columnValues[18].trim());
  $('#awbfee', myModal).val(columnValues[19].trim());
  $('#ens', myModal).val(columnValues[20].trim());
  $('#handling', myModal).val(columnValues[21].trim());
  $('#docufee', myModal).val(columnValues[22].trim());
  $('#peza', myModal).val(columnValues[23].trim());
  $('#vat', myModal).val(columnValues[24].trim());
  $('#frequency', myModal).val(columnValues[25].trim());
  $('#routing', myModal).val(columnValues[26].trim());
  $('#tt', myModal).val(columnValues[27].trim());
  $('#comment', myModal).val(columnValues[28].trim());
  
  myModal.modal('toggle');
  return false;
});







$('#ModalAirexport').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input")
       .val('')
       .end();
})


var myModalEl = document.getElementById('ModalAirexport')
myModalEl.addEventListener('shown.bs.modal', function (event) {
  document.getElementById("pol").focus();
});
