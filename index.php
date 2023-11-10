<?php

//on require les fichiers nos controllers
require_once('src/controllers/add_comment.php');
require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

/******************************************************************************************* */
// c'est page initial de notre site, elle fait appel defaut à la fonction homepage du controller homepage (acceuil)
//  ensuite si une action est appelé elle va faire appel au controller pour afficher le bon template
/******************************************************************************************* */



// on vérifie si l'action existe et si elle n'est pas vide

if (isset($_GET['action']) && $_GET['action'] !== '') {
	//on vérifie si l'action est égale à post
	if ($_GET['action'] === 'post') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

			//on appelle la fonction post
        	post($identifier);
    	} else {
        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
	} elseif ($_GET['action'] === 'addComment') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

        	addComment($identifier, $_POST);
    	} else {
        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
	} else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
} else {
	homepage();
}