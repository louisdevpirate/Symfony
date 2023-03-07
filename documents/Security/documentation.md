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
C'est une commande qui permet de voir toutes les routes existantes et comment elles fonctionnent et interagissent entre elles.

### symfony console debug:config nom_du_package
Commande qui permet de voir tous les fichiers de config avec leurs configurations actuelles. Par exemple si on tape *symfony console debug:config security* on peut voir toutes les configurations actuelles du fichier *security.yaml*, même celles qui ne sont pas explicitement présentées dans le fichier. Cela permet donc de sonder le fichier plus en profondeur. 

### symfony console config:dump nom_du_package
Cette commande permet de voir les configurations **possibles**, sans tenir compte des configurations actuelles comme avec le *debug:config*. Si on reprend l'exemple précédent en tapant la commande *symfony console config:dump security* alors on peut voir <u>toutes</u> les options disponibles pour le package security, en d'autres termes, tout ce qu'on aurait pu mettre dans le fichier *security.yaml*. 



# POUR RESUMER 

A chaque fois que Symfony a recevoir une requête, il va demander à tous les authenticators du firewall concerné si ils veulent intervenir à ce moment là. Notre authenticator quan tà lui veut intervenir suelement - et c'est la méthode *supports* qui le dit - si on a rempli le formulaire de la route SecurityLogin et qu'on l'a envoyé en POST. Dans ce cas là seulement il interviendra. C'est comme si la requête allait voir un douanier et qu'elle lui disait "authentifiez moi". A ce moment là, toutes les méthodes de l'authenticator vont être appelées les unes après les autres. 

=> 1) **getCredentials extrait les données d'identification à partir de la Request** : En premier lieu l'authenticator va extraire à partir de la Request (un gros sac d'information complexe) simplement les informations dont on a besoin pour la connexion, comme si on ouvrait sa valise devant le douanier pour aller chercher son passeport, perdu au milieu de pleins d'autres affaires. 

=> 2) **getUser() tente d'aller chercher l'utilsiateur correspondant** : Une fois les informations nécessaires récupérées, l'authenticator va chercher dans la base de données l'utilisateur relié à ces identifiants. Donc grâce aux **credentials** et grâce au **userProvider**, il va être capable d'aller chercher si il existe quelqu'un qui possède ce mail. Si c'est le cas, pas de soucis on passe à la suite, sinon, on lance une <u>**exception d'authentification**</u> (*AuthenticationException*), qui amènera immédiatement à la fin du processus, puisque la personne n'est pas authentifiée.

=> 3) **checkCredentials() permet de confirmer les informations** : Si on a bien trouvé la personne qu'on cherchait, alors on passe maintenant à l'étape finale, on va donner ce fameux utilisateur à la fonction checkCredentials() qui va se charger de vérifier si le mot de passe est le bon. Si c'est le cas, l'authentification est réussie. Sinon, on sera redirigé vers le *Failure*. 

**GROSSO MODO** : L'authenticator est un tunnel de douane dans lequel sont mis en place un certain nombre de barrages. Si on passe tous les barrages, alor son est authentifiés, sinon, si il y a le moindre barrage qui n'est pas passé, alors on est pas authentifié. Tout simplement. Derrière, on peut utiliser la classe *AuthenticationUtils* pour aller extraire l'erreur qui a causé l'échec de l'authentification. On peut donc stocker l'erreur en question dans les attributs de la requête et l'envoyer à l'*AuthenticationUtils*. 