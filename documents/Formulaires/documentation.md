📖 Documentation officielle de Symfony pour débuter avec les forms : https://symfony.com/doc/current/forms.html

📖 Documentation officielle de Symfony sur le composant symfony/form : https://symfony.com/doc/current/components/form.html

📖 Documentation officielle de Symfony - La liste des types de champs existants : https://symfony.com/doc/current/reference/forms/types.html

📖 Tout savoir sur les fonctions de Twig pour les formulaires : https://symfony.com/doc/current/form/form_customization.html

📖 Comprendre comment fonctionnent les thèmes de formulaires : https://symfony.com/doc/current/form/form_themes.html

📖 Documentation officielle de Symfony sur les événements d'un Formulaire : https://symfony.com/doc/current/form/events.html


# LES FORMULAIRES PARTIE 1 

### Exercice 1

Créez un CategoryController avec deux routes 

Créez une classe CategoryController avec deux méthodes.

Exigences :
Une méthode routée sur /admin/category/create : elle doit juste afficher un fichier Twig avec un titre h1 avec le texte "Créer une catégorie"
Une méthode routée sur /admin/category/{id}/edit : elle doit afficher un fichier Twig avec un titre h1 contenant le nom de la catégorie correspondant à l'id envoyé dans l'URL

### Exercice 2

Créez le formulaire de création d'une catégorie

Créez une classe de formulaire (make:form) qui s'appellera CategoryType qui ne contiendra qu'un seul champ "name"

Exigences :

La route /admin/category/create doit afficher le formulaire
On doit aussi gérer la soumission du formulaire avec enregistrement de la nouvelle catégorie dans la base de données !
On doit enfin rediriger le visiteur vers la page d'accueil

### Exercice 3

créez le formulaire de modification d'une catégorie

En réutilisant le formulaire CategoryType, on veut pouvoir modifier la catégorie dont l'id est envoyé dans l' URL

Exigences :

La route /admin/category/{id}/create doit afficher le formulaire pré-rempli avec les données de la catégorie
On doit aussi gérer la soumission du formulaire avec enregistrement des modifications dans la base de données !
On doit enfin rediriger le visiteur vers la page d'accueil




# LES FORMULAIRES PARTIE 2 

Un formulaire a en quelque sorte un "cycle de vie", celui ci se déocmpose en deux étapes : 

- La Première : On crée le formulaire, on lui injecte des données, puis on cherche  l'afficher 

- La deuxième : C'est la "fin de vie" du formulaire, on soumet les données  entrées puis on récupère ces données pour les traiter


Durant ce cycle de vie le formulaire comporte plusieurs événements, on appelle ça les **evenements du form**. Ces événements se produisent dans cette chronologie :

- ## PRE_SET_DATA :
    Le formulaire vient de recevoir des données *(setData())* mais ne les a pas encore intégrés

- ## POST_SET_DATA :
    Le formualaire vient d'intégrer les données envoyées lors du *setData()*

- ## PRE_SUBMIT : 
    Le formulaire constate les données soumises (via *submit()* ou *handleRequest()*) sans faire le tri ni les prendre en compte

- ## SUBMIT :
    Le formulaire a fait le tri dans les données soumises et les arrange sous forme de tableau associatif

- ## POST_SUBMIT :
    Le formulaire a intégré les données soumises (sous la forme d'un tableau ou d'un objet)