<?php

// ici, on crée une classe qui va nous permettre de nous connecter à la base de données
class DatabaseConnection
{

    // on crée une propriété qui va encapsuler/contenir notre connexion à la base de données
    // le ?PDO signifie que la propriété peut être null
	public ?PDO $database = null;

	public function getConnection(): PDO
	{
    	if ($this->database === null) {
        	$this->database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
    	}

    	return $this->database;
	}
}