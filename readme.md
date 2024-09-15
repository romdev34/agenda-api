### build dev image
docker build --no-cache . --tag ulysse699/symfony-agenda-api-dev:1.0 --build-arg APP_ENV=dev


### build prod image
docker build --no-cache . --tag ulysse699/symfony-agenda-api-prod:1.0 --build-arg APP_ENV=prod

Verifier que dans le docker compose les images soient correctement appelées.

### Lancer le conteneur en prod
docker compose -f compose-local.yaml up

### Lancer le conteneur en prod
docker compose -f compose-prod.yaml up

Ne pas oublier de jouer la commande
bin/console lexik:jwt:generate-keypair

#### credentials API
demo@romdev.ovh
nq>2sX5?&4TD@Gy

#### credential phpmyadmin
rootless
n=f;+]Nz:rXp4c3


#### if you need to change mysql password
docker exec -ti agenda-api-mysql-1 mysql -u root -prootpassword

Puis
SET PASSWORD FOR 'rootless' = 'nouveaumotdepasse';
