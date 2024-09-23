<?php
// Récupérer l'EntityManager
use App\Entity\Post;

$entityManager=require_once __DIR__."/../config/bootstrap.php";
/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */
// Récupérer un PostRepository génère automatiquement par Doctrine
$postRepository=$entityManager->getRepository(Post::class);

// Liste des posts
echo "Liste des posts \n";
$posts=$postRepository->findAll(); // SELECT * FROM posts
foreach ($posts as $post) {
    echo $post->getTitre()."\n";
}

// Lister un post recherché via son id
echo "Liste des posts ayant id : 1 \n";
$post=$postRepository->find(1); // SELECT * FROM posts WHERE id_post=1
if ($post) {
    echo $post->getTitre()."\n";
} else {
    echo"Le poste d'existe pas".PHP_EOL;
}

// Lister un post via son titre
echo "Liste des posts ayant titre :'Poste 2' \n";
$post2=$postRepository->findOneBy(["titre"=>"Poste 2"]); // SELECT * FROM posts where titre_post="Poste 2"
if ($post2) {
    echo $post2->getTitre()."\n";
} else {
    echo"Le poste d'existe pas".PHP_EOL;
}
