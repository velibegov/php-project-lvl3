start:
	php artisan serve --host 192.168.10.10

setup:
	composer install
	php artisan key:gen --ansi
	php artisan migrate
	php artisan db:seed

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

deploy:
	git push heroku

lint:
	./vendor/bin/phpcs

lint-fix:
	./vendor/bin/phpcbf
