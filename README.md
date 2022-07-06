<p align="center"><h1>Management User API</h1></p>

## Acerca de Management User API

Es un api que permite crear, modificar, eliminar y consultar usuarios de una base de datos, utilizando las siguientes tecnologías:

- Laravel [documentation](https://laravel.com/docs).
- [NGINX](https://nginx.org/en/docs/).
- Traefik Proxy [documentation](https://doc.traefik.io/traefik/).
- Docker Compose [documentation](https://docs.docker.com/).
- Database MySQL [documentation](https://dev.mysql.com/doc/).

## Pasos para instalación

Este proyecto se encuentra alojado en un repositorio público en Github.
Para realizar el proceso de instalación se deberán seguir los siguientes pasos:

- Debemos clonar el proyecto del repositorio de [Github](https://github.com/ClaudioCarrera/traefik-v2-docker-laravel-example).

  1. Procedemos a clonar en el ambiente local, cd /[ruta_donde_va_a_clonar_el_repositorio] Ejemplo:
  ```bash
  cd /var/www/html

  git clone https://github.com/ClaudioCarrera/traefik-v2-docker-laravel-example.git
  ```
  2. Ingresar en la carpeta clonada, cd [su_ruta]/user_management_api Ejemplo:
  ````bash
   cd /var/www/html/management_user_api
  ````
- Al clonar el proyecto, las variables de ambiente [.env] no se encuentran configuradas, es por esta razón que debemos configurarlas. Este proyecto con dos archivos [.env] que se encuentran en las siguientes rutas:.
  1. Un archivo se encuentra en la raíz del proyecto, aquí se guardarán las configuraciones necesarias para la definición del proyecto para [Traefik](https://doc.traefik.io/traefik/) y la creación de la base de datos.
  2. El segundo archivo se encuentra en la carpeta **"src"** y hace relación a las variables de ambiente de **Laravel**
>En ambos casos se encuentran subidos los respectivos archivos de ejemplo.

1. En la raíz del proyecto vamos a encontrar un archivo llamado **env.example** y procedemos a crear el archivo [.env] partiendo de el ejemplo.
```bash
cp env.exmple .env
````
El contenido del archivo es el siguiente:

```
HOST=laravel.vm
PROJECT_FOLDER=laravel
MYSQL_DATABASE=homestead
MYSQL_USER=homestead
MYSQL_PASSWORD=secret
MYSQL_ROOT_PASSWORD=secret
MYSQL_PORT=3306
````
2. Ingresamos en la carpeta **src** y vamos a encontrar el archivo llamado **env.example**  y procedemos a crear el archivo [.env] partiendo de el ejemplo.
```bash
cd /var/www/html/user_management/src

cp env.example .env
```
El contenido del archivo es el siguiente:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/8I1TuXr6zdGfEqqmYRIjsSMK0KkEsz1h3kOv8xHdl0=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=127.0.0.1
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
3. Lo siguiente que debemos hacer es editar el parámetro **DB_HOST=127.0.0.1** que se encuentra en el archivo, y reemplazamos por **DB_HOST=mysql**. Este valor mysql hace referencia a la imagen Docker llamada **mysql** que se encuentra definida en el archivo **docker-compose (container_name)** y si cambiamos este nombre, debemos asegurarnos de cambiar en el **.env**.

- Luego, en la raíz del proyecto procedemos a ejecutar los siguientes comando de docker-compose que permitirán levantar las imagenes.
- **docker-compose build** para construir las imagenes.
- **docker-compose up -d** para levantar los contendores.
```bash
$ docker-compose build
[+] Building 1.2s (6/6) FINISHED                                                                                                                                                                     
 => [internal] load build definition from Dockerfile                                                                                                                                            0.0s
 => => transferring dockerfile: 31B                                                                                                                                                             0.0s
 => [internal] load .dockerignore                                                                                                                                                               0.0s
 => => transferring context: 2B                                                                                                                                                                 0.0s
 => [internal] load metadata for docker.io/library/php:7.4-fpm-alpine                                                                                                                           1.1s
 => [1/2] FROM docker.io/library/php:7.4-fpm-alpine@sha256:92e9d2a4c6888a712f6002659bdf93d16609734f0720f618e214083b220d5b3a                                                                     0.0s
 => CACHED [2/2] RUN docker-php-ext-install pdo pdo_mysql                                                                                                                                       0.0s
 => exporting to image                                                                                                                                                                          0.0s
 => => exporting layers                                                                                                                                                                         0.0s
 => => writing image sha256:9badd73394e90574a7f6099bda6c8b32c671270d8cf4ecac8d45e966d2be461d                                                                                                    0.0s
 => => naming to docker.io/library/user_management_api_1_php                                                                                                                                    0.0s

Use 'docker scan' to run Snyk tests against images to find vulnerabilities and learn how to fix them
```
```bash
$ docker compose up -d
[+] Running 24/24
 ⠿ traefik Pulled                                                                                                                                                                              11.2s
   ⠿ 89d9c30c1d48 Pull complete                                                                                                                                                                 5.2s
   ⠿ 275722d2e7f6 Pull complete                                                                                                                                                                 5.5s
   ⠿ 918c69894121 Pull complete                                                                                                                                                                 8.9s
   ⠿ 25558e59d836 Pull complete                                                                                                                                                                 9.0s
 ⠿ nginx Pulled                                                                                                                                                                                11.5s
   ⠿ 2408cc74d12b Already exists                                                                                                                                                                0.0s
   ⠿ d803b651eb66 Pull complete                                                                                                                                                                 8.6s
   ⠿ 506a8a07806b Pull complete                                                                                                                                                                 8.7s
   ⠿ 90950720101a Pull complete                                                                                                                                                                 8.8s
   ⠿ f624b86dc082 Pull complete                                                                                                                                                                 8.9s
   ⠿ 735bfeb5dced Pull complete                                                                                                                                                                 9.2s
 ⠿ mysql Pulled                                                                                                                                                                                17.6s
   ⠿ be8881be8156 Pull complete                                                                                                                                                                 5.4s
   ⠿ c3995dabd1d7 Pull complete                                                                                                                                                                 5.5s
   ⠿ 9931fdda3586 Pull complete                                                                                                                                                                 5.8s
   ⠿ bb1b6b6eff6a Pull complete                                                                                                                                                                 6.0s
   ⠿ a65f125fa718 Pull complete                                                                                                                                                                 6.1s
   ⠿ 2d9f8dd09be2 Pull complete                                                                                                                                                                 7.1s
   ⠿ 37b912cb2afe Pull complete                                                                                                                                                                 7.2s
   ⠿ 79592d21cb7f Pull complete                                                                                                                                                                 7.2s
   ⠿ 00bfe968d82d Pull complete                                                                                                                                                                15.3s
   ⠿ 79cf546d4770 Pull complete                                                                                                                                                                15.3s
   ⠿ 2b3c2e6bacee Pull complete                                                                                                                                                                15.4s
[+] Running 5/5
 ⠿ Network user_management_api_1_app-network  Created                                                                                                                                           0.1s
 ⠿ Container mysql                            Started                                                                                                                                           1.6s
 ⠿ Container php                              Started                                                                                                                                           1.7s
 ⠿ Container user_management_api_1-traefik-1  Started                                                                                                                                           1.6s
 ⠿ Container nginx                            Started                                                                                                                                           1.5s
```
- Podemos utilizar el comando **docker-compose ps** para ver los contenedores que se encuentran corriendo.
```bash
$ docker-compose ps
NAME                              COMMAND                  SERVICE             STATUS              PORTS
mysql                             "docker-entrypoint.s…"   mysql               running             0.0.0.0:33306->3306/tcp
nginx                             "/docker-entrypoint.…"   nginx               running             0.0.0.0:8080->80/tcp
php                               "docker-php-entrypoi…"   php                 running             0.0.0.0:9000->9000/tcp
user_management_api_1-traefik-1   "/entrypoint.sh --ap…"   traefik             running             0.0.0.0:80->80/tcp, 0.0.0.0:8081->8080/tcp
```
Una vez que los contenedores se encuentran corriendo y sin errores, procedemos ejecutar unos comandos que nos permitirán crear la base de datos y cargar datos de prueba.
Para esto vamos a utilizar el comando **docker-compose exec** que nos permite ejecutar instrucciones en el contenedor.

1. Instalar las bases de datos.
```bash
$ docker-compose exec php php /var/www/html/artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (82.28ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (68.84ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (77.55ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (118.68ms)
Migrating: 2022_06_30_060812_create_usuarios_table
Migrated:  2022_06_30_060812_create_usuarios_table (42.74ms)
```
2. Llenar las bases de datos con información de pruebas.
```bash
$ docker-compose exec php php /var/www/html/artisan db:seed --class=UsuariosSeeder
Database seeding completed successfully.
```

Una vez finalizado este proceso, podremos hacer uso de la aplicación.

## Rutas que podemos Utilizar
Para verificar que nuestro sitio funciona, podemos hacerlo de utilizando las siguientes rutas:

### Ver Dashboard de Traefik
- Ingresamos en nuestro browser y digitamos la url: [http://localhost:8081](http://localhost:8081).

### API Usuarios
-  Para hacer uso del API el proyecto cuenta con una colección de Postman que se encuentra en el directorio raíz con el nombre **ManagementUsersApi.postman_collection.json**. Haga click para ver la [documentación](https://documenter.getpostman.com/view/21719699/UzJHRy1y).
- Otra forma de probar el proyect es: ingresar en el browser y digitar la url: [http://localhost/api/usuarios](http://localhost/api/usuarios) que mostrará el total de la lista de usuarios ingresados.
