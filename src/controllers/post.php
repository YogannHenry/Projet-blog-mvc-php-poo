<?php
// src/controllers/post.php

require_once('src/utils/databases.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

function post(string $identifier)
{
	$PostManager = new PostManager();
	$PostManager->connection = new DatabaseConnection();
	$post = $PostManager->getPost($identifier);
	$CommentManager = new CommentManager();
	$CommentManager->connection = new DatabaseConnection();
	$comments = $CommentManager->getComments($identifier);

	require('templates/post.php');
}