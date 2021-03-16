
$('#seaimportLCLModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('seaimportLCLModal')
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

  var myModal = $('#seaimportLCLModal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#charges', myModal).val(columnValues[2].trim());
  $('#currency', myModal).val(columnValues[3].trim());
  $('#amount', myModal).val(columnValues[4].trim());
  $('#remarks', myModal).val(columnValues[5].trim());



  myModal.modal('toggle');
  return false;
});
