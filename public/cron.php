<?php
error_reporting(E_ALL & ~E_NOTICE);
$time 		= microtime();
$time 		= explode(' ', $time);
$time 		= $time[1] + $time[0];
$start 		= $time;

DEFINE('START', $start);
syslog(LOG_INFO, "------------------------------------------------------------");
syslog(LOG_INFO, "BEGIN ".__FILE__);
syslog(LOG_INFO, "------------------------------------------------------------");

require '/var/www/me-prod/inc/init.inc.php';

$Obj 	= new Common();
//$Obj	= $Obj->Zoho->_syncAllJobOpenings();
$Obj	= $Obj->Zoho->_syncAllCandidates();

syslog(LOG_INFO, "------------------------------------------------------------");
syslog(LOG_INFO, "END ".__FILE__);
syslog(LOG_INFO, "------------------------------------------------------------");

?>
