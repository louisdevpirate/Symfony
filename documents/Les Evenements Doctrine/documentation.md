Nous avons vu précédemment que Symfony pouvait déclencher des événements auxquels on pouvait se brancher pour réagir. 
Doctrine fonctionne de la même façon, il a son propre **Dispatcher** qui va lui permettre de déclencher des événements dans ce qu'on appelle le **cycle de vie d'une Entité**

Doctrine va être capable de suivre une Entité tout au long de sa vie.
Car en effet une Entité peut être :
- Créée = **$p = new Purchase;**
- Persistée = **$em->persist($p);**
- Modifiée = **$em->flush();**
- Supprimée = **$em->remove($p);**



Il existe <u>trois</u> types de possibilité pour nous brancher à un événement du cycle de vie d'une Entité Doctrine :

## Lifecycle Callbacks
Modifications simples sur une entité à un moment précis. On les crée au sein même d'une Entité et servent uniquement à des choses très simples. 

## Listeners / Subscribers
Modifications complexes sur toutes nos entités à un moment précis. Impossiblité de filtrer "je veux que tu t'exécutes sur telle ou telle Entité", ce sera forcément sur toutes.

## Entity Listeners
Modifications complexes sur une entité à un moment précis. Meilleure alternative pour faire quleque chose de complexe sur un événement d'une Entité en particulier. 