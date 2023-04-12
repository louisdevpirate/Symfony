ATTENTION !

Note pour plus tard :

# Penser à se renseigner sur les webhooks. 

Si le payement passe mais que la redirection ne se fait pas ça veut dire que le client peut payer mais dans la BDD sa commande aura toujours le statut PENDING. Pour éviter cette situation, il faut s'intéresser au WebHooks. Ce sont des controller qui servent dans ces situations.

Voir le lien suivant : https://stripe.com/docs/payments/checkout/fulfill-orders
