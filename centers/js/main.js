/*jslint browser: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
/*global $, console, alert, FormData, FileReader*/


$(document).ready(function (e) {

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
        $('#loading').hide();
        $('#error_result').html(data);
      }
    });
      }

	});

   /*$('#facility').on('submit', function(e) {

    e.preventDefault();

   $('#error_result').empty();
    $('#loading').show();

    $.ajax({
      url: "facility.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        $('#loading').hide();
        $('#error_result').html(data);
      }
    });

  });
  */

});
