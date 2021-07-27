$(function(){
	var form = $("#wizardb");
	var form2 = $("#wizardc");
	var form3 = $("#wizardd");
	var form4 = $("#wizardda");
	form4.validate({
			errorPlacement: function errorPlacement(error, element) {
					 element.before(error);
			},
			rules: {
					password : {
						required: true,
						minlength : 8
					},
					cpassword : {
						minlength : 8,
						equalTo : "#password"
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
			}
	});
	form2.validate({
		errorPlacement: function errorPlacement(error, element) {
				 element.before(error);
		},
		rules: {

				password : {
					required: true,
					minlength : 8
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
	form3.validate({
		errorPlacement: function errorPlacement(error, element) {
				 element.before(error);
		},
		rules: {

				email : {
					required: true,
				}
			},

      messages: {
                email: {
                    remote: "Email does not exist!"
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
			}
	});
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
			}
			},

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
    form.validate().settings.ignore = ":disabled,:hidden";
    return form.valid();
    return true;
    //alert( "Handler for .click() called." );

});
$( "#loginx" ).click(function() {
	form2.validate().settings.ignore = ":disabled,:hidden";
	return form2.valid();
	return true;
});

// Click to see password
$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("zmdi-eye zmdi-eye-off");
  var input = $("#password");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

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
					var msg,title;
					if(data == 'success'){
						title = 'Login Success';
						msg = 'You will be redirected to your account';

					} else if (data == 'wrongpwd') {
						title = 'Login Failed';
						msg = 'Wrong Password. Please check your password or click on forgot password to reset';
					} else if (data == 'disabled') {
						title = 'Login Failed';
						msg = 'Your account is not active. Check your email address for an activation link';
					} else if (data == 'success1') {
						title = 'Login Failed';
						msg = 'Internal server error. Please reload and try again.';
					} else if (data == 'notfound') {
						title = 'Login Failed';
						msg = 'User does not exist';
					}
					if(data=='success'){
						$('#lodr').html('');
						//show toast
						showSuccessToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: title,
					      text: msg,
					      showHideTransition: 'slide',
					      icon: 'success',
					      loaderBg: '#f96868',
					      position: 'top-right',
								hideAfter: 1000
					    })
					  };
						showSuccessToast1();
            var options = {
				      title: title,
				      options: {
				        body: msg,
				        icon: '../dashboard/images/idonate_logo.png',
				        lang: 'en-US'
				        //onClick: myFunction
				      }
				    };
				    console.log(options);
				    $("#easyNotify").easyNotify(options);
						setTimeout(function(){
    					window.location.href='../dashboard/index.php';
						},1000);
					}else {
						//$('#error_result').html(data);
            $('#lodr').html('');
						showDangerToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: title,
					      text: msg,
					      showHideTransition: 'slide',
					      icon: 'error',
					      //loaderBg: '#f2a654',
					      position: 'top-right',
								hideAfter: 10000
					    })
					  };
						showDangerToast1();
					}
				}
			})
    });
		//lock
		$( "#wizardc" ).submit(function( event ) {
      event.preventDefault();
      $('#lodrc').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>");
			//var form_data = $('#wizardc').serialize();
			var password = document.getElementById('password').value;
			var email = document.getElementById('email').value;
			var login ='login';
			$.ajax({
				url:"login_action.php",
				method:"POST",
				data: { password:password,email:email,login:login},
				success:function(data)
				{
					var msg,title;
					if(data == 'success'){
						title = 'Login Success';
						msg = 'You will be redirected to your account';

					} else if (data == 'wrongpwd') {
						title = 'Login Failed';
						msg = 'Wrong Password. Please check your password or click on forgot password to reset';
					} else if (data == 'disabled') {
						title = 'Login Failed';
						msg = 'Your account is not active. Check your email address for an activation link';
					} else if (data == 'success1') {
						title = 'Login Failed';
						msg = 'Internal server error. Please reload and try again.';
					} else if (data == 'notfound') {
						title = 'Login Failed';
						msg = 'User does not exist';
					}
					if(data=='success'){
						$('#lodrc').html('');
						//show toast
						showSuccessToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: title,
					      text: msg,
					      showHideTransition: 'slide',
					      icon: 'success',
					      loaderBg: '#f96868',
					      position: 'top-right',
								hideAfter: 1000
					    })
					  };
						showSuccessToast1();
            var options = {
				      title: title,
				      options: {
				        body: msg,
				        icon: '../dashboard/images/idonate_logo.png',
				        lang: 'en-US'
				        //onClick: myFunction
				      }
				    };
				    console.log(options);
				    $("#easyNotify").easyNotify(options);
						setTimeout(function(){
    					window.location.href='../dashboard/index.php';
						},1000);
					}else {
						//$('#error_result').html(data);
            $('#lodrc').html('');
						showDangerToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: title,
					      text: msg,
					      showHideTransition: 'slide',
					      icon: 'error',
					      //loaderBg: '#f2a654',
					      position: 'top-right',
								hideAfter: 10000
					    })
					  };
						showDangerToast1();
					}
				}
			})
    });
