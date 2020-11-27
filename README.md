<h1 align="center">Computer Manager</h1>

## Sobre

Computer Manager é uma aplicação desenvolvida com intuito de facilitar a catalogação de computadores e manutenções realizadas nos mesmos.

## Funções

Computer Manager pode:

 - Alterar o tema da aplicação dinamicamente baseado no tema do dispositivo do usuário
 - Cadastrar computadores, manutenções e usuários
 - Editar computadores, manutenções e usuários já criados
 - Listar computadores, manutenções e usuários
 - Remover computadores, manutenções e usuários que não são mais necessários
 - Ordenar essas listagens por coluna
 - Filtrar os resultados baseado na busca do usuário

Tudo isso protegido pelo sistema de login Laravel Fortify, que realiza a encriptação dos usuários

## Imagens

** Menu principal **
<img src="https://i.imgur.com/YSFDHVE.png">
** Listagem de Computadores **
<img src="https://i.imgur.com/RztGHl0.png">
** Listagem de manutenções **
<img src="https://i.imgur.com/Gbd3ORF.png">
** Listagem de usuários **
<img src="https://i.imgur.com/rjpklOM.png">

### Instalação

- Clone o repositório
`git clone https://github.com/LeonardoWelter/ComputerManager.git`
- Faça uma cópia do .env.example
`mv cp .env.example .env`
- Configure no arquivo .env os dados do banco de dados (usuário, senha e database)
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
- Altere o nome do usuário para o seu usuário no arquivo docker-compose.yml
```
args:
    user: USUARIO
    uid: 1000
```

- Inicie o container 
`docker-compose up -d`

- Gere a artisan key para o funciomaneto do Laravel
`docker-compose exec app php artisan key:generate`

- Instale as dependências do composer
`docker-compose exec app composer install`

