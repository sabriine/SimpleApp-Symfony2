# SimpleApp-Symfony2
Ce demo vous permet de développer votre première application Symfony2 sous forme d'une simple gestion de stock.
Les exigences:
PHP 5.3 ou plus;
Et le http://symfony.com/doc/current/reference/requirements.html

******************************************************************************************************************************************************************
Installation
Ouvrez vos invites de commandes!

1. Vérifier l'installation de PHP en console!

exécuter la commande suivante : php -v
Si cette commande vous retourne bien la version de PHP(nous aurons besoin ici de la version 5.4 au minimum) et d'autres informations passant à l'étape suivante .
Sinon ajouter à la variable d'environnement PATH  le répertoire dans lequel se trouve le fichier php.exe ( sans oublier le point-virgule ";" ).

2. Installer le composer et télécharger les vendors

avec windows:
Si vous utlisez wamp placez vous sous  wampp\www  et si c'est xampp votre position sera sous xampp/htdocs
et exécuter: php -r « eval(‘?>’.file_get_contents(‘http://getcomposer.org/installer’)); »
pour vérifier la version: (sous le meme répertoire) php composer.phar –version
pour mettre à jour : php composer.phar self-update

avec  Linux et Mac OS X:
télécharger le fichier d'installation manuellement https://getcomposer.org/installer ,exécuter-le et puis exécuter sur le terminal:
$ php installer
$ sudo mv composer.phar /usr/local/bin/composer

téléchargement des vendors: Avec Composer bien évidemment :
php composer.phar install

3. Configurer la base des données

4. Placer le dossier du projet sous
Windows:
  C:\wampp\www (wamp) sinon  C:\xampp/htdocs (xampp) 
Linux:
 /var/www/Symfony  

5. Vous pouvez dès à présent exécuter l'application,  Rendez-vous sur la page http://localhost/SimpleApp-Symfony2/web/app_dev.php/