//reset
$( "#wizardd" ).submit(function( event ) {
	event.preventDefault();
	$('#lodrc').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>");
	//var form_data = $('#wizardc').serialize();
	var email = document.getElementById('email').value;
	var reset ='reset';
	$.ajax({
		url:"login_action.php",
		method:"POST",
		data: { email:email,reset:reset},
		success:function(data)
		{
			var msg,title;
			if(data == 'success'){
				title = 'Success';
				msg = 'Reset link has been sent to your email';

			} else {
				title = 'Reset Failed';
				msg = 'Internal Server Error: '+data;
			}
			if(data=='success'){
				$('#lodrc').html('');
				$('#reset').prop('disabled', true);
				//show toast
				showSuccessToast1 = function() {
					'use strict';
					resetToastPosition();
					$.toast({
						heading: title,
						text: msg,
						showHideTransition: 'slide',
						icon: 'success',
						loaderBg: '#f96868',
						position: 'top-right',
						hideAfter: 10000
					})
				};
				showSuccessToast1();
			}else {
				//$('#error_result').html(data);
				$('#lodrc').html('');
				showDangerToast1 = function() {
					'use strict';
					resetToastPosition();
					$.toast({
						heading: title,
						text: msg,
						showHideTransition: 'slide',
						icon: 'error',
						//loaderBg: '#f2a654',
						position: 'top-right',
						hideAfter: 10000
					})
				};
				showDangerToast1();
			}
		}
	})
});
//google login

let urls = window.location.href;
function getParameterByName(name, url = urls) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
          if (!results) return null;
          if (!results[2]) return '';
          return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
if(urls.includes('?')){
	if(urls.indexOf('?g_l=') != -1){
		var g_l = getParameterByName('g_l');
		var g_img =getParameterByName('g_img');
		window.history.pushState("", "", './');
		$('#lodr').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>");
		$.ajax({
			url:"login_action.php",
			method:"GET",
			data: { g_l:g_l,g_img:g_img},
			success:function(data)
			{
				var msg,title;
				if(data == 'success'){
					title = 'Login Success';
					msg = 'You will be redirected to your account';

				} else if (data == 'wrongpwd') {
					title = 'Login Failed';
					msg = 'Wrong Password. Please check your password or click on forgot password to reset';
				} else if (data == 'disabled') {
					title = 'Login Failed';
					msg = 'Your account is not active. Check your email address for an activation link';
				} else if (data == 'success1') {
					title = 'Login Failed';
					msg = 'Internal server error. Please reload and try again.';
				} else if (data == 'notfound') {
					title = 'Login Failed';
					msg = 'User does not exist';
				}
				if(data=='success'){
					$('#lodr').html('');
					//show toast
					showSuccessToast1 = function() {
 						'use strict';
						resetToastPosition();
						$.toast({
							heading: title,
							text: msg,
							showHideTransition: 'slide',
							icon: 'success',
							loaderBg: '#f96868',
							position: 'top-right',
							hideAfter: 1000
						})
					};
					showSuccessToast1();
					var options = {
						title: title,
						options: {
							body: msg,
							icon: '../dashboard/images/idonate_logo.png',
							lang: 'en-US'
							//onClick: myFunction
						}
					};
					console.log(options);
					$("#easyNotify").easyNotify(options);
					setTimeout(function(){
						window.location.href='../dashboard/index.php';
					},1000);
				}else {
					//$('#error_result').html(data);
					$('#lodr').html('');
					showDangerToast1 = function() {
						'use strict';
						resetToastPosition();
						$.toast({
							heading: title,
							text: msg,
							showHideTransition: 'slide',
							icon: 'error',
							//loaderBg: '#f2a654',
							position: 'top-right',
							hideAfter: 10000
						})
					};
					showDangerToast1();
				}
			}
		})
	}
}else{
	//alert('No Parameters in URL');
}
//caps lock
$(document).ready(function(){
						$('#email').keypress(function(e) {
							$('#email').rules('add', {

								remote: {
														url: "check_email.php",
														type: "post"
												 }
							}
						);
						form2.validate().settings.ignore = ":disabled,:hidden";
						return form2.valid();
						return true;
						});

						$('#email2').keypress(function(e) {
							$('#email2').rules('add', {

								remote: {
														url: "check_email.php",
														type: "post"
												 }
							}
						);
						form3.validate().settings.ignore = ":disabled,:hidden";
						return form3.valid();
						return true;
						});


				$(window).capslockstate();
        $(window).bind("capsOn", function(event) {
            if ($("#password:focus").length > 0) {
                document.getElementById('divMayus').style.visibility = 'visible';
            }
        });
        $(window).bind("capsOff capsUnknown", function(event) {
            document.getElementById('divMayus').style.visibility = 'hidden';
        });
        $("#txtPassword").bind("focusout", function(event) {
            document.getElementById('divMayus').style.visibility = 'hidden';
        });
        $("#txtPassword").bind("focusin", function(event) {
            if ($(window).capslockstate("state") === true) {
                document.getElementById('divMayus').style.visibility = 'visible';
            }
        });
        });
})
