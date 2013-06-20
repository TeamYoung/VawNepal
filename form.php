<?php
require_once 'include/db_connect.php';

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

		</style>
	</head>
	<body>
		<div class="row">
    	<center>
        	<img src="img/banner960.png" />
        </center>
    </div>
    <!--nav bar -->
    <div class = "row">
    <div class="large-10 columns">
      <ul class="button-group">
        <li><a href="index.php" class="button">Home</a></li>
        <li><a href="sms.php" class="button">SMS Inquiry</a></li>
        <li><a href="dr_index.php" class="button">Incidents</a></li>
        <li><a href="form.php" class="button">Complaints</a></li>
      </ul>
    </div>
    <!-- End Header and Nav -->
    <div class="row">
    	<div class="large-12 columns">

			<form name="registerform"  method="POST" action="insert.php" class="large-12 columns">
				<legend><h3>COMPLAIN REGISTERATION FORM:</h3></legend>
			<fieldset>
			<table style="width:600px">
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="firstname"></td>
			</tr>


			<tr><td>Last Name:</td><td><input type="text" name="lastname"></td></tr>

			<tr><td>Age:</td><td><input type="number" name="age"></td></tr>

			<tr><td>Sex:</td><td><input type="radio" name="sex" value:"male">Male
				<input type="radio" name="sex" value:"female">Female</td>	</tr>

			<tr><td>Occupation:</td><td><input type="text" name="occ" ></td></tr>
			<tr><td>Email:</td><td><input type="email" name="email" ></td></tr>
			<tr><td>Contact No:</td><td><input type="number" name="tel" ></td></tr>
			</table>
		</fieldset>

			<legend><h3>Address:</h3></legend>	<fieldset>
			<table style="width:600px">

			<tr><td>District:</td> <td><input type="text" name="dist"></td></tr>

			<tr><td>VDC:</td><td><input type="text" name="vdc"></td></tr>

			<tr><td>Municipality:</td><td><input type="text" name="mun"></td></tr>

			<tr><td>SubMetropolitan:</td><td><input type="text" name="submetro"></td></tr>

			<tr><td>Metropolitan:</td><td><input type="text" name="metro"></td></tr>
		</table>
		</fieldset>

		<legend ><h3>Incident:</h3></legend>

		<fieldset>
		<table style="width:600px">
		<tr><td>Date:</td><td><input type="date"  name="dae"></td></tr>
		<tr><td>Type:</td><td>
		<select name="type">
			<option value="domestic">Domestic Violence</option>
			<option value="Murder">Murder</option>
			<option value="rape">Rape</option>
			<option value="attemptrape">Attempt Rape</option>
			<option value="molestation">Molestation</option>
			<option value="beating">Beating</option>
			<option value="others">others</option>
		</select></td></tr>

		<tr><td>Describe:</td><td> <textarea rows=7 cols=40 name="des">describe incident</textarea><td></tr>

		<tr><td>Cause:</td><td><input type="textbox" name="cause"></td></tr>

		<tr><td>Perpetrators:</td><td><input type="textbox" name="perp"></td></tr>
		</table>
		</fieldset>

		<legend><h3>What help do you want?</h3></legend>
		<fieldset>
			<input type="checkbox" name="help" value="legal">Legal Advice<br>
			<input type="checkbox" name="help" value="counsel">Counselling<br>
			<input type="checkbox" name="help" value="safe">Safe House<br>
			<input type="checkbox" name="help" value="protect">Protection<br>
		</fieldset>

		<legend><h3>Have you contacted?</h3></legend>
			<fieldset>
				<input type="checkbox" name="contact" value="police" >Police
				<input type="checkbox" name="contact" value="ngo" >NGO/INGOs
				<input type="checkbox" name="contact" value="worker" >Social Worker
				<input type="checkbox" name="contact" value="lawyer" >Lawyer
			</fieldset>
		<input type="submit" value="submit">
		</form>

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