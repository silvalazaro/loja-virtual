Requisitos<br>
Instala o Docker e Docker Compose<br>
https://docs.docker.com/engine/install/ubuntu/<br>


As portas 8000 (web), 443 (https), 5432 (postgres), 22 (ssh) devem estar liberadas. Em caso de erro, você pode modificá-las no arquivo .env<br><br>


1. Execute os comandos abaixo para clonar o projeto e navegar para o diretório raiz <br>

git clone https://github.com/silvalazaro/loja-virtual.git<br>

cd loja-virtual<br><br>

2. Execute o comando abaixo para montar os containers<br>
 
docker compose up -d<br><br>

3. Conecte via SSH com o comando abaixo. Ao pedir senha,digite a letra a em minísculo: a<br>

ssh loja@127.0.0.1<br>

4. Execute os comandos abaixo<br>
cd /var/www/html<br>
composer install<br>
npm install<br>
npm run build<br>
php bin/console doctrine:database:create<br>
php bin/console make:migration<br>
php bin/console doctrine:migrations:migrate<br>
php bin/console doctrine:fixtures:load<br><br>

5. Acesse o link<br>
http://localhost:8000/categoria<br><br>

Depois analise o código