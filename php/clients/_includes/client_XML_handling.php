<?php
function &transform_client_data_XSL (&$xsl) {
	//	Load XSL into processor
	$hDOMDocument = new DOMDocument();
	$hXSL = new XSLTProcessor();
	$hDOMDocument->loadXML($xsl);
	$hXSL->importStyleSheet($hDOMDocument);
	
	return transform_client_data_XSLTProcessor ($hXSL);
}

function &transform_client_data ($xsl_file) {
	$xsl_filename = $_SESSION['path']['root'] . '/clients/_includes/' . $xsl_file . '.xsl';

	//	Load XSL into processor
	$hDOMDocument = new DOMDocument();
	$hXSL = new XSLTProcessor();
	$hDOMDocument->load($xsl_filename);
	$hXSL->importStyleSheet($hDOMDocument);
	
	return transform_client_data_XSLTProcessor ($hXSL);
}

function &transform_client_data_XSLTProcessor ($hXSL) {
	//	Have we already loaded the client data?
	if (!isset($_SESSION['client_data'])) {
	//	Can't store DOMDocument as a session variable. See
	//	http://objectmix.com/php/502861-dom-object-_session.html
	//	But we can at least store the XML to save reading it time and again
	
		//	Get client data from XML file
		$xml_filename = $_SESSION['path']['root'] . '/clients/_context/clients.xml';
		$_SESSION['client_data'] = file_get_contents($xml_filename);
	}
	
	//	Load client data into DOMDocument
	$hDOMDocument = new DOMDocument();
	$hDOMDocument->loadXML($_SESSION['client_data']);
	
	//	Transform it into beautiful XHTML
	return $hXSL->transformToXML($hDOMDocument);
}
?>
