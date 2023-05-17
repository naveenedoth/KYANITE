

	<style>
	    	body {
			margin:0;
			padding:0;
			font-family: sans-serif;
			background:#243b55;
			}

			.logo
			{
				width:20%;
				cursor: pointer;
				padding-left: 10px;
				padding-top: 0px;

			}
			.col img
			{
				margin-top: -5%;
			}

			nav{
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding-top: 20px;
	padding-left: 2%;
	padding-right: 2%; 
	margin-top: -150px;
}
.logo
{
    width:14%;
    cursor: pointer;
    padding-left: 30px;
    padding-top: 15px;

}
nav{
    display: flex;
    cursor: pointer;
    margin-bottom: 0;
    font-size: 81%;
    justify-content: space-evenly;

}
nav a.link , nav a.btn{
    padding-left: 2%;
}

nav a{
    text-decoration: none;
    color: aliceblue;
    position: relative;
    font-family: 'Josefin Sans', sans-serif;
    font-weight: bold;
	box-sizing: border-box;
}
nav ul{
	margin:12px;
}

nav ul li{
    list-style: none;
    display: inline-block;
    margin: 10px;
    position: relative;
}
nav ul li{
	list-style-type: none;
	display: inline-block;
	padding: 0px  6px;
}
nav ul li a{
	color: aliceblue;
	text-decoration: none;
	font-weight: bold;
	text-transform: uppercase;
}
nav ul li::after{
	content: '';
    height: 3px;
    width: 0;
    background: #03e9f4;
    position: absolute;
    left: 0;
    bottom: -5px;
    transition: 0.5s;
}
nav ul li:hover:after{
	width: 100%;
}
.btn{
	background-color:#00cc5c;
	color: white;
	text-decoration: none;
	border: 2px solid transparent;
	font-weight: bold;
	padding: 10px 25px;
	border-radius: 30px;
	margin-left: 150px;
	transition: transform .4s; 
}
.btn:hover{
	transform: scale(1.2);
}

	    </style>

	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a class="navbar-brand" href="#" style= "color:#34eba8"><?php echo $_SESSION['patient_name']; ?></a>
			<ul>
				<li class="nav-item"><a class="nav-link" href="http://localhost/doctor-appointment/home2.php">HOME</a></li>
				<li class="nav-item"><a class="nav-link" href="http://localhost/doctor-appointment/appointment.php">MY APPOINTMENTS</a></li>
				<li class="nav-item"><a  class="nav-link"href="http://localhost/doctor-appointment/doctor_list/doctorslist.php">DOCTOR'S LIST</a></li>
				<li class="nav-item"><a  class="nav-link" href="http://localhost/doctor-appointment/profile.php">MY PROFILE</a></li>
				<li class="nav-item"><a class="nav-link" href="http://localhost/doctor-appointment/dashboard.php">BOOK APPOINTMENT</a></li>
				<li class="nav-item"><a class="nav-link" href="http://localhost/doctor-appointment/about2.php">ABOUT US</a></li>
			</ul>
			<a href="../logout.php" class="btn">LOG OUT</a>
</nav>