📖 Documentation officielle de Symfony sur la Validation : https://symfony.com/doc/current/validation.html

📖 Liste des contraintes de validation livrées par Symfony : https://symfony.com/doc/current/reference/constraints.html 

📖 Documentation officielle de Symfony sur les groupes de validation : https://symfony.com/doc/current/validation/groups.html


**Données scalaires** : Nombres, strings et booléens 

**Données complexes** : Tableaux associatifs et objets

## Exercice : Validez les catégories

Mettez en place des validations sur l'entité Category afin que le formulaire soit validé.

Exigences :
Le champ name ne doit pas être vide
Le champ name ne doit pas contenir moins de 3 caractères

Astuce :
Votre formulaire HTML ne vous laissera pas soumettre avec un champ vide car le champ possède un attribut "required", servez vous de l'inspecteur du navigateur pour supprimer cet attribut afin de faire vos tests !