bash:
	docker-compose exec  webserver "/bin/bash" 
install:
	docker-compose up -d
	docker-compose exec webserver sh -c "composer install"
	sudo chmod 777 -R www/
	docker-compose exec webserver sh -c "cp .env.example .env"
	docker-compose exec webserver sh -c "php artisan migrate"
start:
	docker-compose up -d
	docker-compose exec webserver composer install
stop:
	docker-compose stop
restart:
	docker-compose stop
	docker-compose up -d
	docker-compose exec webserver composer install
reset:
	docker-compose stop
	docker-compose rm -f
	docker-compose build
	docker-compose up -d
	docker-compose exec webserver composer install
remove:
	docker-compose stop
	docker-compose rm -f