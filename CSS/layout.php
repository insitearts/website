<?php
header('Content-type: text/css');

echo <<<CSS
/* Page layout
----------------------------------------------- */

/* Header 
----------------------------------------------- */

#header-wrapper {
	width:838px;
	background-color: #FFFFFF;
	background-repeat: no-repeat;
	height:320px;
	margin-top: 0;
	margin-right: auto;
	margin-left: auto;
	margin-bottom: 0px;
	}

#header img {
	margin-left: auto;
	margin-right: auto;
	border:none;
	}

/* Outer-Wrapper
----------------------------------------------- */
#outer-wrapper {
	width: 838px;
	background-color:#fff;
	margin:40px auto;
	text-align:left;
	font: normal normal 98% Arial, Helvetica, sans-serif;
	}
#content-wrapper{background:#fff;}
#main-wrapper {
	width: 410px;
	float: left;
	padding-left:85px;
	word-wrap: break-word; /* fix for long text breaking sidebar float in IE */
	overflow: hidden;     /* fix for long non-text content breaking IE sidebar float */
	}

#sidebar-wrapper {
	width: 218px;
	float: right;
	padding-right:85px;
	word-wrap: break-word; /* fix for long text breaking sidebar float in IE */
	overflow: hidden;      /* fix for long non-text content breaking IE sidebar float */
	}

/* Footer
----------------------------------------------- */
#footer{
	margin: 0;
	padding-left:85px;
	padding-top: 1em;
	padding-bottom:1em;
	border-top: 1px dotted #ccc;
	background: #fff;
	font-size: 10px;
	color: #333;
	text-decoration: none;
	clear:both;
	line-height: 1.4em;
	}

#footer a{
	color: #000000;
	}#main h3 {
	font-family: Arial, Helvetica, sans-serif;
	color: #400032;
	font-size: 16px;
	line-height: 1.6;
	font-weight: normal;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #CCCCCC;
}
CSS;
?>
