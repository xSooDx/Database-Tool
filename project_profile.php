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
			$pr_sql="Select * from projects where ID = '".$_GET[ "id"]. "'"; 
			$retval=mysql_query($pr_sql,$conn); 
			$project=mysql_fetch_array($retval, MYSQL_ASSOC);
			$dep_sql="Select Name from departments where ID= '" .$project["Dep_ID"]. "'";
			$dep_res=mysql_query($dep_sql,$conn);
			$dep_row=mysql_fetch_array($dep_res,MYSQL_ASSOC); 
			$lead_sql = "SELECT USN, F_Name, L_Name from members where USN ='".$project["Leader_USN"]."'";
			$lead_res = mysql_query($lead_sql,$conn);
			$lead_row = mysql_fetch_array($lead_res,MYSQL_ASSOC);
			$leader = $lead_row["F_Name"]." ".$lead_row["L_Name"];
			
			$mem_count_sql = "SELECT COUNT(USN) \"count\" from works_on_project WHERE Project_ID = '".$project[ "ID"]."'";
			$mem_count_res = mysql_query($mem_count_sql,$conn);
			$mem_count = mysql_fetch_array($mem_count_res,MYSQL_ASSOC)["count"];
			$mems_sql = "SELECT USN, F_Name, L_Name from Members where USN in (SELECT USN from works_on_project WHERE Project_ID = '".$project[ "ID"]."')";
			$mems_res = mysql_query($mems_sql,$conn);
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
                                                <h3 id="project-title"><small>&nbsp;Title: </small><br/><?php echo $project["Title"]?></h3>                                                
												<h4 id="project-dep"><small>&nbsp;Department: </small><?php echo  '<a href="department.php?id='.$project["Dep_ID"].'">'.$dep_row[ "Name"].'</a>';?></h4>   
												<h4 id="project-id"><small>&nbsp;ID: </small><?php echo $project[ "ID"];?></h4>												
                                                <h5 id="project-leader"><small>&nbsp;Leader: </small><?php echo '<a href="profile.php?usn='.$project["Leader_USN"].'">'.$leader.'</a>';?></h5>
                                                <h5 id="project-status"><small>&nbsp;Status: </small><?php echo $project[ "Status"];?></h5>
                                                <h5 id="project-mem-count"><small>&nbsp;No. of Members: </small><?php echo $mem_count;?></h5>
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-muted" id="user-name">Working on this Project</h3>
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
													echo $project["Description"];
												?>
												</p>
											</div>
										</div>
											<hr>
                                        <div class="row">
                                            <div class="col-md-12">
												<div class="row">
												<div class="col-md-9">
                                                <h2 class="text-muted">Tasks</h2>
												</div>
												<div class="col-md-3 text-right">
												<?php
													if($lead_row["USN"]==$_SESSION["usn"])
													{
														echo '<a data-toggle="modal" data-target="#create-task"><h4>Add task</h4><a>';
													}
												?>
												</div>
												</div>
												<div id="create-task" class="modal fade" role="dialog">
													  <div class="modal-dialog">
														<!-- Modal content-->
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">Add task</h4>
														  </div>
														  <div class="modal-body">
															<form class="form-horizontal" role="form" onsubmit="return false">

																<div class="form-group">
																  <label class="col-md-4 control-label" >ID</label>
																  <div class="col-md-4">
																	<div class="input-group">
																	  <span id="p_id"class="input-group-addon"><?php echo $project["ID"]."-";?></span>
																	  <input id="t_id" class="form-control" placeholder="ID" type="text">
																	</div>
																	
																  </div>
																</div>
																<div class="form-group">
																  <label class="col-md-4 control-label" >Title</label>
																  <div class="col-md-4">
																	<div class="input-group">																	  
																	  <input id="t_title" class="form-control" placeholder="Title" type="text">
																	</div>
																	
																  </div>
																</div>
																<div class="form-group">
																  <label class="col-md-4 control-label" >Description</label>
																  <div class="col-md-8">
																	<div class="input-group">
																	 
																	  <textarea id="t_desc" class="form-control" placeholder="Description" type="text"></textarea>
																	</div>
																	
																  </div>
																</div>
																<div class="form-group">
																  <label class="col-md-4 control-label" for="current-password">Deadline</label>
																  <div class="col-md-8">
																	<div class="input-group">
																	  
																	  <input id="t_dd" type="date" class="form-control" placeholder="Date" type="text">
																	</div>
																	
																  </div>
																</div>
																<div class="form-group">															  
															  <div class="col-md-10 text-right">
																<button id="add-e-btn" name="submit" data-dismiss="modal" class="btn btn-primary">Update</button>
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
													  
														$t_id_sql = "SELECT * FROM tasks WHERE P_ID = '".$project['ID']."' ORDER BY Status asc, Deadline asc";
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
    <script>
		function add_task()
		{
			var tid = document.getElementById("t_id").value+document.getElementById("p_id").value;
			var ttitle = document.getElementById("t_title").value;
			var tdesc = document.getElementById("t_desc").value;
			var tdd = document.getElementById("t_dd").value;
			
			var xhttp = new XMLHttpRequest();
			
			xhttp.onreadystatechange=function() 
			{
				
				if (xhttp.readyState == 4 && xhttp.status == 200)
				{
					alert(xhttp.responseText);
				}
			}
			
			xhttp.open("POST","php/addevent.php",true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("id="+tid+"&title="+ttitle+"&desc="+tdesc+"&dd="+tdd+"&pid="+<?php echo $project["ID"]?>);
			
		}
		document.getElementById("add-e-btn").onclick=add_task;
	
	</script>

</body></html>