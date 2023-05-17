<?php

//login.php

include('header.php');

?>

<div class="container">
	<div class="row justify-content-md-center">
		<div class="col col-md-6">
			<span id="message"></span>
			<div class="card" style="margin-top:-40%; background: rgba(0,0,0,.5); color: #fff; border-radius: 20px;">
				<div class="card-header"><h1><center>REGISTER</center></h1></div>
				<div class="card-body">
					<form method="post" id="patient_register_form">
						<div class="form-group">
							<label style="color: #03e9f4;font-size: 12px;">Email<span class="text-danger">*</span></label>
							<input style="border-radius: 20px;" type="text" name="patient_email_address" id="patient_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" />
						</div>
						<div class="form-group">
							<label style="color: #03e9f4;font-size: 12px;">Password<span class="text-danger">*</span></label>
							<input style="border-radius: 20px;" type="password" name="patient_password" id="patient_password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color: #03e9f4;font-size: 12px;">First Name<span class="text-danger">*</span></label>
									<input style="border-radius: 20px;" type="text" name="patient_first_name" id="patient_first_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label style="color: #03e9f4;font-size: 12px;">Last Name<span class="text-danger">*</span></label>
									<input style="border-radius: 20px;" type="text" name="patient_last_name" id="patient_last_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color: #03e9f4;font-size: 12px;">Date of Birth<span class="text-danger">*</span></label>
									<input style="border-radius: 20px;" type="text" name="patient_date_of_birth" id="patient_date_of_birth" class="form-control" required  data-parsley-trigger="keyup" readonly />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label style="color: #03e9f4;font-size: 12px;">Gender<span class="text-danger">*</span></label>
									<select style="border-radius: 20px;" name="patient_gender" id="patient_gender" class="form-control">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label style="color: #03e9f4;font-size: 12px;">Contact No.<span class="text-danger">*</span></label>
									<input style="border-radius: 20px;" type="text" name="patient_phone_no" id="patient_phone_no" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
						<div class="form-group">
							<label style="color: #03e9f4;font-size: 12px;">Place<span class="text-danger">*</span></label>
							<input style="border-radius: 20px;" name="patient_address" id="patient_address" class="form-control" required data-parsley-trigger="keyup">
						</div>
						</div>
							
						</div>
						
						<div class="form-group text-center">
							<input type="hidden" name="action" value="patient_register" />
							<a href=""><input type="submit" name="patient_register_button" id="patient_register_button" class="btn btn-primary" value="R E G I S T E R" style=" background: #03e9f4;font-size:14px; border:none; "/></a>
						</div>

						<div class="form-group text-center">
							<p><a href="login.php"  style="color: #fff;font-size:14px;">Login</a></p>
						</div>
					</form>
				</div>
			</div>
			<br />
			<br />
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

	$('#patient_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

	$('#patient_register_form').parsley();

	$('#patient_register_form').on('submit', function(event){

		event.preventDefault();

		if($('#patient_register_form').parsley().isValid())
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:'json',
				beforeSend:function(){
					$('#patient_register_button').attr('disabled', 'disabled');
				},
				success:function(data)
				{
					$('#patient_register_button').attr('disabled', false);
					$('#patient_register_form')[0].reset();
					if(data.error !== '')
					{
						$('#message').html(data.error);
					}
					if(data.success != '')
					{
						$('#message').html(data.success);
					}
				}
			});
		}

	});

});

</script>