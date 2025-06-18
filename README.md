---

Que ótima iniciativa em compartilhar seu projeto no GitHub! Isso facilita muito a colaboração e o teste por outras pessoas.

Sim, a pessoa que baixar seu código do GitHub **deverá instalar todas as dependências do projeto**, tanto as de backend (PHP) quanto as de frontend (JavaScript/CSS), e também configurar o ambiente para rodar o Laravel.

Aqui está um resumo objetivo com todos os detalhes e comandos necessários para que outra pessoa configure e execute seu projeto Laravel:

---

## Como Configurar e Rodar o Projeto Laravel (Biblioteca de Músicas)

Este guia passo a passo detalha como configurar, instalar as dependências e executar o projeto da Biblioteca de Músicas.

### Pré-requisitos

Antes de começar, certifique-se de ter o seguinte instalado em seu sistema:

* **PHP:** Versão 8.2 ou superior (Laravel 10 e 11 geralmente exigem PHP 8.2+).
* **Composer:** Gerenciador de pacotes PHP.
* **Node.js e npm (ou Yarn):** Para as dependências de frontend.
* **Servidor de Banco de Dados:** MySQL, PostgreSQL, SQLite ou SQL Server (MySQL é o mais comum com Laravel).
* **Git:** Para clonar o repositório.

### Passos para Configuração e Execução

1.  **Clonar o Repositório:**
    Abra seu terminal e clone o projeto do GitHub:
    ```bash
    git clone https://github.com/akiiller/projeto_filmes.git
    cd projeto_filmes #
    ```

2.  **Instalar Dependências PHP (Composer):**
    Instale todas as dependências do Laravel definidas no `composer.json`:
    ```bash
    composer install
    ```

3.  **Configurar o Arquivo `.env`:**
    O Laravel usa um arquivo `.env` para configurações de ambiente (banco de dados, chaves de app, etc.).
    * Crie uma cópia do arquivo de exemplo:
        ```bash
        cp .env.example .env
        ```
    * Gere uma chave de aplicação para o Laravel (essencial para segurança):
        ```bash
        php artisan key:generate
        ```
    * **Edite o arquivo `.env`** com suas credenciais de banco de dados. Um exemplo para MySQL:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=biblioteca_musicas # Crie este banco de dados vazio
        DB_USERNAME=root             # Seu usuário do DB
        DB_PASSWORD=                 # Sua senha do DB (vazia se não tiver)
        ```
        **Importante:** Crie um banco de dados vazio com o nome especificado em `DB_DATABASE` (ex: `biblioteca_musicas`) no seu servidor de banco de dados.

4.  **Rodar Migrações do Banco de Dados:**
    Isso criará as tabelas `musicas`, `reproducoes` e as tabelas padrão do Laravel (usuários, senhas, etc.) no seu banco de dados:
    ```bash
    php artisan migrate
    ```

5.  **Instalar Dependências Frontend (npm/Yarn):**
    Instale as dependências JavaScript e CSS (como Bootstrap) usando npm:
    ```bash
    npm install
    ```

6.  **Compilar Ativos Frontend:**
    Compile os arquivos CSS e JavaScript para que o navegador possa carregá-los. Isso também criará o `manifest.json` que estava causando erros anteriormente:
    ```bash
    npm run build
    ```

7.  **Criar Link Simbólico para Imagens:**
    Para que as capas de álbum sejam exibidas, é necessário criar um link simbólico que conecta a pasta de armazenamento do Laravel à pasta pública:
    ```bash
    php artisan storage:link
    ```

8.  **Iniciar o Servidor de Desenvolvimento Laravel:**
    Finalmente, inicie o servidor local do Laravel:
    ```bash
    php artisan serve
    ```
    O projeto estará acessível no seu navegador, geralmente em `http://127.0.0.1:8000`.

### Primeiro Acesso e Criação de Usuário

* Ao acessar `http://127.0.0.1:8000`, você verá a página inicial.
* Para interagir com o CRUD, você precisará **criar um usuário**. Clique no link **"Register"** na barra de navegação superior (ou acesse `http://127.0.0.1:8000/register`), preencha o formulário e registre-se.
* Após o registro, você será logado e poderá adicionar, editar e excluir músicas.

---

Com esses passos é possível colocar seu projeto para rodar sem grandes dificuldades.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
