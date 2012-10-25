<?php
header('Content-type: text/css');

echo <<<CSS
body {
  background:#E9D4D7 url("../static/images/background.gif") fixed;
  margin:0;
  color:#333333;
  font:12px/1.4 Arial, Helvetica, sans-serif;
  text-align: center;
  }
  
a:link {
  color:#9F8098;
  text-decoration:none;
  }
a:visited {
  color:#9F8098;
  text-decoration:none;
  }
a:hover {
  color:#32527A;
  text-decoration:underline;
}
a img {
	border-width:0;
	}

h2 {
  margin:2em 0 .5em;
  font:normal 10px/1.4 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif;
  text-transform:uppercase;
  letter-spacing:.2em;
  color:#999;
border-bottom:1px solid #333;
padding-bottom: .5em;
}



/* Posts main content
----------------------------------------------- */
h2.date-header {
  margin:2em 0 .5em;
border-bottom:1px solid #333;padding-bottom: .5em;
  }
h2.title {margin:2em 0 .5em;border-bottom:1px solid #333;padding-bottom: .5em;}


.post {
  margin:.5em 0 1.5em;
  border-bottom:1px dotted #ccc;
  padding-bottom:1.5em;
  }
.post h3 {
	margin:0em 0 5px;
	padding:0 0 5px;
	font-size:16px;
	font-weight:bold;
	line-height:1.4;
	color:#999999;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #000000;
}

.post h3 a, .post h3 a:visited, .post h3 strong {
  display:block;
  text-decoration:none;
  color:#32527A;
  font-weight:normal;
}

.post h3 strong, .post h3 a:hover {
  color:#333;
}

.post p {
  margin:0 0 .6em;
  line-height:1.4em;
}

.post-footer {
  margin: .75em 0;
  color:#333333;
  text-transform:uppercase;
  letter-spacing:.1em;
  font:normal 85%/1.4em 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif;
}

.comment-link {
  margin-left:.6em;
  }
.post img {
  border:none;
  }
  .post img.border {
  border:solid 1px #ccc;padding:4px;
  }
  
.post blockquote {
  margin:1em 20px;
  }
.post blockquote p {
  margin:.75em 0;
  }
  
  /* Sidebar Content
----------------------------------------------- */
#sidebar_item {
	height:21px;
	overflow:auto;
	width: 303px;
}
/*

.sidebar { 
  color: #666;
  line-height: 1.5em;
 }

.sidebar ul {
  list-style:none;
  margin:0 0 0;
  padding:0 0 0;
}
.sidebar li {
  margin:0;
  padding:0 0 .25em 15px;
  text-indent:-15px;
  line-height:1.5em;
  	width:100px;
	max-width:100px;

  }
*/
.sidebar .widget, .main .widget { 
  border-top:1px dotted #ccc;
  margin:0 0 1.5em;
  padding-top:.5em;
 }

.main .Blog { 
  border-bottom-width: 0;
}.address {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: 1.4;
	margin: 0px;
	padding: 0px;
}
.addresslower {
	text-transform: lowercase;
}
h4 {
	font-size: 13px;
	line-height: 1.4;
	font-weight: normal;
	color: #400032;
	font-family: Arial, Helvetica, sans-serif;
	padding-bottom: 10px;
	margin-bottom: 0px;
}
.bullet {
	margin: 0px;
	padding: 0px;
	border: 0px none;
}
.post img.portrait {
	float: left;
	padding-right: 20px;
	padding-bottom: 10px;
}
.post h4 {
	line-height:1.4;
	margin-top: .5em;
}
.address p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	line-height: 1.4;
	margin: 0px;
	padding: 0px;
}
.pic {
	padding: 4px;
	border: 1px solid #CCCCCC;
}

/* Context-specific styles */
#header-wrapper img.logo {
	height:28px;
	width:166px;
	margin: 67px 587px 21px 85px;
}

#rotator {
	height:180px;
	width:838px;
}

#rotator .rotator {
	float:left;
	height:180px;
	width:334px;
	background-color:#E8E8E8;
}

#rotator img.left, div.right {
	margin-left:85px;
}

#rotator h3.left, p.left {
	margin-left:10px;
	margin-right:10px;
}

#rotator h3.right, p.right {
	margin-left:10px;
	margin-right:10px;
	text-align:right;
}

#casestudy {width:410px;background-color:#EDEDED;height:108px;border-bottom:1px solid #9F8098;margin-bottom:10px;overflow:visible;}
#casestudyimage {margin:4px;border:none; float:left;padding-right:4px;}
#casestudytext {float:right;width:290px;padding:4px;}
#casestudytext h4{margin-top:2px;line-height:1.0;}
#casestudytext p {margin-bottom:0px;margin-top:0px;}
#casestudytext p img{margin:0;}
#clear {clear:both;}
CSS;
?>