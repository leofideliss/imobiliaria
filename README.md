

## Sobre o projeto

É uma aplicação web com o objetivo de facilitar a divulgação de imóveis, nessa aplicação seria possível que adiministradores do sistema divulgassem seus próprios imóveis, e como diferencial que outras pessoas da área imobiliaria ou não, também se beneficiasse da utilização do sistema e divulgação ganhando uma recompensa na venda dos imóveis indicados.

A partir da indicação de um imóvel , a estrutura do sistema iria se encarregar de:
- encontrar a casa mediante os dados fornecidos.
- econtrar um profissional para fazer as fotos( fotografo)
- enontrar um corretor para apresentação do imóvel

A indicação de fotografos e corretores para cada imóvel seria feita atráves do CRM Bitrix24, o sistema apenas forneceria os formulários necessários para captura desses dados.

### 📋 Pré-requisitos

`PHP 7.4`
`Composer`
`Docker`
`Docker-compose`
`MySQL`

### 🔧 Executando com Docker

Realizar o clone do repositório

Para criar a imagem do projeto e subir os container executar os comandos no diretório raiz do projeto:
```
docker-compose up -d --build
```

Em seguida acessar o container do banco de dados e executar:


    CREATE TABLE NOME_TABELA;



Após isso acessar o container da aplicação para configurar o `.env`e executar os seguintes comandos:

- Criar o arquivo `.env` baseado no `.env-example` e alterar as definições conforme o banco criado:

    ```
    DB_HOST

    DB_PORT

    DB_DATABASE

    DB_USERNAME 

    DB_PASSWORD
    ```


Em seguida executar:
```
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

> [!WARNING]
>Caso ocorra algum erro na execução do projeto verificar os logs do docker:

```
docker-compose logs
```

### 🔧 Executando sem Docker

Realizar o clone do repositório

Nesse caso é necessário ter o php e o composer instalados. 

- Criar na raiz do projeto o arquivo .env, conforme enviado no anexo
    - Criar o banco de dados
    - Em .env alterar as definições conforme o banco criado:

        ```
        DB_HOST

        DB_PORT

        DB_DATABASE

        DB_USERNAME 

        DB_PASSWORD
        ```

    - Criar o banco de dados

    - Rodar sequencialmente os seguintes comandos, na raiz do projeto: 

        ```
        composer install
        php artisan migrate
        Php artisan db:seed
        ```

    - Para colocar o projeto no ar: `php artisan serve`
        - Por default será feito o listener na porta 8000
        - Para acessar o projeto acesse : {{localhost}}:8000 

 
## 🛠️ Tecnologias utilizadas
* [Laravel 8.x](https://laravel.com/docs/8.x) -  O framework web
* [Composer](https://getcomposer.org/) - Gerenciador de dependência PHP
* [Jquery 3.6](https://jquery.com/) - Utilizado no Template Constructor
* [Bootstrap 4.6](https://getbootstrap.com/docs/4.6/getting-started/introduction/) Utilizado no Template Constructor
* [Sortable | Jquery UI](https://jqueryui.com/sortable/) Utilizado no arrastar e soltar das secções.
* [Tema - KeenThemes](https://preview.keenthemes.com/html/keen/docs/index) - Tema utilizado no dashboard.
* [DataTables](https://datatables.net/) - Usado nas tabelas do sistema.
* [Dropzone.js](https://www.dropzone.dev/) - Usado no upload de imagens e arquivos.

## ✒️ Autores

Reponsáveis pelo desenvolvimento:

* **Leonardo Fidelis** - *Desenvolvedor FullStack* - [Linkedin](https://br.linkedin.com/in/leonardo-fidelis-a7b43a211)
* **Andre Campos** - *Desenvolvedor Frontend/Documentação* - [Linkedin](https://br.linkedin.com/in/andr%C3%A9-campos-27b108211)