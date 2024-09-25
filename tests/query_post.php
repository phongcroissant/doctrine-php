<?php
// Récupérer l'EntityManager
use App\Entity\Post;

$entityManager=require_once __DIR__."/../config/bootstrap.php";
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */

// Utilisation de QueryBuilder afin de construire des requêtes dynamiques

// Création d'un objet de la classe queryBuilder
$db=$entityManager->createQueryBuilder();
$nbLikes=70000;
$db
    ->select("p")
    ->from(Post::class, 'p')
    ->where("p.nbLikes > :nbLikes")
    ->setParameter("nbLikes", $nbLikes)
    ->orderBy("p.nbLikes", "DESC");

//Equivalent
//$db=$db->select("p");
//$db=$db->from(Post::class, 'p');
//// insérer des codes
//$db=$db->where("p.nbLikes > :nbLikes");
//$db=$db->setParameter("nbLikes", $nbLikes);
//$db=$db->orderBy("p.nbLikes", "DESC");

// Créatoin d'un objet Query à partir du queryBuilder
$query=$db->getQuery(); // $query est un objet qui contient maintenant la requête en dql
// Exécution de la requête
$posts=$query->getResult();
// Affichage des résultats

foreach ($posts as $post) {
    echo $post->getTitre().PHP_EOL;
}