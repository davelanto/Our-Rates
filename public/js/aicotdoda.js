
$('#aic_otd_oda_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('aic_otd_oda_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("state").focus();
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

  var myModal = $('#aic_otd_oda_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#state', myModal).val(columnValues[2].trim());
  $('#province', myModal).val(columnValues[3].trim());
  $('#city', myModal).val(columnValues[4].trim());
  $('#barangay', myModal).val(columnValues[5].trim());
  $('#zipcode', myModal).val(columnValues[6].trim());

  myModal.modal('toggle');
  return false;
});
