# SimpleApp-Symfony2
Ce demo vous permet de développer votre première application Symfony2 sous forme d'une simple gestion de stock.
Les exigences:
PHP 5.3 ou plus;
Et le http://symfony.com/doc/current/reference/requirements.html

******************************************************************************************************************************************************************
# Installation
Ouvrez vos invites de commandes!

1. Vérifier l'installation de PHP en console!

   Exécutez la commande suivante : `php -v`
Si cette commande vous retourne bien la version de PHP(nous aurons besoin ici de la version 5.4 au minimum) et d'autres informations passant à l'étape suivante .
Sinon ajoutez à la variable d'environnement `PATH`  le répertoire dans lequel se trouve le fichier php.exe ( sans oublier le point-virgule ";" ).

2.  Installez  `composer` et télécharger les vendors

   * avec windows:

      Si vous utlisez wamp placez vous sous  `wampp\www`  et si c'est xampp votre position sera sous `xampp/htdocs`
et exécuter:
```
php -r « eval(‘?>’.file_get_contents(‘http://getcomposer.org/installer’)); »
```
pour vérifier la version: (sous le meme répertoire)
```
php composer.phar –version
```
pour mettre à jour :
```
php composer.phar self-update
```
   * avec  Linux et Mac OS X:

     Téléchargez le fichier d'installation manuellement https://getcomposer.org/installer ,exécuter-le et puis exécuter sur le terminal:
```
$ php installer
$ sudo mv composer.phar /usr/local/bin/composer
```
pour plus d'information sue composer consultez leur site : <https://getcomposer.org/>

3.  Téléchargez les dépendences des vendors: Avec Composer bien évidemment :
    ```
    php composer.phar install
   ```
4.  Configurez la base des données : décompressez le fichier symfony.sql.gz et imortez le dans votre SGBD en utilisant `mysql` par exemple

5.  Placez le dossier du projet sous
     * Windows:
  `C:\wampp\www` (wamp) sinon  `C:\xampp/htdocs` (xampp)
     * Linux:
 `/var/www/`

* Vous pouvez dès à présent exécuter l'application,  Rendez-vous sur la page <http://localhost/SimpleApp-Symfony2/web/app_dev.php/login>