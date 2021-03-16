
$('#asp_roro_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('asp_roro_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("destination").focus();
  });
  


  
$('#asp_roro_sched_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('asp_roro_sched_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("route").focus();
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

  var myModal = $('#asp_roro_modal');

  $('#rateid', myModal).val(columnValues[1].trim());
  $('#destination', myModal).val(columnValues[2].trim());
  $('#code', myModal).val(columnValues[3].trim());
  var data = columnValues[4].trim();
  $('#rates', myModal).val(data.replace(",",""));



  myModal.modal('toggle');
  return false;
});


  
$(".edittrip").click(function () {
    var columnHeadings = $("thead th").map(function () {
   
        return $(this).text();
    }).get();
    columnHeadings.pop();
  
    var columnValues = $(this).parent().siblings().map(function () {
      console.log(  $(this).text());
        return $(this).text();
    }).get();
  
    var myModal = $('#asp_roro_sched_modal');
  
    $('#schedid', myModal).val(columnValues[1].trim());
    $('#route', myModal).val(columnValues[2].trim());
    $('#code', myModal).val(columnValues[3].trim());
    $('#etd', myModal).val(columnValues[4].trim());
    $('#eta', myModal).val(columnValues[5].trim());

  
  
    myModal.modal('toggle');
    return false;
  });
