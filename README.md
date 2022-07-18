## Todo com categorias

## Criando esta api para praticar TDD

<hr>

### Tecnologias:

-   PHP `v8.1`
-   [Lumen](https://lumen.laravel.com/)
-   MySQL

### Rodar Projeto

-   Abra seu terminal na raiz do projeto
-   Entre na pasta `backend`
-   Copie o `.env.example` para criar um `.env`

```
cp .env.example .env
```

-   Crie seu banco de dados e coloque as credenciais no .env
-   -   DB_DATABASE="nome do banco"
-   -   DB_USERNAME="usuario"
-   -   DB_PASSWORD="senha"

-   Rode os comandos abaixo

```
composer install
```

-   Criando tabelas no banco de dados

```
php artisan migrate --seed
```

-   Rodar testes do backend

```
./vendor/bin/phpunit --testdox
```

## Subir servidor da aplicação

-   Ainda com o terminal aberto dentro da pasta `backend`

```
php -S localhost:8000 -t public
```
