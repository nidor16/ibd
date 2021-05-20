<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);
session_start();
require_once 'vendor/autoload.php';

use Ibd\Koszyk;

$koszyk = new Koszyk();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    if ($koszyk->czyIstnieje($_GET['id'], session_id())) {
        if ($koszyk->usun($_GET['id'], session_id())) {
            echo 'ok';
        }
    }
}
