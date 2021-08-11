/*jslint browser: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
/*global $, console, alert, FormData, FileReader*/


$(document).ready(function (e) {
    var tabf = $("#example").DataTable({
      aaSorting: [],
      "ajax": '../functions/facilities.php',
      responsive: true,
      buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
      columnDefs: [
        {
          responsivePriority: 1,
          targets: 0
        },
        {
          responsivePriority: 2,
          targets: -1
        }
      ],
      "pageLength": 5,
      lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5','10', '25', '50', 'All' ]
        ]
    });

    $(".dataTables_filter input")
      .attr("placeholder", "Search here...")
      .css({
        width: "auto",
        display: "inline-block"
      });

    //$('[data-toggle="tooltip"]').tooltip();

  var form = $("#facility");
 	form.validate({
			errorPlacement: function errorPlacement(error, element) {
					 element.before(error);
			},
			rules: {
					phone : {
						required: true,
						minlength : 10
					},
          fName :{
            required: true,
            minlength : 5
          },
          address :{
            required: true
          }
			},

			onfocusout: function(element) {
					$(element).valid();
			},
			highlight : function(element, errorClass, validClass) {
					$(element.form).find('.actions').addClass('form-error');
					$(element).removeClass('valid');
					$(element).addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
					$(element.form).find('.actions').removeClass('form-error');
					$(element).removeClass('error');
					$(element).addClass('valid');
			},
      submitHandler: function(form, event) {
    event.preventDefault();

    $('#error_result').empty();
    $('#loading').show();

     $.ajax({
      url: "facility.php",
      type: "POST",
      data: new FormData(form),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        if(data=='success'){
          tabf.ajax.reload();
          $('#loading').hide();
          $("#facility")[0].reset();
          $('#error_result').html("Facility added successfully");
          $('#exampleModal').modal('hide');
          swal({
            title: 'Success!',
            text: 'Facility added successfully',
            icon: 'success',
            button: {
              text: "Continue",
              value: true,
              visible: true,
              className: "btn btn-primary"
            }
          })
        } else {
          $('#loading').hide();
          $('#error_result').html("Failed to add facility. Please try again.");
        }

      }
    });
      }

	});
  //delete
  $(document).on('click', '.delete', function () {
    var id = $(this).attr('aid');
    var updatef = 'Deleted';
    swal({
      title: 'Are you sure you want to delete?',
      text: "This facility will be deleted accross all nodes!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3f51b5',
      cancelButtonColor: '#ff4081',
      confirmButtonText: 'Great ',
      buttons: {
        cancel: {
          text: "Cancel",
          value: null,
          visible: true,
          className: "btn btn-danger",
          closeModal: true,
        },
        confirm: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary",
          closeModal: true
        }
      }
    }).then((willDelete) => {
            if (willDelete) {
              $.ajax({
               url: "facility.php",
               type: "POST",
               data: {id:id,updatef:updatef},
               success: function(data)
               {
                 if(data=='success'){
                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'Facility deleted successfully',
                     icon: 'success',
                     button: {
                       text: "Continue",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 } else {
                   swal({
                     title: 'Error!',
                     text: 'Failed to delete facility. Please try again.',
                     icon: 'error',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 }
               }
             });
            } else {

            }
          });
  });
  //Restore
  $(document).on('click', '.restore', function () {
    var id = $(this).attr('aid');
    var updatef = 'active';
    swal({
      title: 'Are you sure you want to restore?',
      text: "This facility will be activated accross all nodes!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3f51b5',
      cancelButtonColor: '#ff4081',
      confirmButtonText: 'Great ',
      buttons: {
        cancel: {
          text: "Cancel",
          value: null,
          visible: true,
          className: "btn btn-danger",
          closeModal: true,
        },
        confirm: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary",
          closeModal: true
        }
      }
    }).then((willDelete) => {
            if (willDelete) {
              $.ajax({
               url: "facility.php",
               type: "POST",
               data: {id:id,updatef:updatef},
               success: function(data)
               {
                 if(data=='success'){
                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'Facility restored',
                     icon: 'success',
                     button: {
                       text: "Continue",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 } else {
                   swal({
                     title: 'Error!',
                     text: 'Failed to restore facility. Please try again.',
                     icon: 'danger',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 }
               }
             });
            } else {

            }
          });
  });
  //disable donations
  $(document).on('click', '.disable', function () {
    var id = $(this).attr('aid');
    var updatef = 'disabled';
    swal({
      title: 'Are you sure you want to disale donations?',
      text: "This facility will not receive donations!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3f51b5',
      cancelButtonColor: '#ff4081',
      confirmButtonText: 'Great ',
      buttons: {
        cancel: {
          text: "Cancel",
          value: null,
          visible: true,
          className: "btn btn-danger",
          closeModal: true,
        },
        confirm: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-primary",
          closeModal: true
        }
      }
    }).then((willDelete) => {
            if (willDelete) {
              $.ajax({
               url: "facility.php",
               type: "POST",
               data: {id:id,updatef:updatef},
               success: function(data)
               {
                 if(data=='success'){
                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'This facility will no longer receive donations',
                     icon: 'success',
                     button: {
                       text: "Continue",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 } else {
                   swal({
                     title: 'Error!',
                     text: 'Failed to disable donations. Please try again.',
                     icon: 'danger',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 }
               }
             });
            } else {

            }
          });
  });

  //edit facilty
  $(document).on('click', '.edit', function () {
    var id = $(this).attr('aid');
    var fetchf = 'fetchf';
    $.ajax({
     url: "facility.php",
     type: "POST",
     data: {id:id,fetchf:fetchf},
     success: function(data)
     {
       if(data=='failed'){

           swal({
             title: 'Error!',
             text: 'Failed to fetch data. Please try again.',
             icon: 'danger',
             button: {
               text: "Ok",
               value: true,
               visible: true,
               className: "btn btn-primary"
             }
           })
       } else {
         data = JSON.parse(data);
         console.log(data);
         $('#fName').val(data.name);
         $('#phone').val(data.contact);
         $('#type').val(data.type);
         $('#addressa').val(data.address);
         $('#cordinates').val(data.cordinates);
         $('#city').val(data.city);
         $('#country').val(data.country);
         $('#fac').val(data.id);
         $('#fac').attr('name','ufacility');
         $('#exampleModal').modal('show');
       }
     }
   });

});
});
