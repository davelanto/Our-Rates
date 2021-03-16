
$('#asp_warehousing_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('asp_warehousing_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("services").focus();
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

  var myModal = $('#asp_warehousing_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#services', myModal).val(columnValues[2].trim());
  $('#particulars', myModal).val(columnValues[3].trim());
  $('#rate', myModal).val(columnValues[4].trim());


  myModal.modal('toggle');
  return false;
});
