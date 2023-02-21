📖 Documentation officielle de Doctrine : https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/index.html

📖 Documentation officielle de Symfony à propos de Doctrine : https://symfony.com/doc/current/doctrine.html 

# LE BUT

Le but d'utiliser Doctrine c'est qu'au lieu de faire les manipulations de données directement dans la base de données, nous ayons juste à passer par le code. On pourrait très bien se sevrir du code pour faire des requêtes SQL à la BDD, mais dans notre cas nous allons utiliser un langage qui s'appelle le DQL, et qui permet de manipuler la BDD en servant des **Entités**. 

## DOCTRINE C EST QUOI ?

Doctrine est un bundle qui va nous permettre de mettre en relation des enregistrements d'une base de données avec des objets de notre code php, grâce à un système d'**ORM** (Object Relational Mapping). Dans notre code Symfony nous allons utiliser des classes qui correspondent à des données de la Base de Données, dans 99% des cas ces clases représenteront les tables de la BDD.

## ENTITE (Enregistrements)

Une entité représente un enregistrement d'une table. C'est une classe que nous allons manipuler dans notre code, par exemple : Une entité/class Product avec un id, une name, un price etc...

## REPOSITORY (Sélections)

Les Repository permettent de sélectionner des enregistrements, des données, dans les tables. Mettons qu'on veuille sélectionner tous les produits de notre BDD, ou seulement les produits qui commencent par un A etc...C'est le Repository qui permettra cette sélection. *Si une Entité est un enregistrement dans la base de données, le Repository est l'outil qui sert à aller chercher ces données.*

## MANAGER (Manipulation)

Le Manager permet de suivre les entités et leurs modifications pour les refléter dans la base de données. Si on veut créer, modifier, lire ou supprimer des enregistrements de la base de données depuis notre code, il faudra obligatoirement passer par le Manager. 

