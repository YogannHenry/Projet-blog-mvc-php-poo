<?php
// src/controllers/homepage.php

require_once('src/utils/databases.php');
require_once('src/model/post.php');


//ici, on va chercher les posts dans la base de données
function homepage()
{

	//on instancie la classe PostManager
	$PostManager = new PostManager();
	//on lui donne une connection à la base de données
	$PostManager->connection = new DatabaseConnection();
	//on récupère les posts
	$posts = $PostManager->getPosts();

	//on affiche le template
	require('templates/homepage.php');
}