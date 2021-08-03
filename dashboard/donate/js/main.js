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
					'consent[]': {
                required: true
            },
						'address[]': {
	                required: true
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
                },
								'consent[]': {
                required: "Your consent is required."
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
								//var name = document.getElementById('firstName').value;
								//name +=" ";
								//name+=document.getElementById('lastName').value;
								//document.getElementById('name1').innerHTML = name;
								//document.getElementById('email1').innerHTML = document.getElementById('email').value;
								//document.getElementById('phone1').innerHTML = document.getElementById('phone').value;
								//document.getElementById('address1').innerHTML = document.getElementById('address').value;
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
		$('.js-example-basic-single').select2();

});
