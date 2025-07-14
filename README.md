
# Setup Docker Laravel 11 com PHP 8.3  -  API

### Passo a passo
Clone Repositório
```sh
git clone  laravel_11_api
```
```sh
cd laravel_11_api
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Crie o Arquivo .env
```sh
cp .env.example .env
```

Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```

Acesse o projeto
[http://localhost/api:8000](http://localhost/api:8000)
