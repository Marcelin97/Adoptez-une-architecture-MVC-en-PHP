<?php
require_once('src/model/post.php');
require_once('src/model/comment.php');
require_once('src/lib/database.php');

function post(string $identifier)
{
	$connection = new DatabaseConnection();

	$postRepository = new PostRepository();
	$postRepository->connection = $connection;
	$post = $postRepository->getPost($identifier);

	$commentRepository = new CommentRepository();
	$commentRepository->connection = $connection;
	$comments = $commentRepository->getAllComments($identifier);

	require('templates/post.php');
}
