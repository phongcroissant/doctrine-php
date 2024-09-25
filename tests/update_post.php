<?php
// Récupérer l'EntityManager
use App\Entity\Post;

$entityManager=require_once __DIR__."/../config/bootstrap.php";
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$post=$entityManager->getRepository(Post::class)->find(4);
if($post){
    $post->setContenu('Le contenu a été modifié');
    $entityManager->flush();
}else{
    echo "Le poste n'existe pas";
}