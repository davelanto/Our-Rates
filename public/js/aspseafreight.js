
$('#asp_sea_freight_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('asp_sea_freight_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("destination").focus();
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

  var myModal = $('#asp_sea_freight_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#destination', myModal).val(columnValues[2].trim());
  $('#area', myModal).val(columnValues[3].trim());
  $('#rate', myModal).val(columnValues[4].trim());


  myModal.modal('toggle');
  return false;
});
