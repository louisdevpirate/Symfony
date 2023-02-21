📖 Documentation officielle de Doctrine : https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/index.html

📖 Documentation officielle de Symfony à propos de Doctrine : https://symfony.com/doc/current/doctrine.html 

📖 Documentation officielle du Doctrine Migrations Bundle : https://symfony.com/doc/3.1/bundles/DoctrineMigrationsBundle/index.html

📖 Documentation officielle du Doctrine Fixtures Bundle : https://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html


# LE BUT

Le but d'utiliser Doctrine c'est qu'au lieu de faire les manipulations de données directement dans la base de données, nous ayons juste à passer par le code. On pourrait très bien se sevrir du code pour faire des requêtes SQL à la BDD, mais dans notre cas nous allons utiliser un langage qui s'appelle le DQL, et qui permet de manipuler la BDD en servant des **Entités**. 

### DOCTRINE C EST QUOI ?

Doctrine est un bundle qui va nous permettre de mettre en relation des enregistrements d'une base de données avec des objets de notre code php, grâce à un système d'**ORM** (Object Relational Mapping). Dans notre code Symfony nous allons utiliser des classes qui correspondent à des données de la Base de Données, dans 99% des cas ces clases représenteront les tables de la BDD.

## ENTITE (Enregistrements)

Une entité représente un enregistrement d'une table. C'est une classe que nous allons manipuler dans notre code, par exemple : Une entité/class Product avec un id, une name, un price etc...

## REPOSITORY (Sélections)

Les Repository permettent de sélectionner des enregistrements, des données, dans les tables. Mettons qu'on veuille sélectionner tous les produits de notre BDD, ou seulement les produits qui commencent par un A etc...C'est le Repository qui permettra cette sélection. *Si une Entité est un enregistrement dans la base de données, le Repository est l'outil qui sert à aller chercher ces données.*

## MANAGER (Manipulation)

Le Manager permet de suivre les entités et leurs modifications pour les refléter dans la base de données. Si on veut créer, modifier, lire ou supprimer des enregistrements de la base de données depuis notre code, il faudra obligatoirement passer par le Manager. 


## Fonctions non-exhaustives du Repository

- **$productRepository->find(2)** : Trouve dans la base de données le Product qui a l'id n°2

- **$productRepository->findAll()** : Trouve tous les éléments de la table Product

- **$productRepository->findBy(['name' => 'exemple', 'price' => 'exemple'])** : Trouve certains éléments en fonction d'un ou plusieurs critère(s) précis, possibilité de les afficher grâce à un ORDER (décroissant, croissant etc..)

- **$productRepository->findOneBy([ 'price' => 10])** : Permet de trouver un seul enregistrement de la base de données en fonction de critères. *Si plusieurs enregistrements ont la même donnée, par exemple si 30 produits ont un 'price' de 10, alors un seul sera affiché, le premier que la BDD aura trouvé, sous-entendu le premier qui tombera chronologiquement dans le tableau.*


## Fonctions non-exhaustives du Manager

- **$em->remove()** : Supprime une donnée.

- **$em->persist()** : Permet de mettre en tampon une modification avant de l'envoyer à la BDD.

- **$em->flush** : Envoie toutes les modifications à la BDD.


## Commandes Doctrine importantes 

- **symfony console doctrine** : Permet d'afficher toutes les commande sliées à Doctrine

- **symfony console doctrine make:migration** : Lorsqu'on a fait une modification, on entre cette commande et doctrine détecte alors les modifications opérées et crée un fichier de sauvegarde, avec les instructions de ladite migration. Pour la rendre totalement effective, il faut entrer la commande ci-dessous.

- **symfony console doctrine:make:migrations** : Permet de mettre en place les modifications de façon concrête en donnant le feu vert à doctrine. 


## LES FIXTURES 

Il existe un bundle dans Symfony qui permet de remplir une BDD en deux temps trois mouvements en injectant tout un tas de fausses données, ce bundle se nomme **Fixture**. Grâce à ce dernier on va pouvoir rendre une BDD plus vivante et plus réaliste, pour les tests par exemple, sans avoir besoin au préalable de la remplir manuellement.