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
			$ev_sql="Select * from events where ID = '".$_GET[ "id"]. "'"; 
			$retval=mysql_query($ev_sql,$conn); 
			$event=mysql_fetch_array($retval, MYSQL_ASSOC);
			$dep_sql="Select Name from departments where ID= '" .$event["Dep_ID"]. "'";
			$dep_res=mysql_query($dep_sql,$conn);
			$dep_row=mysql_fetch_array($dep_res,MYSQL_ASSOC); 
			
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
                        <li>
                            <a href=<?php echo '"profile.php?usn='.$_SESSION["usn"].'"'?>>Profile</a>
                        </li>
                        <li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4" id="user-info">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 id="event-title"><small>&nbsp;Title: </small><br/><?php echo $event["Title"]?></h3>                                                
												<h4 id="event-dep"><small>&nbsp;Department: </small><?php echo $dep_row[ "Name"];?></h4>   
												<h4 id="event-id"><small>&nbsp;ID: </small><?php echo $event[ "ID"];?></h4>												
                                                <h5 id="event-leader"><small>&nbsp;Venue: </small><?php echo $event["Venue"];?></h5>
                                                <h5 id="event-status"><small>&nbsp;Time: </small><?php echo $event[ "Time"];?></h5>
                                                <h5 id="event-mem-count"><small>&nbsp;Date: </small><?php echo $event["Date"];?></h5>
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">												
												<h3 class="text-muted">Description</h3>
												<p>
												<?php
													echo $event["Description"];
												?>
												</p>
											</div>
										</div>
											<hr/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-muted">Tags</h4>
												<h5> <?php echo $event["Tag"];?></h5>
													
                                            </div>
                                        </div>
											<hr/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

</body></html>