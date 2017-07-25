<?php

class GoogleMapsDecorator extends SiteTreeExtension {

	static $db = array(
            "Latitudes" => "Varchar",
            "Longitudes" => "Varchar",
            "Address" => "Varchar(600)",
            "MapType" => "Enum('roadmap, satellite, terrain, hybrid')",
	);
	
	static $defaults = array(
		"ZoomLevel" => "13"
	);
	
	public function updateCMSFields(FieldList $fields){
            $fields->addFieldsToTab("Root.Map", array(
            	new LiteralField('temp','<p><strong>Add a map to your page</strong></p><p>Use either the lat/long of the location, or part of the address that Google will attemp to convert to a location.'),
                new TextField("Lattitude"),
                new TextField("Longitude"),
                new TextField("Address"),
                //new CheckBoxField("UseSideBar"),
                new DropdownField("MapType", "Type", array(
                        "roadmap" => "roadmap",
                        "satellite" => "satellite",
                        "terrain" => "terrain",
                        "hybrid" => "hybrid"
                )),
            ));   
	}
	
	function MarkerColor(){
		switch( $this->owner->PageColour){
			case "blue":
				return "36bfdf";
			case "green":
				return "c0d34b";
			case "pink":
				return "db2353";
			case "orange":
				return "cd6632";
			case "purple":
				return "8174b0";
			default:
				return "fff";
		}
	}
	
	
	function MakeGoogleMap(){
		Requirements::javascript("http://maps.google.com/maps/api/js?sensor=true"); 
		$latitudes = $this->owner->Latitudes ? $this->owner->Latitudes : 0;
		$longitudes = $this->owner->Longitudes ? $this->owner->Longitudes : 0;
		$title = $this->owner->Title;
		$address = $this->owner->Address;
//		$zoomLevel = $this->owner->ZoomLevel;
		$zoomLevel = '12';
                
		$mapType = strtoupper($this->owner->MapType);
//		$markerSize = $this->owner->MarkerSize;
		$markerSize = 'mid';
                
		$markerColor = $this->owner->MarkerColor();
		$markerLabel = $this->owner->MarkerLabel;
		Requirements::customScript(<<<JS
			jQuery(document).ready(function(){ 
			
				function makeInfoWindowEvent(map, infowindow, contentString, marker) {
				  google.maps.event.addListener(marker, 'click', function() {
				    infowindow.setContent(contentString);
				    infowindow.open(map, marker);
				  });
				}
				var map, 
				infowindow = new google.maps.InfoWindow(),
				address = "$address";
				if(address != ""){
					geocoder = new google.maps.Geocoder();
					geocoder.geocode( { 'address': address}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) { 
							var mapOptions = {
							  zoom: {$zoomLevel},
							  center: results[0].geometry.location,
							  mapTypeId: google.maps.MapTypeId.{$mapType}
							};
							map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);  
							var marker = new google.maps.Marker({
								map: map, 
								position: results[0].geometry.location,
								icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld={$markerLabel}|{$markerColor}|333'
							});
							makeInfoWindowEvent(map, infowindow, "$address", marker);
						} else {
					  		alert("Geocode was not successful for the following reason: " + status);
						}
					}); 
				}else{ 
					var latlng = new google.maps.LatLng($latitudes, $longitudes);
					var mapOptions = {
					  zoom: {$zoomLevel},
					  center: latlng,
					  mapTypeId: google.maps.MapTypeId.{$mapType}
					};
					map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions); 
					var marker = new google.maps.Marker({
						map: map, 
						position: latlng
					});
					makeInfoWindowEvent(map, infowindow, "$title", marker);
				}
			}); 
JS
);
	}
}