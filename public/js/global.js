function hideLoader() {
    $('#loading').hide();
   
}
$(window).ready(hideLoader);
setTimeout(hideLoader, 20 * 1000);


$('table.table').DataTable({
     "scrollX": true,
     "ordering": false,
     "pageLength": 25,
     dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excel',
            text: 'Export Search Results',
            className: 'btn btn-default',
            exportOptions: {
               columns: 'th:not(.d-none, .action)'
            }
          }
        ]
 });



 $('table.table').append('<caption style="caption-side: bottom" hidden>' + $('#notes').val() + '</caption>');


 $('.dataTables_scrollBody').css('height', '480px');


 $('.dt-button').addClass('btn btn-danger btn-sm').html('<i class="fas fa-file-download fa-fw"></i> Export to Excel File');
 

 var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {

  return new bootstrap.Tooltip(tooltipTriggerEl);

  });



  
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
  
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })();


  setTimeout(function(){ $(".alert.alert-success").alert('close'); }, 2000);