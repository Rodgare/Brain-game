install:
	composer install
validate:
	composer validate
brain-games:
	./bin/brain-games
brain-even:
	./bin/brain-even
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin