## Différence entre passages par valeur et par référence 

### Par valeur :
Imaginons que tu veuilles prêter ta boîte de crayons de couleurs à un ami. Si tu prêtes ta boîte en faisant une copie, tu gardes la tienne et ton ami a une boîte identique. Si ton ami change quelque chose dans sa boîte de crayons, cela n'affectera pas ta boîte.

C'est à peu près comme le passage d'un argument par valeur en programmation. Quand tu passes un argument par valeur à une fonction, une copie de la valeur de l'argument est faite, comme si tu prêtais une copie de ta boîte de crayons.

Le passage d'un argument par valeur signifie qu'une copie de la valeur de cet argument est passée à la fonction. Toute modification apportée à la valeur de l'argument dans la fonction n'affectera pas la valeur d'origine de cet argument en dehors de la fonction.


### Par référence :
D'un autre côté, si tu prêtes ta boîte de crayons en laissant ton ami utiliser la tienne directement, vous partagez la même boîte de crayons. Si ton ami ajoute ou retire des crayons, cela affectera également ta boîte, car vous partagez les mêmes crayons.

C'est un peu comme le passage d'un argument par référence en programmation. Lorsque tu passes un argument par référence à une fonction, tu partages la même valeur d'argument avec la fonction et toute modification apportée à la valeur de l'argument dans la fonction affectera également la valeur d'origine de l'argument en dehors de la fonction.

Lorsque vous passez un argument par référence en PHP, un lien vers l'emplacement de mémoire où cette valeur est stockée est transmis à la fonction. Cela signifie que toute modification apportée à la valeur de l'argument dans la fonction affectera également la valeur d'origine de cet argument en dehors de la fonction.