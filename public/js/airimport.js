
$('#airimportModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('airimportModal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("pol").focus();
  });
  


  
$(".edit").click(function () {
  var columnHeadings = $("thead th").map(function () {
 
      return $(this).text();
  }).get();
  columnHeadings.pop();

  var columnValues = $(this).parent().siblings().map(function () {
    console.log(  $(this).text());
      return $(this).text();
  }).get();

  var myModal = $('#airimportModal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#pol', myModal).val(columnValues[2].trim());
  $('#pod', myModal).val(columnValues[3].trim());
  $('#carrier', myModal).val(columnValues[4].trim());
  $('#validity', myModal).val(columnValues[5].trim());
  $('#min', myModal).val(columnValues[6].trim());
  $('#nor', myModal).val(columnValues[7].trim());
  $('#fortyfive', myModal).val(columnValues[8].trim());
  $('#hundred', myModal).val(columnValues[9].trim());
  $('#twofifty', myModal).val(columnValues[10].trim());
  $('#threehundred', myModal).val(columnValues[11].trim());
  $('#fivehundred', myModal).val(columnValues[12].trim());
  $('#thousand', myModal).val(columnValues[13].trim());
  $('#fsc', myModal).val(columnValues[14].trim());
  $('#ssc', myModal).val(columnValues[15].trim());
  $('#tcc', myModal).val(columnValues[16].trim());
  $('#awbfee', myModal).val(columnValues[17].trim());
  $('#ens', myModal).val(columnValues[18].trim());
  $('#frequency', myModal).val(columnValues[19].trim());
  $('#routing', myModal).val(columnValues[20].trim());
  $('#tt', myModal).val(columnValues[21].trim());
  $('#comment', myModal).val(columnValues[22].trim());
  
  myModal.modal('toggle');
  return false;
});
