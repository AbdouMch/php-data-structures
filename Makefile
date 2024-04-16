# Docker containers
PHP_CONTAINER = php-data-structures

# Executables (local)
DOCKER = docker
DOCKER_COMP = docker-compose
DOCKER_EXEC = docker run
PHP_EXEC = $(DOCKER_EXEC) $(PHP_CONTAINER)

# Executables
PHP      = $(PHP_EXEC) php

## —— 🎵 🐳 The Symfony Docker Makefile 🐳 🎵 ——————————————————————————————————
help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## —— Docker 🐳 ————————————————————————————————————————————————————————————————
install: create-volume build
build: ## Builds the Docker images
	@$(DOCKER) build -t $(PHP_CONTAINER) .

create-volume:
	@$(DOCKER) volume create -o o=bind $(PHP_CONTAINER)

php: ## Enter PHP container as root
	@echo "Entering PHP container..."
	$(DOCKER_EXEC) -v .:/usr/src/myapp -it $(PHP_CONTAINER) /bin/bash

## —— Composer 🧙 ——————————————————————————————————————————————————————————————
composer: ## Run composer, pass the parameter "c=" to run a given command, example: make composer c='req symfony/orm-pack'
	@$(eval c ?=)
	@$(COMPOSER) $(c)

vendor: ## Install vendors according to the current composer.lock file
vendor: c=install --prefer-dist --no-dev --no-progress --no-scripts --no-interaction
vendor: composer