<?php

session_start(); //   Démarrage de la session pour la gestion de l'authentification

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../app/controllers/HomeController.php';

// Twig setup
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../app/views');
$twig = new \Twig\Environment($loader);

$twig->addGlobal('session', $_SESSION);

// Router simple
$page = $_GET['page'] ?? 'home';

$controller = new HomeController($twig);
$controller->index($page);