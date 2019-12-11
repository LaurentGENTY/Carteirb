# Architecture

- sql/ : dossier contenant les requetes demandées
  - create_database.sql : script de création de BDD
  - population.sql : script de peuplement
- src/ : contenu du site
- README.md
- rapport.pdf

# Pré-requis

Afin de faire marcher notre application vous devez avoir :
- php5 ou supérieur
- sql
- machine de l'enseirb (pour pouvoir accéder au site pedago)
- phpMyAdmin
- navigateur (préférer firefox)

# Installation

Si vous êtes sur une machine de l'enseirb vous n'aurez rien à faire pour installer le projet.

Si vous n'êtes pas sur une machine de l'enseirb il faudra créer la BDD et la peupler.
- lancer les scripts de création de BDD avant toute chose :
  - changer les logs dans le fichier connect.php pour les adapter au votre base de données
  - executer les scripts sql : create_database.sql sur la BDD
  - executer le script de peuplement : population.sql sur la BDD

# Lancement

Si vous êtes sur une machine de l'enseirb (ou qui y a accès) vous devez seulement aller sur le site pedago de Emeric Duchemin : educhemin001.vvvpedago.enseirb-matmeca.fr

Si vous n'êtes pas sur une machine de l'enseirb, vous devrez extraire le contenu du dossier src/frontend et le mettre dans un hébergeur afin d'avoir accès aux site.
L'index lancé est celui de src/frontend

# Pages et site

Le fonctionnement du site web est décrit dans le rapport ci-joint
