<?php
require __DIR__ . '/../app/controllers/HomeController.php';

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? null;

$controller = new HomeController();

if ($action === 'contact') {
    $controller->submitContact();
} else {
    $controller->index($page);
}