
$('#seaexportModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('seaexportModal')
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

  var myModal = $('#seaexportModal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#pol', myModal).val(columnValues[2].trim());
  $('#pod', myModal).val(columnValues[3].trim());
  $('#charges', myModal).val(columnValues[4].trim());
  $('#twenty', myModal).val(columnValues[5].trim());
  $('#forty', myModal).val(columnValues[6].trim());
  $('#fortyhq', myModal).val(columnValues[7].trim());
  $('#tt', myModal).val(columnValues[8].trim());
  $('#sailing', myModal).val(columnValues[9].trim());
  $('#lct', myModal).val(columnValues[10].trim());
  $('#validity', myModal).val(columnValues[11].trim());
  $('#carrier', myModal).val(columnValues[12].trim());

  myModal.modal('toggle');
  return false;
});
