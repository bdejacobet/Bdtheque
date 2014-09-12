Bdtheque
========================

utilisation de mongodb :
----------------------------------

*   installer mongodb sur le serveur
*   ajouter les bundles suivant dans votre composer.json

		"doctrine/mongodb-odm": "1.0.*@dev",
		"doctrine/mongodb-odm-bundle": "3.0.*@dev"

*   ajouter dans votre app/autoload.php

		use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
		AnnotationDriver::registerAnnotationClasses();

*   configurer mongodb dans votre app/config/config.yml

		doctrine_mongodb:
			connections:
				default:
					server: mongodb://localhost:27017
					options: {}
			default_database: bdtheque_database
			document_managers:
				default:
					auto_mapping: true

utilisation de Assetic :
----------------------------------

*   ajouter ce bundle dans la liste des bundles d'assetic dans votre app/config/config.yml

		assetic:
            debug:          "%kernel.debug%"
            use_controller: false
            bundles:
                - "BeniBdthequeBundle"

*   ajout des routes dans votre app/config/routing.yml

	beni_bdtheque:
        resource: "@BeniBdthequeBundle/Resources/config/routing.yml"
        prefix:   /

chargement des fixtures :
----------------------------------

*   ajouter le bundle suivant dans votre composer.json

		"doctrine/doctrine-fixtures-bundle": "dev-master"

*   suppression des anciennes données et recréation de la base de données vide

		$ php app/console doctrine:mongodb:schema:drop
		$ php app/console doctrine:mongodb:schema:create

*   lancer le chargement des fixtures

		$ php app/console doctrine:mongodb:fixtures:load
