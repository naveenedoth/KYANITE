<?php

//dashboard.php



include('class/Appointment.php');

$object = new Appointment;

include('header.php');

?>

<div class="container-fluid" style="margin-bottom: 70px;">
	<?php
	include('navbar.php');
	?>
	<br />
	<div class="card">
		<div class="card-header"><h4>Doctor Schedule List</h4></div>
			<div class="card-body">
				<div class="table-responsive">
		      		<table class="table table-striped table-bordered" id="appointment_list_table">
		      			<thead>
			      			<tr>
			      				<th>Doctor Name</th>
			      				<th>Education</th>
			      				<th>Speciality</th>
			      				<th>Appointment Date</th>
			      				<th>Appointment Day</th>
			      				<th>Available Time</th>
			      				<th>Action</th>
			      			</tr>
			      		</thead>
			      		<tbody></tbody>
			      	</table>
			    </div>
			</div>
		</div>
	</div>

</div>
<section class="footer" style="width: 100%;
min-height: 100px;
padding: 20px 0px;
margin: 0;
background: rgb(117, 189, 215);
text-align: center;">
        <h2 class="w3-text-light-grey">Contact Us</h2>
        <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right" style="color:aliceblue;"></i><a href="https://www.google.com/maps/place/Ashiana+Hostel/@10.0412654,76.3308882,17z/data=!3m1!4b1!4m5!3m4!1s0x3b080c389f44f971:0xdb21a47aa38ff974!8m2!3d10.0412654!4d76.3330769" target="_blank" style="text-decoration: none; color:aliceblue;">Kochi, Kerala, India</a></p>
        <a><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right" style="color:aliceblue;"></i><a href="tel:9656574265" style="text-decoration: none; color:aliceblue">Phone: +91 9656574265</a></p>
        <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right" style="color:aliceblue;"></i><a href="mailto:fahim2122002@gmail.com" target="_blank" style="text-decoration: none; color:aliceblue">Email: fahim2122002@gmail.com</a></p>
        <a href="https://m.me/muhammed.fahim.5815" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
        <a href="http://www.instagram.com/ansu_fahi_m_02_" target="_blank"><i class="fa fa-instagram"></i></a>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p style="color:alicewhite;">University Road, Vidya Nagar Colony, Thrikkakara, Kalamassery, Kochi, Kerala - 682022</p>
        <p>Copyright &copy; 2022 KYANITE</p>
    </section>
<?php

include('footer.php');

?>

<div id="appointmentModal" class="modal fade">
  	<div class="modal-dialog">
    	<form method="post" id="appointment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Make Appointment</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div id="appointment_detail"></div>
                    <div class="form-group">
                    	<label><b>Reason for Appointment</b></label>
                    	<textarea name="reason_for_appointment" id="reason_for_appointment" class="form-control" required rows="5"></textarea>
                    </div>
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_doctor_id" id="hidden_doctor_id" />
          			<input type="hidden" name="hidden_doctor_schedule_id" id="hidden_doctor_schedule_id" />
          			<input type="hidden" name="action" id="action" value="book_appointment" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Book" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>


<script>

$(document).ready(function(){

	var dataTable = $('#appointment_list_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"action.php",
			type:"POST",
			data:{action:'fetch_schedule'}
		},
		"columnDefs":[
			{
                "targets":[6],				
				"orderable":false,
			},
		],
	});

	$(document).on('click', '.get_appointment', function(){

		var doctor_schedule_id = $(this).data('doctor_schedule_id');
		var doctor_id = $(this).data('doctor_id');

		$.ajax({
			url:"action.php",
			method:"POST",
			data:{action:'make_appointment', doctor_schedule_id:doctor_schedule_id},
			success:function(data)
			{
				$('#appointmentModal').modal('show');
				$('#hidden_doctor_id').val(doctor_id);
				$('#hidden_doctor_schedule_id').val(doctor_schedule_id);
				$('#appointment_detail').html(data);
			}
		});

	});

	$('#appointment_form').parsley();

	$('#appointment_form').on('submit', function(event){

		event.preventDefault();

		if($('#appointment_form').parsley().isValid())
		{

			$.ajax({
				url:"action.php",
				method:"POST",
				data:$(this).serialize(),
				dataType:"json",
				beforeSend:function(){
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					$('#submit_button').val('Book');
					if(data.error != '')
					{
						$('#form_message').html(data.error);
					}
					else
					{	
						window.location.href="appointment.php";
					}
				}
			})

		}

	})

});

</script>