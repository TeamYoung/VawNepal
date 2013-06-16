<html>
<head>
	<title>VAWHACK Nepal - VAW Statistics and Reporting</title>
	<script type="text/javascript" src="js/nepal-development-region.js"></script>
	<script src="http://cdn.leafletjs.com/leaflet-0.5/leaflet.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

	<link rel="stylesheet" href="css/foundation.css" />	
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5/leaflet.css" />
	<style type="text/css">
		#map {
			height: 400px;
			width: 1000px;
		}
		body {
			background-color: #413D3D;
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
		.legend {
		    line-height: 20px;
		    color: #555;
		}
		.legend i {
		    width: 18px;
		    height: 18px;
		    float: left;
		    margin-right: 8px;
		    opacity: 0.7;
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
	    	<div class="large-6 columns">
	    		<center>
					<div id="map"></div>
				</center>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="large-12">	
				<div class="large-12 columns">
					<div class="panel">
						<h4>Violence Against Women Statistics</h4>
						<p><b>Above is the data mapped to indicate the number of VAW cases in Nepal according to the Development Regions.</b></p><br />
						<p><b>Female bearing  a great roles in their life as daughter,sister,mother and as a incubator for life,they have been bearing a lot of responsibilities. In addition to their contribution they have been victimise from different sorts of problem, instead of the respect that they should be given. They have been victimized of crimes like Domestic Violence, Rape, Trafficking, Torture in the name of witchcraft which has been a common problem in our society and country.Every year vast number of womens are been killed. Here are some information regarding violence against Women in 2012.</b></p><br />
						<h3 style="color: red"><center>Stop Violence Against Women !</center></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">		
			<div class="large-12 columns">
				<div id="pie" style="min-width: 400px; height: 400px; margin: 0 auto">
				</div>	
		</div>
		<script type="text/javascript">
			var map = L.map('map', {
				minZoom: 6,
				maxZoom: 8,
				inertia: true
			}).setView([28.15, 84.94], 6.5);

			L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
	    		key: 'ba89f8d0fdf7422e8191e2e2a5731b0d',
	    		attribution: 'Team Young',
	    		styleId: 22677
			}).addTo(map);


			// L.geoJson(nepalData).addTo(map);

			//colorbrewer2.org
			function getColor(vaw) {
				return	vaw > 300 ? '#A50F15':
						vaw > 200 ? '#DE2D26':
						vaw > 100 ? '#FB6A4A':
								    '#FCAE91';
			}

			function style(feature) {
				return {
					fillColor: getColor(feature.properties.VAW),
					weight: 2,
					opacity: 1,
					color: 'white',
					dashArray: '3',
					fillOpacity: 1
				};
			}

			function highlightFeature(dr) {
				var layer = dr.target;

				layer.setStyle({
					weight: 5,
					color: '#666',
					dashArray: '',
					fillOpacity: 1
				});

				if (!L.Browser.opera) {
	        		layer.bringToFront();
	    		}
				info.update(layer.feature.properties);
			}

			function resetHighlight(dr) {
				geojson.resetStyle(dr.target);
				info.update();
			}

			function zoomToFeature(dr) {
				map.fitBounds(dr.target.getBounds());
			}

			function onEachFeature(feature, layer) {
				layer.on({
					mouseover: highlightFeature,
					mouseout: resetHighlight,
					click: zoomToFeature
				})
			}

			var info = L.control();

			info.onAdd = function (map) {
			    // create a div with a class "info"
			    this._div = L.DomUtil.create('div', 'info'); 
			    this.update();
			    return this._div;
			};

			// method that we will use to update the control based on feature properties passed
			info.update = function (props) {
			    this._div.innerHTML = '<h4>Violence Against Women 2012 - INSEC, NEPAL</h4>' +  (props ?
			        '<b>' + props.DRNAME + ' Development Region</b><br />' + props.VAW + ' cases'
			        : 'Hover over a Development Region');
			};
			
			info.addTo(map);

			var legend = L.control({position: 'bottomright'});

			legend.onAdd = function (map) {

			    var div = L.DomUtil.create('div', 'info legend'),
			        grades = [0, 100, 200, 300, 400],
			        labels = [];

			    // loop through density intervals and generate a label with a colored square for each interval
			    for (var i = 0; i < grades.length; i++) {
			        div.innerHTML +=
			            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
			            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
			    }

			    return div;
			};

			legend.addTo(map);

			//Load geoJSON
			var geojson = L.geoJson(nepalData, {
				style: style,
				onEachFeature: onEachFeature
			}).addTo(map);	

			$(document).ready(function() {
			var options = {
				chart: {
	                renderTo: 'pie',
	                plotBackgroundColor: null,
	                plotBorderWidth: null,
	                plotShadow: false
	            },
	            title: {
	                text: 'Type of Violence'
	            },
	            tooltip: {
	                formatter: function() {
	                    return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage*100)/100 +' %';
	                }
	            },
	            plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: true,
	                        color: '#000000',
	                        connectorColor: '#000000',
	                        formatter: function() {
	                            return '<b>'+ this.point.name +'</b>: '+ this.y;
	                        }
	                    }
	                }
	            },
	            series: [{
	                type: 'pie',
	                name: 'Browser share',
	                data: []
	            }]
	        }
	        
	        $.getJSON("include/data.json", function(json) {
				options.series[0].data = json;
	        	chart = new Highcharts.Chart(options);
	        });
	         
      	});   			
		</script>

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