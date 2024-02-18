# SAE_web

## Groupe
Korentin Georget (Développeur backend )
Nathan Boissay (Développeur fullStack )
Robin Boissay (Designer et developpeur frontend)

## Lancement du projet
placer vous dans le dossier public dans un terminal puis lancer la commande : php -S localhost:8000

Problème possible : 
Si vous avez l'erreur could not find driver quand vous lancer le serveur:

Si vous savez ou se trouve php sur votre ordinateur alors allez y puis rajouter les 2 prochaines lignes dans votre fichier php.ini:
extension=pdo_sqlite
extension=sqlite3

sinon, pour trouver ou vous avez installer php:
aller dans le fichier public/index.php puis décomenter la ligne 12 avec phpinfo();
relancez le serveur et aller sur la page, l'endroit ou votre php est installer devrait être marquer sur une des lignes.
Maintenant que vous savez ou se trouve votre php fait l'étape du dessus.
