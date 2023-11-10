<?php
// src/model/comment.php

require_once('src/utils/databases.php');

class Comment
{
	public string $author;
	public string $comment;
	public string $frenchCreationDate;
}

class CommentManager
{
 public DatabaseConnection $connection;

	public function getComments(string $post)
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y') AS french_creation_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
		);
		$statement->execute([$post]);
	
		$comments = [];
		while (($data = $statement->fetch())) {
			$comment = new Comment();
			$comment->author = $data['author'];
			$comment->comment = $data['comment'];
			$comment->frenchCreationDate = $data['french_creation_date'];
			
	
			$comments[] = $comment;
		}
	
		return $comments;
	}
	
	public function createComment(string $post, string $author, string $comment)
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
		);
		$affectedLines = $statement->execute([$post, $author, $comment]);
	
		return ($affectedLines > 0);
	}
}


