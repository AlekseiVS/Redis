

up:
	@docker-compose -f docker-compose.yaml up -d

down:
	@docker-compose down

restart:
	@docker-compose down && docker-compose build && docker-compose -f docker-compose.yaml up -d

#restart:
#	sudo service docker restart
#restart:
#	@docker-compose restart $(service)

build:
	@docker-compose build $(service)

ps: ## list containers
	@docker-compose ps

volumes-ls: ## list volumes
	@docker volume ls

#volumes-rm:
#	test=docker ps -a -q;
#	echo $(test)
# 	docker stop $(test)
#	docker stop $(test);
#	docker rm $(docker ps -a -q)
#	docker volume rm $(docker volume ls -qf dangling=true)
# docker stop $(docker ps -a -q); docker rm $(docker ps -a -q); docker volume rm $(docker volume ls -qf dangling=true)

logs: ## docker container logs
	@docker compose logs $(service) -f

exec:
	docker-compose exec $(service) bash

re-up:
	@docker-compose down && docker-compose -f docker-compose.yaml up -d

