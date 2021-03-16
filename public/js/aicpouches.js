
$('#aic_pouches_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('aic_pouches_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("description").focus();
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

  var myModal = $('#aic_pouches_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#description', myModal).val(columnValues[2].trim());
  $('#ncr', myModal).val(columnValues[3].trim());
  $('#luzon', myModal).val(columnValues[4].trim());
  $('#visayas', myModal).val(columnValues[5].trim());
  $('#mindanao', myModal).val(columnValues[6].trim());
  $('#category', myModal).val(columnValues[7].trim());

  myModal.modal('toggle');
  return false;
});
