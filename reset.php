<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<p>Resetting session...</p>
<?php
session_start();
session_unset();
session_destroy();
$_SESSION = array();
?>
<p>Session has been reset</p>
</body>

</html>
