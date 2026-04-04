# NFL CRUD Legado (PHP Procedural)

Projeto legado/manual em PHP procedural para administração de dados temáticos da NFL.

## Posicionamento do Projeto

Este repositório **não** representa uma aplicação moderna em camadas, nem um produto em evolução com arquitetura complexa.

A proposta é intencionalmente simples: demonstrar um sistema administrativo clássico em PHP puro, com autenticação, sessão e operações CRUD sobre entidades relacionadas.

## O que o Sistema Entrega

- Login com autenticação simples.
- Controle de sessão para áreas protegidas.
- Conexão com MySQL/MariaDB usando PDO.
- Cadastro, listagem, edição e exclusão de registros.
- Relatório em CSV para extração de dados.

Entidades principais:

- Classe
- Posição
- Jogador
- Lesão (injurie)
- Time
- Super Bowl (sb)

## Stack

- PHP 7.4+ (estilo procedural)
- MySQL/MariaDB
- HTML + Bootstrap 4

## Estrutura Resumida

- `login.php`: autenticação e logout
- `index.php`: página inicial autenticada
- `config/bootstrap.php`: helpers de sessão, autenticação, fluxo e escape
- `config/conexao.php`: conexão PDO com fallback local
- `template/`: cabeçalho e rodapé compartilhados
- `*/<entidade>.php`: fluxo CRUD de cada entidade
- `nfl.sql`: script base de estrutura e dados

## Configuração

Você pode usar variáveis de ambiente para configurar o banco:

- `DB_HOST`
- `DB_PORT`
- `DB_NAME`
- `DB_USER`
- `DB_PASS`
- `APP_BASE_URL` (opcional)

Se não definir variáveis, o sistema usa fallback local:

- host `127.0.0.1`
- porta `3306`
- banco `nfl`
- usuário `root`
- senha vazia

Arquivo de referência: `.env.example`.

## Banco de Dados

1. Crie o banco `nfl` (ou ajuste `DB_NAME`).
2. Importe o arquivo `nfl.sql`.

### Observação sobre senha de usuário

- O login atual usa `password_verify`.
- Se encontrar hash legado em MD5, o sistema valida no primeiro login e atualiza automaticamente para `password_hash`.

## Execução Local

Com Apache/PHP em execução (por exemplo, XAMPP), acesse:

- `http://localhost/NFL/login.php`

## Escopo e Limites

Este projeto foi refinado para melhor consistência técnica, organização e segurança básica dentro do contexto legado.

Não é objetivo deste repositório:

- migrar para framework (Laravel, Symfony, etc.)
- reescrever a arquitetura do zero
- transformar o sistema em produto moderno
- adicionar funcionalidades fora do escopo CRUD manual

## Público-Alvo do Repositório

Este código é útil para estudo e portfólio em cenários de manutenção de sistemas legados em PHP procedural, com foco em fundamentos de backend e organização incremental de código.
