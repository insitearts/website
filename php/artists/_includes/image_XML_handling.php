<?php
function &transform_image_data_XSL (&$xsl) {
	//	Load XSL into processor
	$hDOMDocument = new DOMDocument();
	$hXSL = new XSLTProcessor();
	$hDOMDocument->loadXML($xsl);
	$hXSL->importStyleSheet($hDOMDocument);
	
	return transform_image_data_XSLTProcessor ($hXSL);
}

function &transform_image_data ($xsl_file) {
	$xsl_filename = $_SESSION['path']['root'] . '/artists/_includes/' . $xsl_file . '.xsl';

	//	Load XSL into processor
	$hDOMDocument = new DOMDocument();
	$hXSL = new XSLTProcessor();
	$hDOMDocument->load($xsl_filename);
	$hXSL->importStyleSheet($hDOMDocument);
	
	return transform_image_data_XSLTProcessor ($hXSL);
}

function &transform_image_data_XSLTProcessor ($hXSL) {
	//	Have we already loaded the image data?
	if (!isset($_SESSION['image_data'])) {
	//	Can't store DOMDocument as a session variable. See
	//	http://objectmix.com/php/502861-dom-object-_session.html
	//	But we can at least store the XML to save reading it time and again
	
		//	Get image data from XML file
		$xml_filename = $_SESSION['path']['root'] . '/rotator/_context/images.xml';
		$_SESSION['image_data'] = file_get_contents($xml_filename);
	}
	
	//	Load image data into DOMDocument
	$hDOMDocument = new DOMDocument();
	$hDOMDocument->loadXML($_SESSION['image_data']);
	
	//	Transform it into beautiful XHTML
	return $hXSL->transformToXML($hDOMDocument);
}
?>
