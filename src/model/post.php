<?php

// namespace App\Model\Post;


require_once('src/utils/databases.php');


//ici on crée une classe qui va nous permettre de récupérer les posts dans la base de données
class Post {

    //on crée des propriétés qui vont contenir les données de nos posts
    public string $title;
    public string $content;
    public string $frenchCreationDate;
    public string $identifier;


}
//ici on crée une classe qui va nous gérer l'ensemble des méthodes liés aux les posts dans la base de données

class PostManager {

    //on appel la classe DatabaseConnection puis on lui donne une connection à la base de données grâce à la propriété $connection
    public DatabaseConnection $connection;

//on va créer une méthode qui va nous permettre de récupérer les posts dans la base de données
    public function getPosts() : array {
        
        $statement = $this->connection->getConnection()->query(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y') AS french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($data = $statement->fetch())) {
            $post = new Post();
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->frenchCreationDate = $data['french_creation_date'];
            $post->identifier = $data['id'];
    
            $posts[] = $post;
        }
    
        return $posts;
    }
    
    public function getPost($identifier) {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
        );
        $statement->execute([$identifier]);
    
        $data = $statement->fetch();
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->frenchCreationDate = $data['french_creation_date'];
        $post->identifier = $data['id'];
    
        return $post;
    }
    
    public function upDatePost($identifier, $title, $content) {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE posts SET title = ?, content = ? WHERE id = ?"
        );
        $statement->execute([$title, $content, $identifier]);
    }
    
    public function deletePost($identifier) {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM posts WHERE id = ?"
        );
        $statement->execute([$identifier]);
    }
}





