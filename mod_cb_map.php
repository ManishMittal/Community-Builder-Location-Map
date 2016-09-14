<?php   	 
/**
* @copyright	Copyright (C) 2010 OpenSource Technologies Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see http://www.gnu.org/copyleft/gpl.html
*/

if($_GET['option']="com_comprofiler" && $_GET['task']="userProfile")
{
	$lati = $params->get('latitude_field');
	$long = $params->get('longitude_field');
	$user = JFactory::getUser();
 	$userid = $user->id;
  	
 	if($userid > 0 ){
		
	
	$db = JFactory::getDBO(); 
	$query = $db->getQuery(true);	
	
	$query->select(array("a.firstname","a.middlename","a.lastname","b.name","a.$lati","a.$long"))
    ->from($db->quoteName('#__comprofiler', 'a'))
    ->join('LEFT', $db->quoteName('#__users', 'b') . ' ON (' . $db->quoteName('a.user_id') . ' = ' . $db->quoteName('b.id') . ')')
    ->where($db->quoteName('a.user_id') . ' = ' . $userid);
  
     $db->setQuery($query);
 
	$results = $db->loadAssoc();
       
     $latitude = !empty($results[$lati])?$results[$lati]:'';
	 $longitude = !empty($results[$long])?$results[$long]:'';
	 $message = !empty($results['firstname'])?$val['firstname']." ".$val['lastname']:$results['name'];
	 }
   	
 }
	if( empty($latitude) && empty($latitude))
	{
		$latitude = $params->get('latitude');
		$longitude = $params->get('longitude');
		$message = $params->get('messag');
	}

  $map_key = $params->get('google_map_key');

?>
 
<iframe src="modules/mod_cb_map/razn_google_map.php?latitude=<?php echo $latitude?>&longitude=<?php echo $longitude?>&zoom=<?php echo $params->get('zoom')?>&marker_lat=<?php echo $latitude?>&marker_lon=<?php echo $longitude?>&messag=<?php echo $message;?>&map_width=<?php echo $params->get('map_width')?>&map_height=<?php echo $params->get('map_height'); ?><?php echo !empty($map_key)?'&map_key='.$map_key:'';?>" scrolling="no" style="width: <?php echo $params->get('map_width')?>px; height: <?php echo $params->get('map_height')?>px;" border="0px" marginwidth="0px" marginheight="0px">
</iframe>
