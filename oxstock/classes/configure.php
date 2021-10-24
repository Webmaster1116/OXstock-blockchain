<?php
ob_start();
session_set_cookie_params(3600);
session_name('OXSTOCK');
session_start();
set_time_limit(0);
error_reporting(E_ALL);
//date_default_timezone_set('Asia/Kolkata');
ini_set('display_errors', TRUE);

define('URL_BASE', 'http://' . $_SERVER['HTTP_HOST'] . '/oxstock/');
define('DIR_BASE', $_SERVER['DOCUMENT_ROOT'] . '/oxstock/');
define('URL_BASEADMIN', 'http://' . $_SERVER['HTTP_HOST'] . '/oxstock/ox-admin/');
define('DIR_BASEADMIN', $_SERVER['DOCUMENT_ROOT'] . '/oxstock/ox-admin/');

define('DIR_UPLOADS', 'uploads/');
define('DIR_SECURE', 'secure/');
define('DIR_INCLUDES', 'includes/');
define('DIR_CLASSES', 'classes/');
define('DIR_FUNCTIONS', 'functions/');
define('DIR_IMAGES', 'img/');
define('DIR_JS', 'js/');
define('DIR_CSS', 'css/');
define('DIR_SMTP', 'smtp/');
define('DIR_JQUERYUI', 'jqueryui/');
define('DIR_FANCYBOX', 'fancybox/');
define('DIR_VALIDTIPS', 'validtips/');

define('SITENAME', 'Oxstocks');

define('MAIL_HOST','smtp.gmail.com');
define('MAIL_PORT','465');
define('MAIL_SSL','tls');
define('MAIL_SMTPAUTH','false');
define('MAIL_USERNAME','noreply@kpve.com.au');
define('MAIL_PASSWORD','kpve2018');
define('MAIL_FROMEMAIL','bookings@quayandco.com.au');
define('MAIL_FROMNAME','Oxstocks');
date_default_timezone_set('Australia/Sydney');

/* Define Currency Sign */
define('CUR_SIGN', '$');
/* Deafult Variables * */
define('DEF_COUNTRY', '11');
define('DEF_PROVINCE', '1');
define('DEFAULT_LIMIT', '12');
define('BASSOCCIATES', 'Oxstocks');
define('BASSOCCIATES_LINK', 'http://quayandco.com.au/');

require_once(DIR_CLASSES .'class.pdohelper.php');
require_once(DIR_CLASSES .'class.pdowrapper.php');
require_once(DIR_CLASSES .'class.pdowrapper-child.php');

global $db, $helper, $userId, $con;

define('DBHOST', 'localhost');
define('DBNAME', 'oxstock');
define('DBUSER', 'root');
define('DBPASS', '');
$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

$databasebConfig = array("host" => DBHOST, "dbname" => DBNAME, "username" => DBUSER, "password" => DBPASS);
$db = new PdoWrapper($databasebConfig);

$helper = new PDOHelper();

$_SESSION['userId'] = ((isset($_SESSION['userId']) && $_SESSION['userId'] != '') ? $_SESSION['userId'] : 0);
$userId = $_SESSION['userId'];
$_SESSION['message_type'] = ((isset($_SESSION['message_type']) && $_SESSION['message_type'] != '') ? $_SESSION['message_type'] : '');
$_SESSION['message'] = ((isset($_SESSION['message']) && $_SESSION['message'] != '') ? $_SESSION['message'] : '');

include(DIR_BASE.DIR_CLASSES.'definefilename.php');
include(DIR_BASE.DIR_CLASSES.'definetablename.php');	
include(DIR_BASE.DIR_FUNCTIONS.'mysqlfunction.php');	
include(DIR_BASE.DIR_FUNCTIONS.'utilityfunction.php');
?>
