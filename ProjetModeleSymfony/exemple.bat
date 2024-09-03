@REM echo coucou

del migrations\Ver*

@REM supprimer la base de données
symfony console doctrine:database:drop --force --no-interaction

@REM créer la base de données
symfony console doctrine:database:create
@REM migrer la base de données
symfony console make:migration --no-interaction
symfony console doctrine:migrations:migrate --no-interaction

@REM relation many to many entre livre et auteur
@REM auteurs / ManyToMany / Auteur / yes / livres
@REM symfony console make:entity Livre