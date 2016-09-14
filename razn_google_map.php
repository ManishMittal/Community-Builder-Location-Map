<?php    
$postData = $_GET;
@extract($postData);

/**
* @copyright	Copyright (C) 2010 OpenSource Technologies Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see http://www.gnu.org/copyleft/gpl.html
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?<?php echo !empty($map_key)?'key='.$map_key:''; ?>"></script>
<script type="text/javascript"> 
function initialize() {
	 google.maps.controlStyle = 'ROADMAP';

      var map = new google.maps.Map(
        document.getElementById('map_canvas'), {
          center: new google.maps.LatLng(<?php echo $latitude.' , '.$longitude; ?>),
          zoom: <?php echo $zoom; ?>,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

      var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $latitude.' , '.$longitude; ?>),
            map: map
      });
       
       var contentString = "<?php echo $messag; ?>";
         var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

          marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

    }
       google.maps.event.addDomListener(window, 'load', initialize);
    
 </script>


</script>

</head>
  
<body onload="initialize()"  onunload="GUnload()">
	<div id="map_canvas" style=
      "width: <?php echo $map_width;?>px; height: <?php echo $map_height; ?>px;
      border: 1px solid black; float: rigth;" >
  </div>

</body>
</html>
