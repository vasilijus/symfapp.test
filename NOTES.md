# Notes

## Sym CLI

To use HTTPS locally, we also need to install a CA to enable TLS support.
Run the following command:
$ symfony server:ca:install

Check that your computer has all needed requirements by running the
following command:
$ symfony book:check-requirements

```
symfony composer
```

symfony new guestbook --version=5.0

---
### Git Branching
The default branch has been renamed!
master is now named mast

If you have a local clone, you can update it by running the following commands.
```
git branch -m master mast
git fetch origin
git branch -u origin/mast mast
git remote set-head origin -a
```
---


```
symfony project:init
```
This command creates a few files needed by SymfonyCloud, namely
.symfony/services.yaml, .symfony/routes.yaml, and .symfony.cloud.yaml.

---

symfony composer req profiler --dev 

symfony console list make

## Create database 
php bin/console doctrine:database:create

## Entity & Migrations

symfony console make:entity Conference

Next: When you're ready, create a migration with php bin/console make:migration

  Success! 

### Force Schema update
➜  symfapp.test git:(develop) php bin/console doctrine:schema:update --force   

 Updating database schema...

     1 query was executed

 [OK] Database schema updated successfully!                                                     
 ### Query Db - setup Persistence 
 https://symfony.com/doc/current/doctrine.html#creating-an-entity-class
 php bin/console dbal:run-sql 'SELECT * FROM product'



### To use forms 
 composer require form validator

 php bin/console make:form


### User Entiti

 ~/c/H/symfapp.test  develop ⇡5 *1 !4 ?3  php bin/console make:user



created: src/Entity/User.php
 created: src/Repository/UserRepository.php
 updated: src/Entity/User.php
 updated: config/packages/security.yaml

           
  Success! 
           

 Next Steps:
   - Review your new App\Entity\User class.
   - Use make:entity to add more fields to your User entity and then run make:migration.
   - Create a way to authenticate! See https://symfony.com/doc/current/security.html


### Authentication
 php bin/console make:auth
❯ php bin/console make:auth

 What style of authentication do you want? [Empty authenticator]:
  [0] Empty authenticator
  [1] Login form authenticator
 > 1

 The class name of the authenticator to create (e.g. AppCustomAuthenticator):
 > CustomAuthenticator 

 Choose a name for the controller class (e.g. SecurityController) [SecurityController]:
 > 

 Do you want to generate a '/logout' URL? (yes/no) [yes]:
 > 

 created: src/Security/CustomAuthenticator.php
 updated: config/packages/security.yaml
 created: src/Controller/SecurityController.php
 created: templates/security/login.html.twig

           
  Success! 
           

 Next:
 - Customize your new authenticator.
 - Finish the redirect "TODO" in the App\Security\CustomAuthenticator::onAuthenticationSuccess() method.
 - Review & adapt the login template: templates/security/login.html.twig. 



 ### Degug Routes 
php bin/console debug:route

                                             
        
Next: Review the new migration "migrations/Version20211206212755.php"
Then: Run the migration with php bin/console doctrine:migrations:migrate
---
