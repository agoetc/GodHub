build :
	docker-compose down
	docker-compose build
	docker-compose up -d
	docker-compose exec php cp .env.example .env
	docker-compose exec php composer install
	docker-compose exec php php artisan migrate

up :
	docker-compose down
	docker-compose up -d
