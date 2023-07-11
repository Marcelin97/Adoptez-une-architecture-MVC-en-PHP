<?php
require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

use Application\Controllers\AddComment\AddComment;
use Application\Controllers\Homepage\Homepage;
use Application\Controllers\Post\Post;

// condition sur la présence ou non du paramètre HTTP ACTION
try {
    //code...
    if (isset($_GET['action']) && $_GET['action'] !== '') { // Je vérifie la présence du paramètre action et en même temps qu'il n'est pas vide
        if ($_GET['action'] === 'post') { // si l'action vaut bien 'post'
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier); // on utilise la fonction post en lui passant en paramètre un identifiant qui sera récupérer via le routeur
            } else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception("aucun identifiant de billet envoyé");
            }
        } else {
            throw new Exception("la page que vous recherchez n\'existe pas.");
        }
    } else { // si la paramètre action n'est pas là on affiche la homepage
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
