
# Setup Docker Laravel 11 com PHP 8.3  -  API

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/renokolbe/lab_laravel11_api laravel_11_api
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

## Sugestões de Extensões para o VSCODE
- PHP Intelephense (Ben Mewburn)
- Auto Close Tag
- DotEnv
- Laravel Snippets
- phpcs
- PHPUnit
- Better PHPUnit
- Code Spell Checker
- Brazilian Portuguese