
$('#aic_own_packaging_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('aic_own_packaging_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("location").focus();
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

  var myModal = $('#aic_own_packaging_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#location', myModal).val(columnValues[2].trim());
  $('#onekg', myModal).val(columnValues[3].trim());
  $('#twokg', myModal).val(columnValues[4].trim());
  $('#threekg', myModal).val(columnValues[5].trim());
  $('#excesskg', myModal).val(columnValues[6].trim());

  myModal.modal('toggle');
  return false;
});
