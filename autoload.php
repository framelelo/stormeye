<?php


session_start();
global $base_url, $isConnected, $p;
$base_url = "http://localhost/stormeye/";

$isConnected = isset($_SESSION["users"]);

$p = isset($_GET['p']);

// Importer tous les controllers , models , templates

foreach (glob("models/*.php") as $filename) {
    require_once $filename;
}
foreach (glob("views/*.php") as $filename) {
    require_once $filename;
}
foreach (glob("controllers/*.php") as $filename) {
    require_once $filename;
}