📖 Documentation officielle de Symfony pour débuter avec les forms : https://symfony.com/doc/current/forms.html

📖 Documentation officielle de Symfony sur le composant symfony/form : https://symfony.com/doc/current/components/form.html

📖 Documentation officielle de Symfony - La liste des types de champs existants : https://symfony.com/doc/current/reference/forms/types.html

📖 Tout savoir sur les fonctions de Twig pour les formulaires : https://symfony.com/doc/current/form/form_customization.html

📖 Comprendre comment fonctionnent les thèmes de formulaires : https://symfony.com/doc/current/form/form_themes.html



# Exercice 1

Créez un CategoryController avec deux routes 

Créez une classe CategoryController avec deux méthodes.

Exigences :
Une méthode routée sur /admin/category/create : elle doit juste afficher un fichier Twig avec un titre h1 avec le texte "Créer une catégorie"
Une méthode routée sur /admin/category/{id}/edit : elle doit afficher un fichier Twig avec un titre h1 contenant le nom de la catégorie correspondant à l'id envoyé dans l'URL