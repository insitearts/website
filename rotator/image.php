<?php
	require_once('_context/section-context.php');

	//	Is the image data already loaded?
	if (!isset($_SESSION['image_count'])) {
		//	No, so get image data from XML file
		$xml_filename = $_SESSION['path']['root'] . '/rotator/_context/images.xml';
		
		//	Read data into arrays
		$_SESSION['image_data'] = file_get_contents($xml_filename);
		$hParser = xml_parser_create();
		xml_parse_into_struct($hParser, $_SESSION['image_data'], $_SESSION['image_array'], $_SESSION['image_indexes']);
		xml_parser_free($hParser);
				
		$_SESSION['image_count'] = count($_SESSION['image_indexes']['FILE']);
	}

	$previous_image_index = isset($_SESSION['previous_image']) ? $_SESSION['previous_image'] : 0;
	
	do {
		$timeofday = gettimeofday();
		$image_index = $timeofday['usec'] % $_SESSION['image_count']; // random image
	} while ($image_index == $previous_image_index);
	
	$_SESSION['previous_image'] = $image_index;
	$image_file = $_SESSION['image_array'][$_SESSION['image_indexes']['FILE'][$image_index]]['value'];
	
	header ('Content-type: image/jpeg');
	readfile("{$_SESSION['path']['root']}/rotator/_context/images/$image_file");
//echo "<h3>$image_file</h3><img src=\"/rotator/_context/images/$image_file\" />";
?>