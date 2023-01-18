**Observação:**

>Conseguir obter o token e fazer todo o fluxo de **crawler** necessário para obter a resposta, mas fui barrado pelo CSRF. Busquei e pesquisei muito sobre como resolver essa questão, sempre retorna **"Forbidden"**; Fico triste por não atingir o objetivo, mesmo passando ou não na entrevista peço 5 minutos para me ensinar como passar por esse impedimento, quero evoluir com isso. Dei meu máximo nos outros requisitos, espero que curtão!

* O projeto foi pensado em você, rápido e simples para ser testado.

**Requisitos:**
* Docker
* mbstring

**Passos para instalação:**

* Clonar branch do github
* Rodar dois comandos no diretório raiz do projeto
```php tinker commands
    composer install --ignore-platform-req=ext-curl
```
* Após instalar as depêndencia de esse comando
```php tinker commands
    ./vendor/bin/sail up -d
```
>Pronto, só acessar: http://localhost:8000/crawler

**Rodar os teste:**
* Rodar o comando no diretório raiz do projeto
```php tinker commands
    vendor/bin/phpunit
```
Lembrando que para rodar o teste precisa possuir e extenção do mbstring, caso não tenha é so utilizar o comando para instalação:
>sudo apt-get install php-mbstring

Agora só rodar os teste novamente.
