<?php

require "vendor/autoload.php";
require "config.php";
require "library/SaferEval.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_POST['code'])) {
    if (SECURE_SESSION) {
        p($_SESSION[SECURE_SESSION_NAME]);
        if (isset($_SESSION[SECURE_SESSION_NAME])) {
            eval($_POST['code']);
        } else {
            p("<h1 style='text-align: center'>CODE EXECUTION BLOCKED</h1>");
            p("Contact with the administrator.");
        }
    } else {
        eval($_POST['code']);
    }
    die();
}
?>
<html>
	<head>
		<title>PHP online</title>
		<!--script src="http://code.jquery.com/jquery-1.9.1.min.js"></script-->
		<script src="js/codemirror/codemirror.js"></script>
		<link rel="stylesheet" href="js/codemirror/codemirror.css">
		<link rel="stylesheet" href="js/codemirror/monokai.css">
		<link rel="stylesheet" href="css/main.css">
		<script src="js/codemirror/clike/clike.js"></script>
		<script src="js/codemirror/php/php.js"></script>
		<script src="js/codemirror/matchbrackets.js"></script>
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/php.js"></script>
	</head>
	<body>
		<div id="developArea">
			<textarea id="code" name="code"></textarea>
		</div>
		<div id="result">
		</div>
		<script>
			php.init();
		</script>
	</body>
</html>
