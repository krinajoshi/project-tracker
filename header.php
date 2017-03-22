<?php
@session_start();
@ob_start();
include "dbconnect.php";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	 $myusername= $_SESSION['username'];
	 $mypassword=$_SESSION['mypassword'];
    $student_id=$_SESSION['id'];
	
	
 	$_SESSION['loggedin'] = true;
    $_SESSION['username'] = $myusername;
	$_SESSION['password'] = $mypassword;

//echo	 $student_id;

	
	}
	
 else 
{
    echo "Please log in first to see this page.";
 header("Location:adminlogin.php");
}

//$query=mysql_query("select role_of_admin from admin where id='".$student_id."'");
$query=mysql_query("select user_type from users where user_id=(select role_of_admin from admin where id='".$student_id."')");
$find_role=mysql_fetch_array($query);
$role_of_admin=$find_role['user_type'];
//echo "Role of admin:".$role_of_admin;
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Canadian College Of  Business Science & Technology, a fully featured, responsive, HTML5, Bootstrap admin template.">
    
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/Canadian International Education System-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="Canadian College Of  Business Science & Technology Logo" src="img/logo20.png" class="hidden-xs"/>
               CCBST</a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?php echo $myusername;?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="my_profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            
            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
				
				<li><font color="white"><br><?
echo $today = date("Y-m-d H:i:s");
?></font></li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
            		
<li><a class="ajax-link" href="my_view.php"><i
                                    class="glyphicon glyphicon-edit"></i><span>Projects Assigned To Me</span></a></li>
                    
							
                    <?php
					if($role_of_admin=="admin")
					{
						?> 
						
					      <li><a class="ajax-link" href="view_project.php"><i
                                    class="glyphicon glyphicon-edit"></i><span>View All Projects</span></a></li>
                      <li><a class="ajax-link" href="view_task.php"><i class="glyphicon glyphicon-edit"></i><span>View All Tasks</span></a>
                        </li>
						<li><a class="ajax-link" href="add_schedule.php"><i
                                    class="glyphicon glyphicon-edit"></i><span>Add Project</span></a></li>
                
<li><a class="ajax-link" href="add_task.php"><i class="glyphicon glyphicon-edit"></i><span>Add Task</span></a>
                        </li>
                    						<li><a class="ajax-link" href="addadmin.php"><i class="glyphicon glyphicon-edit"></i><span>Add Users</span></a>
                        </li>
                    <li><a class="ajax-link" href="admin.php"><i class="glyphicon glyphicon-edit"></i><span>View All Users</span></a>
                        </li>
                     <li><a class="ajax-link" href="add_type_of_users.php"><i class="glyphicon glyphicon-edit"></i><span>Add Type of User</span></a>
                        </li>
                   <li><a class="ajax-link" href="view_user_types.php"><i class="glyphicon glyphicon-edit"></i><span>View Type of Users</span></a>
                        </li>
                    
						<li><a class="ajax-link" href="add_day_to_day_work.php"><i class="glyphicon glyphicon-edit"></i><span>Update today's work</span></a>                        </li>
										<li><a class="ajax-link" href="add_hourly_work.php"><i class="glyphicon glyphicon-edit"></i><span>Update Hourly work</span></a>                        </li>
										
						<li><a class="ajax-link" href="add_task_manually.php"><i class="glyphicon glyphicon-edit"></i><span>Add Task Assigned To You</span></a>                        </li>   
	
					      <li><a class="ajax-link" href="performance_measurement.php"><i
                                    class="glyphicon glyphicon-edit"></i><span>Performance Measurement</span></a></li>
						<?php
					}
					?>
					<?php
					if($role_of_admin=="employee")
					{
						?> 
						<li><a class="ajax-link" href="add_task_manually.php"><i class="glyphicon glyphicon-edit"></i><span>Add Task Assigned To You</span></a>                        </li>             					
  <li><a class="ajax-link" href="add_day_to_day_work.php"><i class="glyphicon glyphicon-edit"></i><span>Update today's work</span></a>                        </li>                  							<li><a class="ajax-link" href="add_hourly_work.php"><i class="glyphicon glyphicon-edit"></i><span>Update Hourly work</span></a>                        </li>    
		<li><a class="ajax-link" href="add_schedule.php"><i
                                    class="glyphicon glyphicon-edit"></i><span>Add Project</span></a></li>
                
<li><a class="ajax-link" href="add_task.php"><i class="glyphicon glyphicon-edit"></i><span>Add Task</span></a>
                        </li>
  
					<?php
					}
					
					
					if($role_of_admin=="developer")
					{
						?>
<li><a class="ajax-link" href="add_task_manually.php"><i class="glyphicon glyphicon-edit"></i><span>Add Task Assigned To You</span></a>
                        </li>
            
<li><a class="ajax-link" href="add_day_to_day_work.php"><i class="glyphicon glyphicon-edit"></i><span>Update today's work</span></a>
                        </li>    
											<li><a class="ajax-link" href="add_hourly_work.php"><i class="glyphicon glyphicon-edit"></i><span>Update Hourly work</span></a>                        </li>
						<?php
					}?>
					
					
                     <!--   <li><a class="ajax-link" href="form.html"><i
                                    class="glyphicon glyphicon-edit"></i><span> Forms</span></a></li>-->
                        </ul>
                   </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
      
<div class=" row">
<div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
               
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
    