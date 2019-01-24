<?php 
    /*
	//error_reporting(0);
    error_reporting(E_ALL);
    ini_set ( 'mssql.textlimit' , '2147483647' );
    ini_set ( 'mssql.textsize' , '2147483647' );    
    define('ROOT_URL','http://'.$_SERVER['SERVER_NAME'].'/');
    
    define('DB_SERVER', "192.168.100.25");
    //define('DB_SERVER', "192.168.100.22,14200");
    define('DB_DB', "MotorBrInvoiceMirror");        
        
    define('DB_USER', "sa");
    define('DB_PASS', "dataport");
    $virtual_dsn = 'DRIVER={SQL Server};SERVER='.DB_SERVER.';DATABASE='.DB_DB;
    $connection = odbc_connect($virtual_dsn,DB_USER,DB_PASS) or die('ODBC Error:: '.odbc_error().' :: '.odbc_errormsg().' :: '.$virtual_dsn);
	*/
	define('DB_SERVER', "192.168.100.25");    
    define('DB_DB', "MotorBrInvoiceMirror");        
    define('DB_USER', "sa");
    define('DB_PASS', "dataport");
    $virtual_dsn = 'DRIVER={SQL Server};SERVER='.DB_SERVER.';DATABASE='.DB_DB;
    $connection = odbc_connect($virtual_dsn,DB_USER,DB_PASS) or die('ODBC Error:: '.odbc_error().' :: '.odbc_errormsg().' :: '.$virtual_dsn);
	//print_r($connection);
	if (!$connection){
		die("Couldn't connect to Database Server");        
	}

?>