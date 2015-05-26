all:
	@echo "make composer"

composer:
	curl -sS https://getcomposer.org/installer | php

server:
	php -S localhost:8080 -t examples
