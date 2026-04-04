# NFL CRUD Legado (PHP Manual)

Projeto legado/manual em PHP procedural para administracao de dados tematicos da NFL.

## Posicionamento do Projeto

Este repositorio nao e uma aplicacao moderna nem um produto em evolucao com arquitetura por APIs.

Ele representa um sistema CRUD classico, com:

- autenticacao simples por login
- sessao de usuario
- conexao direta com MySQL via PDO
- cadastro, listagem, edicao e exclusao de entidades

Entidades principais:

- classe
- posicao
- jogador
- lesao (`injurie`)
- time
- super bowl (`sb`)

## Stack

- PHP (procedural)
- MySQL/MariaDB
- HTML + Bootstrap 4

## Estrutura Basica

- `login.php`: autenticacao e logout
- `index.php`: pagina inicial autenticada
- `config/conexao.php`: configuracao do banco via variaveis de ambiente
- `config/bootstrap.php`: utilitarios de sessao, autenticacao e helpers
- `template/`: cabecalho e rodape compartilhados
- `*/<entidade>.php`: controladores CRUD por entidade
- `nfl.sql`: script de criacao/base de dados

## Requisitos

- PHP 7.4+ (recomendado 8+)
- MySQL ou MariaDB
- Servidor local (XAMPP, Apache+PHP, etc.)

## Configuracao

O projeto permite configuracao por variaveis de ambiente:

- `DB_HOST`
- `DB_PORT`
- `DB_NAME`
- `DB_USER`
- `DB_PASS`
- `APP_BASE_URL` (opcional)

Se nenhuma variavel for informada, o sistema usa fallback local (`127.0.0.1:3306`, banco `nfl`, usuario `root`, senha vazia).

## Banco de Dados

1. Crie o banco `nfl` (ou ajuste `DB_NAME`).
2. Importe o arquivo `nfl.sql`.

Observacao sobre senha de usuario:

- o login atual usa `password_verify`;
- se encontrar hash legado MD5, valida e atualiza automaticamente para `password_hash` no primeiro login bem-sucedido.

## Execucao

Com o servidor local configurado, acesse:

- `http://localhost/NFL/login.php`

## Escopo e Limites

Este repositorio foi mantido com foco em:

- correcao tecnica basica
- organizacao e higiene de codigo
- seguranca essencial para contexto legado

Nao e objetivo deste projeto:

- migrar para framework moderno
- reescrever arquitetura do zero
- adicionar funcionalidades fora do CRUD administrativo manual
