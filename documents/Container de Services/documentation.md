Le Container de Services est le coeur névralgique de Symfony ! Suivez cette section avec attention et rien ne pourra vous arrêter pour créer ce que vous voulez avec le framework !

📖 En savoir plus sur le container de services de Symfony : https://symfony.com/doc/current/service_container.html



## IMPORTANT :

- symfony console debug:autowiring
(permet d'afficher la liste des services du container de services Symfony)

- symfony console debug:autowiring log
(permet d'afficher un des services du container de base de Symfony, en l'occurence le service log)

- symfony console debug:autowiring nom_du_service --all
(permet d'afficher un service que vous avez créé en sondant tout le container, grâce à la spécificité --all)


*Pour créer votre propre service, rien de plus simple, il suffit d'aller dans le dossier src, de créer un nouveau dossier avec le nom de votre choix, puis de créer un fichier .php à l'intérieur qui contiendra une fonction.*

Si vous voulez ensuite importer ce service dans un autre fichier, une autre classe, il suffit de faire un use App\NomDuDossier\NomDeLaFonction, puis de l'utiliser en paramètre d'une fonction __construct
-> Voir tout ceci dans l'exemple du commit "création du service Calculator" lié à ce fichier 
