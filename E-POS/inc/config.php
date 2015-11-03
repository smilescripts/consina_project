<?php
date_default_timezone_set("Asia/Jakarta");
mysql_connect("localhost","root","");
mysql_select_db("consina_project");

ini_set( "display_errors", true );
define( "HOST", "localhost" );
//nama database
define( "DATABASE_NAME", "consina_project" );
define( "DB_USERNAME", "root" );
//password mysql
define( "DB_PASSWORD", "" );
//dir admin
define( "DIR_ADMIN", "consina_project/E-POS/");
//main directory
define( "DIR_MAIN", "consina_project/");


define('DB_CHARACSET', 'utf8');

require_once ('Database.php');
require_once ('Datatable.php');
require_once ('My_pagination.php');
require_once ('url.php');

$db=new Database();
$pg=New My_pagination();
$dtable = new TableData();

function handleException( $exception ) {
  echo  $exception->getMessage();
}

set_exception_handler('handleException' );

$koneksi=mysql_connect(HOST,DB_USERNAME,DB_PASSWORD); 
$selectdb=mysql_select_db(DATABASE_NAME); 

date_default_timezone_set("Asia/Jakarta");

?>
