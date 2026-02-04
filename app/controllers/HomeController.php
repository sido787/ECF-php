<?php

require_once __DIR__ . '/../models/Contact.php';

class HomeController
{
    public function index($page = 'home')
    {
        $view = __DIR__
         . '/../views/' . $page . '.php';

        if (file_exists($view)) {
            require $view;
        } else {
            echo '404 - page not found';
        }
    }

    public function submitContact()
    {
        Contact::create(
            $_POST['name'],
            $_POST['email'],
            $_POST['message']
        );

        echo 'OK';
    }
}