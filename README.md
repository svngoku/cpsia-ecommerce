# CPSIA Ecommerce app


Pour démarrer l'application, il est impératif de passer par quelques étapes obligatoire.

- Récupérer le script de la base de données puis l'exécuté .

- Modifié le fichier `config-genos.php` en renseignant les bonnes données
    ```php 
        $DATABASE_NAME ='cpsiaEcommerce';
        $DATABASE_HOST ='localhost';
        $DATABASE_PORT ='3306';
        $DATABASE_USER ='root';
        $DATABASE_PSWD ='root';
    ```
puis, verifier que les classes sont biens importé.

- Pour les utilisateur du `cli`, aller dans le dossier `back` puis lancer la commande `php -S localhost:<Numero de port souhaité>`

- Par la suite, rendez-vous dans le dossier `client` contenant le front de notre application.

- Un `README` est présent et nous explique les différentes procedure pour démarrer notre application.


## En cas de soucis coté serveur

- N'utilisant pas d'outil du style `WAMP Server`, je lance mon application en back-end en utilisant la commande spécifique à PHP permettant de lancer un serveur depuis sa machine local.

## En cas de soucis coté client

- S'assurer que l'ensemble des dépendances sont bien installé.