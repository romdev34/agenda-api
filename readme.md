### build dev image
docker build --no-cache . --tag ulysse699/symfony-agenda-api-dev:1.0 --build-arg APP_ENV=dev


### build prod image
docker build --no-cache . --tag ulysse699/symfony-agenda-api-prod:1.0 --build-arg APP_ENV=prod

Verifier que dans le docker compose les images soient correctement appelées.