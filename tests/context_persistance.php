<?php
// Récupérer l'EntityManager
use App\Entity\Post;

$entityManager=require_once __DIR__."/../config/bootstrap.php";
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$post=$entityManager->getRepository(Post::class)->find(4);
$contextPersistance=$entityManager->getUnitOfWork();
echo $contextPersistance->getEntityState($post).PHP_EOL;
$entityManager->remove($post);
echo $contextPersistance->getEntityState($post).PHP_EOL;
$nouveauPost=new Post();
$nouveauPost->setTitre('Nouveau post');
$nouveauPost->setContenu("Nouveau contenu");
$nouveauPost->setCreatedDate(new \DateTime());
echo $contextPersistance->getEntityState($nouveauPost).PHP_EOL;
$entityManager->persist($nouveauPost);
echo $contextPersistance->getEntityState($nouveauPost).PHP_EOL;
$entityManager->flush();