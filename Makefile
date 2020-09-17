bash:
	docker-compose exec  webserver "/bin/bash" 
install:
	docker-compose up -d
	docker-compose exec webserver sh -c "composer install"
	sudo chmod 777 -R ./storage
	sleep 10
	docker-compose exec webserver sh -c "php artisan migrate"
	docker-compose exec webserver sh -c "php artisan passport:client --personal --name user"
restart:
	docker-compose stop
	docker-compose up -d
	docker-compose exec webserver composer install
reset:
	docker-compose stop
	docker-compose rm -f
	make install
remove:
	docker-compose stop
	docker-compose rm -f

test:
	docker-compose exec webserver sh -c "./vendor/bin/phpunit"

