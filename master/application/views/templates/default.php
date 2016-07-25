<!DOCTYPE html>
<html>
<head>
	

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Hassee | <?php echo $title ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">


	<style>
		.sidenav {
		    height: 100%; /* 100% Full-height */
		    width: 0; /* 0 width - change this with JavaScript */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Stay on top */
		    top: 0;
		    left: 0;
		    background-color: #111; /* Black*/
		    overflow-x: hidden; /* Disable horizontal scroll */
		    padding-top: 60px; /* Place content 60px from the top */
		    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
		}

		/* The navigation menu links */
		.sidenav a {
		    padding: 8px 8px 8px 32px;
		    text-decoration: none;
		    font-size: 25px;
		    color: #818181;
		    display: block;
		    transition: 0.3s
		}

		/* When you mouse over the navigation links, change their color */
		.sidenav a:hover, .offcanvas a:focus{
		    color: #f1f1f1;
		}

		/* Position and style the close button (top right corner) */
		.closebtn {
		    position: absolute;
		    top: 0;
		    right: 25px;
		    font-size: 36px !important;
		    margin-left: 50px;
		}

		/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
		#main {
		    transition: margin-left .5s;
		    padding: 0px;
		}

		/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
		@media screen and (max-height: 450px) {
		    .sidenav {padding-top: 15px;}
		    .sidenav a {font-size: 18px;}
		}

		#menu-button{
			
			background-color: transparent;
			border : 1px solid #CCC;
			border-radius: 5px;


		}

		#background-btn{

			padding-top: 25px;
		}



	</style>

</head>
<body>

	
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="<?php echo base_url('/main/logout') ?>">Logout</a>
</div>

<!-- Use any element to open the sidenav -->

<div class="container-fluid">
<div id="main">
	
		<header class="row">
			<div id="background-btn" class="col-xs-4">
				<button id="menu-button" onclick="openNav()"><img src="<?php echo base_url() ?>assets/menu.png" width="30" alt="">
				</button>
			</div>
			<div class="col-xs-4"></div>
			<div class="col-xs-4">
				<h2 class="pull-right">LOGO</h2>
			</div>
		</header>
		<hr>

		<?php echo $body ?>
		
	</div>

</div>
	<script>
	/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
	function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";
	    document.getElementById("main").style.marginLeft = "250px";
	    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
	function closeNav() {
	    document.getElementById("mySidenav").style.width = "0";
	    document.getElementById("main").style.marginLeft = "0";
	    document.body.style.backgroundColor = "white";
	}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
</body>
</html>