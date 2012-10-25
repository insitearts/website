<div id="rotator">
<?php
function write_HTML_from_array ($index,$class) {
//	Work out where the values are in the value array
	$_SESSION[$class]['file']	= $_SESSION['image_array'][$_SESSION['image_indexes']['FILE'][$index]]['value'];
	$_SESSION[$class]['name']	= $_SESSION['image_array'][$_SESSION['image_indexes']['NAME'][$index]]['value'];
	$_SESSION[$class]['artist']	= $_SESSION['image_array'][$_SESSION['image_indexes']['ARTIST'][$index]]['value'];
	$_SESSION[$class]['project']	= $_SESSION['image_array'][$_SESSION['image_indexes']['PROJECT'][$index]]['value'];
	$_SESSION[$class]['client']	= $_SESSION['image_array'][$_SESSION['image_indexes']['CLIENT'][$index]]['value'];

	write_HTML_from_SESSION ($class,false);
}

function write_HTML_from_SESSION ($class,$singleimage) {
	require_once($_SESSION['path']['root']."/projects/_includes/project_XML_handling.php");

	//	Good, now we can get on with generating the HTML
	if ($singleimage == true) {
		$img_display	= 'block';
		$div_display	= 'block';
		$img_link_start	= '';
		$img_link_end	= '';
		$div_link_start	= "<a href=\"/artists/{$_SESSION[$class]['artist']}\">";
		$div_link_end	= '</a>';
		$actions		= '';
	} else {
		//	Find project_id from project_name
		$xsl = <<<XSL
		<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
			<xsl:output method="text" encoding="UTF-8" indent="no" omit-xml-declaration="yes" cdata-section-elements="summary" />
			<xsl:template match="/">
				<xsl:for-each select="projects/project[name = '{$_SESSION[$class]['project']}']"><xsl:value-of select="id"/></xsl:for-each>
			</xsl:template>
		</xsl:stylesheet>
XSL;
		
		$project_id = transform_project_data_XSL($xsl);
		
		if (!isset($project_id)) {
			$img_link_start	= "";
			$img_link_end	= "";
		} else {
			$img_link_start	= "<a rel=\"nofollow\" href=\"/projects/$project_id?rotator=$class\">";
			$img_link_end	= "</a>";
		}
	
		$img_display	= 'block';
		$div_display	= 'none';
		$div_link_start	= '';
		$div_link_end	= '';
		$actions		= "onmouseover=\"rotator_$class('none','block')\" onmouseout=\"rotator_$class('block','none')\"";
	}
	
	//	If the project and the client are the same then don't repeat the information
	if ($_SESSION[$class]['project'] == $_SESSION[$class]['client']) {
		$client_HTML = "";
	} else {
		$client_HTML = "<br />{$_SESSION[$class]['client']}";
	}
	
	//	All ducks in a neat row, so build the HTML
	$img = "$img_link_start<img class=\"rotator $class\" name=\"rotator_img_$class\" alt=\"{$_SESSION[$class]['name']}\" src=\"/rotator/_context/images/{$_SESSION[$class]['file']}\" height=\"180\" width=\"334\" style=\"display:$img_display\" $actions />$img_link_end";

	$div = <<<HTML
<div class="rotator $class" id="rotator_div_$class" style="display:$div_display">
	<div class="post" style="border-bottom-style:none;">
		<h3 class="$class">$div_link_start{$_SESSION[$class]['artist']}$div_link_end</h3>
		<p class="$class">{$_SESSION[$class]['name']}</p>
		<p class="$class">{$_SESSION[$class]['project']}$client_HTML</p>
	</div>
</div>
HTML;

	if ($class=='left') echo $img.$div; else echo $div.$img;
}

//	Random images or particular image specified?
if (isset($_GET['rotator'])) {
	//	Display specified image
	write_HTML_from_SESSION ($_GET['rotator'],true);
} else {
	// Display random image
	
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
	
	//	Choose first random image
	$image_index1 = time() % $_SESSION['image_count']; // random image
	
	//	Make sure second random image is not the same as the first one
	do {
		date_default_timezone_set('UTC');
		$timeofday = gettimeofday();
		$image_index2 = $timeofday['usec'] % $_SESSION['image_count']; // random image
	} while ($image_index2 == $image_index1);
	
	//	Output HTML from the data
	write_HTML_from_array($image_index1,'left');
	write_HTML_from_array($image_index2,'right');
	
//	unset($_SESSION['image_array']);
//	unset($_SESSION['image_indexes']);
}
?>

<script type="text/javascript">
function rotator_left(img_style, div_style) {
	document.rotator_img_right.style.display=img_style;
	document.getElementById("rotator_div_left").style.display=div_style;
}

function rotator_right(img_style, div_style) {
	document.rotator_img_left.style.display=img_style;
	document.getElementById("rotator_div_right").style.display=div_style;
}
</script>

</div>
