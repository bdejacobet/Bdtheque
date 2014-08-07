Bdtheque
========================

1) Installation
----------------------------------

utilisation de mongodb :

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

*   ajouter ce bundle dans la liste des bundles d'assetic dans votre app/config/config.yml

		assetic:
            debug:          "%kernel.debug%"
            use_controller: false
            bundles:
                - "BeniBdthequeBundle"

ajout des routes dans votre app/config/routing.yml

	beni_bdtheque:
        resource: "@BeniBdthequeBundle/Resources/config/routing.yml"
        prefix:   /
