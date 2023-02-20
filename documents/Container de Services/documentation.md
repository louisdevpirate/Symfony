Le Container de Services est le coeur névralgique de Symfony ! Suivez cette section avec attention et rien ne pourra vous arrêter pour créer ce que vous voulez avec le framework !

📖 En savoir plus sur le container de services de Symfony : https://symfony.com/doc/current/service_container.html

## CONTAINER DE SERVICES

**Le container de services fait partie de la librairie symfony/dependency-injection**

Si on prend l'exemple de notre classe HelloController, on a injecté dans son constructeur une **autre classe** LoggerInterface pour pouvoir la faire vivre, car sans cette dépendance elle ne pourrait pas fonctionner. C'est ce qu'on appelle de l'injection de dépendances, et c'est le <u>container de services</u> qui s'en charge. C'est lui qui s'occupe pour chaque classe d'aller chercher la dépendance dont elle a besoin, et peut-être que cette dépendance a elle-même besoin d'une dépendance, et ainsi de suite...Tout ça c'est le container de services qui s'en occupe. **Il gère les classes et les dépendances.** Mais du coup lorsqu'on fait un *symfony console debug:autowiring*, on peut voir que le container de services connaît déjà pleins de classes par défaut. Qui a injecté ces classes ? 
Et bien c'est ce qu'on appelle les **Bundles** de SYmfony. Quand on utilise Symfony, on utilise un coeur, sur lequel on vient greffer des bundles, qui vont eux-mêmes injecter des services dans le container de services. 
De plus, ce qu'il y a de super, c'est que le container de services est lui-même configuré de telle façon que lorsqu'on crée notre propre service, il sait le reconnaître grâce au dossier *src*. Ce que cela veut donc dire, c'est que lorsqu'on crée un service, une classe dans le dossier src, le container de services peut y avoir accès, et lorsqu'on appelle ce service dans une autre classe, dans un autre fichier, le container de services va être en mesure de nous la construire et de l'injecter. 


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


## INJECTION MANUELLE

Si d'aventure on venait à télécharger une librairie (sur un site comme packagist.org par exemple), cette librairie s'installerait dans le dossier *vendor*. Or, comme expliqué précédemment, le container de services ne reconnait que les classes rangées dans le dossier *src*. On pourrait alors créer une nouvelle instance directement dans la classe en utilisant "new Slugify" (par exemple), mais comme on l'a vu, créer une classe peut parfois nécessiter plusieurs injections de dépendances au préalable ce qui peut s'avérer laborieux dans certains cas.
Pour palier à ce problème et pouvoir placer la classe/dépendance directement dans le container de services, on peut se rendre dans le fichier *services.yaml* et rendre notre classe visible au container de services grâce à une simple tilde "~". 
Dans notre cas, avec le Slugify, cela donnerait cette ligne : Cocur\Slugify\Slugify : ~ (A placer encore une fois en bas du fichier *services.yaml*).
Le fichier services.yaml sert donc à faire connaître au container de services les classes qu'il ne peut pas connaître tout seul. Une fois qu'il connait la classe, nous n'avons plus qu'à lui demander de nous la "livrer" en entrant (Slugify $slugify) dans ce dernier (attention à ne pas oublier le use).



