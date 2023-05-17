<?php

//login.php

include('header.php');

include('class/Appointment.php');

$object = new Appointment;

?>

<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-4">
			<?php
			if(isset($_SESSION["success_message"]))
			{
				echo $_SESSION["success_message"];
				unset($_SESSION["success_message"]);
			}
			?>
			<span id="message"></span>
			<div class="card "  style="margin-top:-40%; background: rgba(0,0,0,.5); color: #fff; border-radius: 20px;">
				<div class="card-header"><h1><center>LOGIN</center></h1></div>
				<div class="card-body">
					<form method="post" id="patient_login_form">
						<div class="form-group">
							<label  style="color: #03e9f4;font-size: 12px;">Email</label>
							<input type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" placeholder="Email Address" style="border-radius: 20px;"/>
						</div>
						<div class="form-group">
							<label style="color: #03e9f4; font-size: 12px;">Password</label>
							<input type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" placeholder="Password" style="border-radius: 20px;" />
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_login" />
							<a href="" ><input type="submit" name="patient_login_button" id="patient_login_button" class="btn btn-primary" value="L O G I N" style=" background: #03e9f4;border:none; font-size:14px;" />
							
							
							</a>
						</div>

						<div class="form-group text-center">
							<p><a href="register.php" style="color: #fff;font-size:14px;">Register</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.form-group {
    margin-bottom: 0; 
}
.form-group a {
	margin-top:10px;
}

.form-group a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.form-group a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.form-group a span {
  position: absolute;
  display: block;
}

.form-group a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}


</style>
<?php

include('footer.php');

?>


<script>

$(document).ready(function(){

	$('#patient_login_form').parsley();

	$('#patient_login_form').on('submit', function(event){

		event.preventDefault();

		if($('#patient_login_form').parsley().isValid())
		{
			$.ajax({

				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function()
				{
					$('#patient_login_button').attr('disabled', 'disabled');
				},
				success:function(data)
				{
					$('#patient_login_button').attr('disabled', false);

					if(data.error != '')
					{
						$('#message').html(data.error);
					}
					else
					{
						window.location.href="dashboard.php";
					}
				}
			});
		}

	});

});



</script>