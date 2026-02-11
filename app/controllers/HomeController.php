<?php

require_once __DIR__ . '/../models/livre.php';

class HomeController
{
    private $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    
    public function index($page = 'home')
    {
        $data = [];

        // pages protégées

$protectedPages = ['livres','livre.add','livre.edit','livre.delete'];

if(in_array($page, $protectedPages) && !isset($_SESSION['user'])){
    
    header('Location: index.php?page=login');
    exit;
}

       
        // PROTECTION AUTH
        
        if (!isset($_SESSION['user']) && $page !== 'login') {

            header('Location: index.php?page=login');
            exit;
        }

        
        // LOGIN
        
        if ($page === 'login') {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = $_POST['email'] ?? '';
                $password = $_POST['password'] ?? '';

                
                if ($email === 'afpa@fr' && $password === '1234') {

                    $_SESSION['user'] = $email;

                    header('Location: index.php?page=livres');
                    exit;
                }
            }
        }

        
        // LOGOUT
        
        if ($page === 'logout') {

            session_destroy();

            header('Location: index.php?page=login');
            exit;
        }

        
        // LIST LIVRES
        
        if ($page === 'livres') {

            $data['livres'] = Livre::getAll();
        }

       
        // ADD LIVRE
        
        if ($page === 'livre.add') {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $titre = $_POST['titre'] ?? '';
                $annee = $_POST['annee'] ?? '';
                $disponible = isset($_POST['disponible']) ? 1 : 0;

                Livre::create($titre, $annee, $disponible);

                header('Location: index.php?page=livres');
                exit;
            }
        }

        
        // DELETE LIVRE (AJAX READY)
        
        if ($page === 'livre.delete') {

            $id = $_GET['id'] ?? $_POST['id'] ?? null;

            if ($id) {
                Livre::delete($id);
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode(['success' => true]);
                exit;
            }

            header('Location: index.php?page=livres');
            exit;
        }

       
        // EDIT LIVRE (AJAX READY)
        
        if ($page === 'livre.edit') {

            $id = $_GET['id'] ?? $_POST['id'] ?? null;

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

                if ($id) {
                    $data['livre'] = Livre::getOne($id);
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $titre = $_POST['titre'] ?? '';
                $annee = $_POST['annee'] ?? '';
                $disponible = isset($_POST['disponible']) ? 1 : 0;

                Livre::update($id, $titre, $annee, $disponible);

                echo json_encode(['success' => true]);
                exit;
            }
        }

        echo $this->twig->render($page . '.twig', $data);
    }
}