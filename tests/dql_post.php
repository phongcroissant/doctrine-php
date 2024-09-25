<?php

// Récupérer l'EntityManager
use App\Entity\Post;

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__ . "/../config/bootstrap.php";

// Lister tous les postes dont le nombre de like est supérieur à un nombre donné
$nbLikes=70000;
$dql="SELECT p FROM App\Entity\Post p WHERE p.nbLikes > :nbLikes";
// Création d'un objet "requête" de la classe Query
$query=$entityManager->createQuery($dql);
// Donner une valeur au paramètre ":nbLikes"
$query->setParameter("nbLikes",$nbLikes);
// Exécution de la requête avec le mapping des enregistrements des objets Post
$posts=$query->getResult();

foreach ($posts as $post) {
    echo $post->getTitre().PHP_EOL;
}
// Lister tous les postes à partir d'une date donnée
echo "Poste crée à partir d'un date donnée".PHP_EOL;
$date=\DateTime::CreateFromFormat('d/m/Y','02/08/2024');
$dql="SELECT p FROM App\Entity\Post p WHERE p.createdDate > :createdDate ORDER BY p.createdDate DESC";
$query=$entityManager->createQuery($dql);
$sql = $query->getSQL();
echo $sql.PHP_EOL;
$query->setParameter("createdDate",$date);
$posts=$query->getResult();
foreach ($posts as $post) {
    echo $post->getTitre().PHP_EOL;
}

echo "Rechercher les 3 posts les plus récents (du plus récents au plus ancien)".PHP_EOL;
$dql="SELECT p FROM App\Entity\Post p ORDER BY p.createdDate DESC";
$query=$entityManager->createQuery($dql);
$query->setMaxResults(3);
$posts=$query->getResult();
foreach ($posts as $post) {
    echo $post->getTitre().PHP_EOL;
}