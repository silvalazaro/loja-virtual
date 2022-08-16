Requisito 1<br>
Instalar o Docker e Docker Compose<br>
https://docs.docker.com/engine/install/ubuntu/<br><br>

Requisito 2<br>
As portas 8000 (web), 443 (https), 5432 (postgres), 22 (ssh) devem estar liberadas. Em caso de erro, você pode modificá-las no arquivo .env<br><br>

Os comandos abaixo funcionam no Linux (Debian, Ubuntu). Farei um tutorial para o Windows<br>

1. Execute os comandos abaixo para clonar o projeto e navegar para o diretório raiz <br>

<strong>git clone https://github.com/silvalazaro/loja-virtual.git</strong> <br>

<strong>cd loja-virtual</strong><br><br>

2. Execute o comando abaixo para montar os containers<br>
 
<strong>docker compose up -d</strong><br><br>

3. Conecte via SSH com o comando abaixo. Ao pedir senha,digite a letra a em minísculo: a<br>

<strong>ssh loja@127.0.0.1</strong><br>

4. Execute os comandos abaixo<br>
<strong>cd /var/www/html</strong><br>
<strong>composer install</strong><br>
<strong>npm install</strong><br>
<strong>npm run build</strong><br>
<strong>php bin/console doctrine:database:create</strong><br>
<strong>php bin/console make:migration</strong><br>
<strong>php bin/console doctrine:migrations:migrate</strong><br>
<strong>php bin/console doctrine:fixtures:load</strong><br><br>

5. Acesse o link<br>
<strong>http://localhost:8000/categoria<br><br>
