


$(".editform").click(function () {
    var columnHeadings = $("thead th").map(function () {
   
        return $(this).text();
    }).get();
    columnHeadings.pop();
  
    var columnValues = $(this).parent().siblings().map(function () {
      console.log(  $(this).text());
        return $(this).text();
    }).get();
  
    var myModal = $('#editProfileModal');
  
    $('#userid', myModal).val(columnValues[1].trim());
    $('#ufname', myModal).val(columnValues[3].trim());
    $('#ulname', myModal).val(columnValues[4].trim());
    $('#utype_id', myModal).val(columnValues[6].trim());
    $('.spanusername').html(columnValues[2].trim());
    
    myModal.modal('toggle');
    return false;
  });
  
  


  

$(".changepass").click(function () {
    var columnHeadings = $("thead th").map(function () {
   
        return $(this).text();
    }).get();
    columnHeadings.pop();
  
    var columnValues = $(this).parent().siblings().map(function () {
      console.log(  $(this).text());
        return $(this).text();
    }).get();
  
    var myModal = $('#changePassModal');
  
    $('.spanusername').html(columnValues[2].trim());
    
    $('#userids').val(columnValues[1].trim());
    
    myModal.modal('toggle');
    return false;
  });
  
  
  
  
  
  
  $('#accountModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  });

  $('#editProfileModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
  });

  $('#changePassModal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
         .val('')
         .end();
         $('.errors').html('');
  });
  
  
  var myModalEl = document.getElementById('accountModal')
  myModalEl.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("username").focus();
  });

  var myModalEl2 = document.getElementById('editProfileModal')
  myModalEl2.addEventListener('shown.bs.modal', function (event) {
    document.getElementById("fname").focus();
  });
  