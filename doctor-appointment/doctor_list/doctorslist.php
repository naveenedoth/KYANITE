<?php

//dashboard.php



include('../class/Appointment.php');

$object = new Appointment;

include('header.php');

?>
                    <?php include('navbar.php'); ?>
                    <!-- DataTales Example -->
                    <span id="message"></span>
                    <div class="card shadow mb-4" style="margin: 20px 15px">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                            		<h6 class="m-0 font-weight-bold text-danger">Doctor List</h6>
                            	</div>
                            </div>
                        </div>
                        <div class="card-body" >
                            <div class="table-responsive">
                                <table class="table table-bordered" id="doctor_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Doctor Name</th>
                                            <th>Doctor Degree</th>
                                            <th>Doctor Phone No.</th>
                                            <th>Doctor Speciality</th>
                                            <th>Email Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $object->query = "
                                        SELECT * FROM doctor_table
                                        ";
                                        $result = $object->get_result();
                                        foreach($result as $row)
                                        {
                                            echo '
                                            <tr>
                                                <td><img src="'.$row["doctor_profile_image"].'" width=150 height=150></td>
                                                <td>'.$row["doctor_name"].'</td>
                                                <td>'.$row["doctor_degree"].'</td>
                                                <td>'.$row["doctor_phone_no"].'</td>
                                                <td>'.$row["doctor_expert_in"].'</td>
                                                <td>'.$row["doctor_email_address"].'</td>
                                                <td>'.$row["doctor_status"].'</td>
                                            </tr>
                                            ';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <section class="footer" style="width: 100%;
                    min-height: 100px;
                    padding: 20px 0px;
                    margin-top: 70px;
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
</body>
</html>

