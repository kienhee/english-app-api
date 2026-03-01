alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'

sail up -d

sail stop

docker compose down -v
docker compose up -d