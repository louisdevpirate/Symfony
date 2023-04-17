📖 Documentation officielle de Symfony à propos du Mailer : https://symfony.com/doc/current/mailer.html
▶ Mailtrap.io : https://mailtrap.io

Pour envoyer des emails, rien de plus simple, il suffit d'utiliser le composant Mailer de Symfony (en utilisant la commande composer require mailer).

Tout d'abord nous avons le MailerInterface, qui va nous permettre de créer un mail et de l'envoyer. Mais ce dernier ne sait pas par lui-même envoyer réellmeent un email, il se repose sur cette partie là sur des **Transports**. Ce sont ces Transports qui vont permettre l'envoi véritable des emails. 

Ces Transports sont des sortes de **canaux de distribution**, est ce que nous allons décider d'utiliser Gmail, MailChimp, Mailgun etc...?

Par défaut, le transport utilisé est **Smtptransport**, c'est celui que nous avons utilisé dans ce cours avec *MailTrap*. 