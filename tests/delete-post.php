<?php
// Récupérer l'EntityManager
use App\Entity\Post;

$entityManager=require_once __DIR__."/../config/bootstrap.php";
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
// Récupérer l'entité à supprimer

$post=$entityManager->getRepository(Post::class)->find(5);
if($post) {
    // Suppression
    $entityManager->remove($post);
    $entityManager->flush();
}else{
    echo "Le poste n'existe pas";
}