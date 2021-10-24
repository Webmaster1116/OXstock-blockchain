<?php

ob_start();
session_start();
error_reporting('E_ALL & ~E_NOTICE');

class Connect {

    function Connect() {
        
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
        
        define('MAIL_FROMNAME', 'Oxstocks');
        date_default_timezone_set('Australia/Sydney');

        /* Define Currency Sign */
        define('CUR_SIGN', '$');
        /* Deafult Variables * */
        define('DEF_COUNTRY', '11');
        define('DEF_PROVINCE', '1');
        define('DEFAULT_LIMIT', '12');
        define('BASSOCCIATES', 'Oxstocks');
        define('BASSOCCIATES_LINK', 'http://quayandco.com.au/');
    }

    function dbconnect() {
        define('DBHOST', 'localhost');
        define('DBNAME', 'oxstock');
        define('DBUSER', 'root');
        define('DBPASS', '');
        $connect = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
        return $connect;
    }

}
