<html>
	<head>
		<title>VAW Nepal</title>
		<script type="text/javascript" src="js/nepal-district.js"></script>
		<script src="js/leaflet.js"></script>
		<script src="js/jquery-1.9.1.min.js" ></script>
		<script src="js/jquery.scrollTo-1.4.3.1-min.js" ></script>
		<link rel="stylesheet" href="css/leaflet.css" />

		<link rel="stylesheet" href="css/foundation.css" />
		<style type="text/css">
			#map {
				width: 960px;
				height: 450px;
			}
			body {
				background-color: #413D3D;
			}
			table {
				width: 960px;
				height: auto;
			}
			.info {
			    padding: 6px 8px;
			    font: 14px/16px Arial, Helvetica, sans-serif;
			    background: white;
			    background: rgba(255,255,255,0.8);
			    box-shadow: 0 0 15px rgba(0,0,0,0.2);
			    border-radius: 5px;
			}
			.info h4 {
		    	margin: 0 0 5px;
		    	color: #777;
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
    <!-- End Header and Nav -->
    <div class="row">
    	<div class="large-12 columns">
			<center>
				<div id="map"></div><br />
				<h3 id="ngo_table" style="color: #2BA6CB">NGOs Working in Your District</h3>
				<div class="ngo"></div>
			</center>
			<script type="text/javascript">
			var map = L.map('map', {
				minZoom: 7,
				maxZoom: false,
				inertia: true
			}).setView([28.35, 84.94], 7);

			var selected_district;

			L.tileLayer('http://a.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
	    		key: 'ba89f8d0fdf7422e8191e2e2a5731b0d',
	    		attribution: 'Team Young',
	    		styleId: 1
			}).addTo(map);
			
			function style(feature) {
			    return {
			    	fillColor: '#666',
			        weight: 2,
			        opacity: 1,
			        color: 'white',
			        dashArray: '3',
			        fillOpacity: 0.7
			    };
			}
			
			function highlightFeature(district) {
				var layer = district.target;

				layer.setStyle({
					weight: 5,
					color: 'white',
					dashArray: '',
					fillOpacity: 1
				});

				if (!L.Browser.opera) {
	        		layer.bringToFront();
	    		}

	    		info.update(layer.feature.properties);
			}

			function resetHighlight(district) {
				geojson.resetStyle(district.target);
			}

			function zoomToFeature(district) {
				//map.fitBounds(district.target.getBounds());
				district.target.setStyle({
					fillColor: '#2BA6CB'
				});
				$.scrollTo('#ngo_table', 1000);
				selected_district = district.target.feature.properties.DISTRICT.toLowerCase();
				//Javascript to PHP
				$.ajax({
					url: "include/data.php?district=" + selected_district,
					method: "GET",
					success: function(data) {
						$(".ngo").html(data);
					}
				});
			}

			function onEachFeature(feature, layer) {
				layer.on({
					mouseover: highlightFeature,
					mouseout: resetHighlight,
					click: zoomToFeature
				})
			}
			//var marker = L.marker([28, 83]).addTo(map);

			var info = L.control();

			info.onAdd = function (map) {
			    // create a div with a class "info"
			    this._div = L.DomUtil.create('div', 'info'); 
			    this.update();
			    return this._div;
			};

			// method that we will use to update the control based on feature properties passed
			info.update = function (props) {
			    this._div.innerHTML = '<h4>NGOs in NEPAL - Social Welfare Council 2012</h4>' +  (props ?
			        '<b>' + props.DISTRICT + '</b><br />' : 'Hover over a District');
			};

			info.addTo(map);
			
			var geojson = L.geoJson(nepalData, {
				style: style,
				onEachFeature: onEachFeature
			}).addTo(map);		

		</script>
		</div>
	</div>
		<!-- table data is displayed here -->
	    
	  	<!-- Footer -->
	    <footer class="row">
	      	<div class="large-12 columns">
	       	<hr />
	          	<div class="large-6 columns">
	            	<p style="color: white">Courtesy Team Young, VAW Hack 2013</p>
	          	</div>
	          	<div class="large-6 columns">
	            	<ul class="inline-list right">
		              	<li><a href="#">Contact</a></li>
	            	</ul>
	          	</div>
	      </div>
	    </footer>
	</body>
</html>