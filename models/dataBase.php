<?php

global $pdo;
if (isset($pdo)) {
    return $pdo;
}

$pdo = new PDO("mysql:host=localhost;dbname=stormeye", "root", "root");

