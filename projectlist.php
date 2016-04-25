<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
        
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		
        <link href="Nav_styles.css" rel="stylesheet" type="text/css">
        <?php 
			session_start(); 
			define( "USERDB", "ecelldb"); 
			$dbhost='localhost';
			$dbuser='sood' ;
			$dbpass='1234' ;
			$conn=mysql_connect($dbhost,$dbuser,$dbpass);
			if(! $conn ) { die( 'Could not connect: ' . mysql_error()); }
			$db=mysql_select_db( USERDB );
			if(!$db) { die( 'Could not connect: ' . mysql_error()); }
			
			$pr_sql="Select * from projects"; 
			$retval=mysql_query($pr_sql,$conn); 
			
			?>
    </head><body>
        <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"><img height="20" alt="Brand" src="ECell Logo White.png" class="center-block"></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right" id="nav-menu">
                        <li class="">
                            <a href="home.php">Home</a>
                        </li>
                        <li >
                            <a href=<?php echo '"profile.php?usn='.$_SESSION["usn"].'"'?>>Profile</a>
                        </li>
                        <li class="active">
                            <a href="projectlist.php">Projects</a>
                        </li>
                        <li class="dropdown" id="nav-deps">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Departments<br><i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php 
									$s = "Select * from Departments";
									$r = mysql_query($s,$conn);
									while($row = mysql_fetch_array($r, MYSQL_ASSOC))
									{
										echo '<li><a href="department.php?id='.$row["ID"].'">'.$row["Name"].'</a></li>';
									}
	
								
								?>
								
                            </ul>
                        </li>
                        <li>
                            <a href="eventlist.php">Events</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
			<br/><br/>
                <div class="row">
				  <div class="col-md-12">
					<h1>All Projects</h1>
					<hr>
				  </div>
				</div>
				<div class="row list">
				  <div class="row text-center">
					<div class="col-md-1 text-center">
					  <h4 class="text-muted">ID</h4>
					</div>
					<div class="col-md-3 text-center">
					  <h4 class="text-muted">Title</h4>
					</div>
					<div class="col-md-4">
					  <h4 class="text-muted">Description</h4>
					</div>
					<div class="col-md-2">
					  <h4 class="text-muted">Department</h4>
					</div>
					<div class="col-md-1">
					  <h4 class="text-muted">Leader</h4>
					</div>
					<div class="col-md-1">
					  <h4 class="text-muted">Status</h4>
					</div>
				  </div>
				  <div class="row" id="project-list">
					<div class="col-md-12">
					  <ul class="list-group">
					   <?php
					   while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
					   {
						   $d1 = "Select Name from Departments where ID = '".$row["Dep_ID"]."'";
						   $d2 = mysql_query($d1,$conn);
						   $dep = mysql_fetch_array($d2,MYSQL_ASSOC)["Name"];
						   
						   $m1 = "Select F_Name, L_Name from Members Where USN = '".$row["Leader_USN"]."'";
						   $m2 = mysql_query($m1,$conn);
						   $m3 = mysql_fetch_array($m2,MYSQL_ASSOC);
						   $mname = $m3["F_Name"]." ".$m3["L_Name"];
					   echo ('
					    
						<li class="list-group-item">
						<a href="project_profile.php?id='.$row["ID"].'">
						  <div class="row">
							<div class="col-md-1 text-center">
							  <h4>'.$row["ID"].'</h4>
							</div>
							<div class="col-md-3 text-left">
							  <h4>'.$row["Title"].'</h4>
							</div>
							<div class="col-md-4 text-left">
							  <h5>'.$row["Description"].'</h5>
							</div>
							</a>
							<a href="department.php?id='.$row["Dep_ID"].'">
							<div class="col-md-2 text-left">
							  <p>'.$dep.'</p>
							</div>
							</a>
							<a href="profile.php?usn='.$row["Leader_USN"].'">
							<div class="col-md-1 text-left">
							  <h5>'.$mname.'</h5>
							</div>
							</a>
							<div class="col-md-1 text-center">
							  <h4>'.$row["Status"].'</h4>
							</div>
						  </div>
						</li>
						
					   ');}?>
					  </ul>
					</div>
				  </div>
				</div>
            </div>
        </div>
    

</body></html>