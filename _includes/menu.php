<h2 class="title">Pages</h2>
<?php

// Get menu items from XML file
$xml_filename = $_SESSION['path']['root'] . '/_context/menu.xml';
$xsl_filename = $_SESSION['path']['root'] . '/_includes/menu.xsl';

$doc = new DOMDocument();
$xsl = new XSLTProcessor();
$doc->load($xsl_filename);
$xsl->importStyleSheet($doc);
$doc->load($xml_filename);

echo $xsl->transformToXML($doc);
?>
