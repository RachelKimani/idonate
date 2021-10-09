$(function(){
	var tabf = $("#example").DataTable({
    aaSorting: [],
    "ajax": '../functions/users.php',
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
    ]
  });


  $.fn.dataTable.ext.search.push(
    function(settings, searchData, index, rowData, counter) {
      // No filtered checked - show all rows
      if ($('.filter:checked').length === 0) {
        return true;
      }

      // Filter(s) checked, apply logic
      var found = false;
      $('.filter').each(function(index, elem) {
				var dat = $(rowData[5]).text()
        if (elem.checked && dat === elem.value) {
          found = true;
        }
      });

      return found;
    }
  );
	$('input.filter').on('change', function() {
    tabf.draw();
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search users...")
    .css({
      width: "auto",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();

	var form = $("#adminform");
	form.validate({
			errorPlacement: function errorPlacement(error, element) {
					 element.before(error);
			},
			rules: {

					firstName : {
							required: true,
					},
					lastName : {
							required: true,
					},
					username : {
							required: true,
							remote: {
	                        url: "../../register/check_user.php",
	                        type: "post"
	                     }
					},
					password : {
						required: true,
						minlength : 8
					},
					confirmPassword : {
						minlength : 8,
						equalTo : "#password"
					},
					phone : {
							required: true,
					},
					email :{
						required: true,
						email: true,
						remote: {
                        url: "../../register/check_email.php",
                        type: "post"
                     }
					}
			},
			//custom messages for db validation
			messages: {
                email: {
                    remote: "Email already in use!"
                },
								username: {
                    remote: "Username is taken!"
                }
            }
			,
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
				$('#error_result').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>&nbspProcessing. Please Wait ...");

		     $.ajax({
		      url: "../../register/register_action.php",
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
		          $("#adminform")[0].reset();
		          $('#error_result').html(data);
		          $('#exampleModal').modal('hide');
		          swal({
		            title: 'Success!',
		            text: 'User added successfully.',
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
		            text: 'Failed to add user. Please try again.',
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
			}
	});

	var Demo = (function($, undefined){

		$(function(){
					QuickDemo();
			});
		function QuickDemo(){
					$("#basic-demo").PopupWindow({
							title: "iDonate | Add User",
							modal       : true,
							autoOpen    : false,
							height        : 600,
							width : 900
					});
					$(document).on('click', '.test', function () {
							$("#basic-demo").PopupWindow("open");
					});
					$(document).on('click', '.cp', function () {
							$("#basic-demo").PopupWindow("close");
					});
			}
		})(jQuery);

})
