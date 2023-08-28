<h1><b>Bilemo</b></h1>

<h3>Prérequis</h3>

<code>PHP 8.1
WampServer
Composer
Symfony CLI</code>

<h3>Installation et configuration</h3>

<code>Télécharger ou cloner le repository (en ligne de commande: 'git clone https://github.com/aurorebressano/bilemo.git')
Modifier les infos nécessaires dans fichier .env (notamment DATABASE_URL)
<br>
En ligne de commande, jouer:
->'symfony composer install --optimize-autoloader' (Installer les dépendances nécessaires à l'exécution de l'application)
->'symfony console doctrine:migrations:migrate --no-interaction'
->'symfony console doctrine:fixtures:load --no-interaction'
<br>
Cliquer sur les fichiers suivants à la racine du projet:
->startup.bat (Mettre en route le serveur local)
->open.bat (ouvrir le site dans le navigateur)</code>

<h3>Identifiants de connexion à des fins de test</h3>

<code>
username: 'coolphone@free.fr' 
password: 'test'
<br>
Sur l'URL /api/, l'apiplatform s'affiche.
Vous pouvez cliquer sur : 
Login Check
POST /api/auth -> Try it out
Renseignez le username et le password fournis ci-dessus.
Cliquez sur "Execute", le token est crée et fourni plus bas dans le response body
{
  "token": "xxx"
}
<br>
Il faudra récupérer ce token et s'authentifier en haut à droite de l'écran: "Authorize"
Dans Value, renseignez 'Bearer xxx" (xxx étant à remplacer par le token réellement fourni).
Une fois fait, vous pourrez accéder aux informations voulues en cliquant sur les "Try it out" de chaque méthode.
A noter: ces identifiants ne vous donneront accès qu'aux users rattachés au client "Cool phone".
<br>
A présent pour tester le filtre sur les users, il faut se déconnecter via le bouton Authorize et renseigner ces identifiants afin de créer le nouveau token:
username: superentreprise@gmail.com
password: test
</code>

<h3> La documentation </h3>
<code>
Sur l'url /api/docs se trouvent les indications pour bien renseigner et comprendre les entités sérializées et mises à disposition via l'API.      
</code>
