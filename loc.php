<?php
//login.php

include('database_connection.php');
if(!isset($_SESSION)) {session_start();}
include 'function.php';
if(isset($_SESSION['type']))
{
	echo '<script>window.top.location.href = "index.php";</script>';
} else if(isset($_SESSION['ttype']))
{
	echo '<script>window.top.location.href = "e-users/index.php";</script>';
}

$message = '';

if(isset($_POST["login"]))
{
	$query = "
	SELECT * FROM user_details
		WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'user_email'	=>	$_POST["user_email"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		if($count == 1){
			$result = $statement->fetchAll();
			if (!$result) {
    		echo 'No data found';
			} else {
				foreach($result as $row)
				{
					if($row['user_status'] == 'Active')
					{
						if(password_verify($_POST["user_password"], $row["user_password"]))
						{

							$_SESSION['type'] = $row['user_type'];
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION['user_name'] = $row['user_name'];
							$_SESSION['location'] = $row['user_location'];
							echo '<script>window.top.location.href = "index.php";</script>';
						}
						else
						{
							$message = "<label>Wrong Password</label>";
						}
					}
					else
					{
						$message = "<label>Your account is disabled, Contact Admin</label>";
					}
				}
			}

		} else{
			echo "<label>Your account is disabled, Contact Admin</label>";
		}

	} else if($count==0){
		$query = "
		SELECT * FROM euser_details
			WHERE user_email = :user_email
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
					'user_email'	=>	$_POST["user_email"]
				)
		);
		$count1 = $statement->rowCount();
		if($count1 > 0)
		{
			$result = $statement->fetchAll();
			foreach($result as $row)
			{
				if($row['user_status'] == 'Active')
				{
					if(password_verify($_POST["user_password"], $row["user_password"]))
					{

						$_SESSION['ttype'] = $row['user_type'];
						$_SESSION['tuser_id'] = $row['user_id'];
						$_SESSION['tuser_name'] = $row['user_name'];
	                    $_SESSION['eteam'] =$row['user_team'];
						$_SESSION['department'] = $row['department'];
						$_SESSION['tlocation'] = $row['user_location'];
					echo '<script>window.top.location.href = "e-users/index.php";</script>';
					}
					else
					{
						$message = "<label>Wrong Password</label>";
					}
				}
				else
				{
					$message = "<label>Your account is disabled, Contact Your Line Manager</label>";
				}
			}
		}
		else
		{
			$message = "<label>Email not registered</labe>";
		}
	}
	else
	{
		$message = "<label>Email not registered</labe>";
	}
}

