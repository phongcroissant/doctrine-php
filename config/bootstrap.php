<?php
// Configuration de l'EntityManager

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__."/../vendor/autoload.php";
// Définir l'emplacement des entités
$path=[__DIR__."/../src/Entity"];
$isDevMode=true;
// Définir la configuration des entités
$configuration= ORMSetup::createAttributeMetadataConfiguration($path,$isDevMode);
// Définir les éléments de connexion à la base de données
$configurationDB= [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'dbname' => 'db_postes'
];
// Créer la connexion à la base de données
$connexionDB=DriverManager::getConnection($configurationDB,$configuration);

// Créer 1 EntityManager
$entityManager= new EntityManager($connexionDB,$configuration);
return $entityManager;