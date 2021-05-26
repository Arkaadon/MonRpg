<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

// Je récupére l'autoloader pour pouvoir récupéré par la suite les fichier de doctrine
require_once __DIR__ . "/../vendor/autoload.php";


function GetEntityManager()
{
    /**
     * L'entityManager à besoin pour fonctionner correctement de 2 paramétres.
     * Le premier est un tableau contenant des informations pour se connecter à la base de données
     */
    return EntityManager::create([
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => '',
        'dbname' => 'rpg'
    ], Setup::createAnnotationMetadataConfiguration(['app/Class'], false, null,null,false)
    );
}