//google login
if(isset($_GET["g_l"])){
	$mail = mysqli_real_escape_string($mysqli, $_GET["g_l"]);
	$query = "
	SELECT * FROM user_details
		WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'user_email'	=>	$mail
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		if($count == 1){
			$result = $statement->fetchAll();
			if (!$result) {
    		echo 'No data found';
			} else {
				foreach($result as $row)
				{
					if($row['user_status'] == 'Active')
					{
							$_SESSION['type'] = $row['user_type'];
							$_SESSION['user_id'] = $row['user_id'];
							$_SESSION['user_name'] = $row['user_name'];
							$_SESSION['location'] = $row['user_location'];
							echo '<script>window.top.location.href = "index.php";</script>';
					}
					else
					{
						echo '<script>window.history.replaceState({}, document.title, "./login.php");</script>';
						$message = "<label>Your account is disabled, Contact Admin</label>";
					}
				}
			}

		} else{
				echo '<script>window.history.replaceState({}, document.title, "./login.php");</script>';
				$message = "<label>Your account is disabled, Contact Admin</label>";
		}

	} else if($count==0){
		$query = "
		SELECT * FROM euser_details
			WHERE user_email = :user_email
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
					'user_email'	=>	$mail
				)
		);
		$count1 = $statement->rowCount();
		if($count1 > 0)
		{
			$result = $statement->fetchAll();
			foreach($result as $row)
			{
				if($row['user_status'] == 'Active')
				{
						$_SESSION['ttype'] = $row['user_type'];
						$_SESSION['tuser_id'] = $row['user_id'];
						$_SESSION['tuser_name'] = $row['user_name'];
	          $_SESSION['eteam'] = $row['user_team'];
						$_SESSION['department'] = $row['department'];
						$_SESSION['tlocation'] = $row['user_location'];
					echo '<script>window.top.location.href = "e-users/index.php";</script>';
				}
				else
				{
					echo '<script>window.history.replaceState({}, document.title, "./login.php");</script>';
					$message = "<label>Your account is disabled, Contact Your Line Manager</label>";
				}
			}
		}
		else
		{
			echo '<script>window.history.replaceState({}, document.title, "./login.php");</script>';
			$message = "<label>Email not registered</label>";
		}
	}
	else
	{
		echo '<script>window.history.replaceState({}, document.title, "./login.php");</script>';
		$message = "<label>Email not registered</label>";
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="714314900380-jbodvc9gjacgg2sjg3g4mane1j7qvkna.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="img/gfav.png" type="image/x-icon">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="toastr.js" type="text/javascript"></script>
	<title>GTECH WMS | Login</title>
	<script>
		function onSignIn(googleUser) {
			// Useful data for your client-side scripts:
			var profile = googleUser.getBasicProfile();
			console.log("Image URL: " + profile.getImageUrl());
			console.log("Email: " + profile.getEmail());
			window.location.href = "login.php?g_l="+profile.getEmail()+"&g_img="+profile.getImageUrl()+"";
			// The ID token you need to pass to your backend:
			var id_token = googleUser.getAuthResponse().id_token;
			console.log("ID Token: " + id_token);
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				console.log('User signed out.');
			});
		}
	</script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
	<style media="screen">
	body {
	  width: 100%;
	  height: 100%;
	  margin: 0;
	}
	/*toast notifications*/
	.toast-title{font-weight:700}.toast-message{-ms-word-wrap:break-word;word-wrap:break-word}.toast-message a,.toast-message label{color:#FFF}.toast-message a:hover{color:#CCC;text-decoration:none}.toast-close-button{position:relative;right:-.3em;top:-.3em;float:right;font-size:20px;font-weight:700;color:#FFF;-webkit-text-shadow:0 1px 0 #fff;text-shadow:0 1px 0 #fff;opacity:.8;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80);filter:alpha(opacity=80);line-height:1}.toast-close-button:focus,.toast-close-button:hover{color:#000;text-decoration:none;cursor:pointer;opacity:.4;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=40);filter:alpha(opacity=40)}.rtl .toast-close-button{left:-.3em;float:left;right:.3em}button.toast-close-button{padding:0;cursor:pointer;background:0 0;border:0;-webkit-appearance:none}.toast-top-center{top:0;right:0;width:100%}.toast-bottom-center{bottom:0;right:0;width:100%}.toast-top-full-width{top:0;right:0;width:100%}.toast-bottom-full-width{bottom:0;right:0;width:100%}.toast-top-left{top:12px;left:12px}.toast-top-right{top:12px;right:12px}.toast-bottom-right{right:12px;bottom:12px}.toast-bottom-left{bottom:12px;left:12px}#toast-container{position:fixed;z-index:999999;pointer-events:none}#toast-container *{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}#toast-container>div{position:relative;pointer-events:auto;overflow:hidden;margin:0 0 6px;padding:15px 15px 15px 50px;width:300px;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;background-position:15px center;background-repeat:no-repeat;-moz-box-shadow:0 0 12px #999;-webkit-box-shadow:0 0 12px #999;box-shadow:0 0 12px #999;color:#FFF;opacity:.8;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=80);filter:alpha(opacity=80)}#toast-container>div.rtl{direction:rtl;padding:15px 50px 15px 15px;background-position:right 15px center}#toast-container>div:hover{-moz-box-shadow:0 0 12px #000;-webkit-box-shadow:0 0 12px #000;box-shadow:0 0 12px #000;opacity:1;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=100);filter:alpha(opacity=100);cursor:pointer}#toast-container>.toast-info{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=)!important}#toast-container>.toast-error{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=)!important}#toast-container>.toast-success{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==)!important}#toast-container>.toast-warning{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=)!important}#toast-container.toast-bottom-center>div,#toast-container.toast-top-center>div{width:300px;margin-left:auto;margin-right:auto}#toast-container.toast-bottom-full-width>div,#toast-container.toast-top-full-width>div{width:96%;margin-left:auto;margin-right:auto}.toast{background-color:#030303}.toast-success{background-color:#51A351}.toast-error{background-color:#BD362F}.toast-info{background-color:#2F96B4}.toast-warning{background-color:#F89406}.toast-progress{position:absolute;left:0;bottom:0;height:4px;background-color:#000;opacity:.4;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=40);filter:alpha(opacity=40)}@media all and (max-width:240px){#toast-container>div{padding:8px 8px 8px 50px;width:11em}#toast-container>div.rtl{padding:8px 50px 8px 8px}#toast-container .toast-close-button{right:-.2em;top:-.2em}#toast-container .rtl .toast-close-button{left:-.2em;right:.2em}}@media all and (min-width:241px) and (max-width:480px){#toast-container>div{padding:8px 8px 8px 50px;width:18em}#toast-container>div.rtl{padding:8px 50px 8px 8px}#toast-container .toast-close-button{right:-.2em;top:-.2em}#toast-container .rtl .toast-close-button{left:-.2em;right:.2em}}@media all and (min-width:481px) and (max-width:768px){#toast-container>div{padding:15px 15px 15px 50px;width:25em}#toast-container>div.rtl{padding:15px 50px 15px 15px}}
	</style>
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="login/assets/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="login/assets/css/styles.css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<section class="container">
			<section class="login-form">
				<form method="post" role="login">
					<?php if($message!=''){ ?>
					<script>
						toastr["error"]("<?php echo $message; ?>");
					</script>
					<?php } ?>
					<img src="img/gfav.png" class="img-responsive" alt="" width="90" height="90" />
					<div class="panel-heading">GTECH WMS Login</div>
					<?php
					if(isset($_SESSION['msg'])){
						echo "<center><p class='label label-danger'>".$_SESSION['msg']."</p></center>";
						unset($_SESSION['msg']);
					}
					?>
					<input type="email"  name="user_email" placeholder="Email" required class="form-control input-lg" />
					<input type="password" name="user_password" placeholder="Password" required class="form-control input-lg" />
					<button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Sign in</button>
					<div>
						<a href="#" id="btnTest">Create account</a> or <a href="#" id="btnrest">reset password</a>
					</div>
					<p style="text-align: center; color: gray;">Or</p>
					<div class="wells">
						<center><div class="g-signin2" data-onsuccess="onSignIn" data-width="240" data-height="50" data-longtitle="true"></div></center>
					</div>
				</form>
				<div class="form-links">
					<a href="#">wms.g-tech.co.ke</a>
				</div>
			</section>
		 <div id="dummyModal" role="dialog" class="modal fade">
			 <div class="modal-dialog">
				 <div class="modal-content">
					 <div class="modal-header">
						 <button type="button" data-dismiss="modal" class="close">&times;</button>
						 <h4 class="modal-title">Error</h4>
					 </div>
					 <div class="modal-body">
						 <h5>Self Registration is disabled. Contact your line manager for assistance</h5>
					 </div>
					 <div class="modal-footer">
						 <button type="button" data-dismiss="modal" class="btn btn-info">OK</button>
					 </div>
				 </div>
			 </div>
		 </div>
		 <div id="resmod" role="dialog" class="modal fade">
			 <div class="modal-dialog">
				 <form method="post" autocomplete="off" id="password_form">
				 <div class="modal-content">
					 <div class="modal-header">
						 <button type="button" data-dismiss="modal" class="close">&times;</button>
						 <h4 class="modal-title">Reset Password</h4>
					 </div>
					 <div class="modal-body">
						 <div class="form-group">
						 		<label>Email</label>
						 		<input type="text" name="email" id="email" class="form-control" required placeholder="Enter your email address"/>
					 		</div>
							<div id="error_result"></div>
					 </div>
					 <div class="modal-footer">
						 <button type="submit" class="btn btn-info" id="btn-pwd">Next</button>
					 </div>
				 </div>
			 	</form>
			 </div>
		 </div>
	</section>


	  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		$('document').ready(function() {
			$('#btnTest').click(function() {
				$('#dummyModal').modal('show');
			});
			$('#btnrest').click(function() {
				$('#resmod').modal('show');
			});
		});


	$(document).on('click','#btn-pwd',function(){

		  $('#error_result').html("<i class='fa fa-spinner fa-pulse'></i><span class='sr-only'>Loading...</span>&nbspProcessing. Please Wait ...");
  	var url = "new_password.php";
    $.ajax({
    type: "POST",
    url: url,
    data: $("#password_form").serialize(),
      success: function(data) {
        if(data!=1)
        {
          $('#password_form')[0].reset();
          $('#btn-pwd').attr('disabled', 'disabled');
          $('#error_result').html(data);
          window.setTimeout(function() {
          	$('#resmod').modal('hide');
          }, 12500);
        }
        else if(data==="1")
        {

          $('#btn-pwd').attr('disabled', false);
          $('#error_result').html('<span style="color: red;">Email not registered. Contact your line manager</span>');

        }
      }
    });
  return false;
});
		</script>
		<style media="screen">
		.modal-backdrop {
	z-index: 1040 !important;
}
.modal {
	z-index: 1100 !important;
}
		</style>
</body>
</html>


<!--<!DOCTYPE html>
<html>
	<head>
		<title>GTECH WMS</title>
		<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
		<script src="js/jquery-1.10.2.min.js"></script>
		<script src="toastr.js" type="text/javascript"></script>
		<style media="screen">
		@media only screen and (min-width: 600px) {
			.container{
				width: 600px !important;
			}
		}
		</style>
	<link rel="icon" href="img/gfav.png" type="image/x-icon">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">GTECH WMS</h2>
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form method="post">
						<?php if($message!=''){ ?>
						<script>
							toastr["error"]("<?php echo $message; ?>");
						</script>
					<?php } ?>
						<div class="form-group">
							<label>User Email</label>
							<input type="text" name="user_email" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="user_password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" value="Login" class="btn btn-info" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
-->
