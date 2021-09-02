/*jslint browser: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
/*global $, console, alert, FormData, FileReader*/


$(document).ready(function (e) {
    var tabf = $("#appointments").DataTable({
      aaSorting: [],
      "ajax": 'fetch_drives.php?cent',
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


  //disable donations
  $(document).on('click', '.complete', function () {
    var appointment_id = $(this).attr('aid');
    var completeDonation = 'donated';
    swal({
      title: 'Are you sure?',
      text: "This donation will be marked as complete and will not be reversed!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3f51b5',
      cancelButtonColor: '#ff4081',
      confirmButtonText: 'Ok',
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
               url: "fetch_drives.php",
               type: "POST",
               data: {appointment_id:appointment_id,completeDonation:completeDonation},
               success: function(data)
               {
                 if(data=='success'){
                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'Donation has been completed. Give the donor some refreshments and note any changes within the hour',
                     icon: 'success',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 } else {
                   swal({
                     title: 'Error!',
                     text: 'Failed to complete donation. Please try again.',
                     icon: 'error',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 }
               },error: function (xhr, ajaxOptions, thrownError){
                 if(xhr.responseText=='success'){

                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'Donation has been completed. Give the donor some refreshments and note any changes within the hour',
                     icon: 'success',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 } else {
                   swal({
                     title: 'Error!',
                     text: 'Failed to complete donation. Please try again.',
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



  //disable donations
  $(document).on('click', '.accept', function () {
    var appointment_id = $(this).attr('aid');
    var status = $(this).attr('stat');
    var updateAppointment = 'updating';
    swal({
      title: 'Are you sure?',
      text: "The donor will be notified of the approval",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3f51b5',
      cancelButtonColor: '#ff4081',
      confirmButtonText: 'Ok',
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
               url: "fetch_drives.php",
               type: "POST",
               data: {appointment_id:appointment_id,updateAppointment:updateAppointment,status:status},
               success: function(data)
               {
                 if(data=='success'){
                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'Action has been updated',
                     icon: 'success',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 } else {
                   swal({
                     title: 'Error!',
                     text: 'Action failed. Please try again.',
                     icon: 'error',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                 }
               },error: function (xhr, ajaxOptions, thrownError){
                 if(xhr.responseText=='success'){

                   tabf.ajax.reload();
                   swal({
                     title: 'Success!',
                     text: 'Action has been updated',
                     icon: 'success',
                     button: {
                       text: "Ok",
                       value: true,
                       visible: true,
                       className: "btn btn-primary"
                     }
                   })
                   } else {
                   swal({
                     title: 'Error!',
                     text: 'Action failed. Please try again.',
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
const popupCenter = ({url, title, w, h}) => {
    // Fixes dual-screen position                             Most browsers      Firefox
    const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
    const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

    const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    const systemZoom = width / window.screen.availWidth;
    const left = (width - w) / 2 / systemZoom + dualScreenLeft
    const top = (height - h) / 2 / systemZoom + dualScreenTop
    const newWindow = window.open(url, title,
      `
      scrollbars=yes,
      width=${w / systemZoom},
      height=${h / systemZoom},
      top=${top},
      left=${left}
      `
    )

    if (window.focus) newWindow.focus();
}

 var Demo = (function($, undefined){

   $(function(){
         QuickDemo();
     });
   function QuickDemo(){
         $("#basic-demo").PopupWindow({
             title: "iDonate | Rapid Pass",
             modal       : true,
             autoOpen    : false,
             height        : 600,
             width : 900
         });

         $(document).on('click', '.test', function () {
             $("#basic-demo").PopupWindow("open");
         });
         $(document).on('click', '.assign', function (e) {
           var id = $(this).attr('aid');
           $("#basic-demo1").PopupWindow({
               title: "iDonate | Add Blood Bag ("+id+")",
               modal       : true,
               autoOpen    : false,
               height        : 400,
               width : 500
           });
             $('#appointment_id').val(id);
             $("#basic-demo1").PopupWindow("open");
         });
     }
   })(jQuery);
 //$('.js-example-basic-single').select2();



 var donateform = $("#donateform");
 donateform.validate({
     errorPlacement: function errorPlacement(error, element) {
          element.before(error);
     },
     onfocusout: function(element) {
         $(element).valid();
     },
     highlight : function(element, errorClass, validClass) {
         $(element.donateform).find('.actions').addClass('form-error');
         $(element).removeClass('valid');
         $(element).addClass('error');
     },
     unhighlight: function(element, errorClass, validClass) {
         $(element.donateform).find('.actions').removeClass('form-error');
         $(element).removeClass('error');
         $(element).addClass('valid');
     },
     submitHandler: function(donateform, event) {
       event.preventDefault();

       $('#error_result').empty();
       $('#error_result').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>&nbspProcessing. Please Wait ...");

        $.ajax({
         url: "./fetch_drives.php",
         type: "POST",
         data: new FormData(donateform),
         contentType: false,
         cache: false,
         processData: false,
         success: function(data)
         {
           if(data=='success'){
             tabf.ajax.reload();
             $("#donateform")[0].reset();
             $('#error_result').html(data);
             swal({
               title: 'Success!',
               text: 'Blood bag assigned.',
               icon: 'success',
               button: {
                 text: "Ok",
                 value: true,
                 visible: true,
                 className: "btn btn-primary"
               }
             })
           } else {
             $('#error_result').html(data);
             swal({
               title: 'Error!',
               text: 'Failed assign bag. Please try again.',
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
         ,error: function (xhr, ajaxOptions, thrownError){
           if(xhr.responseText=='success'){
             tabf.ajax.reload();
             $("#donateform")[0].reset();
             $('#error_result').html(xhr.responseText);
             swal({
               title: 'Success!',
               text: 'Blood bag assigned.',
               icon: 'success',
               button: {
                 text: "Ok",
                 value: true,
                 visible: true,
                 className: "btn btn-primary"
               }
             })
           } else {
             $('#error_result').html(xhr.responseText);
             swal({
               title: 'Error!',
               text: 'Failed assign bag. Please try again.',
               icon: 'error',
               button: {
                 text: "Ok",
                 value: true,
                 visible: true,
                 className: "btn btn-primary"
               }
             })
           }
     console.log(xhr.responseText);
}
       });
     }
 });

});
