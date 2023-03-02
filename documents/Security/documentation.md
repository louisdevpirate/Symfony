📖 Documentation officielle sur le composant Security : https://symfony.com/doc/current/security.html 

📖 Documentation officielle sur la priorité des routes : https://symfony.com/doc/current/routing.html#priority-parameter


### En terme de sécurité il y a deux questions principales à se poser :

# AUTHENTIFICATION : es-tu vraiment celui que tu prétends être ? 

# AUTORISATIONS : as-tu le droit de faire ce que tu veux faire ? 

Grâce au composant **Security** de Symfony nous allons pouvoir mettre en place des systèmes pour répondre à ces deux problématiques !

Il faut penser de façon géographique. Notre application est un territoire fragmenté en plusieurs régions (<u>**les Firewalls**</u>), délimitées par des frontières (<u>**les URLs**</u>) et chaque région possède donc une politique qui lui est propre. 


### Providers :
Ils indiquent au composant Security où se trouvent les données des utilisateurs

### Roles:
Ils permettent de gérer les **Autorisations** (as-tu le droit de faire ce que tu veux faire ?)

### ROLE_USER
Il représnete le rôle que tous les utilisateurs possèdent

### Authenticators
Les authenticators de Symfony sont des objets qui permettent de vérifier l'identité d'un utilisateur dans une application web. En d'autres termes, ils permettent de s'assurer que l'utilisateur est bien celui qu'il prétend être.

Les authenticators de Symfony sont utilisés pour différents types d'authentification, tels que l'authentification basée sur les jetons (tokens), l'authentification par formulaire, l'authentification par certificat, etc.

Lorsqu'un utilisateur tente de se connecter à une application web, l'authenticator vérifie les informations d'identification de l'utilisateur (par exemple, son nom d'utilisateur et son mot de passe) et, si elles sont correctes, autorise l'accès à l'application. Si les informations d'identification sont incorrectes, l'utilisateur est redirigé vers une page d'erreur ou une page de connexion.

Les authenticators de Symfony sont configurables et peuvent être personnalisés pour répondre aux besoins spécifiques de votre application. Par exemple, vous pouvez ajouter des fonctionnalités telles que la validation en deux étapes, la gestion des rôles et des autorisations d'accès, etc.

Les authenticators seront appelés à chaque requête HTTP par Symfony pour éventuellement procéder à une authentification

### symfony console debug:router
C'est une commande qui permet de voir toutes les routes existantes et comment elles fonctionnent
