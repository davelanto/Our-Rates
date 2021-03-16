
$('#aic_boxes_modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  })
  
  
  var myModalEl = document.getElementById('aic_boxes_modal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("size").focus();
  });
  


  
$(".edit, .edit2").click(function () {

    event.stopPropagation();
    event.stopImmediatePropagation();
  var columnHeadings = $("thead th").map(function () {
 
      return $(this).text();
  }).get();
  columnHeadings.pop();

  var columnValues = $(this).parent().siblings().map(function () {
      return $(this).text();
  }).get();

  var myModal = $('#aic_boxes_modal');

  if(columnValues[7] == 'EXCESS')
  {

    $('#rateid', myModal).val(columnValues[1].trim());
    $('#size', myModal).val(columnValues[2].trim());
    $('#ncr', myModal).val(columnValues[3].trim());
    $('#luzon', myModal).val(columnValues[4].trim());
    $('#visayas', myModal).val(columnValues[5].trim());
    $('#mindanao', myModal).val(columnValues[6].trim());
    $('#category', myModal).val(columnValues[7].trim());

    $('#max_weight').prop('disabled',true);
    $('#dimension').prop('disabled',true);

    $('#max_weight').val('Not Applicable').addClass('text-danger');
    $('#dimension').val('Not Applicable').addClass('text-danger');

  }
  else
  {

    $('#max_weight').prop('disabled', false);
    $('#dimension').prop('disabled', false);

    $('#max_weight').val('').removeClass('text-danger');
    $('#dimension').val('').removeClass('text-danger');

    $('#rateid', myModal).val(columnValues[1].trim());
    $('#size', myModal).val(columnValues[2].trim());
    $('#max_weight', myModal).val(columnValues[3].trim());
    $('#dimension', myModal).val(columnValues[4].trim());
    $('#ncr', myModal).val(columnValues[5].trim());
    $('#luzon', myModal).val(columnValues[6].trim());
    $('#visayas', myModal).val(columnValues[7].trim());
    $('#mindanao', myModal).val(columnValues[8].trim());
    $('#category', myModal).val(columnValues[9].trim());
 

    

    

  }

 

  myModal.modal('toggle');
  return false;
});


$('#category').change(function(){

    if($(this).val() == 'EXCESS')
    {
        $('#max_weight').prop('disabled',true);
        $('#dimension').prop('disabled',true);

        $('#max_weight').val('Not Applicable').addClass('text-danger');
        $('#dimension').val('Not Applicable').addClass('text-danger');

        
    }
    else
    {
        $('#max_weight').prop('disabled', false);
        $('#dimension').prop('disabled', false);

        $('#max_weight').val('').removeClass('text-danger');
        $('#dimension').val('').removeClass('text-danger');
    }

 


});
