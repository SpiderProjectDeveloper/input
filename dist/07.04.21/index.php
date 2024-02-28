<?php
require('auth.php');

if( isAuthRequired() ) {
	$userName = auth(false);
} else {
	$userName = '';
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<script id="bundle" src="bundle.js" data-username="<? echo($userName); ?>"  charset="utf-8"></script>

</body>

</html>

