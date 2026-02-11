##  Authentification

Accès sécurisé via session PHP.

### Default login:

email: afpa@fr 
password: 1234



#  Gestion des Livres - PHP MVC Project

Projet MVC simple développé en PHP avec Twig et PDO.

##  Fonctionnalités

- Authentification (Connexion / Déconnexion)
- CRUD Livres:
  - Ajouter un livre
  - Modifier (AJAX)
  - Supprimer
  - Liste des livres
- Protection des routes (auth required)
- Design Bootstrap
- Recherche live

##  Architecture

- MVC Pattern
- Twig Template Engine
- PDO Singleton Database

##  Authentification

Accès sécurisé via session PHP.

## 🛠 Technologies

- PHP
- Twig
- MySQL
- Bootstrap
- AJAX

## ▶ Installati

## ⚙️ Installation

1. Cloner le projet :

git clone https://github.com/sido787/ECF-php.git

2. Installer les dépendances :

composer install

3. Configurer la base de données dans :

app/models/Database.php

Modifier :

- nom de la base
- utilisateur
- mot de passe

4. Lancer le serveur :

http://localhost:8000/index.php?page=login
