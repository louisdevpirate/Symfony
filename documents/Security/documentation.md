📖 Documentation officielle sur le composant Security : https://symfony.com/doc/current/security.html 


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

