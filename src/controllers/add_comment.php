<?php

require_once('src/model/comment.php');

function addComment(string $post, array $input)
{
	$author = null;
	$comment = null;
	$CommentManager = new CommentManager();
	$CommentManager->connection = new DatabaseConnection();
	
	if (!empty($input['author']) && !empty($input['comment'])) {
    	$author = $input['author'];
    	$comment = $input['comment'];
	} else {
    	die('Les données du formulaire sont invalides.');
	}

	$success = $CommentManager->createComment($post, $author, $comment);
	if (!$success) {
    	die('Impossible d\'ajouter le commentaire !');
	} else {
    	header('Location: index.php?action=post&id=' . $post);
	}
}