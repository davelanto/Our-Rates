
$('#seaimportFCLModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('seaimportFCLModal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("charges").focus();
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

  var myModal = $('#seaimportFCLModal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#charges', myModal).val(columnValues[2].trim());
  $('#currency', myModal).val(columnValues[3].trim());
  $('#twenty', myModal).val(columnValues[4].trim());
  $('#forty', myModal).val(columnValues[5].trim());
  $('#fortyhq', myModal).val(columnValues[6].trim());
  $('#remarks', myModal).val(columnValues[7].trim());



  myModal.modal('toggle');
  return false;
});
