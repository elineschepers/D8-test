# Phishing calculator

## Technische informatie over het project

### Project maken in Drupal
- (in cmd NIET in WSL): composer create-project drupal/recommended-project FOLDER_NAME --no-interaction
- lando setup (in project file): lando init --source cwd --recipe drupal8 --name bs-build --webroot web --full
- change lando.yml 'webroot' from '.' to 'web'

### project starten
- lando start (in cmd of wsl)

### project herstarten (in cmd of wsl)
- lando rebuild (inclusief docker etc.) 
- lando drush cr (voor minor changes)

### Drupal database setup met Lando
- db credentials: drupal8 voor alles + advanced options --> verander Host van 'localhost' naar 'database'

### Pagina wijzigen
--> content --> manage display --> full content --> manage layout

### pagina aanmaken
--> content --> add content --> basic page --> vul title in + save

### custom bootstrap block toevoegen voor aan een pagina toe te voegen
--> structure --> block layout --> custom block library --> block types --> add custom block type --> vul verplichte velden in + save --> edit --> manage display --> manage fields

### info verkrijgen over project (drupal versie, db credentials, defaulttheme, etc.)
- lando drush status

### bootstrap layout toevoegen aan content
--> block layout --> custom block library --> block types --> kies u block type --> manage fields --> manage display --> ! FULL (niet default) --> tandwieltje bij gewenst field --> choose a field template: expert --> vink aan 'field item' --> vul element-tag + class name in


## toegevoegde modules
- https://www.drupal.org/project/view_custom_table

## URL's

### User

### Admin
- login: /administrator/login

## Mogelijke problemen

### PHP versie errors?
- verander versie in lando.yml
- verander versie in composer.json

### issues met SASS?
'''
1. npm uninstall node-sass
2. npm uninstall sass-loader
3. npm install sass
4. npm install sass-loader
'''
### bekijk tables in database
1. lando mysql
2. use drupal8;
3. show tables;

