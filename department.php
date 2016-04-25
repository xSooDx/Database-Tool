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
			
			$dep_sql="Select * from departments where ID = '".$_GET[ "id"]. "'"; 
			$retval=mysql_query($dep_sql,$conn); 
			$department=mysql_fetch_array($retval, MYSQL_ASSOC);			
			
			$mem_count_sql = "SELECT COUNT(*) \"count\" from members WHERE department = '".$department[ "ID"]."'";
			$mem_count_res = mysql_query($mem_count_sql,$conn);
			$mem_count = mysql_fetch_array($mem_count_res,MYSQL_ASSOC)["count"];
			$mems_sql = "SELECT USN,F_Name,L_Name from Members where Department = '".$department["ID"]."' Order By USN";
			$mems_res = mysql_query($mems_sql,$conn);
			
			$prj_count_sql = "SELECT COUNT(*) \"count\" from projects WHERE Dep_ID = '".$department[ "ID"]."'";
			$prj_count_res = mysql_query($prj_count_sql,$conn);
			$prj_count = mysql_fetch_array($prj_count_res,MYSQL_ASSOC)["count"];
			
			$prjs_sql = "SELECT * from Projects where Dep_ID = '".$department["ID"]."'";
			$prjs_res = mysql_query($prjs_sql,$conn);
			
			$evs_sql = "SELECT * from Events where Dep_ID = '".$department["ID"]."'";
			$evs_res = mysql_query($evs_sql,$conn);
			
			$heads_sql = "SELECT  USN,F_Name,L_Name from Members where USN in(SELECT USN from Heads Where Dep_ID= '".$department["ID"]."')";
			$heads_res = mysql_query($heads_sql,$conn);
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
                                                <h2 id="dep-name"><?php echo $department["Name"]?></h2>                                                
												<h3 id="dep-id"><small>&nbsp;ID: </small><?php echo $department[ "ID"];?></h3>
                                                <h4 id="dep-mem-count"><small>&nbsp;No. of Members: </small><?php echo $mem_count;?></h4>
                                                <h4 id="dep-project-count"><small>&nbsp;No. of Projects: </small><?php echo $prj_count;?></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-muted" id="user-name">Members</h3>
												    <div class="row">
													  <div class="col-md-4 text-center">
														<h4 class="text-muted">USN</h4>
													  </div>
													  <div class="col-md-8 text-center">
														<h4 class="text-muted">Name</h4>
													  </div>													
													</div>
													<ul class="list-group">	
													<?php
														while($mem = mysql_fetch_array($mems_res, MYSQL_ASSOC))
														{
															
															echo ('
															<a href="profile.php?usn='.$mem["USN"].'">
															<li class="list-group-item">
																<div class="row">
																  <div class="col-md-4 text-center">
																	<h5>'.$mem["USN"].'</h5>
																  </div>
																  <div class="col-md-8 ">
																	<h5>'.$mem["F_Name"].' '.$mem["L_Name"].'</h5>
																  </div>
																</div>
															</li>
															</a>
															');
														}
													?>													
													</ul>
                                            </div>
                                        </div>
										<hr/>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">												
												<h3 class="text-muted">Description</h3>
												<p>
												<?php
													echo $department["Description"];
												?>
												</p>	
													<hr/>
													<h3 class="text-muted">Heads</h3>
													<div class="row">
														<ul class="list-inline">
								
														<?php
															while($h = mysql_fetch_array($heads_res, MYSQL_ASSOC))
															{
																echo ('<li><a href="profile.php?usn='.$h["USN"].'"><h4>'.$h["F_Name"].' '.$h["L_Name"].' <small>&nbsp;'.$h["USN"].' </small></h4></a></li>');														
																
															}
														  														  
														  ?>
														</ul>
														
															
														
													</div>
												
											</div>
										</div>
											<hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-muted">Projects</h2>
													<div class="row">
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">ID</h4>
													  </div>
													  <div class="col-md-5 text-center">
														<h4 class="text-muted">Title</h4>
													  </div>
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">Status</h4>
													  </div>
													</div>
													<ul class="list-group">
													  <?php														
														
														while($pr = mysql_fetch_array($prjs_res, MYSQL_ASSOC))
														{															
															echo ('
															<a href="project_profile.php?id='.$pr["ID"].'">
															<li class="list-group-item">
																<div class="row">
																  <div class="col-md-2 text-center">
																	<h4>'.$pr["ID"].'</h4>
																  </div>
																  <div class="col-md-7 ">
																	<h4>'.$pr["Title"].'</h4>
																  </div>
																  <div class="col-md-2 text-center">
																	<h4>'.$pr["Status"].'</h4>
																  </div>
																  <div class="col-md-1 ">
																	<i class="fa fa-3x fa-angle-right fa-fw pull-left"></i>
																  </div>
																</div>
															</li></a>
															');
														}
													  ?>
													  
													</ul>
                                            </div>
                                        </div>
										<hr/>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-muted">Events</h2>
													<div class="row">
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">ID</h4>
													  </div>
													  <div class="col-md-5 text-center">
														<h4 class="text-muted">Title</h4>
													  </div>
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">Date</h4>
													  </div>
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">Status</h4>
													  </div>
													  <div class="col-md-1 text-center">
														
													  </div>
													</div>
													<ul class="list-group">
													  <?php														
														
														while($ev = mysql_fetch_array($evs_res, MYSQL_ASSOC))
														{															
															echo ('
															<a href="event_profile.php?id='.$ev["ID"].'">
															<li class="list-group-item">
																<div class="row">
																  <div class="col-md-2 text-center">
																	<h4>'.$ev["ID"].'</h4>
																  </div>
																  <div class="col-md-5 ">
																	<h4>'.$ev["Title"].'</h4>
																  </div>
																  <div class="col-md-2 text-center">
																	<h5>'.$ev["Date"].'</h5>
																  </div>
																  <div class="col-md-2 text-center">
																	<h4>'.$ev["Status"].'</h4>
																  </div>
																  <div class="col-md-1 ">
																	<i class="fa fa-3x fa-angle-right fa-fw pull-left"></i>
																  </div>
																</div>
															</li></a>
															');
														}
													  ?>
													  
													</ul>
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