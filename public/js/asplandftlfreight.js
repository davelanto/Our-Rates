
$('#asp_land_freight_ftl_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('asp_land_freight_ftl_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("province").focus();
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

  var myModal = $('#asp_land_freight_ftl_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#province', myModal).val(columnValues[2].trim());
  $('#areas', myModal).val(columnValues[3].trim());
  $('#fourwheeler', myModal).val(columnValues[4].trim());
  $('#sixwheeler', myModal).val(columnValues[5].trim());
  $('#sixwheelerforward', myModal).val(columnValues[6].trim());
  $('#tenwheeler', myModal).val(columnValues[7].trim());


  myModal.modal('toggle');
  return false;
});
