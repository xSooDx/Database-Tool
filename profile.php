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
			$mem_sql="Select * from members where usn = '".$_GET[ "usn"]. "'"; 
			$retval=mysql_query($mem_sql,$conn); 
			$member=mysql_fetch_array($retval, MYSQL_ASSOC);
			$dep_sql="Select Name from departments where ID= '" .$member["Department"]. "'";
			$dep_res=mysql_query($dep_sql,$conn);
			$dep_row=mysql_fetch_array($dep_res,MYSQL_ASSOC); ?>
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
                        <li class="active">
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
                                                <h3 id="user-name"><small>&nbsp;Name: </small><?php echo $member[ "F_Name"]. " ".$member[ "L_Name"]?></h3>
                                                <h4 id="user-usn"><small>&nbsp;USN: </small><?php echo $member[ "USN"];?></h4>
												<h4 id="user-dep"><small>&nbsp;Department: </small><?php echo '<a href="department.php?id='.$member["Department"].'">'.$dep_row[ "Name"].'</a>';?></h4>                                                
                                                <h5 id="user-role"><small>&nbsp;Role: </small>Role</h5>
                                                <h5 id="user-status"><small>&nbsp;Status: </small><?php echo $member[ "Status"];?></h5>
                                                <h5 id="user-email"><small>&nbsp;Email: </small><?php echo $member[ "Email"];?></h5>
                                                <h5 id="user-ph"><small>&nbsp;Ph. No.: </small><?php echo $member[ "Ph_No"];?></h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-muted" id="user-name">Operations</h2>
												<div class="row">
													<?php
														if($_SESSION["usn"]==$_GET["usn"])
														{
															echo '<a data-toggle="modal" data-target="#change_pass"><h4>Change Password</h4></a>';
															echo '<a data-toggle="modal" data-target="#edit_details"><h4>Edit Details</h4></a>';
															$check_head = "SELECT * from heads where USN='".$_SESSION["usn"]."'";
															$check_res = mysql_query($check_head,$conn);
															if(mysql_num_rows($check_res)!=0)
															{
																echo '<a data-toggle="modal" data-target="#create-project"><h4>Create Project</h4></a>';
																echo '<a data-toggle="modal" data-target="#create-event"><h4>Create Event</h4></a>';
															}
														}
													?>
													<div id="edit_details" class="modal fade" role="dialog">
													  <div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Edit Details</h4>
														  </div>
														  <div class="modal-body">
															<form class="form-horizontal" role="form" onsubmit="return false">
															<div class="form-group">
															  <label class="col-md-4 control-label" for="current-password">USN</label>
															  <div class="col-md-6">
																<label class="col-md-6 text-muted control-label" for="current-password"><?php echo $_SESSION["usn"]?></label>
																
															  </div>
															  <label class="col-md-4 control-label" for="current-password">Name</label>
															  <div class="col-md-6">
																<label class="col-md-6 text-muted control-label" for="current-password"><?php echo $_SESSION["f_name"]." ".$_SESSION["l_name"]?></label>
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="new-password">Phone Number</label>
															  <div class="col-md-6">
																<input id="n_ph_no" placeholder="Phone Number" class="form-control input-md" value=<?php echo '"'.$_SESSION["ph"].'"'?> >
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="confrim-password">Email</label>
															  <div class="col-md-6">
																<input id="n_email" type="email" placeholder="Email" class="form-control input-md" value=<?php echo '"'.$_SESSION["email"].'"'?>>
																
															  </div>
															</div>

															<div class="form-group">															  
															  <div class="col-md-10 text-right">
																<button id="update-d-btn" name="submit" data-dismiss="modal" class="btn btn-primary">Update</button>
															  </div>
															</div>

															</fieldset>
															</form>
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														  </div>
														</div>

													  </div>
													</div>
													<div id="change_pass" class="modal fade" role="dialog">
													  <div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Change Password</h4>
														  </div>
														  <div class="modal-body">
															<form class="form-horizontal" role="form" onsubmit="return false">
															<div class="form-group">
															  <label class="col-md-4 control-label" for="current-password">Current Password</label>
															  <div class="col-md-6">
																<input id="current-password" name="current-password" type="password" placeholder="Current password" class="form-control input-md" required="">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="new-password">New Password</label>
															  <div class="col-md-6">
																<input id="new-password" name="new-password" type="password" placeholder="New password" class="form-control input-md" required="">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="confrim-password">Confirm Password</label>
															  <div class="col-md-6">
																<input id="confirm-password" name="confrim-password" type="password" placeholder="Confirm password" class="form-control input-md">
																
															  </div>
															</div>

															<div class="form-group">															  
															  <div class="col-md-10 text-right">
																<button id="change-p-btn" name="submit" data-dismiss="modal" class="btn btn-primary">Submit</button>
															  </div>
															</div>

															</fieldset>
															</form>
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														  </div>
														</div>

													  </div>
													</div>
													<div id="create-project" class="modal fade" role="dialog">
													  <div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Create Project</h4>
														  </div>
														  <div class="modal-body">
															<form class="form-horizontal" role="form" onsubmit="return false">
															<div class="form-group">
															  <label class="col-md-4 control-label" for="current-password">ID</label>
															  <div class="col-md-6">
																<input id="np_id" name="np_id"  placeholder="ID" class="form-control input-md" required="">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="current-password">Title</label>
															  <div class="col-md-6">
																<input id="np_title" name="np_title"  placeholder="Title" class="form-control input-md" required="">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="new-password">Description</label>
															  <div class="col-md-6">
																<textarea id="np_desc" name="np_desc"  placeholder="Description" class="form-control input-md" required=""></textarea>
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="confrim-password">Department</label>
															  <div class="col-md-6">
																<input id="np_dep" name="np_dep" placeholder="Department" class="form-control input-md">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="Leader USN">Leader USN</label>
															  <div class="col-md-6">
																<input id="np_usn" name="np_usn" placeholder="Leader USN" class="form-control input-md">
																
															  </div>
															</div>

															<div class="form-group">															  
															  <div class="col-md-10 text-right">
																<button id="create-p-btn" name="submit" data-dismiss="modal" class="btn btn-primary">Submit</button>
															  </div>
															</div>

															</fieldset>
															</form>
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														  </div>
														</div>

													  </div>
													</div>
													<div id="create-event" class="modal fade" role="dialog">
													  <div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Create Event</h4>
														  </div>
														  <div class="modal-body">
															<form class="form-horizontal" role="form" onsubmit="return false">
															<div class="form-group">
															  <label class="col-md-4 control-label" for="current-password">ID</label>
															  <div class="col-md-6">
																<input id="ne_id" name="np_id"  placeholder="ID" class="form-control input-md" required="">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="current-password">Title</label>
															  <div class="col-md-6">
																<input id="ne_title" name="np_title"  placeholder="Title" class="form-control input-md" required="">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="new-password">Description</label>
															  <div class="col-md-6">
																<textarea id="ne_desc" name="np_desc"  placeholder="Description" class="form-control input-md" required=""></textarea>
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="confrim-password">Department</label>
															  <div class="col-md-6">
																<input id="ne_dep" name="np_dep" placeholder="Department" class="form-control input-md">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="Leader USN">Time</label>
															  <div class="col-md-6">
																<input id="ne_time" type="time"placeholder="Time" class="form-control input-md">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="Leader USN">Date</label>
															  <div class="col-md-6">
																<input id="ne_date"  type = "date" placeholder="Date" class="form-control input-md">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="Leader USN">Venue</label>
															  <div class="col-md-6">
																<input id="ne_venue" type="address" placeholder="Venue" class="form-control input-md">
																
															  </div>
															</div>
															<div class="form-group">
															  <label class="col-md-4 control-label" for="Leader USN">Tags</label>
															  <div class="col-md-6">
																<input id="ne_tag" name="np_usn" placeholder="Tags" class="form-control input-md">
																
															  </div>
															</div>

															<div class="form-group">															  
															  <div class="col-md-10 text-right">
																<button id="create-e-btn" name="submit" data-dismiss="modal" class="btn btn-primary">Submit</button>
															  </div>
															</div>

															</fieldset>
															</form>
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														  </div>
														</div>

													  </div>
													</div>
												</div>
                                            </div>
                                        </div>
										<hr/>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-muted">Projects</h2>
													<div class="row">
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">ID</h4>
													  </div>
													  <div class="col-md-6 text-center">
														<h4 class="text-muted">Title</h4>
													  </div>
													  <div class="col-md-3 text-center">
														<h4 class="text-muted">Status</h4>
													  </div>
													</div>
													<ul class="list-group">
													  <?php
													  
														$p_id_sql = "SELECT Project_ID FROM works_on_project WHERE USN = '".$_GET['usn']."'";
														$p_ret = mysql_query($p_id_sql,$conn);
														
														while($pid = mysql_fetch_array($p_ret, MYSQL_ASSOC))
														{
															$p_sql = "SELECT ID,Title,Status FROM Projects WHERE ID ='".$pid['Project_ID']."'";
															$p_r_ret = mysql_query($p_sql,$conn);
															$pr = mysql_fetch_array($p_r_ret);
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
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-muted">Tasks</h2>
													<div class="row">
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">ID</h4>
													  </div>
													  <div class="col-md-4 text-center">
														<h4 class="text-muted">Title</h4>
													  </div>
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">Project ID</h4>
													  </div>
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">Deadline</h4>
													  </div>
													  <div class="col-md-2 text-center">
														<h4 class="text-muted">Status</h4>
													  </div>
													</div>
													<ul class="list-group">	
													  <?php
													  
														$t_id_sql = "Select * From Tasks where ID in(SELECT Task_ID FROM assigned_to_task WHERE USN = '".$_GET['usn']."') ORDER BY Status asc, Deadline asc";
														$t_ret = mysql_query($t_id_sql,$conn);
														
														while($tr = mysql_fetch_array($t_ret, MYSQL_ASSOC))
														{															
															echo ('
															
															<li class="list-group-item ">
																<a data-toggle="collapse" href="#task'.$tr["ID"].'">
																<div class="row">
																  <div class="col-md-2 text-center">
																	<h5>'.$tr["ID"].'</h5>
																  </div>
																  <div class="col-md-4 ">
																	<h5>'.$tr["Title"].'</h5>
																  </div>
																  <div class="col-md-2 text-center">
																	<h5>'.$tr["P_ID"].'</h5>
																  </div>
																  <div class="col-md-2 text-center">
																	<h5>'.$tr["Deadline"].'</h5>
																  </div>
																  <div class="col-md-2 text-center">
																	<h5>'.$tr["Status"].'</h5>
																  </div>
																  
																</div>
															
																</a>
																<div id="task'.$tr["ID"].'" class="panel-collapse collapse">
																  <hr/>
																  <p>'.$tr["Description"].'</p>
																</div>
															</li>
															
															
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
    <script type="text/javascript" src="scripts/profile.js"></script>

</body></html>