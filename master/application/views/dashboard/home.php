<!-- Begin HTML -->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- Begin Stylesheet -->
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/flat-ui.min.css" type="text/css" rel="stylesheet">
<style>
/* Nav Bar */
/* Reset responsive Bootstrap elements */

#navbar2 .navbar-header {
    float: left;
    margin-left:0.5em;
}

#navbar2 .navbar-toggle {
    display: block;
}

#navbar2 .navbar-nav {
    float: none !important;
    margin: 7.5px -15px;
}

#navbar2 .navbar-nav .open .dropdown-menu {
    position: static;
    float: none;
    background-color: transparent;
    border: 0;
    box-shadow: none;
}

#navbar2 .navbar-nav>li {
    float: none;
}

#navbar2 a {
    font-size: 18px;
}

.companyLogo {
  margin-top:8em;
  margin-left:1.5em;
  margin-bottom:3em;
}

.companyWeb{
  margin-top:6em;
  margin-left:1em;
  margin-bottom:3em;
}

/* Reposition elements affected by the sliding menu */
#wrapper {
    position: relative;
    left: 0;
    z-index:1000;
    transition: left 0.35s ease;
}

#navbar2 .navbar-collapse {
    position: fixed;
    top: 0;
    left: -30%;
    display: block;
    width: 30%;
    height: 100% !important;
    /*max-height: 100%;*/
    margin: 0;
    background-color: #C6C6C6;
    transition: left 0.35s ease;
    padding:1em;
}

#navbar2 .navbar-collapse.collapsing {
    transition: left 0.35s ease;
    padding:1em;
}

#navbar2 .navbar-collapse.in {
    left: 0;
    padding:1em;
}

body.menu-slider.in {
    overflow: hidden;
}

body.menu-slider #wrapper {
    transition: left 0.35s ease;
}

body.menu-slider.in #wrapper {
    left: 30%;
}
</style>

<title>Admin</title>
<!-- Begin Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/flat-ui.min.js"></script>

   
<!-- Nav Side Bar -->
<div class="container">
 <div class="jumbotron">
    <section id="topbar">
    <div class="row">
       <div class="col-sm-2" id="logo">
       		<img src="images/logo/display.jpg" id="logo" onerror="this.style.display='none'">
       </div>
       <div class="col-sm-6">
           <div id="navi">
           	&nbsp;
           </div>
       </div>
       <div class="col-sm-4" id="profile">
       <div id="text">
       &nbsp;
        <p align="right">
        Welcome<br>
        Master
        </p>
       </div>
       </div>
    </div>    
 </section>
  <div id="wrapper">
 <nav id="navbar2" class="navbar navbar-default" role="navigation">
		      <div class="container-fluid">
		        <!-- Brand and toggle get grouped for better mobile display -->
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		        </div>
		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
		          <div class="companyLogo" id="logo2">
		          	<img src="images/logo/display.jpg" onerror="this.style.display='none'">
		          </div>
		          <div id="navi" style="display:block;">
            		<ul class="navigation">
                        <li class=""><a class="dashboard" href="#">Dashboard</i></a></li>
                        <li class=""><a class="newCompany" href="#">New Company</i></a></li>
                        <li class=""><a class="viewUsers" href="#">View Company Users</i></a></li>
                        <li class=""><a class="editLogin" href="#">Edit Login</i></a></li>
             	 	</ul>
          	 </div>
          	 <div class="companyWeb">
		        <hr>
		        <p>Master Dashboard</p>
		     </div>
		      </div><!-- /.navbar-collapse -->
		     </div><!-- /.container-fluid -->
		   </nav>
		</div>
		</div>
 <hr id="division">
