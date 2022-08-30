<?php

if ( version_compare( PHP_VERSION, '5.3.7', '<' ) ) {
	exit( "Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !" );
} else if ( version_compare( PHP_VERSION, '5.5.0', '<' ) ) {
	require_once( "assets/libraries/password_compatibility_library.php" );
}

require_once( "assets/config/db.php" );
require_once( "assets/php/Login.php" );

$login = new Login();

if ( $login->isUserLoggedIn() == true ) {
	include("core/not_logged_in.php");
} else {
	include( "core/not_logged_in.php" );
}