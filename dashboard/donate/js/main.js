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

					if($('form#wizard > :input[required]:visible').val() != ""){
						document.getElementById('cnt').innerHTML=currentIndex+1;
						$('#hdr').show();
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
		//$('.js-example-basic-single').select2();
		document.body.addEventListener("click", function(e) {
	// e.target was the clicked element
	if(e.target && e.target.nodeName == "A") {
		var tgt = e.target.innerText;
		if(tgt.toLowerCase() == "submit"){
			//form.submit();
			$('#error_result').html("<i class='fa fa-spinner fa-pulse text-right'></i><span class='sr-only'>Loading...</span>&nbspProcessing. Please Wait ...");
			var form_data = $('#wizard').serialize();
			$.ajax({
				url:"submit.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					if(data=='success'){
						$('#error_result').html(data);
						window.parent.closeModal();
					}else {
						$('#error_result').html(data);
					}
				}
			})

		}
	}
});

});