<!-- Start Index -->
<section id="content">
<?php 
	
	if (!empty($_GET['admin'])) 
	{
		$admin = $_GET['admin'];
	}
	
	include('class/company.php');
	include('db.php');
	
    $db = new database;
    $mysql = new mysqli ($db->getServer(), $db->getUsername(), $db->getPassword());
    
	if (empty ($admin) )
	{	
		echo "
		
		<script>
		$(function(){
			$('#content').load('dashboard.php');
		});
		</script>
		
		";
			
	}elseif ( !empty ($admin) )
	{
		
		if ( $admin == '1')
		{
			//New Company Form
			if(!@$_SESSION["login_username"])
			header("location: login_admin.php");
			
			header("location: new_company.php");
						
		}elseif ( $admin == '99')
		{
			if ( $_POST )
      		{
      			$newComp = new company ($_POST['firstname'], $_POST['lastname'], $_POST['phonenumber'], $_POST['company_name'], $_POST['company_password'], $_POST['company_username'], $_POST['email'], $_POST['url']);
				
      			
      			if($mysql->select_db('gethasse_' . $newComp->getURL()))
      			{
      				echo 'A same company name is already registered!';
      			}
				
				$flag =0;
				$error = 0;
				
				$newComp->makeDB();
				$newComp->assignDatabase();
				$newComp->makeSubDomain();
      			
      			$mysql->select_db('gethasse_' . $newComp->getURL());
      			
      			$query = $newComp->buildUsersTable();
      			
      			if( !$mysql->query($query) )
      			{
      					echo "Build User Table Failed! " . $mysql->error;
      			}else
				{
					$flag++;
				}
				
				$query = $newComp->buildClientsTable();
      			
      			if( !$mysql->query($query) )
      			{
      					echo "Build Clients Table Failed! " . $mysql->error;
      			}else
				{
					$flag++;
				}
				
				$query = $newComp->buildClientsCompany();
				
				if( !$mysql->query($query) )
      			{
      					echo "Build Clients Table Failed! " . $mysql->error;
      			}else
				{
					$flag++;
				}
				
				$query = $newComp->buildProjectsTable();
      			
      			if( !$mysql->query($query) )
      			{
      					echo "Build Clients Table Failed! " . $mysql->error;
      			}else
				{
					$flag++;
				}

      			
      			$password_unhashed = $_POST['company_password'];
      			//Encrypt Password
				$password = password_hash($password_unhashed, PASSWORD_BCRYPT);
      			
      			$newComp->setTier('1');
      			$newComp->setPassword($password);
      			
      			$mysql->select_db("gethasse_users_all");
      			
				$query = $newComp->addUsersOne();
				if( !$mysql->query($query) )
      			{
      					echo "Build User Global_ONE Failed! " . $mysql->error;
      			}else
				{
					$flag++;
				}
				
      			$query = $newComp->addUsersGlobal();
      			if( !$mysql->query($query) )
      			{
      					echo "Build User Global Failed! ". $mysql->error;
      			}else
				{
					$flag++;
				}
				
				$query = $newComp->addCompany();
      			if( !$mysql->query($query) )
      			{
      					echo "Build Company Global Failed! ". $mysql->error;
      			}else
				{
					$flag++;
				}
				
      			$mysql->select_db('gethasse_' . $newComp->getURL());
				
      			$query = $newComp->addUsers();
      			
      			if( !$mysql->query($query) )
      			{
      					echo "Build User Failed! ". $mysql->error;
      			}else
				{
					$flag++;
				}
				
				if($flag == 8)
				{
					echo 'Success!';
				}else
				{
					echo 'Build Company Failed!';
				}
				
				
				$newComp->copyFiles('template_company','../' . $newComp->getURL());	
      		}
		}elseif ( $admin == '89')
		{
			if($_POST)
			{
				$old_pass = $_POST['old_password'];
				$user = $_POST['username'];
				$pass = $_POST['password'];
				$email = $_POST['email'];
				
				$mysql = new database;
				$conn = new mysqli($mysql->getServer(), $mysql->getUsername(), $mysql->getPassword(), 'gethasse_users_all');
				
				$fetch =$conn->query("SELECT password FROM users WHERE username = '$username';");
				$r = $fetch->fetch_assoc ();
				$salt = $r ['password'];
				
				if ( password_verify($old_pass,$salt) )
				{		
						$query = "UPDATE users_top_lvl SET username = '$user', password = '$password_new', email = '$email' WHERE username = '$username'";
						
						if (!$conn->query($query))
						{
							echo "Edit Error";
						}
						
				}else
				{
					echo "Wrong Password";
				}
			}elseif ( $admin == '199')
			{
				if ( $_POST )
				{
					$newComp = new company ($_POST['firstname'], $_POST['lastname'], $_POST['phonenumber'], $_POST['company_name'], $_POST['company_password'], $_POST['company_username'], $_POST['email'], "NULL");
					
					if($mysql->select_db('gethasse_' . $newComp->getURL()))
					{
						echo 'A same company name is already registered!';
					}
					
					$flag =0;
					$error = 0;
					$newComp->setOldName($_SESSION['compName']);	
					
					//Password Encrpytion
					$password_unhashed = $_POST['company_password'];
					$password = password_hash($password_unhashed, PASSWORD_BCRYPT);
					
					//Set Base Parameters
					$newComp->setTier('1');
					$newComp->setPassword($password);
					
					//Connect To Universal Database
					$mysql->select_db("gethasse_users_all");
					
					
					$query = $newComp->editUsersOne();
					if( !$mysql->query($query) )
					{
							echo "alter User Global_ONE Failed! " . $mysql->error;
					}else
					{
						$flag++;
					}
					
					$query = $newComp->editUsersGlobal();
					if( !$mysql->query($query) )
					{
							echo "alter User Global Failed! ". $mysql->error;
					}else
					{
						$flag++;
					}
					
					$query = $newComp->editCompany();
					if( !$mysql->query($query) )
					{
							echo "alter Company Global Failed! ". $mysql->error;
					}else
					{
						$flag++;
					}
					
					//Edit Master User From Company's Database
					$mysql->select_db('gethasse_' . $newComp->getURL());
					
					$query = $newComp->editUsers();
					
					if( !$mysql->query($query) )
					{
							echo "alter User Failed! ". $mysql->error;
					}else
					{
						$flag++;
					}
					
					if($flag == 4)
					{
						echo 'Success!';
					}else
					{
						echo 'alter Company Failed!';
					}
				}
			}
		}
	}
