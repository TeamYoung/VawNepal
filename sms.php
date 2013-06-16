<?php
$connection=mysql_connect("localhost","root","");
if(!$connection){
	die("db connectin failed:".mysql_error());

}
//select database

$db_select=mysql_select_db('hackathon_2',$connection);
if(!$db_select){
	die("db connectin failed:".mysql_error());

}

//equire_once 'include/db_connect.php';
?>




<html>
	<head>
		<title>VAW Nepal</title>
		<script type="text/javascript" src="js/nepal-district.js"></script>
		<script src="js/leaflet.js"></script>
		<script src="js/jquery-1.9.1.min.js" ></script>
		<link rel="stylesheet" href="css/leaflet.css" />
		<link rel="stylesheet" href="css/foundation.css" />

		<style type="text/css">
			body {
				background-color: #413D3D;
			}
			table {
				
				width: 960px;
			}
		</style>
	</head>
	<body>
		<!-- Header and Nav -->

    <div class="row">
    	<center>
        	<img src="img/banner960.png" />
        </center>
    </div>
    <!--nav bar -->
    <div class = "row">
    <div class="large-12 columns">
      <ul class="button-group">
          <li><a href="index.php" class="button">Home</a></li>
          <li><a href="sms.php" class="button">SMS Inquiry</a></li>
          <li><a href="dr_index.php" class="button">Incidents</a></li>
		  <li><a href="form.php" class="button">Complaints</a></li>
      </ul>
    </div>

   <!--  <div class = "row">
	    <div class="large-12 columns">
	      <div class="panel">
	      	<h3 style="color: #2BA6CB">Send SMS to 5455</h2>
	      	<h4>Type: apivawnepal &lt;space&gt; District_Name &lt;space&gt; Your_Message </h4>
	      </div>
	          
	      </ul>
	    </div>
	</div> -->
    <!-- End Header and Nav -->
    <div class="row">
    	<div class="large-12 columns">
    		<div class="large-12 columns">
    		<table>
				<?php
				  //create_cat.php
				

					$query = "SELECT * FROM logs_incoming";

					$result = mysql_query($query);
					if(!$result) {
					  echo 'The data could not be displayed, please try again later.';
					 }
					 else {
					 	echo ' <tr><td></td> <td><strong>Sender</strong></td><td><strong>District</strong></td><td><strong>Message</strong></td> </tr>';
					   while ($row = mysql_fetch_assoc($result)) {
					//      // display  the messages
					   		echo "<tr class= 'row'>  ";        
					   		echo '<td> '.$row['from'] ;
					        echo '<td> '.$row['keyword'] ;
					        echo '<td> '.$row['text'] ;
					        echo '</tr>';
					    }
					}
				?>		
    		</table>
    		</div>
    	</div>
    </div>
    <!-- Footer -->
	    <footer class="row">
	      	<div class="large-12 columns">
	       	<hr />
	        	<div class="large-6 columns">
	            	<p style="color: white">Courtesy Team Young, VAW Hack 2013</p>
	          	</div>
	          	<div class="large-6 columns">
	            	<ul class="inline-list right">
		              	<li><a href="#">About us</a></li>
		              	<li><a href="#">contacts</a></li>
	            	</ul>
	          	</div>
	      </div>
	    </footer>
	</body>
</html>
