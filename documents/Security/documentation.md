📖 Documentation officielle sur le composant Security : https://symfony.com/doc/current/security.html 


### En terme de sécurité il y a deux questions principales à se poser :

# AUTHENTIFICATION : es-tu vraiment celui que tu prétends être ? 

# AUTORISATIONS : as-tu le droit de faire ce que tu veux faire ? 

Grâce au composant **Security** de Symfony nous allons pouvoir mettre en place des systèmes pour répondre à ces deux problématiques !

Il faut penser de façon géographique. Notre application est un territoire fragmenté en plusieurs régions (<u>**les URLs**</u>) et chaque région possède une politique qui lui est propre (<u>**les Firewalls**</u>). 