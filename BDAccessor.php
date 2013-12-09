<?php

/**
 * funcions utilitat d'accés a bases de dades
 * @author Sergi Grau <sergi.grau@fje.edu>
 * @version 1.0 18.03.2013
 */


$MYSQL_ERRNO = '';
$MYSQL_ERROR = '';

/**
 * funció que realitza la connexió a una Base de dades
 * @global string $dbhost
 * @global string $dbusername
 * @global string $dbuserpassword
 * @global string $default_dbname
 * @global string $MYSQL_ERRNO
 * @global string $MYSQL_ERROR
 * @param string $dbname
 * @return int
 */
function db_connect($dbname = '') {
	global $dbhost, $dbusername, $dbuserpassword, $default_dbname;
	global $MYSQL_ERRNO, $MYSQL_ERROR;
	$link_id = mysql_connect($dbhost, $dbusername, $dbuserpassword);
	if (!$link_id) {
		$MYSQL_ERRNO = 0;
		$MYSQL_ERROR = 'problemes en la connexio amb $dbhost';
		return 0;
	} else if (empty($dbname) && !mysql_select_db($default_dbname)) {
		$MYSQL_ERRNO = mysql_errno();
		$MYSQL_ERROR = mysql_error();
		return 0;
	} else if (!empty($dbname) && !mysql_select_db($dbname)) {
		$MYSQL_ERRNO = mysql_errno();
		$MYSQL_ERROR = mysql_error();
		return 0;
	} else
		return $link_id;
}

/**
 * funció que omple els codis d'error generats per MySQL
 * @global string $MYSQL_ERRNO
 * @global string $MYSQL_ERROR
 * @return type
 */
function sql_error() {
	global $MYSQL_ERRNO, $MYSQL_ERROR;
	if (empty($MYSQL_ERROR)) {
		$MYSQL_ERRNO = mysql_errno();
		$MYSQL_ERROR = mysql_error();
	}
	return "$MYSQL_ERRNO: $MYSQL_ERROR";
}
 ?>