?>
</section>

<!-- Footer -->
<div class="jumbotron">
    <div id = "footer" class = "bigFooter">
	    <a class="admin_link" href="logout.php">Logout Admin</a>
    </div>
</div>
</div>
<!-- Scripts -->
		<script>
			 $('.navigation').on('click', 'li', function(){
    				$('.navigation li').removeClass('active');
    				$(this).addClass('active');
			});
			
			function retract ()
			{
				$('body').removeClass('menu-slider');
				$('#bs-example-navbar-collapse-2').removeClass('in');					   
			}
			
			function editCompany (companyName)
			{
				$("#content").load('edit_company.php?id=' + encodeURI(companyName));
			}
			
			function deleteCompany (companyName)
			{
				$("#content").load('delete_company.php?id=' + encodeURI(companyName));
			}
			
			$(document).ready(function(){
				$('.dashboard').click(function(){
        			$('#content').load('dashboard.php');
					retract ();
    			});
				$('.newCompany').click(function(){
        			$('#content').load('new_company.php');
    				retract ();
				});
				$('.viewUsers').click(function(){
        			$('#content').load('all_users.php');
					retract ();
    			});
				$('.editLogin').click(function(){
        			$('#content').load('edit_user.php');
					retract ();
    			});
			});
			
			
			$('#bs-example-navbar-collapse-2')
			        .on('show.bs.collapse', function (e) {
			            $('body').addClass('menu-slider');
			        })
			        .on('shown.bs.collapse', function (e) {
			            $('body').addClass('in');
			        })
			        .on('hide.bs.collapse', function (e) {
			            $('body').removeClass('menu-slider');
			        })
			        .on('hidden.bs.collapse', function (e) {
			            $('body').removeClass('in');
			       });
		</script>

</body>
</html>