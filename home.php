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
                        <li class="active">
                            <a href="home.php">Home</a>
                        </li>
                        <li >
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
		
		<br/><br/>
		<div class="section">
			<div class="container">
				<h1 class="text-muted"> Welcome <strong><?php echo $_SESSION["f_name"].' '.$_SESSION["l_name"]; ?></strong></h1>
			</div>
		</div>
</body></html>