/*jslint browser: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
/*global $, console, alert, FormData, FileReader*/


function noPreview() {
  //$('#image-preview-div').css("display", "none");
  //$('#preview-img').attr('src', 'noimage');
  $('upload-button').attr('disabled', '');
}

function selectImage(e) {
  $('#file').css("color", "green");
  $('#image-preview-div').css("display", "block");
  $('#preview-img').attr('src', e.target.result);
  $('#imageprev').attr('src', e.target.result);
  $('#preview-img').css('max-width', '550px');
}

$(document).ready(function (e) {

  var maxsize = 1500 * 1024; // 500 KB

  $('#max-size').html((maxsize/1024).toFixed(2));

  $('#upload-image-form').on('submit', function(e) {

    e.preventDefault();

    $('#message').empty();
    $('#loading').show();

    $.ajax({
      url: "upload-image.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        $('#loading').hide();
        $('#message').html(data);
      }
    });

  });
  $('#chpwd').on('submit', function(e) {

    e.preventDefault();

    //$('#message').empty();
    //$('#loading').show();

    $.ajax({
      url: "upload-image.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        if(data=='true'){
          $('#chpwd')[0].reset();
          $('#message3').html('<div class="alert alert-success" role="alert">Password successfully changed. Changes will reflect during next login.</div>');
        }  else {
            $('#message3').html('<div class="alert alert-danger" role="alert">Password reset failed. Please try again</div>');
        }
        //$('#loading').hide();
        //$('#message').html(data);
      }
    });

  });

  $('#acInfo').on('submit', function(e) {

    e.preventDefault();

    $.ajax({
      url: "upload-image.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        if(data=='true'){
          $('#message2').html('<div class="alert alert-success" role="alert">Profile info updated successfully.</div>');
        }  else {
            $('#message2').html('<div class="alert alert-danger" role="alert">Update failed. Please try again</div>');
        }
      }
    });

  });

  $('#bloodGroup').on('submit', function(e) {

    e.preventDefault();

    $.ajax({
      url: "upload-image.php",
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data)
      {
        if(data=='true'){
          $('#message4').html('<div class="alert alert-success" role="alert">Medical Info info updated successfully.</div>');
        }  else {
            $('#message4').html('<div class="alert alert-danger" role="alert">Update failed. Please try again</div>');
        }
      }
    });

  });

  $('#file').change(function() {

    $('#message').empty();

    var file = this.files[0];
    var match = ["image/jpeg", "image/png", "image/jpg", "image/gif", "image/webp", "image/tiff", "image/apng","image/avif","image/svg+xml"];

    if ( !( (file.type == match[0]) || (file.type == match[1]) || (file.type == match[2]) ) )
    {
      noPreview();

      $('#message').html('<div class="alert alert-warning" role="alert">Invalid image format. Only images accepted.</div>');

      return false;
    }

    if ( file.size > maxsize )
    {
      noPreview();

      $('#message').html('<div class=\"alert alert-danger\" role=\"alert\">The size of image you are attempting to upload is ' + (file.size/1024).toFixed(2) + ' KB, maximum size allowed is ' + (maxsize/1024).toFixed(2) + ' KB</div>');

      return false;
    }

    $('#upload-button').removeAttr("disabled");

    var reader = new FileReader();
    reader.onload = selectImage;
    reader.readAsDataURL(this.files[0]);

  });



  var form = $("#chpwd");
  var form1 = $("#acInfo");
	form.validate({
			errorPlacement: function errorPlacement(error, element) {
					 element.before(error);
			},
			rules: {
					pwd : {
						required: true,
						minlength : 8
					},
					cpwd : {
						minlength : 8,
						equalTo : "#pwd"
					},
					currPwd :{
            minlength : 8,
						required: true,
						remote: {
                        url: "check_pwd.php",
                        type: "post",
                        data: {
                          uid: function() {
                            return $( "#uid" ).val();
                          }
                        }
                     }
					}
			},
			//custom messages for db validation
			messages: {
                currPwd: {
                    remote: "The current password entered is incorrect!"
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
  form1.validate({
			errorPlacement: function errorPlacement(error, element) {
					 element.before(error);
			},
			rules: {
					phone: {
            minlength : 10,
            required:true
          },
          dob: {
            required:true
          }
				/*	username :{
						required: true,
						remote: {
                        url: "check_uname.php",
                        type: "post",
                        data: {
                          uid: function() {
                            return $("#uid2").val();
                          }
                        }
                     }
					}*/
			},
			//custom messages for db validation
			messages: {
                currPwd: {
                    remote: "The current password entered is incorrect!"
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


  form.find('input').blur(function() {
    if(form.valid())
     {
         $("#changePwd").prop('disabled', false);
     } else {
        $("#changePwd").prop('disabled', 'disabled');
     }
 });

 form.mouseover(function(){
   if(form.valid())
    {
        $("#changePwd").prop('disabled', false);
    } else {
       $("#changePwd").prop('disabled', 'disabled');
    }
});

form1.find('input').blur(function() {
  if(form1.valid())
   {
       $("#submitInfo").prop('disabled', false);
   } else {
      $("#submitInfo").prop('disabled', 'disabled');
   }
});

form1.mouseover(function(){
 if(form1.valid())
  {
      $("#submitInfo").prop('disabled', false);
  } else {
     $("#submitInfo").prop('disabled', 'disabled');
  }
});


});
