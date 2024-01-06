<?php
require_once '../config.php';
require_once '../controllers/RaceController.php';

$method = $_SERVER['REQUEST_METHOD'];
$controller = new RaceController();

if ($method === 'POST') {
    $controller->createOne();
} else if ($method === 'GET') {
     $controller->listAll();
}




