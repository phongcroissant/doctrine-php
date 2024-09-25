<?php
// Récupérer l'EntityManager
use App\Entity\Post;

$entityManager=require_once __DIR__."/../config/bootstrap.php";
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
// Créer un nouveau post
$post=new Post();
$post->setTitre("Nouveau post");
$post->setContenu("Nouveau contenu");
$post->setCreatedDate(new \DateTime());

// Demander à l'EntityManager de persister l'entité $post dans la table posts

$entityManager->persist($post); // N'exécute pas directement les inserts
$entityManager->flush(); // Valider le insert