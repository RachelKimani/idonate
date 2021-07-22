$(function(){
	var form = $("#wizardb");
	form.validate({
			errorPlacement: function errorPlacement(error, element) {
					 element.before(error);
			},
			rules: {

					password : {
						required: true,
						minlength : 8
					},
					email :{
						required: true
			}},

      messages: {
                email: {
                    remote: "Username/Email does not exist!"
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
			}
	});
  $( "#login" ).click(function() {
    $('#email').rules('add', {

      remote: {
                  url: "check_email.php",
                  type: "post"
               }
    }
  );
    form.validate().settings.ignore = ":disabled,:hidden";
    return form.valid();
    return true;
    //alert( "Handler for .click() called." );

});
    //process form
    $( "#wizardb" ).submit(function( event ) {
      event.preventDefault();
      $('#lodr').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>");
			var form_data = $('#wizardb').serialize();
			$.ajax({
				url:"login_action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					if(data=='success'){
						$('#lodr').html('');
						//show toast
						showSuccessToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: 'Login Success',
					      text: 'Rerouting...',
					      showHideTransition: 'slide',
					      icon: 'success',
					      loaderBg: '#f96868',
					      position: 'top-right',
								hideAfter: 3000
					    })
					  };
						showSuccessToast1();
            var options = {
				      title: "Login Success",
				      options: {
				        body: 'Rerouting...',
				        icon: '../dashboard/images/idonate_logo.png',
				        lang: 'en-US'
				        //onClick: myFunction
				      }
				    };
				    console.log(options);
				    $("#easyNotify").easyNotify(options);
						setTimeout(function(){
    					window.location.href='../dashboard/';
						},3000);
					}else {
						//$('#error_result').html(data);
            $('#lodr').html('');
						showDangerToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: 'Login Failed',
					      text: data,
					      showHideTransition: 'slide',
					      icon: 'error',
					      loaderBg: '#f2a654',
					      position: 'top-right',
								hideAfter: 5000
					    })
					  };
						showDangerToast1();
					}
				}
			})
    });
//caps lock
$(document).ready(function(){
            $('#password').keypress(function(e) {
                var s = String.fromCharCode( e.which );

                if((s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey) ||
                   (s.toUpperCase() !== s && s.toLowerCase() === s && e.shiftKey)){
                    if($('#capsalert').length < 1) $(this).after('<b id="capsalert">CapsLock is on!</b>');
                } else {
                    if($('#capsalert').length > 0 ) $('#capsalert').remove();
                }
            });
        });
})
