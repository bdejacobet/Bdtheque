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

*   lancer le chargement des fixtures

		$ php app/console doctrine:mongodb:fixtures:load

import de Series et de ComicStrop via un fichier csv :
----------------------------------

*   ajouter le bundle suivant dans votre composer.json

		"ddeboer/data-import-bundle": "~0.1"

*   format du csv (venant de l'export de BDGuest ): IdLocal;IdAlbum;Series;Num;NumA;Titre;Editeur;EO;DL;Cote;Etat;DateAchat;PrixAchat;Note;Wishlist;AVendre;Perso1;Perso2;Perso3;Perso4;ISBN;Origine;Style;Collection;Scenariste;Dessinateur;Format;Statut;Suivi;Commentaire;AI
*   dépot du fichier dans le répertoire /app/csv/
*   lancement de la commande d'import :
        Les séries (en fct du 'title') et les ComicStrip (en fct du ISBN) existantes ne sont pas recréées.
        Les ComicStrip importés sont associés au user dont le username et passé en paramètre à la commande.

		$ php app/console bdtheque:import "nom_fichier.csv" "username"

