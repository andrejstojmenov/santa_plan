<?php
/*ob_start();*/


/*register_shutdown_function( "fatal_handler" );

function fatal_handler() {
    $errfile = "unknown file";
    $errstr  = "shutdown";
    $errno   = E_CORE_ERROR;
    $errline = 0;

    $error = error_get_last();

    if( $error !== NULL) {
        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];

        echo '<h1>Custom error handler</h1>';
        echo '<pre>';
        print_r($error);
        echo '</pre>';
        die();
    }
}*/

// Startuvaj sesija
session_start();

// Vlkuci pomosni funckii
require ('includes/functions.php');

// Vkluci pomosni klasi
foreach (glob("includes/classes/*.php") as $filename)
{
	include $filename;
}
//include 'fpdf17/fpdf.php';
//include 'tfpdf/tfpdf.php';

// Kreiraj objekti od pomosni klasi
$auth = new Auth();
$helper = new Helper();
//$pdf=new FPDF();
//$tpdf=new tFPDF();


// Povrzi se so bazata
$db = mysqli_connect("localhost","santapla_db_user", "Pass1234567") or die('Can not connect to database "santapla_db_user"') ;


mysqli_select_db($db, "santapla_db") or die('Can not select db "santapla_db" ');
