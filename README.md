# Lancement : 

Deux dossiers sont disponibles pour ce projet. 
**api-test** : Backend => Symfony 6
**my-app** : Frontend => Angular 17

A la racine de **api-test** : 
* Composer install
* Creation de la db (symfony console doctrine:create:database) OU utiliser le .sql fourni par email
* symfony server:start -d

A la racine de **my-app** :
* ng serve
