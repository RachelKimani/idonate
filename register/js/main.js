$(function(){
	var form = $("#wizard");
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
	                        url: "check_user.php",
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
                        url: "check_email.php",
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
			}
	});
	form.steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Continue",
            previous: "Back",
            finish: 'Submit',
						current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
					if ( newIndex === 0 ) {
							document.getElementById('cnt').innerHTML="1";
					}
						if ( newIndex === 1 ) {
								document.getElementById('cnt').innerHTML="2";
						}
            if ( newIndex === 2 ) {
								document.getElementById('cnt').innerHTML="3";
                //$('.steps ul li:nth-child(3) a img').attr('src','images/step-3-active.png');
								var name = document.getElementById('firstName').value;
								name +=" ";
								name+=document.getElementById('lastName').value;
								document.getElementById('name1').innerHTML = name;
								document.getElementById('email1').innerHTML =document.getElementById('email').value;
								document.getElementById('phone1').innerHTML =document.getElementById('phone').value;
								document.getElementById('address1').innerHTML =document.getElementById('address').value;
            }
						form.validate().settings.ignore = ":disabled,:hidden";
						return form.valid();
            return true;
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function(){
    	$("#wizard").steps('next');
    })
    $('.backward').click(function(){
        $("#wizard").steps('previous');
    })
    // Click to see password
    $('.password i').click(function(){
        if ( $('.password input').attr('type') === 'password' ) {
            $(this).next().attr('type', 'text');
        } else {
            $('.password input').attr('type', 'password');
        }
    })
		// Count input
    $(".quantity span").on("click", function() {

        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.hasClass('plus')) {
          var newVal = parseFloat(oldValue) + 1;
        } else {
           // Don't allow decrementing below zero
          if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
            } else {
            newVal = 0;
          }
        }
        $button.parent().find("input").val(newVal);
    });
		//process form
		document.body.addEventListener("click", function(e) {
	// e.target was the clicked element
	if(e.target && e.target.nodeName == "A") {
		var tgt = e.target.innerText;
		if(tgt.toLowerCase() == "submit"){
			$('#error_result').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>&nbspProcessing. Please Wait ...");
			var form_data = $('#wizard').serialize();
			$.ajax({
				url:"register_action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					if(data=='success'){
						$('#error_result').html(data);
						//show toast
						showSuccessToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: 'Registration Success',
					      text: 'Check your email for an activation link. Can\'t find it? Check the spam folder<br>Redirecting to login...',
					      showHideTransition: 'slide',
					      icon: 'success',
					      loaderBg: '#f96868',
					      position: 'top-right',
								hideAfter: 5000
					    })
					  };
						showSuccessToast1();
						//Notify
						var options = {
				      title: "Registration Success",
				      options: {
				        body: 'Check your email for an activation link. Can\'t find it? Check the spam folder',
				        icon: '../dashboard/images/idonate_logo.png',
				        lang: 'en-US'
				        //onClick: myFunction
				      }
				    };
				    console.log(options);
				    $("#easyNotify").easyNotify(options);
						setTimeout(function(){
    					window.location.href='../login?rs';
						},5000);
					}else {
						$('#error_result').html(data);
						showDangerToast1 = function() {
					    'use strict';
					    resetToastPosition();
					    $.toast({
					      heading: 'Registration Failed',
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
		}
	}
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
