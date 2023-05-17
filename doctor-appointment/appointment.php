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
		<span id="message"></span>
		<div class="card-header"><h4>My Appointment List</h4></div>
			<div class="card-body">
				<div class="table-responsive">
		      		<table class="table table-striped table-bordered" id="appointment_list_table">
		      			<thead>
			      			<tr>
			      				<th>Appointment No.</th>
			      				<th>Doctor Name</th>
			      				<th>Appointment Date</th>
			      				<th>Appointment Time</th>
			      				<th>Appointment Day</th>
			      				<th>Appointment Status</th>
			      				<th>Download</th>
			      				<th>Cancel</th>
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


<script>

$(document).ready(function(){

	var dataTable = $('#appointment_list_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"action.php",
			type:"POST",
			data:{action:'fetch_appointment'}
		},
		"columnDefs":[
			{
                "targets":[6, 7],				
				"orderable":false,
			},
		],
	});

	$(document).on('click', '.cancel_appointment', function(){
		var appointment_id = $(this).data('id');
		if(confirm("Are you sure you want to cancel this appointment?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{appointment_id:appointment_id, action:'cancel_appointment'},
				success:function(data)
				{
					$('#message').html(data);
					dataTable.ajax.reload();
					setTimeout(function(){
                        $('#message').html('');
                    }, 5000);
				}
			})
		}
	});
	

});

</script>