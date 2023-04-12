Pour en savoir plus sur le fonctionnement des événements :
https://learn.web-develop.me/view/courses/symfony-5-le-guide-complet-debutants-et-intermediaires/528946-symfony-et-les-evenements-1-heure-et-15-minutes/1529372-plongee-dans-le-coeur-de-symfony-le-kernel-et-les-evenements


https://symfony.com/doc/current/event_dispatcher.html#listeners-or-subscribers

https://symfony.com/doc/current/components/event_dispatcher.html#introduction


Pour jeter un oeil aux Listeners et Subscribers (voir plus bas) mis en place, taper cette commande :
**symfony console debug:event-dispatcher** (+ kernel.request ou kernel.controller ou kernel.response, pour voir plus précisément pour chaque événement)


### kernel.request
Lancé au moment où on reçoit la requête, il permet de la manipuler 

### kernel.controller
Lancé au moment où on sait quelle est la fonction de quel controller qui devra être appelée 

### kernel.response
Lancé au moment où on connaît la Response à renvoyer au navigateur 


## Le Design Pattern "Mediator"

Le design pattern mediator est un concept qui permet de simplifier la communication entre différents objets dans un système. Le mediator agit comme un intermédiaire entre ces objets, en leur permettant de communiquer sans qu'ils n'aient à se connaître directement.

Lorsque l'on parle d'événements, le mediator peut être utilisé pour gérer la communication entre différents objets qui émettent et écoutent des événements. Au lieu que chaque objet écoute directement les événements des autres, ils envoient et reçoivent les événements via le mediator. Ainsi, chaque objet ne connaît que le mediator et pas les autres objets, ce qui facilite la maintenance et l'évolutivité du code.

Par exemple, imaginons que tu aies un bouton et une boîte de dialogue dans ton application. Le bouton doit afficher la boîte de dialogue lorsqu'il est cliqué. Plutôt que d'avoir le bouton et la boîte de dialogue qui communiquent directement entre eux, on peut créer un mediator qui gère les événements entre eux. Lorsque le bouton est cliqué, il envoie un événement "ouvrir boîte de dialogue" au mediator, qui à son tour envoie l'événement à la boîte de dialogue pour l'ouvrir. Ainsi, le bouton et la boîte de dialogue ne se connaissent pas directement et leur communication est gérée de manière centralisée par le mediator.



## Différence entre passages par valeur et par référence 

### Par valeur :
Imaginons que tu veuilles prêter ta boîte de crayons de couleurs à un ami. Si tu prêtes ta boîte en faisant une copie, tu gardes la tienne et ton ami a une boîte identique. Si ton ami change quelque chose dans sa boîte de crayons, cela n'affectera pas ta boîte.

C'est à peu près comme le passage d'un argument par valeur en programmation. Quand tu passes un argument par valeur à une fonction, une copie de la valeur de l'argument est faite, comme si tu prêtais une copie de ta boîte de crayons.

Le passage d'un argument par valeur signifie qu'une copie de la valeur de cet argument est passée à la fonction. Toute modification apportée à la valeur de l'argument dans la fonction n'affectera pas la valeur d'origine de cet argument en dehors de la fonction.


### Par référence :
D'un autre côté, si tu prêtes ta boîte de crayons en laissant ton ami utiliser la tienne directement, vous partagez la même boîte de crayons. Si ton ami ajoute ou retire des crayons, cela affectera également ta boîte, car vous partagez les mêmes crayons.

C'est un peu comme le passage d'un argument par référence en programmation. Lorsque tu passes un argument par référence à une fonction, tu partages la même valeur d'argument avec la fonction et toute modification apportée à la valeur de l'argument dans la fonction affectera également la valeur d'origine de l'argument en dehors de la fonction.

Lorsque vous passez un argument par référence en PHP, un lien vers l'emplacement de mémoire où cette valeur est stockée est transmis à la fonction. Cela signifie que toute modification apportée à la valeur de l'argument dans la fonction affectera également la valeur d'origine de cet argument en dehors de la fonction.





## Listener (**Classe quelconque, Configuration YAML**)

En programmation, un Listener (ou "écouteur" en français) est une fonction ou un morceau de code qui est attaché à un événement. Il écoute ou surveille un événement spécifique qui se produit dans le programme et réagit en conséquence.

Par exemple, si tu as un bouton dans ton programme, tu peux ajouter un Listener pour écouter le clic sur ce bouton. Lorsque le bouton est cliqué, le Listener détecte l'événement de clic et exécute une action, comme afficher une boîte de dialogue ou envoyer des données au serveur.

Les Listeners sont couramment utilisés dans la programmation événementielle, où les événements sont déclenchés par l'utilisateur ou le système et où les actions associées à ces événements doivent être traitées. Les Listeners peuvent être utilisés pour gérer les événements de souris et de clavier, les clics de bouton, les changements de données, les erreurs, etc.

En résumé, un Listener est un morceau de code qui est attaché à un événement pour surveiller et réagir à cet événement en conséquence.


## Subscriber (**Classe qui implémente EventSubscriberInterface, Configuration PHP**)

Dans le contexte des événements, un Subscriber écoute des événements émis par un éditeur et réagit en conséquence. Les Subscribers sont souvent utilisés dans les systèmes de publication/abonnement, où les éditeurs publient des événements et les Subscribers s'abonnent pour recevoir des mises à jour lorsqu'un événement est publié.

Par exemple, si tu as un système de publication/abonnement dans ton programme, tu peux avoir un éditeur qui publie des événements et plusieurs Subscribers qui sont abonnés à ces événements. Lorsqu'un événement est publié, tous les Subscribers abonnés à ce type d'événement sont notifiés et peuvent réagir en conséquence.

Les Subscribers peuvent être utilisés pour gérer des événements de différents types, comme les événements de souris et de clavier, les événements de données, les erreurs, etc.

En résumé, un Subscriber est un élément qui s'abonne à un canal de diffusion pour recevoir des messages, comme des événements