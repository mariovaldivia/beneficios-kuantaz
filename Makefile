#!/bin/bash

UID = $(shell id -u)
DOCKER_BE = application

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

up: ## Start the containers
	U_ID=${UID} docker compose up -d

stop: ## Stop the containers
	U_ID=${UID} docker compose stop

build: ## Rebuilds all the containers
	U_ID=${UID} docker compose build

shell: ## Shell
	U_ID=${UID} docker compose exec app_beneficios bash