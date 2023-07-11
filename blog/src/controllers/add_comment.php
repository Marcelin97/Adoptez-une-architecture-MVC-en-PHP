<?php
require_once('src/model/comment.php');
require_once('src/lib/database.php');

// function addComment qui prend en paramètre l'identifiant du post et un input sous forme de tableau. cet input ce sont les données soumises par le formulaire
function addComment(string $post, array $input)
{
	// ici je récupère l'auteur et le commentaire
	$author = null;
	$comment = null;
	if (!empty($input['author']) && !empty($input['comment'])) {
		$author = $input['author'];
		$comment = $input['comment'];
	} else {
		throw new Exception('Les données du formulaire sont invalides.');
	}

	// ensuite j'appel la fonction createComment défini par un nouveau modèle
	// elle prend en paramètre, l'id du post, de l'auteur et du commentaire
	$commentRepository = new CommentRepository();
	$commentRepository->connection = new DatabaseConnection();
	$success = $commentRepository->createComment($post, $author, $comment);
	if (!$success) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		// si la création a réussi elle redirige vers la page du post avec le nouveau commentaire
		header('Location: index.php?action=post&id=' . $post);
	}
}
